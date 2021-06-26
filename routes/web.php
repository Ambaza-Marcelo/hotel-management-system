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

/*Route::get('/', function () {
    return view('welcome');
    */

Route::get('/', 'WelcomeController@home')->name('home');

Route::post('site/subscribe','WelcomeController@subscribe')
        ->name('site.subscribe');
Route::get('/faq', 'WelcomeController@faq')->name('site.faq_view');

Route::get('/gallery', 'WelcomeController@gallery')->name('site.gallery_view');
Route::get('/contact-us', 'WelcomeController@contactUs')->name('site.contact_us_view');
Route::post('/contact-us', 'WelcomeController@contactUs')->name('site.contact_us_form');
Route::get('/room-list','WelcomeController@room');
Route::get('/drink-list','WelcomeController@drink');
Route::get('/event-available','WelcomeController@event');

Auth::routes();

Route::get('images-list','FileController@index');

Route::middleware(['auth', 'master'])->group(function () {
    Route::get('/masters', 'MasterController@index')->name('masters.index');
    Route::resource('/hotels', 'HotelController')->only(['index', 'edit', 'store', 'update']);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'customer'])->prefix('grades')->group(function () {
  
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

    //site web routes
     


    Route::get('/site/dashboard', 'SiteController@dashboard')
        ->name('site.dashboard');
    Route::get('slider/index','SliderController@index')
        ->name('slider.index');
    Route::get('slider/create','SliderController@create')
        ->name('slider.create');
    Route::post('slider/store','SliderController@store')
        ->name('slider.store');
    Route::get('slider/edit','SliderController@edit')
        ->name('slider.edit');
    Route::post('slider/update','SliderController@update')
        ->name('slider.update');
    Route::post('slider/destroy','SliderController@destroy')
        ->name('slider.destroy');
    Route::get('site/service','SiteController@serviceContent')
        ->name('site.service');
    Route::post('site/service','SiteController@serviceContent')
        ->name('site.service');


    Route::get('site/subscribe','SiteController@subscribe')
        ->name('site.subscribe');
    Route::get('site/gallery','SiteController@gallery')
        ->name('site.gallery');
    Route::get('site/gallery/add-image','SiteController@galleryAdd')
        ->name('site.gallery_image');
    Route::post('site/gallery/add-image','SiteController@galleryAdd')
        ->name('site.gallery_image');
    Route::post('site/gallery/delete-images/{id}','SiteController@galleryDelete')
        ->name('site.gallery_image_delete');
    Route::get('site/contact-us','SiteController@contactUs')
        ->name('site.contact_us');
    Route::post('site/contact-us','SiteController@contactUs')
        ->name('site.contact_us');
    Route::get('site/fqa','SiteController@faq')
        ->name('site.faq');
    Route::post('site/fqa','SiteController@faq')
        ->name('site.faq');
    Route::post('site/faq/{id}','SiteController@faqDelete')
        ->name('site.faq_delete');
    Route::get('site/settings','SiteController@settings')
        ->name('site.settings');
    Route::post('site/settings','SiteController@settings')
        ->name('site.settings');
    Route::resource('room','RoomController');
    Route::resource('command-food','CommandFoodController');
    Route::resource('command-drink','CommandDrinkController');
    Route::resource('event','EventController');
    Route::resource('point-keys','PointKeyController');
  
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
    Route::post('hotels-store','HotelController@store')->name('hotels.store');
    Route::get('hotels-create','HotelController@create')->name('hotels.create');
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

