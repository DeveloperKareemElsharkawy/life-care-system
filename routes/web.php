<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('/', [\App\Http\Controllers\Web\HomeController::class, 'home']);
Route::get('/ajax', [\App\Http\Controllers\Web\HomeController::class, 'ajax']);

//Route::post('/validate', [\App\Http\Controllers\Global\ValidationController::class, 'validateForm']);

Route::get('/contact', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('passport:install');

    return phpinfo();
});
