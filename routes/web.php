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

// route to show a specific user
Route::get('admin/users/{id}', 'UsersController@getUser')->name('admin.user');

// route to store user in db
Route::post('admin/users/store', 'UsersController@store')->name('admin.users.store');

// route to update user details
Route::put('admin/users/update/', 'UsersController@update')->name('admin.user.update');

// route to delete a user
Route::delete('admin/users/delete/{id}', 'UsersController@delete')->name('admin.user.delete');




});



Route::get('/home', 'HomeController@index')->name('home');
