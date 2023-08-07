<?php

use App\Module\Brands\Controllers\Api\BrandController;
use App\Module\Laptops\Controllers\Api\LaptopController;
use App\Module\Models\Controllers\Api\ModelController;
use App\Module\Orders\Controllers\Api\CartController;
use App\Module\Orders\Controllers\Api\OrderController;
use App\Module\Processors\Controllers\Api\ProcessorController;
use App\Module\Type\Controllers\Api\TypeController;
use App\Module\Users\Controllers\Api\UsersController;
use App\Module\VideoCard\Controllers\Api\VideoCardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});


Route::get('user', [UsersController::class, 'index'])
    ->name('user.index');

Route::get('user/{id}', [UsersController::class, 'show'])
    ->name('user.show');

Route::put('user/{id}', [UsersController::class, 'update'])
    ->name('user.update');

Route::delete('user/{id}', [UsersController::class, 'destroy'])
    ->name('user.destroy');

Route::get('/', function () {
    return view('index');
})->name('main-page');

//MODELS
Route::get('model', [ModelController::class, 'index'])
    ->name('model.index');

Route::post('model', [ModelController::class, 'store'])
    ->name('model.store');

Route::get('/store-brand', function () {
    return view('brand.store');
})->name('brand.store.page');

Route::get('/store-model', function () {
    return view('model.store');
})->name('model.store.page');

Route::delete('model/{id}', [ModelController::class, 'destroy'])
    ->name('model.destroy');


//USER
Route::post('authorize', [UsersController::class, 'authenticate'])
    ->name('users.authorize');

Route::post('users', [UsersController::class, 'store'])
    ->name('users.store');

Route::get('users', [UsersController::class, 'main'])
    ->name('users.main');

//Route::get('users', [UsersController::class, 'index'])
//    ->name('users.index');

//BRAND
Route::get('brand', [BrandController::class, 'index'])
    ->name('brand.index');

Route::post('brand', [BrandController::class, 'store'])
    ->name('brand.store');

Route::delete('brand/{id}', [BrandController::class, 'destroy'])
    ->name('brand.destroy');

//Type
Route::get('type', [TypeController::class, 'index'])
    ->name('type.index');

Route::post('type', [TypeController::class, 'store'])
    ->name('type.store');

Route::delete('type/{id}', [TypeController::class, 'destroy'])
    ->name('type.destroy');

Route::get('/store-type', function () {
    return view('type.store');
})->name('type.store.page');

Route::get('/save', function () {
    session_start();
    $_SESSION["newsession"]='fdsfsdfsd';
    dd(session()->all());
});

//PROCESSOR
Route::get('processor', [ProcessorController::class, 'index'])
    ->name('processor.index');

Route::post('processor', [ProcessorController::class, 'store'])
    ->name('processor.store');

Route::delete('processor/{id}', [ProcessorController::class, 'destroy'])
    ->name('processor.destroy');

Route::get('store-processor', [ProcessorController::class, 'storePage'])
    ->name('processor.store-page');

//VIDEOCARD
Route::get('video-card', [VideoCardController::class, 'index'])
    ->name('video-card.index');

Route::post('video-card', [VideoCardController::class, 'store'])
    ->name('video-card.store');

Route::delete('video-card/{id}', [VideoCardController::class, 'destroy'])
    ->name('video-card.destroy');

Route::get('store-video-card', [VideoCardController::class, 'storePage'])
    ->name('video-card.store-page');

//LAPTOP
Route::get('laptop', [LaptopController::class, 'index'])
    ->name('laptop.index');

Route::get('laptop/{id}', [LaptopController::class, 'show'])
    ->name('laptop.show');

Route::post('laptop', [LaptopController::class, 'store'])
    ->name('laptop.store');

Route::delete('laptop/{id}', [LaptopController::class, 'destroy'])
    ->name('laptop.destroy');

Route::put('laptop/{id}', [LaptopController::class, 'update'])
    ->name('laptop.update');

Route::get('store-laptop', [LaptopController::class, 'storePage'])
    ->name('laptop.store-page');

Route::get('laptop/{id}/more', [LaptopController::class, 'more'])
    ->name('laptop.more');

//ORDER
Route::get('cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::get('addToCart/{id}', [CartController::class, 'addToCart'])
    ->name('cart.addToCart');

Route::post('addToCart', [CartController::class, 'destroy'])
    ->name('cart.destroy');

Route::post('remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::get('/store-order', function () {
    return view('order.store');
})->name('order.store-page');

Route::post('order', [OrderController::class, 'store'])
    ->name('order.store');

Route::get('order', [OrderController::class, 'index'])
    ->name('order.index');

Route::get('order/{id}', [OrderController::class, 'show'])
    ->name('order.show');

Route::delete('order/{id}', [OrderController::class, 'destroy'])
    ->name('order.destroy');

//LOGOUT
Route::get('/logout-session', function () {
    session_start();
    unset($_SESSION['role']);
    return view('index');
})->name('logout.session');
