<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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
URL::forceScheme('https');


Auth::routes();

Route::view('/', 'pages.index')->name('index');

Route::view('/dashboard', 'pages.dashboard.index')->name('dashboard')->middleware('auth');

Route::resource('image', ImageController::class)
                ->parameters([
                    'image' => 'image:token',
                ])
                ->except(['store', 'destroy', 'delete']);


Route::get('/debug', function()
{
    return sys_get_temp_dir();
});