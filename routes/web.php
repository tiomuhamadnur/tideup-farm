<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\KambingController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\PencatatanController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\WeselController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'auth'], function () {

	Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');


	Route::get('user-management', [ManagementUserController::class, 'index'])->name('user-management');
	Route::get('edit-jabatan-user-{id}', [ManagementUserController::class, 'edit_role'])->name('edit-jabatan-user');
	Route::put('user-management/{id}', [ManagementUserController::class, 'update_role'])->name('update-role-user');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');


	Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

	Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

	Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
	Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');

	// WESEL
	// Route::get('wesel', [WeselController::class, 'index'])->name('wesel');
	// Route::get('/wesel/show-detail-wesel', [WeselController::class, 'show_detail_wesel'])->name('show-detail-wesel');
	// Route::get('/wesel/show-detail-wesel/{id}', [WeselController::class, 'show_detail_wesel_edit'])->name('show-detail-wesel-edit');
	// Route::get('create-job-wesel', [WeselController::class, 'create'])->name('create-job-wesel');
	// Route::post('/wesel/store', [WeselController::class, 'store'])->name('wesel-store');
	// Route::get('/edit-job-wesel/{id}', [WeselController::class, 'edit'])->name('edit-job-wesel');
	// Route::put('/update-job-wesel/{id}', [WeselController::class, 'update'])->name('update-job-wesel');
	// Route::get('/export-job-wesel/{id}', [WeselController::class, 'export'])->name('export-job-wesel');
	// Route::get('/wesel/delete/{id}', [WeselController::class, 'destroy']);

	// LEMBUR
	Route::controller(LemburController::class)->group(function () {
		Route::get('/lembur', 'index')->name('lembur');
		Route::put('/lembur/new', 'store');
		Route::get('/lembur/submit/{id}', 'submit');
		Route::delete('/lembur/delete/{id}', 'destroy')->name('lembur.destroy');
	});

	// KAMBING
	Route::controller(KambingController::class)->group(function () {
		Route::get('/kambing', 'index')->name('kambing.index');
		Route::post('/kambing', 'store')->name('kambing.store');
		Route::get('/kambing/{id}/edit', 'edit')->name('kambing.edit');
		Route::put('/kambing', 'update')->name('kambing.update');
		Route::get('/kambing/{id}/delete', 'destroy')->name('kambing.destroy');
		Route::get('/kambing-qrcode', 'qrcode')->name('kambing.qrcode');
	});

	// PENCATATAN
	Route::controller(PencatatanController::class)->group(function () {
		Route::get('/pencatatan', 'index')->name('pencatatan.index');
		Route::post('/pencatatan', 'store')->name('pencatatan.store');
	});

	// ADMIN
	Route::controller(AdminController::class)->group(function () {
		Route::get('/admin', 'index')->name('admin.dashboard');
		Route::get('/list-admin', 'list_admin')->name('admin.index');
		Route::get('/pencatatan-admin', 'catat_admin')->name('admin.catat');
	});

	// PENGELOLA
	Route::controller(PengelolaController::class)->group(function () {
		Route::get('/pengelola', 'index')->name('pengelola.index');
	});

	// INVESTOR
	Route::controller(InvestorController::class)->group(function () {
		Route::get('/investor', 'index')->name('investor.index');
	});

	Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});



Route::group(['middleware' => 'guest'], function () {
	Route::get('/register', [RegisterController::class, 'create']);
	Route::post('/register', [RegisterController::class, 'store']);
	Route::get('/login', [SessionsController::class, 'create']);
	Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
	return view('session/login-session');
})->name('login');