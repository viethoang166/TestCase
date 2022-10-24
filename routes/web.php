<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CompareController;
//use App\Http\Controllers\layout\HomeController;
use App\Http\Controllers\layout\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UpdateUserController;
use App\Http\Controllers\layout\NewController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\MajorsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\StudyAbroadController;
use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\layout\ScholarshipsController;
use App\Http\Controllers\Admin\IntroductionSlideController;
use App\Http\Controllers\Admin\IntroductionAboutController;
use App\Http\Controllers\Admin\IntroductionVisionController;
use App\Http\Controllers\Admin\IntroductionRewardController;
use App\Http\Controllers\Admin\CoreValueController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\HistoryDetailController;



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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/introduction', [HomeController::class, 'introduction'])->name('introduction');

Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('news', NewsController::class);
    Route::resource('compare', CompareController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('country', CountryController::class);
    Route::resource('cities', CityController::class);
    Route::resource('feedback', FeedbackController::class);
    Route::put('/feedback/{id}/change-status', [FeedbackController::class, 'changeStatus'])->name('change-status-feedback');
    Route::resource('contact-info', ContactInfoController::class);
    Route::resource('schools', SchoolController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('level', LevelController::class);
    Route::resource('majors', MajorsController::class);
    Route::resource('scholarships', ScholarshipController::class);
    Route::resource('introduction-slide', IntroductionSlideController::class);
    Route::resource('introduction-about', IntroductionAboutController::class);
    Route::resource('introduction-vision', IntroductionVisionController::class);
    Route::resource('introduction-reward', IntroductionRewardController::class);
    Route::resource('core-value', CoreValueController::class);
    Route::resource('history', HistoryController::class);
    Route::resource('history-detail', HistoryDetailController::class);


    Route::get('/admin/news/page-filter', [NewsController::class, 'NewsFilteringadmin'])->name('newsfilteradmin');
});

Route::middleware('auth:web')->group(function () {
    Route::resource('users', UpdateUserController::class);
    Route::post('submit-feedback', [HomeController::class, 'storeFeedback'])->name('feedback.sumbit');
});
Route::get('/compare', [CompareController::class, 'index'])->name('compare');

Route::get('page/news/newspage', [NewController::class, 'index'])->name('newspage');
Route::get('/page/news/newspage/{id}', [NewController::class, 'news_detail'])->name('newspage_detail');
Route::get('page/service', [ServiceController::class, 'list'])->name('service');
Route::get('service/{id}', [ServiceController::class, 'post'])->name('service.post');

Auth::routes();

Route::get('/contact', [ContactController::class, 'index']);
Route::put('/change-status-service', [ServiceController::class, 'changeStatus'])->name('service.status.change');
Route::get('studyabroad/{countryCode}', [StudyAbroadController::class, 'showCountry'])->name('studyabroad');
Route::get('/form', [CountryController::class,'showForm']);
Route::post('/showCitiesInCountry', [CityController::class,'showCitiesInCountry']);
Route::put('/change-active-customer', [CustomerController::class, 'changeActive'])->name('customerAdmin.active');
Route::put('/change-active-user', [UserController::class, 'changeActive'])->name('userAdmin.active');
Route::put('change-status-contactinfo/{id}', [ContactInfoController::class, 'changeStatus'])->name('change-status-contactinfo');
Route::post('/storeContactInfo', [HomeController::class, 'storeContactInfo'])->name('storeContactInfo');
Route::get('/schools/index-filer', [SchoolController::class, 'indexFiltering'])->name('filter');
Route::put('/change-status-news', [NewsController::class, 'changeStatus'])->name('news.status');
Route::get('/news/page-filter', [NewController::class, 'NewsFiltering'])->name('newsfilter');
Route::put('/change-status-scholarship', [ScholarshipController::class, 'changeStatus'])->name('scholarships.status');
Route::get('scholarship/{countryCode}', [ScholarshipsController::class, 'showCountry'])->name('scholarship');



