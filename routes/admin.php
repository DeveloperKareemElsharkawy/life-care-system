<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CashUsersController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\WorkersController;
use App\Http\Controllers\Admin\NationalitiesController;
use App\Http\Controllers\Admin\WorkersArchivesController;
use App\Http\Controllers\Admin\UserArchivesController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\NationalityProcessStepController;
use App\Http\Controllers\Admin\OrdersArchivesController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Admin\SpecializationController;
use App\Http\Controllers\Admin\InsuranceCompanyController;
use App\Http\Controllers\Admin\InsuranceCompanyCategoriesController;
use App\Http\Controllers\Admin\SessionsController;


Route::controller(AuthController::class)->withoutMiddleware(['auth:admin'])->group(function () {
    Route::get('login', 'showLoginForm')->name('login.form');
    Route::post('login', 'authenticate')->name('login.submit');
    Route::get('logout', 'logout')->name('login.logout');
});

Route::get('/', [DashboardController::class, 'home'])->name('dashboard.home');
Route::get('/notifications', [DashboardController::class, 'notifications'])->name('dashboard.notifications');
Route::get('/send-notifications', [DashboardController::class, 'notificationsForm'])->name('dashboard.notifications_form');
Route::post('/send-notifications', [DashboardController::class, 'sendNotifications'])->name('dashboard.send_notification');
Route::get('/logout', [DashboardController::class, 'logout'])->name('dashboard.logout');
Route::get('/locale/{locale?}', [DashboardController::class, 'setLocale'])->name('locale');


Route::controller(RolesController::class)->prefix('roles')->name('roles.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{role_id}/edit', 'edit')->name('edit');
    Route::post('/{role_id}/update', 'update')->name('update');
});

Route::controller(AdminController::class)->prefix('system/users')->name('system.users.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{system_user_id}/edit', 'edit')->name('edit');
    Route::post('/{system_user_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});


Route::controller(CategoriesController::class)->prefix('categories')->name('categories.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{category_id}/edit', 'edit')->name('edit');
    Route::post('/{category_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(\App\Http\Controllers\Admin\SubCategoriesController::class)->prefix('sub-categories')->name('sub-categories.')->group(function () {
    Route::get('{category_id}/', 'index')->name('index');
    Route::get('{category_id}/create', 'create')->name('create');
    Route::post('{category_id}/store', 'store')->name('store');
    Route::get('{category_id}/{sub_category_id}/edit', 'edit')->name('edit');
    Route::post('{category_id}/{sub_category_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(InsuranceCompanyController::class)->prefix('insurance-companies')->name('insurance-companies.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{insurance_company_id}/edit', 'edit')->name('edit');
    Route::post('/{insurance_company_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
    Route::get('/get-price', 'getPrice')->name('get-price');
});

Route::controller(InsuranceCompanyCategoriesController::class)->prefix('insurance-company-categories')->name('insurance-company-categories.')->group(function () {
    Route::get('{insurance_company_id}/', 'index')->name('index');
    Route::post('/get-sub-category', 'getSubCategory')->name('get-sub-category');
    Route::get('{insurance_company_id}/create', 'create')->name('create');
    Route::post('{insurance_company_id}/store', 'store')->name('store');
    Route::get('{insurance_company_id}/{insurance_company_category_id}/edit', 'edit')->name('edit');
    Route::post('{insurance_company_id}/{insurance_company_category_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(SessionsController::class)->prefix('sessions')->name('sessions.')->group(function () {

    Route::get('/', 'index')->name('index');
    Route::get('/list/pending-sessions', 'pendingSessions')->name('pending-sessions');
    Route::get('/list/active-sessions', 'activeSessions')->name('active-sessions');
    Route::get('/list/missed-sessions', 'missedSessions')->name('missed-sessions');
    Route::get('/list/finished-sessions', 'finishedSessions')->name('finished-sessions');

    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{session_id}/edit', 'edit')->name('edit');
    Route::post('/{session_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
    Route::get('/{session_id}', 'show')->name('show');

    Route::post('/{session_id}/save-transaction', 'saveTransaction')->name('save-transaction');
    Route::post('/{session_id}/save-status', 'saveStatus')->name('save-status');
    Route::post('/{session_id}/fast-save-transaction', 'fastSaveAttendance')->name('fast-save-transaction');
    Route::post('/{session_id}/save-attendance', 'saveAttendance')->name('save-attendance');
    Route::post('/{session_id}/fast-save-attendance', 'fastSaveAttendance')->name('fast-save-attendance');

    Route::get('/get-doctor-profit-percentage', 'getDoctorProfitPercentage')->name('get-doctor-profit-percentage');
    Route::get('/global/get-user', 'getUser')->name('get-user');
    Route::get('/global/get-category-price', 'getCategoryPrice')->name('get-category-price');

});


Route::controller(\App\Http\Controllers\Admin\PaymentMethodsController::class)->prefix('payment-methods')->name('payment-methods.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{payment_method_id}/edit', 'edit')->name('edit');
    Route::post('/{payment_method_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(\App\Http\Controllers\Admin\PileTypesController::class)->prefix('pile-types')->name('pile-types.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{pile_type_id}/edit', 'edit')->name('edit');
    Route::post('/{pile_type_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(\App\Http\Controllers\Admin\StatesController::class)->prefix('states')->name('states.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{state_id}/edit', 'edit')->name('edit');
    Route::post('/{state_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(TagsController::class)->prefix('tags')->name('tags.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{tag_id}/edit', 'edit')->name('edit');
    Route::post('/{tag_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(\App\Http\Controllers\Admin\ItemsController::class)->prefix('items')->name('items.')->group(function () {
    Route::get('{pile_id}/', 'index')->name('index');
    Route::get('{pile_id}/create', 'create')->name('create');
    Route::post('{pile_id}/store', 'store')->name('store');
    Route::get('/{pile_id}/{item_id}/edit', 'edit')->name('edit');
    Route::post('/{pile_id}/{item_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(\App\Http\Controllers\Admin\CartController::class)->prefix('carts')->name('carts.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{cart_id}/edit', 'edit')->name('edit');
    Route::post('/{cart_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(\App\Http\Controllers\Admin\CartItemController::class)->prefix('cart-items')->name('cart-items.')->group(function () {
    Route::get('{cart_id}', 'index')->name('index');

});


Route::controller(UsersController::class)->prefix('contract-users')->name('contract-users.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
//    Route::get('/{user_id}', 'show')->name('show');
    Route::post('/store', 'store')->name('store');
    Route::get('/{user_id}/edit', 'edit')->name('edit');
    Route::post('/{user_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
    Route::get('/getDoctorExaminationPercentage', 'getDoctorExaminationPercentage')->name('get-doctor-examination-percentage');
    Route::get('/getCategoryPrice', 'getCategoryPrice')->name('get-category-price');
});

Route::controller(CashUsersController::class)->prefix('cash-users')->name('cash-users.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{user_id}', 'show')->name('show');
    Route::post('/store', 'store')->name('store');
    Route::get('/{user_id}/edit', 'edit')->name('edit');
    Route::post('/{user_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(SpecializationController::class)->prefix('specializations')->name('specializations.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{specialization_id}', 'show')->name('show');
    Route::post('/store', 'store')->name('store');
    Route::get('/{specialization_id}/edit', 'edit')->name('edit');
    Route::post('/{specialization_id}/update', 'update')->name('update');

    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(DoctorsController::class)->prefix('doctors')->name('doctors.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{user_id}', 'show')->name('show');
    Route::post('/store', 'store')->name('store');
    Route::get('/{doctor_id}/edit', 'edit')->name('edit');
    Route::post('/{doctor_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
    Route::get('/excel/download', 'excel')->name('excel');
});

Route::controller(\App\Http\Controllers\Admin\ExcelSheetController::class)->prefix('sheet')->name('sheet.')->group(function () {
    Route::get('supplies', 'supplies')->name('supplies');
    Route::get('download/supplies', 'downloadSupplies')->name('download-supplies');
    Route::get('download/monthly-supplies', 'downloadMonthlySupplies')->name('download-monthly-supplies');


    Route::get('client-debts', 'clientDebts')->name('client-debts');
    Route::get('download-client-debts', 'downloadClientDebts')->name('download-client-debts');

    Route::get('companies-debts', 'calculateCompaniesDebts')->name('companies-debts');
    Route::get('download/companies-debts', 'downloadCompaniesDebts')->name('download-companies-debts');
    Route::get('download/companies-daily-debts', 'downloadCompaniesDailyDebts')->name('download-companies-daily-debts');


    Route::get('attendees-list', 'attendeesList')->name('attendees-list');
    Route::get('download/attendees-list', 'downloadAttendeesList')->name('download-attendees-list');
    Route::get('download/monthly-attendees-list', 'downloadMonthlyAttendeesList')->name('download-monthly-attendees-list');
});

Route::controller(CountriesController::class)->prefix('countries')->name('countries.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{country_id}', 'show')->name('show');
    Route::get('/{country_id}/edit', 'edit')->name('edit');
    Route::post('/{country_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(OrdersController::class)->prefix('orders')->name('orders.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('{order_id}', 'show')->name('show');
    Route::post('/store', 'store')->name('store');
    Route::get('/{order_id}/edit', 'edit')->name('edit');
    Route::post('/{order_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});


Route::controller(NationalityProcessStepController::class)->prefix('nationality-process-steps')->name('nationality_process_steps.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{nationality_process_step_id}/edit', 'edit')->name('edit');
    Route::post('/{nationality_process_step_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(PagesController::class)->prefix('pages')->name('pages.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{page_id}/edit', 'edit')->name('edit');
    Route::post('/{page_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});


Route::controller(ContactsController::class)->prefix('contacts')->name('contacts.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::post('/reply/{contact_id}', 'reply')->name('reply');
    Route::get('/{contact_id}/edit', 'edit')->name('edit');
    Route::get('/{contact_id}', 'show')->name('show');
    Route::post('/{contact_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});

Route::controller(\App\Http\Controllers\Admin\ContactListController::class)->prefix('contacts-list')->name('contacts-list.')->group(function () {
    Route::get('{user_id}/', 'index')->name('index');
    Route::get('{user_id}/create', 'create')->name('create');
    Route::post('{user_id}/store', 'store')->name('store');
    Route::get('{user_id}/{contact_list_id}/edit', 'edit')->name('edit');
    Route::post('{user_id}/{contact_list_id}/update', 'update')->name('update');
    Route::get('/delete', 'destroy')->name('destroy');
});


Route::controller(SettingsController::class)->prefix('settings')->name('settings.')->group(function () {
    Route::get('admin', 'adminIndex')->name('admin.index');
    Route::post('admin', 'saveAdminSettings')->name('save-admin-settings');

    Route::get('app', 'appIndex')->name('app.index');
    Route::post('app', 'saveAppSettings')->name('save-app-settings');
});

Route::controller(ReportsController::class)->prefix('reports')->name('reports.')->group(function () {
    Route::get('orders', 'orders')->name('reports.orders');
    Route::get('clients', 'clients')->name('reports.clients');
    Route::get('top-workers', 'topWorkers')->name('reports.top_workers');
});



