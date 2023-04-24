<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// admin dashboard route
Route::get('/admin/dashboard',[AdminController::class,'index']);
Route::get('/admin/manage/university',[AdminController::class,'ManageUni'])->name('university.manage');
Route::post('/add/uni/name',[AdminController::class,'insertuni'])->name('add.uni');
Route::get('/manage/sub/campus',[AdminController::class,'manageSubCampus'])->name('subcampus.manage');
Route::post('add/campus',[AdminController::class,'insertCampus'])->name('add.campus');
Route::get('/test/manage',[AdminController::class,'managetest'])->name('test.manage');

Route::get('/campus/sub_campus/ajax/{campus_id}', [AdminController::class, 'GetSubCampus']);

Route::get('/campus/sub_campus/ajax/{campus_id}', [UserController::class, 'GetSubCampus']);
Route::get('/campus/test/ajax/{sub_campus_id}', [UserController::class, 'GetTest']);
Route::post('/add/test',[AdminController::class,'inserttest'])->name('add.test');

//user to register 
Route::get('/user/registration',[UserController::class,'index']);
Route::get('user/dashbaord',[UserController::class,'UserDashboard'])->name('user.dashboard');
Route::post('/insert/registration/form',[UserController::class,'insertregistrationform'])->name('registration.add');

//pending
// Route::get('/active')