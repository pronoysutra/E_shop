<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', [HomeController::class, 'index'])->name('index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');
//catagory route start
route::get('/view_catagory', [AdminController::class, 'view_catagory'])->name('view.catagory');
route::post('/add_catagory', [AdminController::class, 'add_catagory'])->name('add.catagory');
Route::delete('/delete_catagory/{id}', [AdminController::class, 'delete_catagory'])->name('delete.catagory');

//catagory route end

//product route start
Route::get('/add_product', [AdminController::class, 'add_product'])->name('add.product');

// Route to handle form submission (POST request)
Route::post('/store_product', [AdminController::class, 'store_product'])->name('store.product');
route::get('/show_product', [AdminController::class, 'show_product'])->name('show.product');


//product route end
