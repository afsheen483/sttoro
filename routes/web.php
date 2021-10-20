<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('admin.dashboard');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    if (Auth::check()) {
        return view('admin.dashboard');
    }
    return view('newlogin');
})->name('login');

// dashboard route



Route::get('/login', function () {
    if (Auth::check()) {
        return view('admin.dashboard');
    }
    return view('newlogin');
})->name('login');


Auth::routes();


Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');
Route::get('dashboard', 'AdminController@index')->middleware('auth');


// products
Route::get('products','ProductController@index');
Route::get('product_form/{id}','ProductController@create');
Route::post('product_store','ProductController@store');
Route::put('product_delete','ProductController@destroy');
Route::put('product_update/{id}','ProductController@update');