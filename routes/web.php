<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Maincontroller;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
    // return view('welcome');
// });

// Route::fallback(function () {
//     return redirect('index');
// });

// employee routes starts here

Route::get('index', [Maincontroller::class, 'index'])->name('index');

Route::post('insert', [Maincontroller::class, 'insert_employee']);

Route::post('emp_login', [Maincontroller::class, 'employee_login']);

Route::get('emp-logout', [Maincontroller::class, 'employee_logout']);

Route::get('emp-homepage', [Maincontroller::class, 'employee_homepage']);


// employee routes ends here



// admin routes starts here

Route::get('admin', function () {
    return view('admin.index');
});

Route::post('admin-login', [AdminController::class, 'login']);

// Route::get('admin-homepage', [AdminController::class, 'homepage']);
Route::get('admin-homepage', function () {
    return view('admin.homepage');
});

Route::get('all-employees', [AdminController::class, 'employees_listing']);

Route::get('all-department', [AdminController::class, 'department_listing']);

Route::get('add-department', [AdminController::class, 'add_dept']);

Route::get('assign-dept', [AdminController::class, 'assign_dept']);

Route::post('post_dept', [AdminController::class, 'post_department']);

Route::get('getemp/{id}', [AdminController::class, 'get_emp']);



// admin routes ends here


