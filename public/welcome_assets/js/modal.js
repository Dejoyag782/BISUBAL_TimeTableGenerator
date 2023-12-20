
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