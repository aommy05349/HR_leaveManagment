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
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('logout', 'Auth\LoginController@logout');

// password reset 
route::get('password/reset/{token?}','Auth\ResetPasswordController@showResetForm');
route::post('password/reset','Auth\ResetPasswordController@reset');
route::post('password/email','Auth\ResetPasswordController@sendResetLinkEmail');
route::get('password/reset','Auth\ResetPasswordController@resetPass');


route::get('users/data','UserController@data');
route::post('uploadimage','UserController@uploadImage');
route::get('deleteImg/{id}','UserController@deleteAvatar');

route::resource('user','UserController');


route::post('/uploadLeaveFile','LeaveController@uploadLeaveFile');
route::put('/diffdays/{id}','LeaveController@storeDiffDate');
route::get('/leaves/data','LeaveController@data');
route::put('/leave/{id}','LeaveController@updateTotalLeave');
route::resource('/leave/','LeaveController');

route::post('uploadfile','LeaveController@uploadfile');

route::put('/leaveApp1/{id}','LeaveAppController@leavesReject');
route::put('/leaveApp/{id}','LeaveAppController@leavesAccept');
route::put('/sendMailtoApprove','LeaveAppController@sendMailtoApprove');

route::get('/leaveApp/data','LeaveAppController@data');
route::resource('/leaveApp','LeaveAppController');

route::get('/deleteProfile/{id}','ProfileController@deleteProfile');
route::post('/uploadprofile','ProfileController@uploadprofile');
route::get('/profile/{id}','ProfileController@manageProfile');
route::resource('/profile','ProfileController');
/*
|--------------------------------------------------------------------------
| server 
|--------------------------------------------------------------------------
|
*/


        //Clear Cache facade value:
        Route::get('clear-cache', function() {
            $exitCode = Artisan::call('cache:clear');
            return '<h1>Cache facade value cleared</h1>';
        });

        //Reoptimized class loader:
        Route::get('optimize', function() {
            $exitCode = Artisan::call('optimize');
            return '<h1>Reoptimized class loader</h1>';
        });

        //Route cache:
        Route::get('route-cache', function() {
            $exitCode = Artisan::call('route:cache');
            return '<h1>Routes cached</h1>';
        });

        //Clear Route cache:
        Route::get('route-clear', function() {
            $exitCode = Artisan::call('route:clear');
            return '<h1>Route cache cleared</h1>';
        });

        //Clear View cache:
        Route::get('view-clear', function() {
            $exitCode = Artisan::call('view:clear');
            return '<h1>View cache cleared</h1>';
        });

        //Clear Config cache:
        Route::get('config-cache', function() {
            $exitCode = Artisan::call('config:cache');
            return '<h1>Clear Config cleared</h1>';
        });

        //Migrate Database
        Route::get('migrate', function() {
            $exitCode = Artisan::call('migrate');
            return '<h1>Migrated</h1>';
        });

        

         //Link storage to public folder
         Route::get('storage-link', function() {
            $exitCode = Artisan::call('storage:link');
            return '<h1>Linked</h1>';
        });

        //Link storage to public folder
        Route::get('db-seeder', function() {
            $exitCode = Artisan::call('db:seed');
            return '<h1>Linked</h1>';
        });

        
