<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\LaporanHarianController;

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
	return redirect('/dashboard');
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');

Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');

Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

//dashboard
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	//Harian
	Route::get('/daily-report',  [LaporanHarianController::class, 'show'])->name('harian.index')->middleware('checkUserRole:1,2,3,4');

	//profile
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile')->middleware('checkUserRole:1,2,3,4');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update')->middleware('checkUserRole:1,2,3,4');
	Route::post('/delete-profile-image', [UserProfileController::class, 'deleteProfileImage'])->name('delete-profile-image')->middleware('checkUserRole:1,2,3,4');

	//list walas
	Route::get('walas', [App\Http\Controllers\UsermanagementController::class, 'WalasList'])->name('list-walas.index')->middleware('checkUserRole:1,2,3,4');

	//user management
	Route::get('user_management', [App\Http\Controllers\UsermanagementController::class, 'UserList'])->name('users.index')->middleware('checkUserRole:1,3,4');
	Route::get('/edit_user/{id}', [App\Http\Controllers\UsermanagementController::class, 'UserEdit'])->middleware('checkUserRole:1');
	Route::post('/update_user/{id}', [App\Http\Controllers\UsermanagementController::class, 'UserUpdate'])->middleware('checkUserRole:1');
	Route::post('/change_role/{id}', [App\Http\Controllers\UsermanagementController::class, 'changeRole'])->name('user.changeRole')->middleware('checkUserRole:1');
	Route::get('/delete_user/{id}', [App\Http\Controllers\UsermanagementController::class, 'UserDelete'])->middleware('checkUserRole:1');

	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');


	//Bulanan
	//Route::get('/laporan_bulanan', 'LaporanController@bulanan')->name('laporan.bulanan');

});