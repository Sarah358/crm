<?php
use App\Http\Controllers\Admin\UsersController;
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


// Route::get('/about', function () {
//     return view('about');
// });
// Route::get('/contactus', function () {
//     return view('contactus');
// });

Auth::routes();

Route::get('/', 'HomeController@index');

// middleware route
Route::middleware('auth', 'isAdmin')->group(function(){
//route to the index of admin
Route::get('admin/users', 'UsersController@index')->name('admin.users');
Route::post('admin/users/store', 'UsersController@store')->name('admin.users.store');

});



Route::get('/home', 'HomeController@index')->name('home');
