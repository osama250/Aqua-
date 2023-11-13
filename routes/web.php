<?php

use App\Http\Controllers\AdminPanel\AboutUsController;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\AdminPanel\AuthController;
use App\Http\Controllers\AdminPanel\ContactUsController;
use App\Http\Controllers\AdminPanel\CouponController;
use App\Http\Controllers\AdminPanel\PermessionController;
use App\Http\Controllers\AdminPanel\RoleController;
use App\Http\Controllers\AdminPanel\SettingController;
use App\Http\Controllers\AdminPanel\SliderController;
use App\Http\Controllers\AdminPanel\SocialController;
use App\Http\Controllers\AdminPanel\UserController;
use App\Http\Controllers\AdminPanel\GalleryController;
// use App\Http\Controllers\AdminPanel\PageController;
use App\Http\Controllers\AdminPanel\FaciliteController;
use App\Http\Controllers\AdminPanel\ImageController;
use App\Http\Controllers\AdminPanel\SideSeeingController;
use App\Http\Controllers\AdminPanel\SubscriberController;
use App\Http\Controllers\AdminPanel\NewsletterController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminPanel\CountryController;
use App\Http\Controllers\AdminPanel\PageController;
use App\Http\Controllers\AdminPanel\MetaController;
use App\Http\Controllers\AdminPanel\InfoController;
use App\Http\Controllers\AdminPanel\DeckController;
use App\Http\Controllers\AdminPanel\PartnerController;
use App\Http\Controllers\AdminPanel\TripCategoryController;
use App\Http\Controllers\AdminPanel\TripController;
use App\Http\Controllers\AdminPanel\ReservationController;
use App\Http\Controllers\AdminPanel\AdditionalTripController;
use App\Http\Controllers\AdminPanel\ItineraryController;
use App\Http\Controllers\AdminPanel\ItineraryDetailController;
use App\Http\Controllers\AdminPanel\UniqueController;
use App\Http\Controllers\AdminPanel\OpenDateController;
use App\Http\Controllers\AdminPanel\InspirationController;
use App\Http\Controllers\AdminPanel\OverviewController;
use App\Http\Controllers\AdminPanel\DiningController;
use App\Http\Controllers\AdminPanel\ExperienceController;
use App\Http\Controllers\AdminPanel\CabinController;
use App\Http\Controllers\AdminPanel\CabinfeatureController;
use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\ConditionController;
use App\Http\Controllers\AdminPanel\InspirationDetailController;
use App\Http\Controllers\AdminPanel\EscapadeController;
use App\Http\Controllers\AdminPanel\EscapadeDetailController;
use App\Http\Controllers\AdminPanel\QuestionController;
use App\Http\Controllers\AdminPanel\ContactInfoController;
use App\Http\Controllers\AdminPanel\AttachmentController;
use App\Http\Controllers\AdminPanel\CabinSliderController;

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

Route::group(
    [
        'prefix'        => LaravelLocalization::setLocale(),
        'middleware'    => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::middleware(['guest'])->group(function () {
            Route::get('/', [AuthController::class, 'login'])->name('auth.login');
            Route::get('/login', [AuthController::class, 'postLogin'])->name('post.login');
        });

        Route::middleware('auth:web')->group(function () {
            Route::get('/dashboard', function () {
                return view('welcome');
            })->name('dashboard');

            Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
            Route::resource('admins', AdminController::class);
            Route::resource('role', RoleController::class);
            Route::resource('permessions', PermessionController::class);
            Route::resource('aboutus', AboutUsController::class);
            Route::resource('socials', SocialController::class);
            Route::resource('coupons', CouponController::class);
            Route::resource('users', UserController::class);
            Route::post('sendemail', [UserController::class,'sendEmail'])->name('users.sendemail');
            Route::resource('sliders', SliderController::class);
            Route::resource('settings', SettingController::class);
            Route::resource('galleries', GalleryController::class);
            Route::resource('contactus', ContactUsController::class);
            //Route::resource('pages', PageController::class);
            Route::resource('facilites', FaciliteController::class);
            Route::post('image/upload/{folder}',ImageController::class);
            Route::get('facilities/image/delete/{id}', [FaciliteController::class,'deletePhoto']);
            Route::resource('side-seeings', SideSeeingController::class);
            Route::get('sideseeing/image/delete/{id}', [SideSeeingController::class, 'deletePhoto']);
            Route::resource('subscribers', SubscriberController::class);
            Route::resource('newsletters', NewsletterController::class);

            Route::resource('countries' ,  CountryController::class );
            Route::resource('pages' ,  PageController::class  );
            Route::get('pages/image/delete/{id}', [ PageController::class, 'deletePhoto']);
            Route::resource('metas', MetaController::class);
            Route::resource('infos', InfoController::class);
            Route::resource('decks', DeckController::class);
            Route::resource('partners', PartnerController::class);
            Route::resource('trip-categories', TripCategoryController::class);
            Route::resource('trips', TripController::class);
            Route::resource('reservations', ReservationController::class);
            Route::resource('additional-trips', AdditionalTripController::class);
            Route::resource('itineraries', ItineraryController::class);
            Route::resource('itinerary-details',ItineraryDetailController::class);
            Route::resource('uniques', UniqueController::class );
            Route::resource('open-dates', OpenDateController::class);

            Route::resource('inspirations', InspirationController::class );
            Route::get('inspirations/image/delete/{id}', [ InspirationController::class, 'deletePhoto']);
            Route::resource('inspiration-details',InspirationDetailController::class);
            Route::get('inspirationsdetail/image/delete/{id}', [ InspirationDetailController::class, 'deletePhoto']);


            // ////////////////////////////////////////
            Route::resource('categories', CategoryController::class);
            Route::resource('overviews', OverviewController::class);
            Route::get('overview/image/delete/{id}', [ OverviewController::class, 'deletePhoto']);
            Route::resource('dinings', DiningController::class);
            Route::get('dinings/image/delete/{id}', [ DiningController::class, 'deletePhoto']);
            Route::resource('experiences', ExperienceController::class);
            Route::get('experiences/image/delete/{id}',[ ExperienceController::class ,'deletePhoto'] );

            Route::resource('cabins', CabinController::class);
            Route::get('cabins/image/delete/{id}', [ CabinController::class ,'deletePhoto'] );
            Route::resource('cabinfeatures', CabinfeatureController::class);
            Route::get('getFacilities', [ CabinController::class, 'getFacilities' ] );


            Route::resource('conditions', ConditionController::class);

            Route::resource('escapades', EscapadeController::class);
            Route::get('escapades/image/delete/{id}', [ EscapadeController::class ,'deletePhoto'] );

            Route::resource('escapade-details', EscapadeDetailController::class);
            Route::get('escapade-details/image/delete/{id}', [ EscapadeDetailController::class ,'deletePhoto'] );

            Route::resource('questions', QuestionController::class);
            Route::resource('contact-infos',ContactInfoController::class);
            Route::resource('attachments', AttachmentController::class);
            Route::resource('cabin-sliders', CabinSliderController::class);
        });
    }
);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');





// Route::resource('inspirations', App\Http\Controllers\InspirationController::class);

