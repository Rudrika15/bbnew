<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MediaController;
use App\Http\Controllers\admin\PricingController;
use App\Http\Controllers\admin\RoleController as AdminRoleController;
use App\Http\Controllers\admin\TemplateDetailController;
use App\Http\Controllers\admin\TemplatemasterController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\WriterDesignerController;
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





// Category

Route::get('admincategory/index', [CategoryController::class, 'index'])->name('admincategory.index');
Route::get('admincategory/create', [CategoryController::class, 'create'])->name('admincategory.create');
Route::post('admincategory/store', [CategoryController::class, 'store'])->name('admincategory.store');
Route::get('admincategory/edit/{id}', [CategoryController::class, 'edit'])->name('admincategory.edit');
Route::post('admincategory/update', [CategoryController::class, 'update'])->name('admincategory.update');
Route::get('admincategory/delete/{id?}', [CategoryController::class, 'destroy'])->name('admincategory.delete');


// Media
Route::get('adminMedia/index', [MediaController::class, 'index'])->name('adminmedia.index');
Route::get('adminMedia/create', [MediaController::class, 'create'])->name('adminmedia.create');
Route::post('adminMedia/store', [MediaController::class, 'store'])->name('adminmedia.store');
Route::get('adminMedia/edit/{id}', [MediaController::class, 'edit'])->name('adminmedia.edit');
Route::post('adminMedia/update', [MediaController::class, 'update'])->name('adminmedia.update');
Route::get('adminMedia/delete/{id?}', [MediaController::class, 'destroy'])->name('adminmedia.delete');
Route::get('adminMedia/downloads', [MediaController::class, 'downloads'])->name('admindownload.index');
// select Category Page
Route::get('adminMedia/select-category', [MediaController::class, 'selectCategory'])->name('adminmedia.selectCategory');


// slogan
Route::get('adminslogan/adminslogan', [WriterDesignerController::class, 'adminslogan'])->name('adminslogan.adminslogan');
Route::post('adminslogan/approve', [WriterDesignerController::class, 'approve'])->name('adminslogan.approve');
Route::post('adminslogan/changeDate', [WriterDesignerController::class, 'changeSloganDate'])->name('slogan.changeDate');

// design
Route::get('admindesign/admindesign', [WriterDesignerController::class, 'admindesign'])->name('admindesign.admindesign');
Route::get('admindesign/approve/{id?}', [WriterDesignerController::class, 'designapprove'])->name('admindesign.approve');
Route::post('admindesign/designapproveCode', [WriterDesignerController::class, 'designapproveCode'])->name('admindesign.designapproveCode');
Route::post('admindesign/reject', [WriterDesignerController::class, 'reject'])->name('admindesign.reject');


// Template Master

Route::get('admintemplatemaster/index', [TemplatemasterController::class, 'index'])->name('admintemplatemaster.index');
Route::get('admintemplatemaster/create', [TemplatemasterController::class, 'create'])->name('admintemplatemaster.create');
Route::post('admintemplatemaster/store', [TemplatemasterController::class, 'store'])->name('admintemplatemaster.store');
Route::get('admintemplatemaster/edit/{id}', [TemplatemasterController::class, 'edit'])->name('admintemplatemaster.edit');
Route::post('admintemplatemaster/update', [TemplatemasterController::class, 'update'])->name('admintemplatemaster.update');
Route::get('admintemplatemaster/delete/{id?}', [TemplatemasterController::class, 'destroy'])->name('admintemplatemaster.delete');


// Template Master
Route::get('adminTemplateDetail/index/{id?}', [TemplateDetailController::class, 'index'])->name('adminTemplateDetail.index');
Route::get('adminTemplateDetail/create', [TemplateDetailController::class, 'create'])->name('adminTemplateDetail.create');
Route::post('adminTemplateDetail/store', [TemplateDetailController::class, 'store'])->name('adminTemplateDetail.store');
Route::get('adminTemplateDetail/edit/{id}', [TemplateDetailController::class, 'edit'])->name('adminTemplateDetail.edit');
Route::post('adminTemplateDetail/update', [TemplateDetailController::class, 'update'])->name('adminTemplateDetail.update');
Route::get('adminTemplateDetail/delete/{id?}', [TemplateDetailController::class, 'destroy'])->name('adminTemplateDetail.delete');
