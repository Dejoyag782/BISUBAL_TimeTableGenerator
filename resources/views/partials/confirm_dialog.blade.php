<div class="modal" id="confirm-dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background: rgb(217,219,221);margin-top: 150px;border-radius: 10px;">
            <form action="" method="POST" id="resource-delete-form" class='delete-form'>
            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <div class="modal-header  d-flex d-sm-flex d-xl-flex d-xxl-flex flex-row justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="height: 40px;color: var(--bs-indigo);background: var(--e-global-color-b068fc5);border-top-left-radius: 10px;border-top-right-radius: 10px;padding: 10px;border-bottom-style: solid;border-bottom-color: var(--bs-orange);">
                <h4 id="delete-dialog-header" style="color: rgb(255,255,255);width: 95%;margin-bottom: 0px;"></h4>
                <i class="fa fa-close d-xxl-flex justify-content-xxl-center align-items-xxl-center" id="close_confirm_dialog"></i>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                        <p id="delete-message"></p>
                    </div>
                </div>
            </div>

            <div class="modal-footer justify-content-xxl-center">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <button type="button" class="cancel btn btn-default btn-block" data-dismiss="modal" id="no-button">No</button>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <button type="submit" class="submit btn btn-danger btn-block" id="yes-button">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>