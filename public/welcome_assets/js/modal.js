// -------------------- GENERATE TIMETABLE -------------------- //
// Generate Timetable
var openModalBtn = document.getElementById("open_modal");
var closeModalBtn = document.getElementById("close_modal");
var cancelModalBtn = document.getElementById("cancel_modal_GenTT");
var timetableModal = document.getElementById("form_cont");

openModalBtn.addEventListener("click", function() {
  timetableModal.style.display = "inline-flex";
});
closeModalBtn.addEventListener("click", function() {
  timetableModal.style.display = "none";
});
cancelModalBtn.addEventListener("click", function() {
  timetableModal.style.display = "none";
});

// -------------------- ROOM -------------------- //
// Add Room
var closeAddRoomBtn = document.getElementById("close_AddRoom_modal");
var cancelAddRoomBtn = document.getElementById("cancel_AddRoom_modal");
var addRoomModal = document.getElementById("rooms-modal");


function closeAddRoomModal() {
  addRoomModal.classList.remove('show');
  $("#rooms-modal").modal('hide')
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeAddRoomBtn.addEventListener("click", closeAddRoomModal);
cancelAddRoomBtn.addEventListener("click", closeAddRoomModal);

// Show Room
var closeShowRoomBtn = document.getElementById("close_ShowRoom_modal");
var showRoomModal = document.getElementById("rooms-modal-show");


function closeShowRoomModal() {
  showRoomModal.classList.remove('show');
  $("#rooms-modal-show").modal('hide')
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeShowRoomBtn.addEventListener("click", closeShowRoomModal);

// -------------------- COURSE -------------------- //
// Add Course
var closeAddCourseBtn = document.getElementById("close_AddCourse_modal");
var cancelAddCourseBtn = document.getElementById("cancel_AddCourse_modal");
var addCourseModal = document.getElementById("course-modal");


function closeAddCourseModal() {
  addCourseModal.classList.remove('show');
  $("#course-modal").modal('hide')
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeAddCourseBtn.addEventListener("click", closeAddCourseModal);
cancelAddCourseBtn.addEventListener("click", closeAddCourseModal);

// Show Course
var closeShowCourseBtn = document.getElementById("close_ShowCourse_modal");
var showCourseModal = document.getElementById("course-modal-show");


function closeShowCourseModal() {
  showCourseModal.classList.remove('show');
  $("#course-modal-show").modal('hide')
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeShowCourseBtn.addEventListener("click", closeShowCourseModal);

// -------------------- PROFESSOR -------------------- //
// Add Professor
var closeAddProfessorBtn = document.getElementById("close_AddProfessor_modal");
var cancelAddProfessorBtn = document.getElementById("cancel_AddProfessor_modal");
var addProfessorModal = document.getElementById("professor-modal");


function closeAddProfessorModal() {
  addProfessorModal.classList.remove('show');
  $("#professor-modal").modal('hide');
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeAddProfessorBtn.addEventListener("click", closeAddProfessorModal);
cancelAddProfessorBtn.addEventListener("click", closeAddProfessorModal);

// Show Professor
var closeShowProfessorBtn = document.getElementById("close_ShowProfessor_modal");
var showProfessorModal = document.getElementById("professor-modal-show");


function closeShowProfessorModal() {
  showProfessorModal.classList.remove('show');
  $("#show-professor-modal").modal('hide');
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeShowProfessorBtn.addEventListener("click", closeShowProfessorModal);

// -------------------- CLASS -------------------- //
// Add Class
var closeAddClassBtn = document.getElementById("close_AddClass_modal");
var cancelAddClassBtn = document.getElementById("cancel_AddClass_modal");
var addClassModal = document.getElementById("class-modal");


function closeAddClassModal() {
  addClassModal.classList.remove('show');
  $("#class-modal").modal('hide');
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeAddClassBtn.addEventListener("click", closeAddClassModal);
cancelAddClassBtn.addEventListener("click", closeAddClassModal);

// Show Class
var closeShowClassBtn = document.getElementById("close_ShowClass_modal");
var showClassModal = document.getElementById("class-modal-show");


function closeShowClassModal() {
  showClassModal.classList.remove('show');
  $("#class-modal-show").modal('hide');
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeShowClassBtn.addEventListener("click", closeShowClassModal);


// -------------------- TIMESLOT -------------------- //
// Add Timeslot
var closeAddTimeslotBtn = document.getElementById("close_AddTimeslot_modal");
var cancelAddTimeslotBtn = document.getElementById("cancel_AddTimeslot_modal");
var addTimeslotModal = document.getElementById("timeslots-modal");


function closeAddTimeslotModal() {
  addTimeslotModal.classList.remove('show');
  $("#timeslots-modal").modal('hide');
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeAddTimeslotBtn.addEventListener("click", closeAddTimeslotModal);
cancelAddTimeslotBtn.addEventListener("click", closeAddTimeslotModal);

// Show Timeslot
var closeShowTimeslotBtn = document.getElementById("close_ShowTimeslot_modal");
var showTimeslotModal = document.getElementById("timeslots-modal-show");


function closeShowTimeslotModal() {
  showClassModal.classList.remove('show');
  $("#timeslots-modal-show").modal('hide');
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeShowTimeslotBtn.addEventListener("click", closeShowTimeslotModal);