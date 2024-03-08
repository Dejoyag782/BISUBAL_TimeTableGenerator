/**
 * An object for managing tasks related to courses
 */
function Department(url, resourceName) {
    Resource.call(this, url, resourceName);
}

App.extend(Resource, Department);

Department.prototype.prepareForUpdate = function (resource) {

    var test = resource.courses_under;
    var testNumbers = [];

    for (var i = 0; i < test.length; i++) {
        var numbersOnly = test[i].replace(/\D/g, ''); // Replace all non-digits with an empty string
        if (numbersOnly !== '') {
            testNumbers.push(Number(numbersOnly)); // Convert the resulting string to a number and push it into the array
        }
    }
    
    $('#courses-select').val("").change();
    $('input[name=short_name]').val(resource.short_name);
    $('input[name=name]').val(resource.name);
       var coursesUnder = testNumbers;
    $('#courses-select').val(coursesUnder).change();
    $('input[name=courses_under]').val(resource.courses_under).change();

    console.log(test);
    console.log(coursesUnder);
    var saved_courses = resource.courses_under;
    
    const parentDivClass = 'select2-selection__rendered'; // Specify the class of the parent div here

    // // Clear existing content in the parent div
    // $('.' + parentDivClass).empty();

    // if (resource.courses_under === "[]" || Array.isArray(resource.courses_under)) {
    //     console.error("Error: Empty courses_under array detected.");
    //     return; // Exit the function if courses_under is an empty array
    // }else{
    //     // Extract numbers from the string and save them in an array
    //     var numbersArray = saved_courses.match(/\d+/g);

    //     for (var i = 0; i < numbersArray.length; i++) {
    //         // Make AJAX request to retrieve department name
    //         $.ajax({
    //             url: '/departments/get-department-name/' + numbersArray[i],
    //             method: 'GET',
    //             success: function(response) {
    //                 // Append retrieved department name to the parent div
    //                 $('.' + parentDivClass).append('<li class="select2-selection__choice" title="' + response + '"><span class="select2-selection__choice__remove" role="presentation">×</span> ' + response + '</li>');
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error('Error:', error);
    //             }
    //         });
    //     }
    // }

};


window.addEventListener('load', function () {
    var department= new Department('/departments', 'Department');
    department.init();
});

document.getElementById('cancel_resource_modal').addEventListener('click', function(){
    $('#courses-select').val("").change();
});

$(function() {
    $('#resource-form').submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the selected options from the select element
        var selectedOptions = $('#courses-select').val();
        
        // Check if selectedOptions is null or an empty array, if so, set it to an empty array
        if (!selectedOptions || selectedOptions.length === 0) {
            selectedOptions = [];
        }
        
        // Convert the selected options into an array of integers
        var integerOptions = selectedOptions.map(option => parseInt(option));
        
        // Convert the array of integers into a JSON string
        var jsonData = JSON.stringify(integerOptions);
        
        // Set the value of the select element to the JSON data
        $('#courses-saved').val(jsonData);
        
        // Now you can do whatever you want with the JSON data, for example, you can send it to the server via AJAX
        console.log(jsonData);
        
        // Optionally, you can submit the form normally after updating the select element
        // $(this).unbind('submit').submit();
        
    });
    
    // Code to parse the saved JSON data back into an array of integers
    // var savedData = JSON.parse($('#courses-saved').val());
    // console.log(savedData);
});








