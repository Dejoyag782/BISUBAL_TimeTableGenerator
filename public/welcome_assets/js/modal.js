
// RESOURCES

// -------------------- RESOURCES -------------------- //
// Add Resource
var closeAddUsersBtn = document.getElementById("close_resource_modal");
var cancelAddUsersBtn = document.getElementById("cancel_resource_modal");
var addUsersModal = document.getElementById("resource-modal");


function closeAddUsersModal() {
  addUsersModal.classList.remove('show');
  $("#resource-modal").modal('hide')
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeAddUsersBtn.addEventListener("click", closeAddUsersModal);
cancelAddUsersBtn.addEventListener("click", closeAddUsersModal);


// -------------------- Confirm Dialog -------------------- //
// Close Confirm Dialog
var closeConfirmDialogBtn = document.getElementById("close_confirm_dialog");
var cancelConfirmDialogBtn = document.getElementById("no-button");
var ConfirmDialogModal = document.getElementById("confirm-dialog");


function closeConfirmDialogModal() {
  ConfirmDialogModal.classList.remove('show');
  $("#confirm-dialog").modal('hide')
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeConfirmDialogBtn.addEventListener("click", closeConfirmDialogModal);
cancelConfirmDialogBtn.addEventListener("click", closeConfirmDialogModal);