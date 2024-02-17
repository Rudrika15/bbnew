<?php

use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\HomepageController;
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

// influencer details
Route::get('/influencer', [HomepageController::class, 'influencer'])->name('main.influencer');
Route::get('/influencer/profile/{id?}', [HomepageController::class, 'influencerProfileView'])->name('main.influencer.profile');

// brand offers
Route::get('/brand/offer', [HomepageController::class, 'brandOffer'])->name('main.brandOffer');
Route::get('/brand/offers/{categoryId?}', [HomepageController::class, 'getOffer'])->name('brand.offer');
Route::get('/brand/detail/{id?}/{category?}', [HomepageController::class, 'brandDetail'])->name('brand.detail');


Route::get('/about', [HomepageController::class, 'about'])->name('about');
Route::get('/contact', [HomepageController::class, 'contact'])->name('contact');
Route::get('/privacy', [HomepageController::class, 'privacy'])->name('privacy');
Route::get('/refund', [HomepageController::class, 'refund'])->name('refund');
Route::get('/term', [HomepageController::class, 'term'])->name('term');
