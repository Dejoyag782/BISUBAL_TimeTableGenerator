<!-- Modal for adding a new classes -->
<div class="modal custom-modal" id="resource-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background: rgb(217,219,221);margin-top: 150px;border-radius: 10px;">
            <div class=" modal-header d-flex d-sm-flex d-xl-flex d-xxl-flex flex-row justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="height: 40px;color: var(--bs-indigo);background: var(--e-global-color-b068fc5);border-top-left-radius: 10px;border-top-right-radius: 10px;padding: 10px;border-bottom-style: solid;border-bottom-color: var(--bs-orange);">
                <h5 class="modal-heading" style="color: rgb(255,255,255);width: 95%;margin-bottom: 0px;">Add New Class</h5><i class="fa fa-close d-xxl-flex justify-content-xxl-center align-items-xxl-center" id="close_resource_modal"></i>
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
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Subjects <i class="fa fa-plus side-icon" title="Add Course" id="course-add"></i></label>

                                <div class="row">
                                    <div class="col-md-4 col-sm-7 col-xs-12">
                                        Subject
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        Academic Period
                                    </div>

                                    <div class="col-md-3 col-sm-5 col-xs-12">
                                        Meetings Per Week
                                    </div>
                                </div>

                                <div id="courses-container">
                                            
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Population</label>
                                <input type="text" name="size" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Unavailable Lecture Rooms</label>

                                <div class="select2-wrapper">
                                    <select id="rooms-select" name="room_ids[]" class="form-control select2" multiple>
                                        <option value="">Select rooms</option>
                                        @foreach ($rooms as $room)
                                         <option value="{{ $room->id }}">{{ $room->name }}</option>
                                        @endforeach
                                    </select>
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

<div id="course-template" class="hidden">
     <div class="row course-form appended-course" id="course-{ID}-container" style="margin-bottom: 5px; align-items:center;">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="select2-wrapper">
                <select class="form-control course-select" name="course-{ID}">
                    <option value="" selected>Select a subject</option>
                    @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="select2-wrapper">
                <select class="form-control period-select" name="period-{ID}">
                    <option value="" selected>Select an academic period</option>
                    @foreach ($academicPeriods as $period)
                    <option value="{{ $period->id }}">{{ $period->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-10">
            <input type="number" class="form-control course-meetings" name="course-{ID}-meetings">
        </div>

        <div class="col-md-1 col-sm-1 col-xs-2">
            <span class="fa fa-close side-icon course-remove" 
                  title="Remove Course" data-id="{ID}" 
                  style="color:red; align-items:center; text-align:center;" 
                  onmouseover="this.style.backgroundColor='red'; this.style.color='white'"
                  onmouseout="this.style.backgroundColor='rgba(0,0,0,0)'; this.style.color='red'; this.style.borderRadius='50%';"></span>
        </div>
    </div>
</div>