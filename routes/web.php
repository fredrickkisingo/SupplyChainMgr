<?php

use App\Http\Controllers\ContactsController;
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
Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::resource('products','ProductsController');
    Route::get('contact/suppliers','ContactsController@viewSuppliers');

Route::resource('contact','ContactsController');
Route::resource('transactions','TransactionsController');


});

