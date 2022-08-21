<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\ManagementUserController;
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

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', [ManagementUserController::class, 'index'])->name('user-management');
	Route::get('edit-jabatan-user-{id}', [ManagementUserController::class, 'edit_role'])->name('edit-jabatan-user');
	Route::put('user-management/{id}', [ManagementUserController::class, 'update_role'])->name('update-role-user');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

	Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

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
	Route::get('wesel', [WeselController::class, 'index'])->name('wesel');
	Route::get('/wesel/show-detail-wesel', [WeselController::class, 'show_detail_wesel'])->name('show-detail-wesel');
	Route::get('create-job-wesel', [WeselController::class, 'create'])->name('create-job-wesel');
	Route::post('/wesel/store', [WeselController::class, 'store'])->name('wesel-store');
	Route::get('/edit-job-wesel/{id}', [WeselController::class, 'edit'])->name('edit-job-wesel');
	Route::put('/update-job-wesel/{id}', [WeselController::class, 'update'])->name('update-job-wesel');
	Route::get('/export-job-wesel/{id}', [WeselController::class, 'export'])->name('export-job-wesel');
	Route::get('/wesel/delete/{id}', [WeselController::class, 'destroy']);
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