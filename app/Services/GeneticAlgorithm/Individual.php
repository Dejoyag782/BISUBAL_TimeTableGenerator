<?php
namespace App\Services\GeneticAlgorithm;

class Individual
{
    /**
     * This is the genetic makeup of an individual
     *
     * @var array
     */
    private $chromosome;


    /**
     * Fitness of the individual
     *
     * @var double
     */
    private $fitness;


    /**
     * Create a new individual from a timetable
     *
     * @var Timetable The timetable
     */
    public function __construct($timetable = null)
    {

        // Assuming $timetable is an instance of the Timetable class
        $timeslots = $timetable->getTimeslots();
        $timeslotsCount = count($timeslots);

        $timeslotLab = false;

        // print "\nLength of Timeslot array: ".$timeslotsCount;

        if ($timetable) {
            $newChromosome = [];

            $chromosomeIndex = 0;

            // First, handle lab courses
            foreach ($timetable->getGroups() as $group) {
                foreach ($group->getModuleIds() as $moduleId) {
                    $module = $timetable->getModule($moduleId);
                    print "\nOn Module Lab" . $module->getModuleCode() . "\n";
                    

                    // Check if the module code contains "Lab"
                    $isLab = strpos($module->getModuleCode(), "Lab") !== false;

                    if (strpos($module->getModuleCode(), "Lab") !== false) {

                        $hours = $this->extractHours($module->getModuleCode());

                        for ($i = 1; $i <= $module->getSlots($group->getId()); $i++) {


                            $timeslotId = $timetable->getRandomTimeslot()->getId();
                            // This is for verifying if timeslot is capable of consecutive slots
                            while($timeslotLab!==true){
                                $timeslotId = $timetable->getRandomTimeslot()->getId();
                                // if hours is equals to 2
                                if($hours == 2){
                                    if($timeslotId=="D1T1" || $timeslotId=="D1T2" || $timeslotId=="D1T3" || $timeslotId=="D1T4" || 
                                       $timeslotId=="D1T5" || $timeslotId=="D1T6" || $timeslotId=="D1T7" || $timeslotId=="D1T8" || $timeslotId=="D1T9" || $timeslotId=="D1T10" || 
                                       $timeslotId=="D2T1" || $timeslotId=="D2T2" || $timeslotId=="D2T3" || $timeslotId=="D2T4" || 
                                       $timeslotId=="D2T5" || $timeslotId=="D2T6" || $timeslotId=="D2T7" || $timeslotId=="D2T8" || $timeslotId=="D2T9" || $timeslotId=="D1T10" || 
                                       $timeslotId=="D3T1" || $timeslotId=="D3T2" || $timeslotId=="D3T3" || $timeslotId=="D3T4" || 
                                       $timeslotId=="D3T5" || $timeslotId=="D3T6" || $timeslotId=="D3T7" || $timeslotId=="D3T8" || $timeslotId=="D3T9" || $timeslotId=="D1T10" || 
                                       $timeslotId=="D4T1" || $timeslotId=="D4T2" || $timeslotId=="D4T3" || $timeslotId=="D4T4" || 
                                       $timeslotId=="D4T5" || $timeslotId=="D4T6" || $timeslotId=="D4T7" || $timeslotId=="D4T8" || $timeslotId=="D4T9" || $timeslotId=="D1T10" || 
                                       $timeslotId=="D5T1" || $timeslotId=="D5T2" || $timeslotId=="D5T3" || $timeslotId=="D5T4" || 
                                       $timeslotId=="D5T5" || $timeslotId=="D5T6" || $timeslotId=="D5T7" || $timeslotId=="D5T8" || $timeslotId=="D5T9" || $timeslotId=="D1T10" || 
                                       $timeslotId=="D6T1" || $timeslotId=="D6T2" || $timeslotId=="D6T3" || $timeslotId=="D6T4" || 
                                       $timeslotId=="D6T5" || $timeslotId=="D6T6" || $timeslotId=="D6T7" || $timeslotId=="D6T8" || $timeslotId=="D6T9" || $timeslotId=="D1T10" || 
                                       $timeslotId=="D7T1" || $timeslotId=="D7T2" || $timeslotId=="D7T3" || $timeslotId=="D7T4" || 
                                       $timeslotId=="D7T5" || $timeslotId=="D7T6" || $timeslotId=="D7T7" || $timeslotId=="D7T8" || $timeslotId=="D7T9" || $timeslotId=="D1T10" ){
                                        $timeslotLab = true;
                                    }else{
                                        $timeslotLab = false;
                                    }
                                }else if($hours == 3){
                                    if($timeslotId=="D1T1" || $timeslotId=="D1T2" || $timeslotId=="D1T3" || $timeslotId=="D1T4" || 
                                       $timeslotId=="D1T5" || $timeslotId=="D1T6" || $timeslotId=="D1T7" || $timeslotId=="D1T8" || $timeslotId=="D1T9" ||
                                       $timeslotId=="D2T1" || $timeslotId=="D2T2" || $timeslotId=="D2T3" || $timeslotId=="D2T4" || 
                                       $timeslotId=="D2T5" || $timeslotId=="D2T6" || $timeslotId=="D2T7" || $timeslotId=="D2T8" || $timeslotId=="D2T9" ||
                                       $timeslotId=="D3T1" || $timeslotId=="D3T2" || $timeslotId=="D3T3" || $timeslotId=="D3T4" || 
                                       $timeslotId=="D3T5" || $timeslotId=="D3T6" || $timeslotId=="D3T7" || $timeslotId=="D3T8" || $timeslotId=="D3T9" ||
                                       $timeslotId=="D4T1" || $timeslotId=="D4T2" || $timeslotId=="D4T3" || $timeslotId=="D4T4" || 
                                       $timeslotId=="D4T5" || $timeslotId=="D4T6" || $timeslotId=="D4T7" || $timeslotId=="D4T8" || $timeslotId=="D4T9" ||
                                       $timeslotId=="D5T1" || $timeslotId=="D5T2" || $timeslotId=="D5T3" || $timeslotId=="D5T4" || 
                                       $timeslotId=="D5T5" || $timeslotId=="D5T6" || $timeslotId=="D5T7" || $timeslotId=="D5T8" || $timeslotId=="D5T9" ||
                                       $timeslotId=="D6T1" || $timeslotId=="D6T2" || $timeslotId=="D6T3" || $timeslotId=="D6T4" || 
                                       $timeslotId=="D6T5" || $timeslotId=="D6T6" || $timeslotId=="D6T7" || $timeslotId=="D6T8" || $timeslotId=="D6T9" ||
                                       $timeslotId=="D7T1" || $timeslotId=="D7T2" || $timeslotId=="D7T3" || $timeslotId=="D7T4" || 
                                       $timeslotId=="D7T5" || $timeslotId=="D7T6" || $timeslotId=="D7T7" || $timeslotId=="D7T8" || $timeslotId=="D7T9" ){
                                        $timeslotLab = true;
                                    }else{
                                        $timeslotLab = false;
                                    }
                                }else if($hours == 4){
                                    if($timeslotId=="D1T1" || $timeslotId=="D1T2" || $timeslotId=="D1T3" || $timeslotId=="D1T4" || 
                                       $timeslotId=="D1T5" || $timeslotId=="D1T6" || $timeslotId=="D1T7" || $timeslotId=="D1T8" ||
                                       $timeslotId=="D2T1" || $timeslotId=="D2T2" || $timeslotId=="D2T3" || $timeslotId=="D2T4" || 
                                       $timeslotId=="D2T5" || $timeslotId=="D2T6" || $timeslotId=="D2T7" || $timeslotId=="D2T8" ||
                                       $timeslotId=="D3T1" || $timeslotId=="D3T2" || $timeslotId=="D3T3" || $timeslotId=="D3T4" || 
                                       $timeslotId=="D3T5" || $timeslotId=="D3T6" || $timeslotId=="D3T7" || $timeslotId=="D3T8" ||
                                       $timeslotId=="D4T1" || $timeslotId=="D4T2" || $timeslotId=="D4T3" || $timeslotId=="D4T4" || 
                                       $timeslotId=="D4T5" || $timeslotId=="D4T6" || $timeslotId=="D4T7" || $timeslotId=="D4T8" ||
                                       $timeslotId=="D5T1" || $timeslotId=="D5T2" || $timeslotId=="D5T3" || $timeslotId=="D5T4" || 
                                       $timeslotId=="D5T5" || $timeslotId=="D5T6" || $timeslotId=="D5T7" || $timeslotId=="D5T8" ||
                                       $timeslotId=="D6T1" || $timeslotId=="D6T2" || $timeslotId=="D6T3" || $timeslotId=="D6T4" || 
                                       $timeslotId=="D6T5" || $timeslotId=="D6T6" || $timeslotId=="D6T7" || $timeslotId=="D6T8" ||
                                       $timeslotId=="D7T1" || $timeslotId=="D7T2" || $timeslotId=="D7T3" || $timeslotId=="D7T4" || 
                                       $timeslotId=="D7T5" || $timeslotId=="D7T6" || $timeslotId=="D7T7" || $timeslotId=="D7T8"){
                                        $timeslotLab = true;
                                    }else{
                                        $timeslotLab = false;
                                    }
                                }else if($hours == 5){
                                    if($timeslotId=="D1T1" || $timeslotId=="D1T2" || $timeslotId=="D1T3" || $timeslotId=="D1T4" || 
                                       $timeslotId=="D1T5" || $timeslotId=="D1T6" || $timeslotId=="D1T7" ||
                                       $timeslotId=="D2T1" || $timeslotId=="D2T2" || $timeslotId=="D2T3" || $timeslotId=="D2T4" || 
                                       $timeslotId=="D2T5" || $timeslotId=="D2T6" || $timeslotId=="D2T7" ||
                                       $timeslotId=="D3T1" || $timeslotId=="D3T2" || $timeslotId=="D3T3" || $timeslotId=="D3T4" || 
                                       $timeslotId=="D3T5" || $timeslotId=="D3T6" || $timeslotId=="D3T7" ||
                                       $timeslotId=="D4T1" || $timeslotId=="D4T2" || $timeslotId=="D4T3" || $timeslotId=="D4T4" || 
                                       $timeslotId=="D4T5" || $timeslotId=="D4T6" || $timeslotId=="D4T7" ||
                                       $timeslotId=="D5T1" || $timeslotId=="D5T2" || $timeslotId=="D5T3" || $timeslotId=="D5T4" || 
                                       $timeslotId=="D5T5" || $timeslotId=="D5T6" || $timeslotId=="D5T7" ||
                                       $timeslotId=="D6T1" || $timeslotId=="D6T2" || $timeslotId=="D6T3" || $timeslotId=="D6T4" || 
                                       $timeslotId=="D6T5" || $timeslotId=="D6T6" || $timeslotId=="D6T7" ||
                                       $timeslotId=="D7T1" || $timeslotId=="D7T2" || $timeslotId=="D7T3" || $timeslotId=="D7T4" || 
                                       $timeslotId=="D7T5" || $timeslotId=="D7T6" || $timeslotId=="D7T7"){
                                        $timeslotLab = true;
                                    }else{
                                        $timeslotLab = false;
                                    }
                                }
                            }

                            // print_r($timeslotId);
                            if ($isLab) {

                                print "Primary: ";
                            // Add random time slot
                            
                            $newChromosome[$chromosomeIndex] = $timeslotId;
                            $chromosomeIndex++;
                            print $timeslotId.",";

                            // Add random room
                            $roomId = $timetable->getRandomRoom()->getId();
                            $newChromosome[$chromosomeIndex] = $roomId;
                            $chromosomeIndex++;
                            print $roomId.",";

                            // Add random professor
                            $professor = $module->getRandomProfessorId();
                            $newChromosome[$chromosomeIndex] = $professor;
                            $chromosomeIndex++;
                            print $professor."\n";

                            
                                for ($j = 0; $j < $hours-1; $j++) {
        
                                    // print "Subslot: ";
                                    $timeslotId = $timetable->getTimeslot($timeslotId)->getNext();
                                    // $timeslotId = $timetable->getRandomTimeslot()->getId();
                                    $newChromosome[$chromosomeIndex] = $timeslotId;
                                    $chromosomeIndex++;
                                    print $timeslotId.",";
        
                                    $newChromosome[$chromosomeIndex] = $roomId;
                                    $chromosomeIndex++;
                                    print $roomId.",";
        
                                    $newChromosome[$chromosomeIndex] = $professor;
                                    $chromosomeIndex++;
                                    print $professor."\n";

                                    $module->increaseAllocatedSlots();
                                }
                            }
                           

                            // $module->increaseAllocatedSlots();
                            // $timeslot = $timetable->getTimeslot($timeslotId);

                            // $timeslotId = $timeslot->getNext();
                            // while (($i + 1) <= $timetable->maxContinuousSlots && ($module->getSlots() != $module->getAllocatedSlots()) && ($timeslotId > -1)) {
                            //     $newChromosome[$chromosomeIndex] = $timeslotId;
                            //     $chromosomeIndex++;

                            //     $newChromosome[$chromosomeIndex] = $roomId;
                            //     $chromosomeIndex++;

                            //     $newChromosome[$chromosomeIndex] = $professor;
                            //     $chromosomeIndex++;

                            //     $timeslotId = $timetable->getTimeslot($timeslotId)->getNext();
                            //     $module->increaseAllocatedSlots();
                            //     $i += 1;
                            // }
                            $timeslotLab = false;
                        }
                    }else{
                        if (strpos($module->getModuleCode(), "Lab") !== true) {

                            $hours = $this->extractHours($module->getModuleCode());
    
                            for ($i = 1; $i <= $module->getSlots($group->getId()); $i++) {
    
                                if (!$isLab) {
    
                                    print "Primary: ";
                                // Add random time slot
                                $timeslotId = $timetable->getRandomTimeslot()->getId();
                                $newChromosome[$chromosomeIndex] = $timeslotId;
                                $chromosomeIndex++;
                                print $timeslotId.",";
    
                                // Add random room
                                $roomId = $timetable->getRandomRoom()->getId();
                                $newChromosome[$chromosomeIndex] = $roomId;
                                $chromosomeIndex++;
                                print $roomId.",";
    
                                // Add random professor
                                $professor = $module->getRandomProfessorId();
                                $newChromosome[$chromosomeIndex] = $professor;
                                $chromosomeIndex++;
                                print $professor."\n";
    
                                }
    
                                
                                $module->increaseAllocatedSlots();
                                $timeslot = $timetable->getTimeslot($timeslotId);
    
                                $timeslotId = $timeslot->getNext();
                                while (($i + 1) <= $timetable->maxContinuousSlots && ($module->getSlots() != $module->getAllocatedSlots()) && ($timeslotId > -1)) {
                                    $newChromosome[$chromosomeIndex] = $timeslotId;
                                    $chromosomeIndex++;
    
                                    $newChromosome[$chromosomeIndex] = $roomId;
                                    $chromosomeIndex++;
    
                                    $newChromosome[$chromosomeIndex] = $professor;
                                    $chromosomeIndex++;
    
                                    $timeslotId = $timetable->getTimeslot($timeslotId)->getNext();
                                    $module->increaseAllocatedSlots();
                                    $i += 1;
                                }
                            }
                        }
                    }
                }
            }

            // // After, handle non-lab courses
            // foreach ($timetable->getGroups() as $group) {
            //     foreach ($group->getModuleIds() as $moduleId) {
            //         $module = $timetable->getModule($moduleId);
            //         print "\nOn Module Non-Lab" . $module->getModuleCode() . "\n";

            //         // Check if the module code contains "Lab"
            //         $isLab = strpos($module->getModuleCode(), "Lab") == true;

            //         if (strpos($module->getModuleCode(), "Lab") !== true) {

            //             $hours = $this->extractHours($module->getModuleCode());

            //             for ($i = 1; $i <= $module->getSlots($group->getId()); $i++) {

            //                 if (!$isLab) {

            //                     print "Primary: ";
            //                 // Add random time slot
            //                 $timeslotId = $timetable->getRandomTimeslot()->getId();
            //                 $newChromosome[$chromosomeIndex] = $timeslotId;
            //                 $chromosomeIndex++;
            //                 print $timeslotId.",";

            //                 // Add random room
            //                 $roomId = $timetable->getRandomRoom()->getId();
            //                 $newChromosome[$chromosomeIndex] = $roomId;
            //                 $chromosomeIndex++;
            //                 print $roomId.",";

            //                 // Add random professor
            //                 $professor = $module->getRandomProfessorId();
            //                 $newChromosome[$chromosomeIndex] = $professor;
            //                 $chromosomeIndex++;
            //                 print $professor."\n";

            //                 }

                            
            //                 $module->increaseAllocatedSlots();
            //                 $timeslot = $timetable->getTimeslot($timeslotId);

            //                 $timeslotId = $timeslot->getNext();
            //                 while (($i + 1) <= $timetable->maxContinuousSlots && ($module->getSlots() != $module->getAllocatedSlots()) && ($timeslotId > -1)) {
            //                     $newChromosome[$chromosomeIndex] = $timeslotId;
            //                     $chromosomeIndex++;

            //                     $newChromosome[$chromosomeIndex] = $roomId;
            //                     $chromosomeIndex++;

            //                     $newChromosome[$chromosomeIndex] = $professor;
            //                     $chromosomeIndex++;

            //                     $timeslotId = $timetable->getTimeslot($timeslotId)->getNext();
            //                     $module->increaseAllocatedSlots();
            //                     $i += 1;
            //                 }
            //             }
            //         }
            //     }
            // }



            foreach ($timetable->getModules() as $module) {
                $module->resetAllocated();
            }
        } else {
            $newChromosome = [];
        }

        
        // for displaying chromosome
        // $prntNC = $newChromosome;
        // print_r($prntNC);
        $this->chromosome = $newChromosome;
    }

    private function extractHours($moduleCode)
    {
        // Extract number of hours using regex
        if (preg_match('/(\d+)hr/', $moduleCode, $matches)) {
            return (int)$matches[1];
        }

        return 0; // Default to 0 if no match found
    }


    /**
     * Create a new individual with a randomised chromosome
     *
     * @param int $chromosomeLength Desired chromosome length
     */
    public static function random($chromosomeLength)
    {
        $individual = new Individual();

        for ($i = 0; $i < $chromosomeLength; $i++) {
            $individual->setGene($i, mt_rand(0, 1));
        }

        return $individual;
    }

    /**
     * Get the individual's chromosome
     *
     * @return array The chromosome
     */
    public function getChromosome()
    {
        return $this->chromosome;
    }

    /**
     * Get the length of the individual's chromosome
     *
     * @return int The length
     */
    public function getChromosomeLength()
    {
        return count($this->chromosome);
    }

    /**
     * Fix a gene at the given location of the chromosome
     *
     * @param int $index The location to insert the gene
     * @param int $gene The gene
     */
    public function setGene($index, $gene)
    {
        $this->chromosome[$index] = $gene;
    }

    /**
     * Get the gene at the specified location
     *
     * @param $index The location to get the gene at
     * @return int The bit representing the gene at that location
     */
    public function getGene($index)
    {
        return $this->chromosome[$index];
    }

    /**
     * Set the fitness param for this individual
     *
     * @param double $fitness The fitness of this individual
     */
    public function setFitness($fitness)
    {
        $this->fitness = $fitness;
    }

    /**
     * Get the fitness for this individual
     *
     * @return double The fitness of the individual
     */
    public function getFitness()
    {
        return $this->fitness;
    }

    /**
     * Get a printout of the individual
     *
     * @return string Output of the individual details
     */
    public function __toString()
    {
        return $this->getChromosomeString();
    }

    public function getChromosomeString()
    {
        return implode(",", $this->chromosome);
    }
}