<?php

use GuzzleHttp\Middleware;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AbsenGuruController;
use App\Http\Controllers\AbsenSiswaController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\LaporanHarianController;
use App\Http\Controllers\LaporanBulananController;

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


Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');

Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

//dashboard
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

	//profile
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile')->middleware('checkUserRole:1,2,3,4,5');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update')->middleware('checkUserRole:1,2,3,4,5');
	Route::post('/delete-profile-image', [UserProfileController::class, 'deleteProfileImage'])->name('delete-profile-image')->middleware('checkUserRole:1,2,3,4,5');

	//Jurusan
	Route::get('/jurusan',  [JurusanController::class, 'index'])->name('jurusan.index')->middleware('checkUserRole:1');
	Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store')->middleware('checkUserRole:1');
	Route::get('delete_jurusan/{id}', [JurusanController::class, 'delete'])->name('jurusan.delete')->middleware('checkUserRole:1');
	
	//Kelas
	Route::get('/kelas',  [KelasController::class, 'index'])->name('kelas.index')->middleware('checkUserRole:1');
	Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store')->middleware('checkUserRole:1');
	Route::get('delete_kelas/{id}', [KelasController::class, 'delete'])->name('kelas.delete')->middleware('checkUserRole:1');
	Route::get('/jurusan/kenaikan/{id}',  [KelasController::class, 'show'])->name('jurusan.kenaikan')->middleware('checkUserRole:1');
	Route::get('/jurusan/update-kenaikan/{id}',  [KelasController::class, 'kenaikan'])->name('jurusan.kenaikan.update')->middleware('checkUserRole:1');

	//list walas
	Route::get('walas', [App\Http\Controllers\UsermanagementController::class, 'WalasList'])->name('list-walas.index')->middleware('checkUserRole:1,2,3,4,5');

	//list KM
	Route::get('km', [App\Http\Controllers\UsermanagementController::class, 'KmList'])->name('list-km.index')->middleware('checkUserRole:1,2,3');

	//Siswa
	Route::get('siswa', [App\Http\Controllers\SiswaController::class, 'SiswaList'])->name('list-siswa.index')->middleware('checkUserRole:1,2,3');
	Route::get('add_siswa', [App\Http\Controllers\SiswaController::class, 'AddSiswa'])->name('list-siswa.add_siswa')->middleware('checkUserRole:3');
	Route::post('siswa', [SiswaController::class, 'store'])->name('list-siswa.store_siswa')->middleware('checkUserRole:3');
	Route::get('edit_siswa/{id}', [SiswaController::class, 'edit'])->name('list-siswa.edit_siswa')->middleware('checkUserRole:3');
	Route::post('update_siswa/{id}', [SiswaController::class, 'update'])->name('list-siswa.update_siswa')->middleware('checkUserRole:3');
	Route::get('delete_siswa/{id}', [SiswaController::class, 'delete'])->name('siswa.delete')->middleware('checkUserRole:3');
	Route::get('siswa_detail/{id}', [SiswaController::class, 'detail'])->name('siswa.detail')->middleware('checkUserRole:2,3');
	
	//Guru
	Route::get('guru', [App\Http\Controllers\GuruController::class, 'GuruList'])->name('list-guru.index')->middleware('checkUserRole:1,3');
	Route::get('add_guru', [App\Http\Controllers\GuruController::class, 'AddGuru'])->name('list-guru.add_guru')->middleware('checkUserRole:1');
	Route::post('add_guru', [App\Http\Controllers\GuruController::class, 'store'])->name('list-guru.store_guru')->middleware('checkUserRole:1');
	Route::get('edit_guru/{id}', [App\Http\Controllers\GuruController::class, 'EditGuru'])->name('list-guru.edit_guru')->middleware('checkUserRole:1');
	Route::post('/update_guru/{id}', [App\Http\Controllers\GuruController::class, 'GuruUpdate'])->middleware('checkUserRole:1');
	Route::get('delete_guru/{id}', [App\Http\Controllers\GuruController::class, 'DeleteGuru'])->name('list-guru.delete')->middleware('checkUserRole:1');
	Route::get('edit_gurumapel/{id}', [App\Http\Controllers\GuruController::class, 'EditMapel'])->name('list-guru.edit_mapel')->middleware('checkUserRole:1');
	Route::post('update_gurumapel/{id}', [App\Http\Controllers\GuruController::class, 'MapelUpdate'])->name('list-guru.update_mapel')->middleware('checkUserRole:1');
	Route::get('delete_gurumapel/{id}', [App\Http\Controllers\GuruController::class, 'DeleteMapel'])->name('list-guru.delete_mapel')->middleware('checkUserRole:1');


	//Absen Siswa
	Route::get('/absen_siswa',  [AbsenSiswaController::class, 'index'])->name('absen_siswa.index')->middleware('checkUserRole:2');
	Route::post('/absen_siswa', [AbsenSiswaController::class, 'store'])->name('absen_siswa.store')->middleware('checkUserRole:2');
	Route::get('/show_form', [AbsenSiswaController::class, 'showForm'])->middleware('checkUserRole:2');

	//Absen Guru
	Route::get('/absen_guru',  [AbsenGuruController::class, 'index'])->name('absen_guru.index')->middleware('checkUserRole:2');
	Route::post('/absen_guru', [AbsenGuruController::class, 'store'])->name('absen_guru.store')->middleware('checkUserRole:2');
	Route::get('/show_form', [AbsenGuruController::class, 'showForm'])->middleware('checkUserRole:2');
	
	//Jadwal
	Route::get('/jadwal',  [JadwalController::class, 'index'])->name('jadwal.index')->middleware('checkUserRole:2,3');
	Route::get('tambah_jadwal', [App\Http\Controllers\JadwalController::class, 'create'])->name('jadwal.create')->middleware('checkUserRole:3');
	Route::post('tambah_jadwal', [JadwalController::class, 'store'])->name('jadwal.store')->middleware('checkUserRole:3');
	Route::get('delete_jadwal/{id}', [JadwalController::class, 'delete'])->name('jadwal.delete')->middleware('checkUserRole:3');

	//Mata Pelajaran
	Route::get('/mapel',  [MapelController::class, 'index'])->name('mapel.index')->middleware('checkUserRole:1');
	Route::post('/mapel', [MapelController::class, 'store'])->name('mapel.store')->middleware('checkUserRole:1');
	Route::get('delete_mapel/{id}', [MapelController::class, 'delete'])->name('mapel.delete')->middleware('checkUserRole:1');



	//user management
	Route::get('user_management', [App\Http\Controllers\UsermanagementController::class, 'UserList'])->name('users.index')->middleware('checkUserRole:1');
	Route::get('/edit_user/{id}', [App\Http\Controllers\UsermanagementController::class, 'UserEdit'])->name('users.edit')->middleware('checkUserRole:1');
	Route::post('/update_user/{id}', [App\Http\Controllers\UsermanagementController::class, 'UserUpdate'])->name('users.update')->middleware('checkUserRole:1');
	Route::post('/change_role/{id}', [App\Http\Controllers\UsermanagementController::class, 'changeRole'])->name('user.changeRole')->middleware('checkUserRole:1');
	Route::get('/delete_user/{id}', [App\Http\Controllers\UsermanagementController::class, 'UserDelete'])->name('users.delete')->middleware('checkUserRole:1');
	Route::get('jurusankelas/{id}', [App\Http\Controllers\UsermanagementController::class, 'JurusanKelas']);
	Route::get('add_user', [App\Http\Controllers\UsermanagementController::class, 'AddUser'])->name('users.add-user')->middleware('checkUserRole:1');
	Route::post('add_user', [App\Http\Controllers\UsermanagementController::class, 'store'])->name('addUser.perform')->middleware('checkUserRole:1');

	//Harian
	Route::get('/daily-report',  [LaporanHarianController::class, 'index'])->name('harian.index')->middleware('checkUserRole:2,3');
	Route::get('/daily-report/delete_siswa/{id}', [LaporanHarianController::class, 'deleteSiswa'])->name('harian.delete.siswa')->middleware('checkUserRole:2');
	Route::get('/daily-report/delete_guru/{id}', [LaporanHarianController::class, 'deleteGuru'])->name('harian.delete.guru')->middleware('checkUserRole:2');
	Route::get('/daily-report/kakom',  [LaporanHarianController::class, 'kakom'])->name('harian.kakom')->middleware('checkUserRole:4');
	
	//Bulanan
	Route::get('/monthly-report',  [LaporanBulananController::class, 'index'])->name('bulanan.index')->middleware('checkUserRole:2,3,4');
	Route::get('/monthly-report/detail/{bulan}',  [LaporanBulananController::class, 'show'])->name('bulanan.show')->middleware('checkUserRole:2,3,4');
	Route::get('/monthly-report/kakom/{bulan}',  [LaporanBulananController::class, 'kakom'])->name('bulanan.kakom')->middleware('checkUserRole:4');
	Route::get('/monthly-report/export/{bulan}',  [LaporanBulananController::class, 'cetak'])->name('bulanan.cetak')->middleware('checkUserRole:2,3');
	



	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');



});