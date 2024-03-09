<!-- Modal for adding a new room -->
<div class="modal custom-modal" id="resource-modal">
    <div class="modal-dialog">
        <div class="modal-content" style="background: rgb(217,219,221);margin-top: 150px;border-radius: 10px;">
            <div class=" modal-header d-flex d-sm-flex d-xl-flex d-xxl-flex flex-row justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="height: 40px;color: var(--bs-indigo);background: var(--e-global-color-b068fc5);border-top-left-radius: 10px;border-top-right-radius: 10px;padding: 10px;border-bottom-style: solid;border-bottom-color: var(--bs-orange);">
                <h5 class="modal-heading" style="color: rgb(255,255,255);width: 95%;margin-bottom: 0px;">Add New Professor</h5><i class="fa fa-close d-xxl-flex justify-content-xxl-center align-items-xxl-center" id="close_resource_modal"></i>
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
                                <label>Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Courses</label>

                                <div class="select2-wrapper">
                                    <select id="courses-select" name="course_ids[]" class="form-control select2" multiple>
                                        <option value="">Select courses</option>
                                        @foreach ($courses as $course)
                                         <option value="{{ $course->id }}">{{ $course->course_code }} {{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Unavailable periods</label>

                                <div class="select2-wrapper">
                                    <select id="periods-select" name="unavailable_periods[]" class="form-control select2" multiple>
                                        <option value="">Select unavailable periods for this lecturer</option>
                                        @foreach ($days as $day)
                                            @foreach ($timeslots as $timeslot)
                                                <option value="{{ $day->id  }},{{ $timeslot->id }}">
                                                    {{ $day->name . " " . $timeslot->time }}
                                                </option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Department</label>

                                <div class="select2-wrapper">
                                    <select id="department-select" name="department" class="form-control select2">
                                        <option value="">General Studies</option>
                                        @foreach ($departments as $department)
                                            <option  value="{{ $department->id }}">{{ $department->name }}</option>
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