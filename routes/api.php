<?php

use App\Http\Controllers\API\AboutUsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ContactUsAPIController;
use App\Http\Controllers\API\CouponController;
use App\Http\Controllers\API\FaciliteController;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\SideSeeingController;
use App\Http\Controllers\API\SliderController;
use App\Http\Controllers\API\SocialController;
use App\Http\Controllers\API\SubscriberController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\TripController;
use App\Http\Controllers\API\AdditionalTripsController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\ReservedController;
use App\Http\Controllers\API\NewsletterController;
use App\Http\Controllers\API\facilityController;
use App\Http\Controllers\API\InfosController;
use App\http\Controllers\API\ItineraryController;
use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\DeckController;
use App\Http\Controllers\API\MetasController;
use App\Http\Controllers\API\OpendareController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\InspirationController;
use App\Http\Controllers\API\InspirationDetailController;
use App\Http\Controllers\API\CategoryFacetlty;
use App\Http\Controllers\API\CabinController;
use App\Http\Controllers\API\ConditionController;
use App\Http\Controllers\API\DiningController;
use App\Http\Controllers\API\ExperienceController;
use App\http\Controllers\API\OverviewController;
use App\Http\Controllers\API\EscapadeController;
use App\Http\Controllers\API\EscapadeDetailController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\API\QuestionController;
use App\Http\Controllers\API\ContactInfoController;
use App\Http\Controllers\API\AttachmentController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//   New Api
// Route::get('trips', [ TripController::class , 'trips' ] );

// Route::get('additionalTrips',  [ AdditionalTripsController::class , 'additionalTrips' ] );
Route::get('countries', [ CountryController::class , 'countries' ] );
// Route::get('getReserved/{tripId}', [ ReservedController::class ,  'getReserved' ] );
// Route::post('addReservation', [ ReservedController::class  , 'addReservation' ] );
Route::get('newsletter', [ NewsletterController::class , 'newsletter' ] );
// Route::get('cabins', [ CabinController::class , 'cabins' ] );

Route::get('allcabins', [ CabinController::class , 'cabinsall' ] );
Route::get('cabins/{id}', [ CabinController::class , 'cabins' ] );
Route::get('cabinfeatures', [ CabinController::class , 'cabinfeatures' ] );


Route::get('facilities', [ facilityController::class , 'facilities' ] );
Route::get('categories', [ CategoryFacetlty::class , 'categories' ] );
Route::get('condtions', [ ConditionController::class , 'conditions' ] );


Route::get('infos', [ InfosController::class ,'infos' ] );
Route::get('itineraries', [ ItineraryController::class ,'itineraries' ] );
Route::get('pages/{id}', [ PageController::class , 'pages'] );
Route::get('decks', [ DeckController::class , 'decks' ] );
Route::get('dining', [ DiningController::class , 'dining' ] );
Route::get('experience', [ ExperienceController::class , 'experience' ] );
Route::get('overview', [ OverviewController::class , 'overview' ] );
Route::get('escapades', [ EscapadeController::class , 'escapades' ] );
Route::get('escapadesDetails', [ EscapadeDetailController::class , 'escapadesDetails' ] );




Route::get('inspirations', [ InspirationController::class , 'Inspirations' ] );
Route::get('inspirationsDetails', [ InspirationDetailController::class , 'InspirationsDetails' ] );



Route::get('metas',  [ MetasController::class   , 'metas' ] );
// Route::get('openDate', [ OpendareController::class , 'openDates' ] );
// Route::get('getCheckout/{reservationId}', [ CheckoutController::class , 'getCheckout' ] );
Route::get('homePage', [ HomeController::class , 'homePage' ] );

// Route::post('signup',[AuthController::class,'SignUp']);
// Route::post('verify',[AuthController::class,'verify']);
// Route::post('login', [AuthController::class, 'Login']);
// Route::post('forget-password', [AuthController::class, 'ForgetPassword']);
// Route::post('confirm-code', [AuthController::class, 'ConfrimCode']);
Route::get('about-us',[AboutUsController::class,'aboutus']);
Route::get('socials', [SocialController::class, 'socials']);
// Route::get('coupones', [CouponController::class, 'coupones']);
// Route::get('sliders', [SliderController::class, 'sliders']);

Route::get('settings', [SettingController::class, 'settings']);
Route::get('galleries', [GalleryController::class, 'galleries']);
Route::get('attachments', [ AttachmentController::class, 'attachments'] );

Route::get('questions',  [QuestionController::class, 'question']);


// Route::get('facilites', [FaciliteController::class, 'facilites']);
// Route::get('sideseeings', [SideSeeingController::class, 'sideSeeings']);

Route::post('contactus', [ContactUsAPIController::class,'store']);
Route::get('contact-info', [ ContactInfoController::class,'contactinfo']);
Route::post('subscribe',[SubscriberController::class,'subscribe']);


// Route::middleware(['auth:user','StatusMiddleware'])->group(function(){
//     Route::get('profile', [AuthController::class, 'Profile']);
//     Route::post('update-profile', [AuthController::class, 'UpdateProfile']);
//     Route::get('logout', [AuthController::class, 'Logout']);
//     Route::post('change-password', [AuthController::class, 'ChangePassword']);
// });
