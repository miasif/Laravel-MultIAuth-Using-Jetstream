<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainUserController;


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

Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
})->name('dashboard');
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin_logout');




/*-------------------User Route-----------------------*/
Route::get('/user/logout', [MainUserController::class, 'logout'])->name('user_logout');

Route::get('/user/profile', [MainUserController::class, 'userProfile'])->name('user_profile');
Route::get('/user/profile/edit', [MainUserController::class, 'userProfileEdit'])->name('profile_edit');
Route::post('/user/profile/store', [MainUserController::class, 'userProfileStore'])->name('profile_store');

Route::get('/user/profile/password/view', [MainUserController::class, 'userPasswordChange'])->name('user_password_change');
Route::post('/user/profile/password/update', [MainUserController::class, 'userPasswordUpdate'])->name('password_update');














/*-------------------End User Route-----------------------*/
