<?php

use App\Http\Controllers\brand\ActivityController;
use App\Http\Controllers\brand\BrandCategoryController;
use App\Http\Controllers\brand\BrandPackageController;
use App\Http\Controllers\brand\BrandPackageDetailController;
use App\Http\Controllers\brand\CampaignController;
use App\Http\Controllers\brand\CampaignStepController;
use App\Http\Controllers\brand\DashboardController;
use App\Http\Controllers\InstaMojoPaymentController;
use Illuminate\Support\Facades\Route;

Route::get('brand/dashboard', [DashboardController::class, 'dashboard'])->name('brand.dashboard');


// campaign
Route::get('brand/campaign/index', [CampaignController::class, 'index'])->name('brand.campaign.index');
Route::get('brand/campaign/create', [CampaignController::class, 'create'])->name('brand.campaign.create');
Route::post('brand/campaign/store', [CampaignController::class, 'store'])->name('brand.campaign.store');
Route::get('brand/campaign/edit/{id?}', [CampaignController::class, 'edit'])->name('brand.campaign.edit');
Route::post('brand/campaign/update', [CampaignController::class, 'update'])->name('brand.campaign.update');
Route::get('brand/campaign/delete/{id?}', [CampaignController::class, 'delete'])->name('brand.campaign.delete');
Route::get('brand/campaign/appliers', [CampaignController::class, 'appliers'])->name('brand.campaign.appliers');

// influencer status management
Route::get('brand/campaign/influencer/approval/{campaignId?}/{userId?}', [CampaignController::class, 'influencerApproval'])->name('brand.campaign.influencerApproval');
Route::get('brand/campaign/influencer/hold/{campaignId?}/{userId?}', [CampaignController::class, 'influencerOnHold'])->name('brand.campaign.influencerOnHold');
Route::get('brand/campaign/influencer/reject/{campaignId?}/{userId?}', [CampaignController::class, 'influencerReject'])->name('brand.campaign.influencerReject');
Route::get('brand/campaign/influencer/detail/{campaignId?}/{userId?}', [CampaignController::class, 'influencerDetail'])->name('brand.campaign.influencerDetail');
Route::get('brand/campaign/influencer/portfolio/{campaignId?}/{userId?}', [CampaignController::class, 'influencerPortfolio'])->name('brand.campaign.influencerPortfolio');


// influencer content Management
Route::get('brand/campaign/influencer/content/approval/{campaignId?}/{userId?}/{id?}', [CampaignController::class, 'influencerContentApproval'])->name('brand.campaign.influencerContentApproval');
Route::get('brand/campaign/influencer/content/hold/{campaignId?}/{userId?}/{id?}', [CampaignController::class, 'influencerContentOnHold'])->name('brand.campaign.influencerContentOnHold');
Route::post('brand/campaign/influencer/content/reject/{campaignId?}/{userId?}/{id?}', [CampaignController::class, 'influencerContentReject'])->name('brand.campaign.influencerContentReject');
Route::get('brand/brandPointLog', [CampaignController::class, 'brandPointLog'])->name('brand.log');


// campaign step
Route::get('brand/campaign/step/index', [CampaignStepController::class, 'index'])->name('brand.campaign.step.index');
Route::get('brand/campaign/step/create', [CampaignStepController::class, 'create'])->name('brand.campaign.step.create');
Route::post('brand/campaign/step/store', [CampaignStepController::class, 'store'])->name('brand.campaign.step.store');
Route::get('brand/campaign/step/edit/{id?}', [CampaignStepController::class, 'edit'])->name('brand.campaign.step.edit');
Route::post('brand/campaign/step/update', [CampaignStepController::class, 'update'])->name('brand.campaign.step.update');
Route::get('brand/campaign/step/delete/{id?}', [CampaignStepController::class, 'delete'])->name('brand.campaign.step.delete');

// Brand Category
Route::get('brand/category/index', [BrandCategoryController::class, 'index'])->name('brand.category.index');
Route::get('brand/category/create', [BrandCategoryController::class, 'create'])->name('brand.category.create');
Route::post('brand/category/store', [BrandCategoryController::class, 'store'])->name('brand.category.store');
Route::get('brand/category/edit/{id?}', [BrandCategoryController::class, 'edit'])->name('brand.category.edit');
Route::post('brand/category/update', [BrandCategoryController::class, 'update'])->name('brand.category.update');
Route::get('brand/category/delete/{id?}', [BrandCategoryController::class, 'delete'])->name('brand.category.delete');

// brand Packages activity
Route::get('admin/brand/package/activity/index', [ActivityController::class, 'index'])->name('admin.brand.activity.index');
Route::get('admin/brand/package/activity/create', [ActivityController::class, 'create'])->name('admin.brand.activity.create');
Route::post('admin/brand/package/activity/store', [ActivityController::class, 'store'])->name('admin.brand.activity.store');
Route::get('admin/brand/package/activity/edit/{id?}', [ActivityController::class, 'edit'])->name('admin.brand.activity.edit');
Route::post('admin/brand/package/activity/update', [ActivityController::class, 'update'])->name('admin.brand.activity.update');
Route::get('admin/brand/package/activity/delete/{id?}', [ActivityController::class, 'delete'])->name('admin.brand.activity.delete');

// brand Packages
Route::get('admin/brand/package/index', [BrandPackageController::class, 'index'])->name('admin.brand.package.index');
Route::get('admin/brand/package/create', [BrandPackageController::class, 'create'])->name('admin.brand.package.create');
Route::post('admin/brand/package/store', [BrandPackageController::class, 'store'])->name('admin.brand.package.store');
Route::get('admin/brand/package/edit/{id?}', [BrandPackageController::class, 'edit'])->name('admin.brand.package.edit');
Route::post('admin/brand/package/update', [BrandPackageController::class, 'update'])->name('admin.brand.package.update');
Route::get('admin/brand/package/delete/{id?}', [BrandPackageController::class, 'destroy'])->name('admin.brand.package.delete');

// brand package details
Route::get('admin/brand/package/detail/index/{id?}', [BrandPackageDetailController::class, 'index'])->name('admin.brand.package.detail.index');
Route::post('admin/brand/package/detail/store', [BrandPackageDetailController::class, 'store'])->name('admin.brand.package.detail.store');
Route::get('admin/brand/package/detail/delete/{id?}', [BrandPackageDetailController::class, 'delete'])->name('admin.brand.package.detail.delete');

Route::get('brand/pricing', [BrandPackageDetailController::class, 'pricingView'])->name('brand.pricing');

// brand payment
Route::group(['prefix' => 'instamojopayments'], function () {
    Route::post('/pay', [InstaMojoPaymentController::class, 'pay'])->name('pay');
    Route::any('/success', [InstaMojoPaymentController::class, 'success']);
});

Route::get('brand/influencerList', [CampaignController::class, 'influencerList'])->name('brand.influencerList');
Route::get('brand/influencerList/profile/{id?}/{userId?}', [CampaignController::class, 'influencerProfile'])->name('brand.influencerProfile');
Route::post('brand/influencerPointCode', [CampaignController::class, 'influencerContactPoint'])->name('brand.influencerContactPoint');
