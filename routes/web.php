<?php

use App\Http\Controllers\Account\AccountController;
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

Route::get('/', function () {
    return view('pages.auth.login');
})->name('home');
Route::post('/login', [AccountController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/dashboard', [AccountController::class, 'dashboard'])->name('dashboard');
    Route::resource('/admin/employees', App\Http\Controllers\Employee\EmployeeController::class);
    Route::resource('/admin/companies', App\Http\Controllers\Company\CompanyController::class);
    Route::get('admin/logout', [AccountController::class, 'logout'])->name('logout');
});
