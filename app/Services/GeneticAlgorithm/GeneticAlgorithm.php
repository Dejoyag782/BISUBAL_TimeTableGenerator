<?php

namespace App\Services\GeneticAlgorithm;

class GeneticAlgorithm
{
    /**
     * This is the number of individuals in the population
     *
     * @var int
     */
    private $populationSize;

    /**
     * This is the probability in which a specific gene in a solution’s
     * chromosome will be mutated
     *
     * @var double
     */
    private $mutationRate;

    /**
     * This is the frequency in which crossover is applied
     *
     * @var double
     */
    private $crossoverRate;

    /**
     * This represents the number of individuals to be
     * considered as elite and skipped during crossover
     *
     * @var integer
     */
    private $elitismCount;

    /**
     * Size of the tournament
     *
     * @var int
     */
    private $tournamentSize;

    /**
     * Temperature for simulated annealing
     *
     * @var int
     */
    private $temperature;

    /**
     * Cooling rate for simulated annealing
     *
     * @var int
     */
    private $coolingRate;

    /**
     * Create a new instance of this class
     */
    public function __construct($populationSize, $mutationRate, $crossOverRate, $elitismCount, $tournamentSize)
    {
        $this->populationSize = $populationSize;
        $this->mutationRate = $mutationRate;
        $this->crossoverRate = $crossOverRate;
        $this->elitismCount = $elitismCount;
        $this->tournamentSize = $tournamentSize;
        $this->temperature = 1.0;
        $this->coolingRate = 0.001;
    }

    /**
     * Initialize a population
     *
     * @param Timetable $timetable Timetable for generating individuals
     */
    public function initPopulation($timetable)
    {
        $population = new Population($this->populationSize, $timetable);

        return $population;
    }

    /**
     * Get the temperature
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Cool temperature
     *
     */
    public function coolTemperature()
    {
        $this->temperature *= (1 - $this->coolingRate);
    }

    /**
     * Calculate the fitness of a given individual
     *
     * @param Individual $individual The individual
     * @param \App\Services\GeneticAlgorithm\Timetable $timetable A timetable
     * @return double The fitness of the individual
     */
    public function calculateFitness($individual, $timetable)
    {
        $timetable = clone $timetable;

        $timetable->createClasses($individual);
        $clashes = $timetable->calcClashes();
        $fitness = 1.0 / ($clashes + 1);

        $individual->setFitness($fitness);
        return $fitness;
    }

    /**
     * Evaluate a given population
     *
     * @param Population $population The population to evaluate
     * @param Timetable $timetable Timetable data
     */
    public function evaluatePopulation($population, $timetable)
    {
        $populationFitness = 0;

        $individuals = $population->getIndividuals();

        print "\n-----------------------------------------------------------------------Counting Clashes-----------------------------------------------------------------------\n";
        print "\nNo of Clashes:\n";
        foreach ($individuals as $individual) {
            $populationFitness += $this->calculateFitness($individual, $timetable);
        }

        $population->setPopulationFitness($populationFitness);
    }

    /**
     * Determine whether the termination condition has been met
     * For this problem, this occurs when we get an individual with
     * a fitness of 1.0
     *
     * @param Population $population Population we are evaluating
     * @return boolean The truth value of this check
     */
    public function isTerminationConditionMet($population)
    {
        return $population->getFittest(0)->getFitness() == 1;
    }

    /**
     * Determine whether we have reached the max generations we want to
     * iterate through
     *
     * @param int $generations Number of generations
     * @param int $maxGenerations Max generations
     */
    public function isGenerationsMaxedOut($generations, $maxGenerations)
    {
        return $generations > $maxGenerations;
    }

    /**
     * Select a parent from a population to be used in a crossover
     * with some other individual
     *
     * The technique used here is tournament selection method
     *
     * @param Population $population The population
     * @return Individual The selected parent
     */
    public function selectParent($population)
    {
        $tournament = new Population();

        $population->shuffle();

        for ($i = 0; $i < $this->tournamentSize; $i++) {
            $participant = $population->getIndividual($i);
            $tournament->setIndividual($i, $participant);
        }

        return $tournament->getFittest(0);
    }

    /**
     * Perform  a crossover on a population's individuals
     *
     * @param Population $population The population
     * @return Population $newPopulation The resulting population
     */
    public function crossoverPopulation($population)
    {
        $newPopulation = new Population($population->size());
    
        for ($i = 0; $i < $population->size(); $i++) {
            $parentA = $population->getFittest($i);
    
            // Debugging output
            // print "\n\nParentA: ".$parentA."\n";
    
            $random = mt_rand() / mt_getrandmax();
    
            // Debugging output
            // print "\n(?".$this->crossoverRate.">".$random."):(interval=".$i.") ";
    
            if (($this->crossoverRate > $random) && ($i > $this->elitismCount)) {
                // Create offspring
                $offspring = Individual::random($parentA->getChromosomeLength());
    
                // Debugging output
                // print "\n\nPopulating with crossover:\n";
                // print "Offspring: ".$offspring."\n";
    
                $parentB = $this->selectParent($population);
    
                $swapPoint = mt_rand(0, $parentB->getChromosomeLength());
    
                for ($j = 0; $j < $parentA->getChromosomeLength(); $j++) {
                    if ($j < $swapPoint) {
                        $offspring->setGene($j, $parentA->getGene($j));
                    } else {
                        $offspring->setGene($j, $parentB->getGene($j));
                    }
                }
    
                // Debugging output
                // print "New Population with crossover:\n";
                // print $newPopulation."\n";
    
                $newPopulation->setIndividual($i, $offspring);
            } else {
                // Add to population without crossover
                // print "New Population without crossover:\n";
                // print $newPopulation."\n";
                $newPopulation->setIndividual($i, $parentA);
            }
        }
    
        return $newPopulation;
    }
    

    /**
     * Perform a mutation on the individuals of the given population
     *
     * @param Population $population The population to mutate
     */
    public function mutatePopulation($population, $timetable)
    {
        $newPopulation = new Population();
        $bestFitness = $population->getFittest(0)->getFitness();

        

        for ($i = 0; $i < $population->size(); $i++) {
            $individual = $population->getFittest($i);
            $randomIndividual = new Individual($timetable);

            // Calculate adaptive mutation rate
            $adaptiveMutationRate = $this->mutationRate;

            if ($individual->getFitness() > $population->getAvgFitness()) {
                $fitnessDelta1 = $bestFitness - $individual->getFitness();
                $fitnessDelta2 = $bestFitness - $population->getAvgFitness();
                $adaptiveMutationRate = ($fitnessDelta1 / $fitnessDelta2) * $this->mutationRate;
            }

            if ($i > $this->elitismCount) {
                for ($j = 0; $j < $individual->getChromosomeLength(); $j++) {
                    $random = mt_rand() / mt_getrandmax();

                    if (($adaptiveMutationRate * $this->temperature) > $random) {
                        $individual->setGene($j, $randomIndividual->getGene($j));
                        
                        // $gene = $randomIndividual->getGene($j);
                        // $geneprimary = $gene;
                        //     // Regular expression pattern to match D#T# format
                        // $pattern = '/^D\d+T\d+$/';

                        // // // Perform the regex match
                        // if (preg_match($pattern, $geneprimary)) {
                        //     $day = substr($gene, 1, 1); // Get the character at index 1 (0-based index)
                        //     $timeslot = substr($gene, 3, 1); // Get the character at index 3 (0-based index)

                        //     // Convert the extracted characters to integers
                        //     $day = intval($day);
                        //     $timeslot = intval($timeslot);

                        //     echo "D".$day."T".$timeslot.",";
                            
                        //     $roomId = $randomIndividual->getGene($j+1);
                        //     $profId = $randomIndividual->getGene($j+2);

                        //     echo "$roomId,$profId,";

                        //     $gene2hr = $randomIndividual->getGene($j+3);
                        //     $day2hr = substr($gene2hr, 1, 1); // Get the character at index 1 (0-based index)
                        //     $timeslot2hr = substr($gene2hr, 3, 1); // Get the character at index 3 (0-based index)  
                        //     // Convert the extracted characters to integers                          
                        //     $day2hr = intval($day2hr);
                        //     $timeslot2hr = intval($timeslot2hr);
                        //     // room & prof
                        //     $roomId2hr = $randomIndividual->getGene($j+4);
                        //     $profId2hr = $randomIndividual->getGene($j+5);

                        //     if($roomId == $roomId2hr && $profId == $profId2hr){
                        //         $individual->setGene($j+3, "D$day"."T".$timeslot+1);
                        //         print "Hoy Ka\n";
                        //     }                       
                        // }
                        

                    }
                }
            }

            // print "New Population:\n".$newPopulation."\n";
            $newPopulation->setIndividual($i, $individual);
        }

        return $newPopulation;
    }
}
