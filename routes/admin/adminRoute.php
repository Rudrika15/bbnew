<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PricingController;
use App\Http\Controllers\admin\RoleController as AdminRoleController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
// Route::get('admin/user/list', [UserController::class, 'index'])->name('users.index');
// Route::get('admin/user/create', [UserController::class, 'create'])->name('users.create');


Route::resource('roles', AdminRoleController::class);
Route::resource('users', UserController::class);
Route::get('/assign/roles', [UserController::class, 'assignRoles'])->name('users.assignRole');
Route::get('/assign/roles/create/{id?}', [UserController::class, 'assignRoleCreate'])->name('users.assignRoleCreate');
Route::post('/assign/roles/code', [UserController::class, 'assignRoleCreateCode'])->name('users.assignRoleCreateCode');


// change email and password

Route::get('account/setting', [UserController::class, 'changeEmail'])->name('account.setting');

Route::post('change-email', [UserController::class, 'changeEmailCode'])->name('change.email');
Route::post('change-password', [UserController::class, 'changePassword'])->name('change.password');


// pricing

Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');
// Route::post('/pricing/payment', [PricingController::class, 'store'])->name('pay');



Route::group(['prefix' => 'instamojopayments'], function () {
    Route::post('/payment', [PricingController::class, 'store'])->name('package.payment');
    Route::any('/success/package', [PricingController::class, 'success']);
});
