<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        @if (count($departments))
        <table class="table table-bordered">
            <thead>
                <tr class="table-head">
                    <th style="width: 30%">Department</th>
                    <th style="width: 30%">Name</th>
                    <th style="width: 15%">Courses Under</th>
                    <th style="width: 10%">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($departments as $department)
                <tr>
                    <td>{{ $department->short_name }}</td>
                    <td>{{ $department->name }}</td>
                    <td>
                        <ul>
                        @foreach(json_decode($department->courses_under) as $course)
                            @foreach($classes as $class)
                                @if($class->id == $course)
                                    <li>{{ $class->name }}</li>
                                @endif
                            @endforeach
                        @endforeach
                        </ul>
                    </td>
                    <td>
                    <button class="btn btn-primary btn-sm resource-update-btn" data-id="{{ $department->id }}"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-sm resource-delete-btn" data-id="{{ $department->id }}"><i class="fa fa-trash-o"></i></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="pagination">
            {!!
                $departments->render()
            !!}
        </div>
        @else
        <div class="no-data text-center">
            <p>No matching data was found</p>
        </div>
        @endif
    </div>
</div>