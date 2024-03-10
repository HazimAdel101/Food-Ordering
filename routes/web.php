<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin group middleware
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/dashboard/users', [AdminController::class, 'Users'])->name('admin.users');

    // Supplier
    Route::get('/admin/dashboard/suppliers', [SupplierController::class, 'index'])->name('admin.suppliers');
    Route::get('/admin/dashboard/suppliers/create', [SupplierController::class, 'create'])->name('admin.supplier.create');
    Route::post('/admin/dashboard/suppliers', [SupplierController::class, 'store'])->name('admin.supplier.store');
    Route::get('/admin/dashboard/suppliers/{supplier}', [SupplierController::class, 'edit'])->name('admin.supplier.edit');
    Route::put('/admin/dashboard/suppliers/{supplier}/update', [SupplierController::class, 'update'])->name('admin.supplier.update');
    Route::delete('/admin/dashboard/suppliers/{supplier}/delete', [SupplierController::class, 'delete'])->name('admin.supplier.delete');

    // Restaurant

    Route::get('/admin/dashboard/restaurants', [RestaurantController::class, 'index'])->name('admin.restaurants');
    Route::get('/admin/dashboard/restaurants/create', [RestaurantController::class, 'create'])->name('admin.restaurant.create');
    Route::post('/admin/dashboard/restaurants', [RestaurantController::class, 'store'])->name('admin.restaurant.store');
    Route::get('/admin/dashboard/restaurants/{restaurant}', [RestaurantController::class, 'edit'])->name('admin.restaurant.edit');
    Route::put('/admin/dashboard/restaurants/{restaurant}/update', [RestaurantController::class, 'update'])->name('admin.restaurant.update');
    Route::delete('/admin/dashboard/restaurants/{restaurant}/delete', [RestaurantController::class, 'delete'])->name('admin.restaurant.delete');

    // Restaurant Foods
    Route::get('/admin/dashboard/restaurants/{restaurant}/foods', [FoodController::class, 'index'])->name('admin.restaurant.foods');
    Route::get('/admin/dashboard/restaurants/{restaurant}/foods/create', [FoodController::class, 'create'])->name('admin.restaurant.food.create');
    Route::post('/admin/dashboard/restaurants/{restaurant}/foods', [FoodController::class, 'store'])->name('admin.restaurant.food.store');
    Route::get('/admin/dashboard/restaurants/{restaurant}/{food}', [FoodController::class, 'edit'])->name('admin.restaurant.food.edit');
    Route::put('/admin/dashboard/restaurants/{restaurant}/{food}/update', [FoodController::class, 'update'])->name('admin.restaurant.food.update');
    Route::delete('/admin/dashboard/restaurants/{restaurant}/{food}/delete', [FoodController::class, 'delete'])->name('admin.restaurant.food.delete');

    // Orders
    Route::get('/admin/dashboard/orders', [OrderController::class, 'index'])->name('admin.orders');


    // Logout
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
});

// Supplier group middleware
Route::middleware(['auth', 'role:supplier'])->group(function () {

    Route::get('/supplier/dashboard', [SupplierController::class, 'SupplierDashboard'])->name('supplier.dashboard');
});
