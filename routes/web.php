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

Route::get('/welcome-page','WelcomeController@home')->name('welcome-page');

Route::post('site/subscribe','WelcomeController@subscribe')
        ->name('site.subscribe');
Route::get('/faq', 'WelcomeController@faq')->name('site.faq_view');

Route::get('/gallery', 'WelcomeController@gallery');
Route::get('/contact-us', 'WelcomeController@contactUs')->name('site.contact_us_view');
Route::post('/contact-us', 'WelcomeController@contactUs')->name('site.contact_us_form');
Route::get('/events','WelcomeController@event');
Route::get('/rooms','WelcomeController@room');
Route::get('/restaurations','WelcomeController@restauration');
Route::get('/news','WelcomeController@news');

Auth::routes();

Route::get('images-list','FileController@index');


Route::middleware(['auth', 'master'])->group(function () {
    Route::get('/masters', 'MasterController@index')->name('masters.index');
    Route::resource('/hotels', 'HotelController')->only(['index', 'edit', 'store', 'update']);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'customer'])->prefix('grades')->group(function () {
  
});

Route::middleware(['auth'])->group(function () {
    Route::get('user/config/change_password', 'UserController@changePasswordGet');
    Route::post('user/config/change_password', 'UserController@changePasswordPost');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::get('admin/images','FileController@create');
    Route::post('file','FileController@store');
    

    //Route::get('admin/report','ReportController@create');
    //Route::post('admin/report','ReportController@store');

    Route::resource('categories','CategoryController');

    Route::get('admin/videos','VideoController@create');
    Route::post('admin/videos','VideoController@store');

    Route::resource('plannings','PlanningController');\
    Route::resource('abouts','AboutController');
    Route::resource('employees','EmployeeController');
    Route::resource('leaves','LeaveController');

    //stock

    Route::resource('product','ProductController');
    Route::resource('expenses','ExpenseController');
   // Route::delete('expense-delete/{id}','ExpenseController@destroy')->name('expense-delete');
   // Route::resource('incomes','IncomeController');

    //sale
    Route::get('add-sale','SaleController@addSale');
    Route::post('process-sale','SaleController@processSale')->name('store-sale');
    Route::get('list-sales','SaleController@listSale');

    //report bar
    Route::get('report-bar-list','ReportController@index')->name('report-bar-list');
    Route::get('report-bar-create','ReportController@create')->name('report-bar-create');
    Route::get('report-bar-edit/{id}','ReportController@edit')->name('report-bar-edit');
    Route::post('report-bar-store','ReportController@store')->name('report-bar-store');
    Route::put('report-bar-update/{id}','ReportController@update')->name('report-bar-update');
    Route::delete('report-bar-destroy/{id}','ReportController@destroy')->name('report-bar-destroy');
    Route::get('report-create-pdf','ReportController@createPDF');
    Route::get('report-day-create-pdf','ReportController@createPDFDay');
    Route::get('report-month-create-pdf','ReportController@createPDFMonth');

     //report kitchen
    Route::get('report-kitchen-list','KitchenController@index')->name('report-kitchen-list');
    Route::get('report-kitchen-create','KitchenController@create')->name('report-kitchen-create');
    Route::get('report-kitchen-edit/{id}','KitchenController@edit')->name('report-kitchen-edit');
    Route::post('report-kitchen-store','KitchenController@store')->name('report-kitchen-store');
    Route::put('report-kitchen-update/{id}','KitchenController@update')->name('report-kitchen-update');
    Route::delete('report-kitchen-destroy/{id}','KitchenController@destroy')->name('report-kitchen-destroy');

    //site web routes
     
    Route::get('/site/dashboard', 'SiteController@dashboard')
        ->name('site.dashboard');
    Route::get('sliders/index','SliderController@index')
        ->name('sliders.index');
    Route::get('sliders/create','SliderController@create')
        ->name('sliders.create');
    Route::post('sliders/store','SliderController@store')
        ->name('sliders.store');
    Route::get('sliders/edit/{id}','SliderController@edit')
        ->name('sliders.edit');
    Route::put('sliders/update/{id}','SliderController@update')
        ->name('sliders.update');
    Route::delete('sliders/destroy/{id}','SliderController@destroy')
        ->name('sliders.destroy');
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
    Route::delete('site/gallery/delete-images/{id}','SiteController@galleryDelete')
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
    
    Route::get('events/index','EventController@index')->name('events.index');
    Route::get('events/create','EventController@create')->name('events.create');
    Route::get('events/edit/{id}','EventController@edit')->name('events.edit');
    Route::post('events/store','EventController@store')->name('events.store');
    Route::put('events/update/{id}','EventController@update')->name('events.update');
    Route::delete('events/destroy/{id}','EventController@destroy')->name('events.destroy');

    Route::resource('point-keys','PointKeyController');


    Route::get('admin/room/list','RoomController@index')->name('admin-room-list');
    Route::get('admin/room/create','RoomController@create')->name('admin-room-create');
    Route::get('admin/room/edit/{id}','RoomController@edit')->name('admin-room-edit');
    Route::post('admin/room/store','RoomController@store')->name('admin-room-store');
    Route::put('admin/room/update/{id}','RoomController@update')->name('admin-room-update');
    Route::delete('admin/room/destroy/{id}','RoomController@destroy')->name('admin-room-destroy');

    Route::get('admin/restauration/list','RestaurationController@index')->name('admin-restauration-list');
    Route::get('admi/restauration/create','RestaurationController@create')->name('admin-restauration-create');
    Route::get('admi/restauration/edit/{id}','RestaurationController@edit')->name('admin-restauration-edit');
    Route::post('admin/restauration/store','RestaurationController@store')->name('admin-restauration-store');
    Route::put('admin/restauration/update/{id}','RestaurationController@update')->name('admin-restauration-update');
    Route::delete('admin/restauration/destroy/{id}','RestaurationController@destroy')->name('admin-restauration-destroy');

    Route::get('admin/news/list','NewsController@index')->name('admin-news-list');
    Route::get('admin/news/create','NewsController@create')->name('admin-news-create');
    Route::get('admin/news/edit/{id}','NewsController@edit')->name('admin-news-edit');
    Route::post('admin/news/store','NewsController@store')->name('admin-news-store');
    Route::put('admin/news/update/{id}','NewsController@update')->name('admin-news-update');
    Route::delete('admin/news/destroy/{id}','NewsController@destroy')->name('admin-news-destroy');



    //caissier 
    Route::get('register/accountant', function () {
        session([
        'register_role' => 'accountant',
        ]);

        return redirect()->route('register');
    });

    Route::post('register/accountant', 'UserController@storeAccountant');

    //technician

    Route::get('register/technician', function () {
        session([
        'register_role' => 'technician',
        ]);

        return redirect()->route('register');
    });

    Route::post('register/technician','UserController@storeTechnician');
  
});


//auth accountant

Route::middleware(['auth', 'accountant'])->group(function () {
    Route::resource('product','ProductController');
    Route::resource('expenses','ExpenseController');
    Route::resource('incomes','IncomeController');

    //sale
    Route::get('add-sale','SaleController@addSale');
    Route::post('process-sale','SaleController@processSale')->name('store-sale');
    Route::get('list-sales','SaleController@listSale');

    //report bar
    Route::get('report-bar-list','ReportController@index')->name('report-bar-list');
    Route::get('report-bar-create','ReportController@create')->name('report-bar-create');
    Route::get('report-bar-edit/{id}','ReportController@edit')->name('report-bar-edit');
    Route::post('report-bar-store','ReportController@store')->name('report-bar-store');
    Route::put('report-bar-update/{id}','ReportController@update')->name('report-bar-update');
    Route::post('report-bar-destroy/{id}','ReportController@destroy')->name('report-bar-destroy');

     //report kitchen
    Route::get('report-kitchen-list','KitchenController@index')->name('report-kitchen-list');
    Route::get('report-kitchen-create','KitchenController@create')->name('report-kitchen-create');
    Route::get('report-kitchen-edit/{id}','KitchenController@edit')->name('report-kitchen-edit');
    Route::post('report-kitchen-store','KitchenController@store')->name('report-kitchen-store');
    Route::put('report-kitchen-update/{id}','KitchenController@update')->name('report-kitchen-update');
    Route::post('report-kitchen-destroy/{id}','KitchenController@destroy')->name('report-kitchen-destroy');
});

//auth technician
Route::middleware(['auth', 'technician'])->group(function () {
    
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

    //report

    Route::get('master/report/bar','MasterController@reportListBar');
    Route::get('master/report/kitchen','MasterController@reportListKitchen');
    Route::get('master/report/expense','MasterController@reportExpense');
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

