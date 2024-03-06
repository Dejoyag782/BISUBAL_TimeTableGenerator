/**
 * An object for managing tasks related to courses
 */
function Course(url, resourceName) {
    Resource.call(this, url, resourceName);
}

App.extend(Resource, Course);

Course.prototype.prepareForUpdate = function (resource) {

    var test = resource.course_code;
    var testlowerCase = test.toLowerCase();
    console.log(test);
    $('input[name=name]').val(resource.name);
    $('input[name=course_code]').val(resource.course_code);
    $('#professors-select').val(resource.professor_ids).change();
    $('#room-select').val(resource.room_preference).change();
    if(testlowerCase.includes('lab')){
        roomDiv.removeAttribute('hidden');
        $('#room-select').val(resource.room_preference).change();
    }else{
        roomDiv.setAttribute('hidden', 'true');
        $('#room-select').val("").change();
    }
};

window.addEventListener('load', function () {
    var course= new Course('/courses', 'Course');
    course.init();
});

var roomDiv = document.getElementById('roomDiv');

document.getElementById('course_code').addEventListener('input', function() {
    var courseCode = this.value.toLowerCase();
    if (courseCode.includes('lab')) {
        roomDiv.removeAttribute('hidden');
    } else {
        roomDiv.setAttribute('hidden', 'true');
    }
});

document.getElementById('cancel_resource_modal').addEventListener('click', function(){
    $('#room-select').val("").change();
    roomDiv.setAttribute('hidden', 'true');
});
