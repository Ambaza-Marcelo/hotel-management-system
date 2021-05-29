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

Route::get('search','SearchController@index')->name('search');
Route::get('autocomplete','SearchController@autocomplete')->name('autocomplete');

});

Auth::routes();

Route::get('images-list','FileController@index');

Route::middleware(['auth', 'master'])->group(function () {
    Route::get('/masters', 'MasterController@index')->name('masters.index');
    Route::resource('/hotels', 'HotelController')->only(['index', 'edit', 'store', 'update']);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'customer'])->prefix('grades')->group(function () {
  
});


Route::middleware(['auth', 'accountant'])->prefix('fees')->name('fees.')->group(function () {
    
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::get('admin/images','FileController@create');
    Route::post('file','FileController@store');
    Route::get('user/config/change_password');
    

    Route::get('admin/report','ReportController@create');
    Route::post('admin/report','ReportController@store');

    Route::get('admin/videos','VideoController@create');
    Route::post('admin/videos','VideoController@store');
    Route::get('admin/slider/create','SliderController@create');
    Route::post('admin/slider/store','SliderController@Sliderstore');

    Route::resource('expenses','ExpenseController');
    Route::resource('incomes','IncomeController');
    Route::resource('foods','FoodController');
    Route::resource('drinks','DrinkController');
    Route::resource('plannings','PlanningController');\
    Route::resource('informations','InformationController');
    Route::resource('categories','CategoryController');
    Route::resource('abouts','AboutController');
    Route::resource('employees','EmployeeController');
    Route::resource('leaves','LeaveController');
  
});

Route::middleware(['auth', 'master'])->group(function () {
    Route::get('register/admin/{id}/{code}', function ($id, $code) {
        session([
        'register_role' => 'admin',
        'register_hotel_id' => $id,
        'register_hotel_code' => $code,
        ]);

        return redirect()->route('register');
    });
    Route::post('register/admin', 'UserController@storeAdmin');
    Route::get('master/activate-admin/{id}', 'UserController@activateAdmin');
    Route::get('master/deactivate-admin/{id}', 'UserController@deactivateAdmin');
    Route::get('hotel/admin-list/{hotel_id}', 'HotelController@show');
});



//use PDF;
Route::middleware(['auth', 'master.admin'])->group(function () {
    Route::get('edit/user/{id}', 'UserController@edit');
    Route::post('edit/user', 'UserController@update');
    Route::post('upload/file', 'UploadController@upload');
});


// View Emails - in browser
Route::prefix('emails')->group(function () {
    // Welcome Email
    Route::get('/welcome', function () {
        $user = App\User::find(1);
        $password = 'martial';

        return new App\Mail\SendWelcomeEmailToUser($user, $password);
    });
});

