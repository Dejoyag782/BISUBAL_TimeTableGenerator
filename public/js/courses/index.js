/**
 * An object for managing tasks related to courses
 */
function Course(url, resourceName) {
    Resource.call(this, url, resourceName);
}

App.extend(Resource, Course);

var roomDiv = document.getElementById('roomDiv');
var selectDuration = document.getElementById('selectDurationCont');
var checkboxButton = document.getElementById('lab-checker');
var courseCodeInput = document.getElementById('course_code');
var subjectNameInput = document.getElementsByName('name')[0];
var durationSelect = document.querySelector('#duration');

Course.prototype.prepareForUpdate = function (resource) {

    var test = resource.course_code;
    var testlowerCase = test.toLowerCase();
    console.log(test);
    $('input[name=name]').val(resource.name);
    $('input[name=course_code]').val(resource.course_code);
    $('#professors-select').val(resource.professor_ids).change();
    console.log(resource.professor_ids);
    $('#room-select').val(resource.room_preference).change();
    console.log(resource.professor_ids);

   
    if(testlowerCase.includes(': 1hr')){
        courseCodeInput.value = courseCodeInput.value.replace(': 1hr', '').trim();
        $('#duration').val("1hr").change();
        resource.course_code = courseCodeInput.value;
    }if(testlowerCase.includes(': 2hr')){
        courseCodeInput.value = courseCodeInput.value.replace(': 2hr', '').trim();
        $('#duration').val("2hr").change();
        resource.course_code = courseCodeInput.value;
    }if(testlowerCase.includes(': 3hr')){
        courseCodeInput.value = courseCodeInput.value.replace(': 3hr', '').trim();
        $('#duration').val("3hr").change();
        resource.course_code = courseCodeInput.value;
    }if(testlowerCase.includes(': 4hr')){
        courseCodeInput.value = courseCodeInput.value.replace(': 4hr', '').trim();
        $('#duration').val("4hr").change();
        resource.course_code = courseCodeInput.value;
    }if(testlowerCase.includes(': 5hr')){
        courseCodeInput.value = courseCodeInput.value.replace(': 5hr', '').trim();
        $('#duration').val("5hr").change();
        resource.course_code = courseCodeInput.value;
    }

    if(testlowerCase.includes('lab')){
        roomDiv.removeAttribute('hidden');
        selectDuration.removeAttribute('hidden');
        checkboxButton.classList.toggle('checked');
        checkboxButton.style.backgroundColor = 'orange';
        $('#room-select').val(resource.room_preference).change();
    }else{
        selectDuration.setAttribute('hidden', 'true');
        roomDiv.setAttribute('hidden', 'true');
        checkboxButton.style.backgroundColor = 'white';
        $('#room-select').val("").change();
        $('#room-select').val("").change();
    }
};

window.addEventListener('load', function () {
    var course= new Course('/courses', 'Course');
    course.init();
});



// document.getElementById('course_code').addEventListener('input', function() {
//     var courseCode = this.value.toLowerCase();
//     if (courseCode.includes('lab')) {
//         roomDiv.removeAttribute('hidden');
//         selectDuration.removeAttribute('hidden');
//     } else {
//         selectDuration.setAttribute('hidden', 'true');
//         roomDiv.setAttribute('hidden', 'true');
//         $('#room-select').val("").change();
//     }
// });

// var checkbox = document.getElementById('lab-checker');

// checkbox.addEventListener('click', function() {
//     var courseCode = this.value.toLowerCase();
//     if (this.checked) {
//         roomDiv.removeAttribute('hidden');
//         selectDuration.removeAttribute('hidden');
//     } else {
//         selectDuration.setAttribute('hidden', 'true');
//         roomDiv.setAttribute('hidden', 'true');
//         $('#room-select').val("").change();
//     }
// });

  checkboxButton.addEventListener('click', function() {
    checkboxButton.classList.toggle('checked');

    if (checkboxButton.classList.contains('checked')) {
        var currentCourseCode = courseCodeInput.value.trim();
        var currentSubjectName = subjectNameInput.value.trim();
        courseCodeInput.value = currentCourseCode + ' Lab';
        subjectNameInput.value = currentSubjectName + ' Lab';

      console.log('on');
      checkboxButton.style.backgroundColor = 'orange';
      roomDiv.removeAttribute('hidden');
      selectDuration.removeAttribute('hidden');
    } else {
      courseCodeInput.value = courseCodeInput.value.replace(' Lab', '').trim();
      subjectNameInput.value = subjectNameInput.value.replace(' Lab', '').trim();
      $('#duration').val("").change();
      checkboxButton.style.backgroundColor = 'white';
      selectDuration.setAttribute('hidden', 'true');
      roomDiv.setAttribute('hidden', 'true');
      $('#room-select').val("").change();

        // Hide the duration select
        selectDuration.setAttribute('hidden', true);
    }
  });

  
  document.getElementById('resource-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevents the form from submitting normally
        
        var currentCourseCode = courseCodeInput.value.trim();
        var duration = durationSelect.value;

        if (!duration == ""){
            courseCodeInput.value = currentCourseCode + ' : ' + duration;
        }else{
            courseCodeInput.value = currentCourseCode;
        }
        // Update the course code with the selected duration
        checkboxButton.classList.toggle('checked');
        
    });


document.getElementById('cancel_resource_modal').addEventListener('click', function(){
    $('#room-select').val("").change();
    roomDiv.setAttribute('hidden', 'true');
    if (checkboxButton.classList.contains('checked')) {
        checkboxButton.classList.toggle('checked');
    }    
});
