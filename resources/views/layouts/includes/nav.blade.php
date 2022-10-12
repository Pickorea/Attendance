<ul class="h-100 p-5 bg-green border rounded-3 nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
      <a class="nav-link "  href="{{route('attendance.index')}}">Attendance</a>
    </li>
    <li class="nav-item">
    <a class="nav-link "  href="{{route('employee.index')}}">Employee</a>
    </li>
    <li class="nav-item">
    <a class="nav-link "  href="{{route('designation.index')}}">Designation</a>
    </li>
    <li class="nav-item">
    <a class="nav-link "  href="{{route('holiday.index')}}">Holiday</a>
    </li>
    <li class="nav-item">
    <a class="nav-link "  href="{{route('leave_category.index')}}">Leave Category</a>
    </li>
    <li class="nav-item">
    <a class="nav-link "  href="{{route('department.index')}}">Department</a>
    </li>
    <li class="nav-item">
    <a class="nav-link "  href="{{route('leave.index')}}">Apply Leave</a>
    </li>
    <li class="nav-item">
    <a class="nav-link "  href="{{route('leave_entitlement.index')}}">Leave Entitlement</a>
    </li>
    <li class="nav-item">
    <a class="nav-link "  href="{{route('salary_level.index')}}">Leave Taken</a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="{{route('attendance.index')}}" role="button" aria-expanded="false">Report</a>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('report.department.employees.index')}}">Department</a></li>
      <li><a class="dropdown-item" href="{{route('report.employees.leave.index')}}">Leave</a></li>
      <li><a class="dropdown-item" href="{{route('report.employees.attendance.index')}}">All Attendance</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="{{route('attendance.searchIndividualAttendance')}}">Individual Attendance Search</a></li>
      <li><a class="dropdown-item" href="{{route('attendance.searchattendance')}}">Search Attendance Statement by Year</a></li>
      <li><a class="dropdown-item" href="{{route('profile.index')}}">Profile</a></li>
      <li><a class="dropdown-item" href="{{route('attendance.timeclockcreate')}}">{{ __('TIMECLOCK') }}</a></li>
      <li><a class="dropdown-item" href="{{route('attendance.happy')}}">{{ __('Happy') }}</a></li>
      
    </ul>
  </li>
    <!-- <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li> -->
  </ul>