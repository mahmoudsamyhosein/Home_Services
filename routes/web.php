<?php
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\Categories\Adminaddservicecategory;
use App\Http\Livewire\Admin\Categories\Admineditservice;
use App\Http\Livewire\Admin\Categories\Adminservicecategory;
use App\Http\Livewire\Admin\Services\Adminaddservice;
use App\Http\Livewire\Admin\Services\Services;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\Servicecategories;
use App\Http\Livewire\Servicesbycategory;

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
// For Home Page
Route::get('/',Home::class)->name('home');
// For Services Categories
Route::get('/service-categories',Servicecategories::class)->name('home.service_category');
Route::get('/{category_slug}/services',Servicesbycategory::class)->name('home.services_by_category');
// For Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
});
// For Service Provider
Route::middleware(['auth:sanctum', 'verified','authsprovider'])->group(function(){
    Route::get('/sprovider/dashboard',SproviderDashboardComponent::class)->name('sprovider.dashboard');
});
// For Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/service-categories',Adminservicecategory::class)->name('admin.service_categories');
    Route::get('/admin/service-categories/add',Adminaddservicecategory::class)->name('admin.add_service_categories');
    Route::get('/admin/service-categories/edit{category_id}',Admineditservicecategory::class)->name('admin.edit_service_categories');
    Route::get('/admin/all-services',Services::class)->name('admin.all_services');
    Route::get('/admin/{category_slug}/services',Servicesbycategory::class)->name('admin.service_by_category');
    Route::get('/admin/add',Adminaddservice::class)->name('admin.add_service');
});