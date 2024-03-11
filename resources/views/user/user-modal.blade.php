<div class="modal" id="users-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background: rgb(217,219,221);margin-top: 150px;border-radius: 10px;">
          <div class=" modal-header d-flex d-sm-flex d-xl-flex d-xxl-flex flex-row justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="height: 40px;color: var(--bs-indigo);background: var(--e-global-color-b068fc5);border-top-left-radius: 10px;border-top-right-radius: 10px;padding: 10px;border-bottom-style: solid;border-bottom-color: var(--bs-orange);">
              <h5 id="UsersModal" class="modal-heading" style="color: rgb(255,255,255);width: 95%;margin-bottom: 0px;">Add New User</h5><i class="fa fa-close d-xxl-flex justify-content-xxl-center align-items-xxl-center" id="close_users_modal"></i>
          </div>
        <div class="modal-body">
              <div id="errors-container">
                @include('partials.modal_errors')
              </div>

      <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
          <form action="javascript:void(0)" id="UsersForm" name="UsersForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">

            <div class="form-group">
              <label for="name" >Name</label>
              <input type="text" class= "form-control" id="name" name="name" placeholder="Enter Name" maxlength="20" >
            </div>

            <div class="form-group">
              <label for="email" >Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" maxlength="100" >
            </div>
          
            <div class="form-group">
                <label>Department</label>
                <div class="select2-wrapper">
                    <select id="department" name="department" class="form-control select2">
                    <option value="">Select Department</option>
                        @foreach ($department as $department)
                            <option  value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Designation</label>

                <div class="select2-wrapper">
                    <select id="designation" name="designation" class="form-control select2">
                        <option value="admin">Admin</option>
                        <option value="chairperson">Chairperson</option>
                        <option value="dean">Dean</option>
                        <option value="campusdirector">Campus Director</option>
                        
                    </select>
                </div>
            </div>

            <div class="form-group">
              <label >Role</label>

              <div class="select2-wrapper">
                <select class="form-control select2" aria-label="select role" id="role" name="role" >
                    <option value="superad">Super Admin</option>
                    <option value="admin">Admin</option>                    
                </select>
              </div>
            </div>

            <div style="margin-top: 20px;">
                <button type="button" class="btn btn-warning" id="btn-change-user-pass" >Change User Password?</button>
            </div>

            <div id="password_appender">
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <button type="button" class="btn btn-danger btn-block" id="cancel_users_modal" data-dismiss="modal" style="float:right;">Cancel</button>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-5">
                    <button type="submit" class="submit-btn btn btn-primary btn-block"  id="btn-save" style="margin-left:100px;">Save User</button>
                </div>
            </div>

          </form>

</div></div>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
  </div>