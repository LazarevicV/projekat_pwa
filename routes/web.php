<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [Controller::class, 'index'])->name('pocetna');
Route::get('/contact', [Controller::class, 'contactPage'])->name('kontakt');
Route::post('/contact', [ContactController::class, 'saveMessage'])->name('sacuvajPoruku');

Route::get('/products', [Controller::class, 'productsPage'])->name('all-products');
Route::get('/products/{id}', [Controller::class, 'productsByCategory'])->name('products-by-category');
Route::get('/product/{id}', [Controller::class, 'singleProduct'])->name('product-page');

Route::get('/cart', [Controller::class, 'cartPage'])->name('cart');
Route::get('/cart/add/{productId}', [Controller::class, 'addToCart'])->name('addToCart');
Route::get('/cart/remove/{productId}', [Controller::class, 'removeFromCart'])->name('removeFromCart');


Route::middleware('adminMidl')->group(function () {
    Route::get('/admin/messages', [ContactController::class, 'allMessages'])->name('svePoruke');
    Route::get('/admin/messages/delete/{id}', [ContactController::class, 'deleteMessage'])->name('delete-message');
    Route::get('/admin/messages/change-status/{id}', [ContactController::class, 'changeStatus'])->name('change-message-status');

    Route::get('/admin/all-users', [AdminController::class, 'allUsers'])->name('all-users');
    Route::get('/admin/all-users/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');

    Route::get('/admin/products', [AdminController::class, 'productsPage'])->name('admin-proizvodi');
    Route::get('/admin/products/create', [AdminController::class, 'createProductPage'])->name('admin-kreiraj-proizvod');
    Route::post('/admin/products/create', [AdminController::class, 'createProduct'])->name('sacuvajProizvod');
    Route::get('/admin/products/delete/{id}', [AdminController::class, 'deleteProduct'])->name('delete-product');
    Route::get('/admin/products/edit/{id}', [AdminController::class, 'editProduct'])->name('edit-product');
    Route::post('/admin/products/edit/{id}', [AdminController::class, 'updateProduct'])->name('updateProduct');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
