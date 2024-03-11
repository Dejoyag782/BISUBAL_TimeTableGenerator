<!-- Modal for adding a new room -->
<div class="modal custom-modal" id="resource-modal">
    <div class="modal-dialog">
        <div class="modal-content" style="background: rgb(217,219,221);margin-top: 150px;border-radius: 10px;">
            <div class=" modal-header d-flex d-sm-flex d-xl-flex d-xxl-flex flex-row justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="height: 40px;color: var(--bs-indigo);background: var(--e-global-color-b068fc5);border-top-left-radius: 10px;border-top-right-radius: 10px;padding: 10px;border-bottom-style: solid;border-bottom-color: var(--bs-orange);">
            <h5 class="modal-heading" style="color: rgb(255,255,255);width: 95%;margin-bottom: 0px;">Add New Subject</h5><i class="fa fa-close d-xxl-flex justify-content-xxl-center align-items-xxl-center" id="close_resource_modal"></i>
            </div>

            <form class="form" method="POST" action="" id="resource-form">
                <input type="hidden" name="_method" value="">
                <div class="modal-body">
                    <div id="errors-container">
                        @include('partials.modal_errors')
                    </div>

                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Subject Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Course Code</label>
                                <input type="text" id="course_code" name="course_code" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Professors</label>

                                <div class="select2-wrapper">
                                    <select id="professors-select" name="professor_ids[]" class="form-control select2" multiple>
                                        <option value="">Select professors</option>
                                        @foreach ($professors as $professor)
                                         <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div style="background-color:white; padding:10px; margin-bottom:5px; border-radius:3px; border: solid #ccc 1px;">
                                
                                <div class="form-group" style="align-items:center; margin-bottom:-5px;">
                                    <input type="button" style="widht:15px;height:15px; border-radius: 50%;" id="lab-checker"></button>
                                    <label> Is Lab?</label>
                                </div>
                                

                                <div class="form-group" id="selectDurationCont" style="align-items:center; margin-top:10px;" hidden>
                                    <label>Duration</label>
                                    <div class="select2-wrapper" style="background-color: #fff;">
                                        <select id="duration" class="form-control select2">
                                            <option  value="">Select Duration</option>
                                            <option  value="1hr">1hr</option>
                                            <option  value="2hr">2hr</option>
                                            <option  value="3hr">3hr</option>
                                            <option  value="4hr">4hr</option>
                                            <option  value="5hr">5hr</option>
                                        </select>
                                    </div>
                                </div>               
                                
                                <div class="form-group" id="roomDiv" hidden>
                                    <label>Preferred Room</label>

                                    <div class="select2-wrapper" style="align-items:center; margin-bottom:-3px;">
                                        <select id="room-select" name="room_preference" class="form-control select2">
                                            <option value="">Select Room</option>
                                            @foreach ($rooms as $room)
                                                <option  value="{{ $room->id }}">{{ $room->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            



                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-xxl-center">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-offset-1 col-md-offset-1">
                                <button type="button" class="btn btn-danger btn-block" id="cancel_resource_modal" data-dismiss="modal">Cancel</button>
                            </div>

                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <button type="submit" class="submit-btn btn btn-primary btn-block">Add Resource</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

