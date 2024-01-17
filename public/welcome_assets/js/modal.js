
// RESOURCES

// -------------------- RESOURCES -------------------- //
// Add Resource
var closeAddResourceBtn = document.getElementById("close_resource_modal");
var cancelAddResourceBtn = document.getElementById("cancel_resource_modal");
var addResourceModal = document.getElementById("resource-modal");


function closeAddResourceModal() {
  addResourceModal.classList.remove('show');
  $("#resource-modal").modal('hide')
  setTimeout(function() {
    var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
    if (modalBackdrop) {
      modalBackdrop.remove('show');
    }
  }, 400);
}

closeAddResourceBtn.addEventListener("click", closeAddResourceModal);
cancelAddResourceBtn.addEventListener("click", closeAddResourceModal);


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