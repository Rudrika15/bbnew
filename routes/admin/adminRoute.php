<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MediaController;
use App\Http\Controllers\admin\PricingController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\RoleController as AdminRoleController;
use App\Http\Controllers\admin\StateController;
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


// Product
Route::get('product/index', [ProductController::class, 'index'])->name('product.index');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('product/edit/{id?}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('product/update', [ProductController::class, 'update'])->name('product.update');
Route::get('product/delete/{id?}', [ProductController::class, 'destory'])->name('product.delete');



// adminstate details
Route::get('state/index', [StateController::class, 'index'])->name('state.index');
Route::get('state/create', [StateController::class, 'create'])->name('state.create');
Route::post('state/store', [StateController::class, 'store'])->name('state.store');
Route::get('state/edit/{id?}', [StateController::class, 'edit'])->name(('state.edit'));
Route::post('state/update', [StateController::class, 'update'])->name('state.update');
Route::get('state/delete/{id?}', [StateController::class, 'delete'])->name('state.delete');


// admincity details
Route::get('city/index', [CityController::class, 'index'])->name('city.index');
Route::get('city/create', [CityController::class, 'create'])->name('city.create');
Route::post('city/store', [CityController::class, 'store'])->name('city.store');
Route::get('city/edit/{id?}', [CityController::class, 'edit'])->name('city.edit');
Route::post('city/update/{id?}', [CityController::class, 'update'])->name('city.update');
Route::get('city/delete/{id?}', [CityController::class, 'delete'])->name('city.delete');


// brand Packages activity
Route::get('admin/brand/package/activity/index', [ActivityController::class, 'index'])->name('admin.brand.activity.index');
Route::get('admin/brand/package/activity/create', [ActivityController::class, 'create'])->name('admin.brand.activity.create');
Route::post('admin/brand/package/activity/store', [ActivityController::class, 'store'])->name('admin.brand.activity.store');
Route::get('admin/brand/package/activity/edit/{id?}', [ActivityController::class, 'edit'])->name('admin.brand.activity.edit');
Route::post('admin/brand/package/activity/update', [ActivityController::class, 'update'])->name('admin.brand.activity.update');
Route::get('admin/brand/package/activity/delete/{id?}', [ActivityController::class, 'delete'])->name('admin.brand.activity.delete');
