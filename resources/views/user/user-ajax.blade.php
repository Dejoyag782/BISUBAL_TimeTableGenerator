<script type="text/javascript">
      
    $(document).ready(function () {

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#user-management').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('user-management.index') }}", // Change the URL to match your route
          columns: [
              {data: 'role', name: 'role'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'action', name: 'action', orderable: false},
          ],
          order: [[0, 'desc']]
      });

    });

    function add() {
      $('#UsersForm').trigger("reset");
      $('#UsersModal').html("Add User");
      $('#users-modal').modal('show');
      $('#btn-change-user-pass').attr('hidden', 'hidden');
      $('#passwd').removeAttr('hidden');
      $('#id').val('');
      // Remove any existing password field
      $('#password_appender').empty();

      // Append the password field inside the password_appender div
      $('#password_appender').append(`
          <div class="form-group" id="passwd">
              <label for="text">Password:</label>
              <input type="text" class="form-control" id="password" name="password" placeholder="Enter New Password" maxlength="100">
          </div>
      `);
    }

    function editFunc(id) {
    $.ajax({
        type: "GET", // Change to GET method
        url: "{{ url('user-management') }}" + '/' + id + '/edit', // Change the URL to match your route
        dataType: 'json',
        success: function (res) {
            $('#UsersModal').html("Edit User");
            $('#users-modal').modal('show');
            $('#id').val(res.id);
            $('#name').val(res.name);
            $('#email').val(res.email);
            $('#role').val(res.role);
            $('#passwd').attr('hidden', 'hidden');
            $('#btn-change-user-pass').removeAttr('hidden');
            // Remove any existing password field
            $('#password_appender').empty();

            $('#btn-change-user-pass').html("Change User Password?");
            $('#btn-change-user-pass').removeClass('btn-danger');
            $('#btn-change-user-pass').addClass('btn-warning');
            
        }
    });
    }

    function deleteFunc(id) {
    if (confirm("Delete Record?") == true) {
        var id = id;

        // ajax
        $.ajax({
            type: "DELETE", // Change to DELETE method
            url: "{{ url('user-management') }}" + '/' + id, // Change the URL to match your route
            data: {id: id},
            dataType: 'json',
            success: function (res) {
                var oTable = $('#user-management').dataTable();
                oTable.fnDraw(false);
            }
        });
    }
    }

    $('#UsersForm').submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);

      $.ajax({
          type: 'POST',
          url: "{{ route('user-management.store') }}", // Change the URL to match your route
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function (data) {
              $("#users-modal").modal('hide');
              var oTable = $('#user-management').dataTable();
              oTable.fnDraw(false);
              $("#btn-save").html('Submit');
              $("#btn-save").attr("disabled", false);
          },
          error: function (data) {
              console.log(data);
          }
      });
    });

   </script>

  <script>
    document.getElementById("btn-change-user-pass").onclick = function () {
        var btnChangePassword = document.getElementById("btn-change-user-pass");
        var passwdAppender = document.getElementById("password_appender");

        if (btnChangePassword.textContent === "Change User Password?") {
            var passwdInput = document.createElement("div");
            passwdInput.classList.add("form-group");
            passwdInput.id = "passwd";
            passwdInput.innerHTML = `
                <label for="text">Password:</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Enter New Password" maxlength="100">
            `;
            passwdAppender.appendChild(passwdInput);

            btnChangePassword.textContent = "Cancel Password Change";
            btnChangePassword.classList.remove("btn-warning");
            btnChangePassword.classList.add("btn-danger");
        } else {
            passwdAppender.innerHTML = ""; // Clear password input
            btnChangePassword.textContent = "Change User Password?";
            btnChangePassword.classList.remove("btn-danger");
            btnChangePassword.classList.add("btn-warning");
        }
    };

   </script>

<script>
  // -------------------- Users -------------------- //
  // Add Users
  var closeAddResourceBtn = document.getElementById("close_users_modal");
  var cancelAddResourceBtn = document.getElementById("cancel_users_modal");
  var addResourceModal = document.getElementById("users-modal");


  function closeAddResourceModal() {
    addResourceModal.classList.remove('show');
    $("#users-modal").modal('hide')
    setTimeout(function() {
      var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
      if (modalBackdrop) {
        modalBackdrop.remove('show');
      }
    }, 400);
  }

  closeAddResourceBtn.addEventListener("click", closeAddResourceModal);
  cancelAddResourceBtn.addEventListener("click", closeAddResourceModal);
</script>