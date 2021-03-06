<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdvController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\ContactMessageController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmailController;
use App\Http\Controllers\Backend\HomeAboutController;
use App\Http\Controllers\Backend\HomeSliderController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\PageTitleController;
use App\Http\Controllers\Backend\PhoneController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SocialMediaController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WorkingTimeController;
use Illuminate\Support\Facades\Auth;
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
//دا علشان يبغت ايميل تاكيد عند التسجيل
Auth::routes(['verify'=>true]);

Auth::routes();

Route::group(['prefix' => 'admin', 'as'=>'admin.' ], function(){

    Route::group(['middleware' => 'guest' ], function(){

        Route::get('/login',               [BackendController::class, 'login'    ])->name('login');
        Route::get('/forget_password',     [BackendController::class, 'forget_password'])->name('forget_password');
    });


        //==========================================================================================================
        Route::group(['middleware' => ['roles', 'role:superAdmin|admin|user'] ], function(){

            Route::get('/',               [BackendController::class, 'index'    ])->name('index_route');
            Route::get('/index',          [BackendController::class, 'index'    ])->name('index');
            /*  Country - State - City */
            Route::get('/getState',     [BackendController::class, 'get_state'    ])->name('backend.get_state');
            Route::get('/getCity',      [BackendController::class, 'get_city'    ])->name('backend.get_city');

            /*-------------------------------- */
            /*  Category   */
            Route::resource('categories',CategoryController::class);
            Route::post('/categories/removeImage', [CategoryController::class, 'removeImage'])->name('categories.removeImage');
            Route::post('categories/destroyAll', [CategoryController::class,'massDestroy'])->name('categories.massDestroy');
            Route::get('changeStatus', [CategoryController::class,'changeStatus'])->name('categories.changeStatus');

            /*  Tags   */
            Route::resource('tags',TagController::class);
            Route::post('tags-destroyAll', [TagController::class,'massDestroy'])->name('tags.massDestroy');
            Route::get('tags-changeStatus', [TagController::class,'changeStatus'])->name('tags.changeStatus');

            /*  Products   */
            Route::resource('products',ProductController::class);
            Route::post('products-removeImage', [ProductController::class, 'removeImage'])->name('products.removeImage');
            Route::post('products-destroyAll', [ProductController::class,'massDestroy'])->name('products.massDestroy');
            Route::get('products-changeStatus', [ProductController::class,'changeStatus'])->name('products.changeStatus');

            /*  Products   */
            Route::resource('bookings',BookingController::class);
            Route::get('bookings-pending', [BookingController::class, 'pending'])->name('bookings.pending');
            Route::get('bookings-comming', [BookingController::class, 'comming'])->name('bookings.comming');
            Route::get('bookings-finished', [BookingController::class, 'finished'])->name('bookings.finished');

            Route::post('bookings-removeImage', [BookingController::class, 'removeImage'])->name('bookings.removeImage');
            Route::post('bookings-destroyAll', [BookingController::class,'massDestroy'])->name('bookings.massDestroy');
            Route::get('bookings-changeStatus', [BookingController::class,'changeStatus'])->name('bookings.changeStatus');


            /*-------------------------------- */
            /*  Admins   */
            Route::resource('admins'    ,AdminController::class);
            Route::post('admins-removeImage', [AdminController::class,'removeImage'])->name('admins.removeImage');
            Route::get('admins-changeStatus', [AdminController::class,'changeStatus'])->name('admins.changeStatus');
            Route::post('admins-destroyAll', [AdminController::class,'massDestroy'])->name('admins.massDestroy');
            /*  Users   */
            Route::resource('users'    ,UserController::class);
            Route::post('users-removeImage', [UserController::class,'removeImage'])->name('users.removeImage');
            Route::get('users-changeStatus', [UserController::class,'changeStatus'])->name('users.changeStatus');
            Route::post('users-destroyAll', [UserController::class,'massDestroy'])->name('users.massDestroy');


            /*-------------------------------- */
            /*  advs   */
            Route::resource('advs'    ,AdvController::class);
            Route::post('advs-removeImage', [AdvController::class,'removeImage'])->name('advs.removeImage');
            Route::get('advs-changeStatus', [AdvController::class,'changeStatus'])->name('advs.changeStatus');
            Route::post('advsDestroyAll', [AdvController::class,'advsDestroyAll'])->name('advs.advsDestroyAll');


            /*-------------------------------- */
            /*  Customers   */
            Route::resource('customers'    ,CustomerController::class);
            Route::get('/getCustomerSearch',  [CustomerController::class, 'getCustomerSearch'    ])->name('customers.getCustomerSearch');
            Route::post('customers-removeImage', [CustomerController::class,'removeImage'])->name('customers.removeImage');
            Route::get('customers-changeStatus', [CustomerController::class,'changeStatus'])->name('customers.changeStatus');
            Route::post('customersDestroyAll', [CustomerController::class,'massDestroy'])->name('customers.customersDestroyAll');



            /*  countries   */
            Route::resource('countries'    ,CountryController::class);
            Route::get('countries-changeStatus', [CountryController::class,'changeStatus'])->name('countries.changeStatus');
            Route::post('countries-destroyAll', [CountryController::class,'massDestroy'])->name('countries.massDestroy');
            /*  countries   */
            Route::resource('states'    ,StateController::class);
            Route::get('states-changeStatus', [StateController::class,'changeStatus'])->name('states.changeStatus');
            Route::post('states-destroyAll', [StateController::class,'massDestroy'])->name('states.massDestroy');
            /*  countries   */
            Route::resource('cities'    ,CityController::class);
            Route::get('cities-changeStatus', [CityController::class,'changeStatus'])->name('cities.changeStatus');
            Route::post('cities-destroyAll', [CityController::class,'massDestroy'])->name('cities.massDestroy');


            /*  socials   */
            Route::resource('socials'    ,SocialMediaController::class);
            Route::get('socials-changeStatus', [SocialMediaController::class,'changeStatus'])->name('socials_changeStatus');
            Route::post('socials-destroyAll', [SocialMediaController::class,'massDestroy'])->name('socials.massDestroy');
            /*  phones   */
            Route::resource('phones'    ,PhoneController::class);
            Route::get('phones-changeStatus', [PhoneController::class,'changeStatus'])->name('phones.changeStatus');
            Route::post('phones-destroyAll', [PhoneController::class,'massDestroy'])->name('phones.massDestroy');
            /*  emails   */
            Route::resource('emails'    ,EmailController::class);
            Route::get('emails-changeStatus', [EmailController::class,'changeStatus'])->name('emails.changeStatus');
            Route::post('emails-destroyAll', [EmailController::class,'massDestroy'])->name('emails.massDestroy');


            /*  about   */
            Route::resource('abouts'    ,AboutController::class);
            Route::post('/abouts/removeImage', [AboutController::class,'removeImage'])->name('abouts.removeImage');
            Route::get('abouts-changeStatus', [AboutController::class,'changeStatus'])->name('abouts.changeStatus');
            Route::post('abouts-destroyAll', [AboutController::class,'massDestroy'])->name('abouts.massDestroy');

            //socials
            Route::resource('contact-messages',ContactMessageController::class);
            Route::get('contact-messages-changeStatus', [ContactMessageController::class,'changeStatus'])->name('contact-messages.changeStatus');
            Route::post('contact-messages-destroyAll', [ContactMessageController::class,'massDestroy'])->name('contact-messages.massDestroy');


            //Settings
            Route::resource('logos',LogoController::class);
            Route::get('logos-changeStatus', [LogoController::class,'changeStatus'])->name('logos.changeStatus');

            Route::resource('page-titles',PageTitleController::class);
            Route::get('page-titles-changeStatus', [PageTitleController::class,'changeStatus'])->name('page-titles.changeStatus');

            Route::resource('locations',LocationController::class);
            Route::get('locations-changeStatus', [LocationController::class,'changeStatus'])->name('locations.changeStatus');

            Route::resource('working_times',WorkingTimeController::class);
            Route::get('working_times-changeStatus', [WorkingTimeController::class,'changeStatus'])->name('working_times.changeStatus');



            //Todo:: Home
            //Slideer
            Route::resource('sliders',HomeSliderController::class);
            Route::post('/sliders/removeImage', [HomeSliderController::class,'removeImage'])->name('sliders.removeImage');
            Route::get('sliders-changeStatus', [HomeSliderController::class,'changeStatus'])->name('sliders.changeStatus');
            Route::post('sliders-destroyAll', [HomeSliderController::class,'massDestroy'])->name('sliders.massDestroy');

            //About Us
            Route::resource('home_abouts',HomeAboutController::class);
            Route::post('/home_abouts/removeImage', [HomeAboutController::class,'removeImage'])->name('home_abouts.removeImage');
            Route::get('home_abouts-changeStatus', [HomeAboutController::class,'changeStatus'])->name('home_abouts.changeStatus');
            Route::post('home_abouts-destroyAll', [HomeAboutController::class,'massDestroy'])->name('home_abouts.massDestroy');


        });

});
