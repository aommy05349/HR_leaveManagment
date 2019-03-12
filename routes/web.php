<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
});

//-----------------Route for admin------------------------

    Route::group(['prefix' => 'admin'], function(){
        Route::group(['middleware' => ['admin']], function(){
            Route::get('/dashboard', 'admin\AdminController@index');

 //------------- Admin Manage Employee--------------------------
            Route::get('/employee', 'admin\AdminController@empList');
            Route::get('/add_employee', 'admin\AdminController@storeEmployeeForm');
        });
    });
    
//Route for employee

    Route::group(['prefix' => 'employee'], function(){
        Route::group(['middleware' => ['employee']], function(){
            Route::get('/dashboard', 'employee\EmployeeController@index');
        });
    });
    
//Route for Project Owner

    Route::group(['prefix' => 'projectowner'], function(){
        Route::group(['middleware' => ['projectowner']], function(){
            Route::get('/dashboard', 'projectowner\ProjectOwnerController@index');
        });
    });

    
    
