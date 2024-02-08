<?php

use App\Http\Controllers\Auth\OtpController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('/')->group(__DIR__ . '/admin/adminRoute.php');
    Route::prefix('/')->group(__DIR__ . '/user/userRoute.php');
    Route::prefix('/')->group(__DIR__ . '/writer/writerRoute.php');
    Route::prefix('/')->group(__DIR__ . '/designer/designerRoute.php');
    Route::prefix('/')->group(__DIR__ . '/brand/brandRoute.php');
    Route::prefix('/')->group(__DIR__ . '/influencer/influencerRoute.php');
    Route::prefix('/')->group(__DIR__ . '/reseller/resellerRoute.php');

    Route::get('/fetch-layout', [App\Http\Controllers\HomepageController::class, 'fetchLayout'])->name('fetch-layout');
});

// OTP 

Route::controller(OtpController::class)->group(function () {
    Route::get('loginn', 'login')->name('otp.login');
    Route::get('auth/checkotp', 'checkotp')->name('auth.checkotp');
    Route::post('auth/loginotp/{id?}', 'loginotp')->name('auth.loginotp');
    Route::post('otp/generate', 'generate')->name('otp.generate');
});
