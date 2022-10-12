<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IslandController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\WorkingDayController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\LeaveCategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveBalanceController;
use App\Http\Controllers\EmployeeLeaveEntitlementController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function ()
 {
    Route::get('/home', [DashboardController::class, 'index'])->name('index');

      

    // attendance

    Route::group(['as' => 'attendance.', 'prefix' => 'attendance','middleware' => ['auth','middleware' => 'role:timekeeper']], function () {
        Route::get('', [AttendanceController::class, 'index'])->name('index');
        Route::get('report', [AttendanceController::class,'report'])->name('attendance.report');
        Route::get('search', [AttendanceController::class,'searchAttendance'])->name('searchattendance');
        Route::get('search/result', [AttendanceController::class,'searchAttendanceByYear'])->name('searchAttendanceByYear');
        Route::post('get-report', [AttendanceController::class,'get_report'])->name('attendance.get_report');
        Route::get('details/{id}', [AttendanceController::class,'attDetails'])->name('attendance.details');
        Route::get('search/individual/attendance', [AttendanceController::class,'searchIndividualAttendance'])->name('searchIndividualAttendance');
        Route::get('get/individual/attendance', [AttendanceController::class,'getIndividualAttendance'])->name('attendance.attDetailsReport');
        Route::get('details/report/pdf/{emp_id}/{date1}/{date2}', [AttendanceController::class,'attDetailsReportPdf'])->name('attendance.attDetailsReportPdf');
        Route::get('all/attendance/report/', [AttendanceController::class,'allAttendanceReportPdf'])->name('allAttendanceReportPdf');
        Route::get('daily/attendance/report/{logdate}', [AttendanceController::class,'dailyAttendanceReportPdf'])->name('dailyAttendanceReportPdf');
        Route::get('yearly/attendance/report/{logdate}', [AttendanceController::class,'yearlyAttendanceReportPdf'])->name('yearlyAttendanceReportPdf');
        Route::get('export/', [AttendanceController::class,'AttendanceExcelExport'])->name('AttendanceExcelExport');
        Route::get('searchLogdate/', [AttendanceController::class,'searchLogdate'])->name('searchLogdate');
        Route::get('daily/attendance/{logdate}', [AttendanceController::class,'DailyAttendaceExcelExport'])->name('DailyAttendaceExcelExport');
        // Route::get('autocomplete/', [AttendanceController::class,'autocomplete'])->name('autocomplete');
        Route::get('happy', [AttendanceController::class,'happy'])->name('happy');
        Route::get('/attendance/timeclockcreate', [AttendanceController::class,'timeclockcreate'])->name('timeclockcreate');
        Route::post('timeclock/', [AttendanceController::class,'timeclock'])->name('timeclock');
        Route::get('create', [AttendanceController::class, 'create'])->name('create');
        Route::post('', [AttendanceController::class, 'store'])->name('store');
        Route::group(['prefix' => '{logdate?}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [AttendanceController::class, 'show'])->name('show');
            Route::get('edit', [AttendanceController::class, 'edit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [AttendanceController::class, 'update'])->name('update');
            Route::delete('', [AttendanceController::class, 'delete'])->name('delete');
         
        });

      
       
    });

    
    // holiday

    Route::group(['as' => 'holiday.', 'prefix' => 'holiday','middleware' => ['auth','middleware' => 'role:registry']], function () {
        Route::get('', [HolidayController::class, 'index'])->name('index');
        Route::get('create', [HolidayController::class, 'create'])->name('create');
        Route::post('', [HolidayController::class, 'store'])->name('store');
        Route::post('datatables', [HolidayController::class, 'datatables'])->name('datatables');
        Route::get('export', [HolidayController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{holiday_id}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [HolidayController::class, 'show'])->name('show');
            Route::get('edit', [HolidayController::class, 'edit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [HolidayController::class, 'update'])->name('update');
            Route::delete('', [HolidayController::class, 'delete'])->name('delete');
        });
    });

     // workingday

     Route::group(['as' => 'workingday.', 'prefix' => 'workingday','middleware' => ['auth','middleware' => 'role:registry']], function () {
        Route::get('', [WorkingDayController::class, 'index'])->name('index');
        Route::get('create', [WorkingDayController::class, 'create'])->name('create');
        Route::post('', [WorkingDayController::class, 'store'])->name('store');
        Route::post('datatables', [WorkingDayController::class, 'datatables'])->name('datatables');
        Route::get('export', [WorkingDayController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{workingday_id}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [WorkingDayController::class, 'show'])->name('show');
            Route::get('edit', [WorkingDayController::class, 'edit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [WorkingDayController::class, 'update'])->name('update');
            Route::delete('', [WorkingDayController::class, 'delete'])->name('delete');
        });
    });

     // department

     Route::group(['as' => 'department.', 'prefix' => 'department','middleware' => ['auth','middleware' => 'role:registry']], function () {
        Route::get('', [DepartmentController::class, 'index'])->name('index');
        Route::get('create', [DepartmentController::class, 'create'])->name('create');
        Route::post('', [DepartmentController::class, 'store'])->name('store');
        Route::post('datatables', [DepartmentController::class, 'datatables'])->name('datatables');
        Route::get('export', [DepartmentController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{department_id}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [DepartmentController::class, 'show'])->name('show');
            Route::get('edit', [DepartmentController::class, 'edit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [DepartmentController::class, 'update'])->name('update');
            Route::delete('', [DepartmentController::class, 'delete'])->name('delete');
        });
    });

      // designation

      Route::group(['as' => 'designation.', 'prefix' => 'designation','middleware' => ['auth','middleware' => 'role:registry']], function () {
        Route::get('', [DesignationController::class, 'index'])->name('index');
        Route::get('create', [DesignationController::class, 'create'])->name('create');
        Route::post('', [DesignationController::class, 'store'])->name('store');
        Route::post('datatables', [DesignationController::class, 'datatables'])->name('datatables');
        Route::get('export', [DesignationController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{designation_id}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [DesignationController::class, 'show'])->name('show');
            Route::get('edit', [DesignationController::class, 'edit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [DesignationController::class, 'update'])->name('update');
            Route::delete('', [DesignationController::class, 'delete'])->name('delete');
        });
    });

    // leave_category

    Route::group(['as' => 'leave_category.', 'prefix' => 'leave_category','middleware' => ['auth','middleware' => 'role:registry']], function () {
        Route::get('', [LeaveCategoryController::class, 'index'])->name('index');
        Route::get('create', [LeaveCategoryController::class, 'create'])->name('create');
        Route::post('', [LeaveCategoryController::class, 'store'])->name('store');
        Route::post('datatables', [LeaveCategoryController::class, 'datatables'])->name('datatables');
        Route::get('export', [LeaveCategoryController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{leave_category_id}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [LeaveCategoryController::class, 'show'])->name('show');
            Route::get('edit', [LeaveCategoryController::class, 'edit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [LeaveCategoryController::class, 'update'])->name('update');
            Route::delete('', [LeaveCategoryController::class, 'delete'])->name('delete');
        });
    });

    // employee

    Route::group(['as' => 'employee.', 'prefix' => 'employee','middleware' => ['auth','middleware' => 'role:registry']], function () {
        Route::get('', [EmployeeController::class, 'index'])->name('index');
        Route::get('create', [EmployeeController::class, 'create'])->name('create');
        Route::post('', [EmployeeController::class, 'store'])->name('store');
        Route::post('datatables', [EmployeeController::class, 'datatables'])->name('datatables');
        Route::get('export', [EmployeeController::class, 'exportlist'])->name('export');
        Route::group(['prefix' => '{employee_id}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [EmployeeController::class, 'show'])->name('show');
            Route::get('edit', [EmployeeController::class, 'edit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [EmployeeController::class, 'update'])->name('update');
            Route::delete('', [EmployeeController::class, 'delete'])->name('delete');
        });
    });

    // leave

    Route::group(['as' => 'leave.', 'prefix' => 'leave','middleware' => ['auth','middleware' => 'role:registry']], function () {
        Route::get('', [LeaveController::class, 'index'])->name('index');
        Route::get('create', [LeaveController::class, 'create'])->name('create');
        Route::post('', [LeaveController::class, 'store'])->name('store');
        Route::get('leave-reports', [LeaveController::class, 'report'])->name('leave.reports');
        Route::get('leave-reports/pdf-reports', [LeaveController::class, 'pdf_reports'])->name('pdf_reports');
        Route::group(['prefix' => '{leave_id}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [LeaveController::class, 'show'])->name('show');
            Route::get('edit', [LeaveController::class, 'edit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [LeaveController::class, 'update'])->name('update');
            Route::delete('', [LeaveController::class, 'delete'])->name('delete');
        });
    });

    // leave_balance

    Route::group(['as' => 'leave_balance.', 'prefix' => 'leave_balance','middleware' => ['auth','middleware' => 'role:registry']], function () {
        Route::get('', [LeaveBalanceController::class, 'index'])->name('index');
        Route::get('create', [LeaveBalanceController::class, 'create'])->name('create');
        Route::post('', [LeaveBalanceController::class, 'store'])->name('store');
        Route::group(['prefix' => '{leave_balance_id}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [LeaveBalanceController::class, 'show'])->name('show');
            Route::get('edit', [LeaveBalanceController::class, 'edit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [LeaveBalanceController::class, 'update'])->name('update');
            Route::delete('', [LeaveBalanceController::class, 'delete'])->name('delete');
        });
    });

    // salary_level

    Route::group(['as' => 'salary_level.', 'prefix' => 'salary_level','middleware' => ['auth','middleware' => 'role:registry']], function () {
        Route::get('', [LeaveBalanceController::class, 'index'])->name('index');
        Route::get('create', [LeaveBalanceController::class, 'create'])->name('create');
        Route::post('', [LeaveBalanceController::class, 'store'])->name('store');
        Route::get('leave_balance-reports', [LeaveBalanceController::class, 'report'])->name('leave_balance.reports');
        Route::get('leave_balance-reports/pdf-reports', [LeaveBalanceController::class, 'pdf_reports'])->name('pdf_reports');
        Route::group(['prefix' => '{leave_balance_id}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [LeaveBalanceController::class, 'show'])->name('show');
            Route::get('level/published', [LeaveBalanceController::class, 'published'])->name('salary_level.published');
            Route::get('level/unpublished', [LeaveBalanceController::class, 'show'])->name('salary_level.unpublished');
            Route::get('edit', [LeaveBalanceController::class, 'edit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [LeaveBalanceController::class, 'update'])->name('update');
            Route::delete('', [LeaveBalanceController::class, 'delete'])->name('delete');
        });
    });

    // leave_entitlement

    Route::group(['as' => 'leave_entitlement.', 'prefix' => 'leave_entitlement','middleware' => ['auth','middleware' => 'role:registry']], function () {
        Route::get('', [EmployeeLeaveEntitlementController::class, 'index'])->name('index');
        Route::get('create', [EmployeeLeaveEntitlementController::class, 'create'])->name('create');
        Route::post('', [EmployeeLeaveEntitlementController::class, 'store'])->name('store');
        Route::get('leave_balance-reports', [EmployeeLeaveEntitlementController::class, 'report'])->name('leave_balance.reports');
        Route::get('leave_balance-reports/pdf-reports', [EmployeeLeaveEntitlementController::class, 'pdf_reports'])->name('pdf_reports');
        Route::group(['prefix' => '{leave_balance_id}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [EmployeeLeaveEntitlementController::class, 'show'])->name('show');
            Route::get('level/published', [EmployeeLeaveEntitlementController::class, 'published'])->name('salary_level.published');
            Route::get('level/unpublished', [EmployeeLeaveEntitlementController::class, 'show'])->name('salary_level.unpublished');
            Route::get('edit', [EmployeeLeaveEntitlementController::class, 'edit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [EmployeeLeaveEntitlementController::class, 'update'])->name('update');
            Route::delete('', [EmployeeLeaveEntitlementController::class, 'delete'])->name('delete');
        });
    });

    // report

    Route::group(['as' => 'report.', 'prefix' => 'report','middleware' => ['auth','middleware' => 'role:registry']], function () {
        // Route::get('', [ReportController::class, 'index'])->name('index');
        // Route::get('create', [ReportController::class, 'create'])->name('create');
        // Route::post('', [ReportController::class, 'store'])->name('store');
        Route::get('department', [ReportController::class, 'IndexOfDepartmentEmployees'])->name('department.employees.index');
        Route::get('leave', [ReportController::class, 'IndexOfEmployeeLeaves'])->name('employees.leave.index');
        Route::get('attendance', [ReportController::class, 'IndexOfAttendance'])->name('employees.attendance.index');
        // Route::group(['prefix' => '{report_id}'], function () {  //->where(['id' => '[0-9]+'])
        //     Route::get('', [ReportController::class, 'show'])->name('show');
        //     Route::get('edit', [ReportController::class, 'edit'])->name('edit');
        //     Route::match(['PUT', 'PATCH'], '', [ReportController::class, 'update'])->name('update');
        //     Route::delete('', [ReportController::class, 'delete'])->name('delete');
        // });
    });

    // profile

    Route::group(['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('', [ProfileController::class, 'profileIndex'])->name('index');
        Route::get('create', [ProfileController::class, 'create'])->name('create');
        Route::post('store', [ProfileController::class, 'ProfileStore'])->name('store');
        Route::get('reports', [ProfileController::class, 'report'])->name('reports');
        Route::get('password', [ProfileController::class, 'ChangeUserPasswordView'])->name('change.user.passwordview');
        Route::post('password/change', [ProfileController::class, 'ChangeUserPasswordUpdate'])->name('profile.change_password');
        Route::get('pdf-reports', [ProfileController::class, 'pdf_reports'])->name('pdf_reports');
        Route::group(['prefix' => '{profile_id}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [ProfileController::class, 'show'])->name('show');
            Route::get('', [ProfileController::class, 'ProfilePdf'])->name('profile.pdf');
            Route::get('edit', [ProfileController::class, 'ProfileEdit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [ProfileController::class, 'update'])->name('update');
            Route::delete('', [ProfileController::class, 'delete'])->name('delete');
        });
    });

    //users
    Route::group(['as' => 'users.', 'prefix' => 'users'], function () {
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('', [UserController::class, 'store'])->name('store');
        Route::group(['prefix' => '{id}'], function () {  //->where(['id' => '[0-9]+'])
            Route::get('', [UserController::class, 'show'])->name('show');
             Route::get('edit', [UserController::class, 'Edit'])->name('edit');
            Route::match(['PUT', 'PATCH'], '', [UserController::class, 'update'])->name('update');
            Route::delete('', [UserController::class, 'destroy'])->name('destroy');
        });
        
    });

    //roles
     Route::group(['as' => 'roles.', 'prefix' => 'roles'], function () {
        Route::resource('', RoleController::class);
    });

});


