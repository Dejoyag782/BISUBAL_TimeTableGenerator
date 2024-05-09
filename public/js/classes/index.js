    /**
     * An object for managing tasks related to courses
     */
    function CollegeClass(url, resourceName) {
        Resource.call(this, url, resourceName);
    }

    App.extend(Resource, CollegeClass);

    CollegeClass.prototype.init = function() {
        var self = this;

        Resource.prototype.init.call(self);

        $(document).on('click', '#course-add', function() {
            self.addCourse();
        });

        $(document).on('click', '.course-remove', function(event){
            var $el = $(event.target);
            var id = $el.data('id');

            $('#course-' + id + '-container').remove();
        });

        self.addCourse();
    };

    CollegeClass.prototype.addCourse = function(data) {
        var template = $('#course-template').html();
        var id = new Date().valueOf();
        data = data || null;

        template = template.replace(/{ID}/g, id);

        if (data) {
            $('#courses-container').prepend(template);
            $('[name=course-' + id + ']').val(data.course_id).change();
            $('[name=course-' + id + '-meetings]').val(data.meetings);
            $('[name=period-' + id + ']').val(data.academic_period_id).change();
        } else {
            $('#courses-container').append(template);
        }

        $('[name=course-' + id +']').select2();
        $('[name=period-' + id + ']').select2();
    };

    CollegeClass.prototype.prepareForUpdate = function (resource) {

        var testString = resource.available_rooms;
        var test = JSON.parse(testString);
        var testNumbers = [];
        
        for (var i = 0; i < test.length; i++) {
            var numbersOnly = test[i].replace(/\D/g, '');  // Replace all non-digits with an empty string
            if (numbersOnly !== '') {
                testNumbers.push(Number(numbersOnly));  // Convert the resulting string to a number and push it into the array
            }
        }
        
        console.log(testNumbers);  // This should log [2, 3, 4, 5, 10]

        var self = this;

        $('input[name=name]').val(resource.name);
        $('input[name=size]').val(resource.size);
        $('#rooms-select').val(resource.room_ids).change();
        $('#courses-container .course-form').remove();
            var availableRooms = testNumbers;
        $('#availableRoom-select').val(availableRooms).change();
        $('input[name=available_rooms]').val(resource.available_rooms).change();

        $.each(resource.courses, function(index){
            var course = this;
            var data = {
                course_id: course.id,
                academic_period_id: course.pivot.academic_period_id,
                meetings: course.pivot.meetings
            };
            self.addCourse(data);
        });

        self.addCourse();
    };

    CollegeClass.prototype.clearForm = function() {
        // Clear the form using the usual way
        Resource.prototype.clearForm.call(this);

        // Clear the course select forms
        $('#courses-container .course-form').remove();

        // Add new initial course select form
        this.addCourse();
    };

    CollegeClass.prototype.submitResourceForm = function() {

        var $form = $('#resource-form');
        var url = $form.attr('action');
        var form;

        var data = {
            _token: this.csrfToken,
            _method: $('[name=_method]').val(),
            name: $form.find('[name=name]').val(),
            size: $form.find('[name=size]').val(),
            unavailable_rooms: $form.find('#rooms-select').val(),
            available_rooms: $form.find('#availableRooms_temp').val()
        };

        var courses = {};

        $('.course-form').each(function(index) {
            var $container = $(this);
            var courseId = $container.find('.course-select').val();
            var periodId = $container.find('.period-select').val();
            var meetings = $container.find('.course-meetings').val();

            if (courseId && meetings) {
                courses[courseId] = {
                    'meetings' : meetings,
                    'academic_period_id': periodId
                };
            }
        });

        

        data.courses = courses;
        var formData = new FormData();
        App.appendFormdata(formData, data);

        form = {
            url: url,
            data: formData
        };

        App.submitForm(form, this.refreshPage, $('#errors-container'), true, true);
    };

    window.addEventListener('load', function () {
        var collegeClass = new CollegeClass('/classes', 'class');
        collegeClass.init();
    });

    document.addEventListener("DOMContentLoaded", function() {
        var inputField = document.getElementById('availableRoom-select');
        var displayText = document.getElementById('availableRooms_temp');
    
        inputField.addEventListener('input', function() {
            // This function is called every time the user types something into the input field.
            displayText.textContent = inputField.value; // Display the current value of the input field.
        });
    });


    function updateText() { // Display the current value of the input field.

        var selectedOptions = $('#availableRoom-select').val();
        
        // Check if selectedOptions is null or an empty array, if so, set it to an empty array
        if (!selectedOptions || selectedOptions.length === 0) {
            selectedOptions = [];
        }
        
        // Convert the selected options into an array of integers
        var integerOptions = selectedOptions.map(option => parseInt(option));
        
        // Convert the array of integers into a JSON string
        var jsonData = JSON.stringify(integerOptions);
        const jsonArray = JSON.parse(jsonData);

        // Step 2: Convert each number in the array to a string
        const stringArray = jsonArray.map(number => number.toString());

        // Step 3: If needed, stringify the array of strings back into JSON format
        const jsonStringified = JSON.stringify(stringArray);
        $('#availableRooms_temp').val(jsonStringified);
        
        // Set the value of the select element to the JSON data
        // $('#courses-saved').val(jsonData);
        
        // Now you can do whatever you want with the JSON data, for example, you can send it to the server via AJAX
        console.log(jsonData);
    }