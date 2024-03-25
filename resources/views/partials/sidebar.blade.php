<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 sidebar">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="menu">
                <?php $page = Request::segment(1); ?>
                <li class="menu-link {{ ($page == 'dashboard') ? 'active' : '' }}">
                    <a href="/dashboard"><span class="fa fa-dashboard"></span><span class="text">Dashboard</span></a>
                </li>
                <li class="menu-link {{ ($page == 'rooms') ? 'active' : '' }}">
                    <a href="/rooms"><span class="fa fa-home"></span><span class="text">Rooms</span></a>
                </li>
                <li class="menu-link {{ ($page == 'departments') ? 'active' : '' }}">
                    <a href="/departments"><span class="fa fa-university"></span><span class="text">Departments</span></a>
                </li>
                <li class="menu-link {{ ($page == 'courses') ? 'active' : '' }}">
                    <a href="/courses"><span class="fa fa-book"></span><span class="text">Subjects</span></a>
                </li>
                <li class="menu-link {{ ($page == 'professors') ? 'active' : '' }}">
                    <a href="/professors"><span class="fa fa-graduation-cap"></span><span class="text">Professors</span></a>
                </li>
                <li class="menu-link {{ ($page == 'classes') ? 'active' : '' }}">
                    <a href="/classes"><span class="fa fa-users"></span><span class="text">Sections</span></a>
                </li>
                <li class="menu-link {{ ($page == 'timeslots') ? 'active' : '' }}">
                    <a href="/timeslots"><span class="fa fa-clock-o"></span><span class="text">Periods</span></a>
                </li>
                {{-- Users Nav --}}
                @if (auth()->user()->role == 'superad')
                <li class="menu-link" style="margin-bottom: 10px;">
                    <a href="/user-management"><span class="fa fa-user"></span><span class="text">Users</span></a>
                </li>
                <li class="menu-link" style="margin-bottom: 10px;">
                    <a href="/settings"><span class="fa fa-wrench"></span><span class="text">Configurations</span></a>
                </li>
                @endif
                
            </ul>
        </div>
    </div>
</div>