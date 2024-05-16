<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\ForgetPasswordController;
use App\Http\Controllers\API\Auth\ResetPasswordController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\WorkersController;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\OrdersController;
use App\Http\Controllers\API\SettingsController;
use App\Http\Controllers\API\PilesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('social-auth', [AuthController::class, 'socialAuth']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('logout', [AuthController::class, 'logOut']);
    Route::get('states', [AuthController::class, 'states']);
    Route::get('religions', [AuthController::class, 'religions']);

    Route::post('verify-reset-code', [ForgetPasswordController::class, 'verifyResetCode']);
    Route::post('send-reset-code', [ForgetPasswordController::class, 'sendResetCode']);
    Route::post('resend-reset-code', [ForgetPasswordController::class, 'sendResetCode']);
    Route::post('reset-password', [ResetPasswordController::class, 'setNewPassword']);
});

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'getProfile']);
    Route::post('/', [ProfileController::class, 'updateProfile']);
    Route::post('/update-password', [ProfileController::class, 'updatePassword']);
});

Route::prefix('folders')->group(function () {
    Route::get('/my-folders', [ProfileController::class, 'myFolders']);
    Route::post('/create-folder', [ProfileController::class, 'createFolder']);
    Route::post('/delete-folder', [ProfileController::class, 'deleteFolder']);
});




Route::prefix('orders')->group(function () {
    Route::post('/create', [OrdersController::class, 'makeOrder']);
    Route::get('/', [OrdersController::class, 'getOrders']);
    Route::get('/{order_id}', [OrdersController::class, 'getOrder']);
 });



Route::prefix('settings')->group(function () {
    Route::post('contact', [SettingsController::class, 'contact']);
    Route::get('contact-info', [SettingsController::class, 'contactInfo']);
    Route::get('socials-links', [SettingsController::class, 'socialsLinks']);
    Route::get('my-notifications', [SettingsController::class, 'myNotifications']);
    Route::get('read-notifications', [SettingsController::class, 'readNotifications']);
    Route::get('about-us', [SettingsController::class, 'aboutUs']);
    Route::get('terms-conditions', [SettingsController::class, 'termsConditions']);
});
