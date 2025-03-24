<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UsersController;
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



Route::get('/', function () {
return view('public_site.layouts.homepage');
});

Route::get('/about', function () {
    return view('public_site.layouts.aboutpage');
    });
    
    Route::get('/ourroom', function () {
        return view('public_site.layouts.roompage');
        });

        Route::get('/gallery', function () {
            return view('public_site.layouts.blogpage');
            });

            Route::get('/blog', function () {
                return view('public_site.layouts.blogpage');
                });

                Route::get('/contact', function () {
                    return view('public_site.layouts.contactpage');
                    });


                    Route::get('/dash', function () {
                        return view('dashborde.layouts.dashbord');
                    });


                    Route::resource('users', UsersController::class);

                    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');




                    // ..................................raneem....................................

                    Route::get('/booking', [AdminController::class,'booking']);
                    Route::get('/create_room', [AdminController::class,'create_room']);
                    Route::post('/add_room', [AdminController::class,'add_room']);
                    Route::get('/messages', [AdminController::class,'messages']);
                    Route::get('/send_email/{id}', [AdminController::class, 'send_email']);
                    Route::post('/mail/{id}', [AdminController::class,'mail']);
                    Route::get('/display_room', [AdminController::class,'display_room']);
                    Route::get('/room_delete/{id}', [AdminController::class,'room_delete']);
                    Route::get('/room_update/{id}', [AdminController::class,'room_update']);
                    Route::Post('/room_edit/{id}', [AdminController::class,'room_edit']);


                    // ............................................................................
                   

Route::get('/room_details/{id}',[HomeController::class,'room_details']);
Route::post('/add_booking/{id}',[HomeController::class,'add_booking']);
Route::get('/rooms', [HomeController::class, 'rooms'])->name('rooms');