@extends('layouts.app')

@section('content')

    <div class="container">
    
            <div class="row justify-content-center">
   
                <div class="p-5 mb-4 bg-light rounded-3 h-100 p-5 bg-light border rounded-3" id="icon-grid">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
                    <div class="col d-flex align-items-start">
                        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#bootstrap"></use></svg>
                        <div>
                        <h3 class="fw-bold mb-0 fs-4">Employees</h3>
                        <p>Paragraph of text beneath the heading to explain the heading.</p>
                        <a href="{{route('employee.index')}}" class="card-link">View Details »</a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#cpu-fill"></use></svg>
                        <div>
                        <h3 class="fw-bold mb-0 fs-4">Leave Application</h3>
                        <p>Paragraph of text beneath the heading to explain the heading.</p>
                        <a href="{{route('leave.index')}}" >View Details »</a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#calendar3"></use></svg>
                        <div>
                        <h3 class="fw-bold mb-0 fs-4">Leave Category</h3>
                        <p>Paragraph of text beneath the heading to explain the heading.</p>
                        <a href="{{route('leave_category.index')}}" role="button">View Details »</a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#home"></use></svg>
                        <div>
                        <h3 class="fw-bold mb-0 fs-4">Department</h3>
                        <p>Paragraph of text beneath the heading to explain the heading.</p>
                        <a href="{{route('department.index')}}" class="card-link">View Details »</a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#speedometer2"></use></svg>
                        <div>
                        <h3 class="fw-bold mb-0 fs-4">Public Holidays</h3>
                        <p>Paragraph of text beneath the heading to explain the heading.</p>
                        <a href="{{route('holiday.index')}}" class="card-link">View Details »</a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#toggles2"></use></svg>
                        <div>
                        <h3 class="fw-bold mb-0 fs-4">Attendance</h3>
                        <p>Paragraph of text beneath the heading to explain the heading.</p>
                        <a href="{{route('attendance.index')}}" role="button">View Details »</a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#geo-fill"></use></svg>
                        <div>
                        <h3 class="fw-bold mb-0 fs-4">Designation</h3>
                        <p>Paragraph of text beneath the heading to explain the heading.</p>
                        <a href="{{route('designation.index')}}" class="card-link">View Details »</a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#tools"></use></svg>
                        <div>
                        <h3 class="fw-bold mb-0 fs-4">Working Day</h3>
                        <p>Paragraph of text beneath the heading to explain the heading.</p>
                        <a href="{{route('workingday.index')}}" role="button">View Details »</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </div>
 
@endsection

