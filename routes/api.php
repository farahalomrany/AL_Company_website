<?php

use App\Http\Controllers\api\AccContactController;
use App\Http\Controllers\api\AccDutyController;
use App\Http\Controllers\api\AccEducationController;
use App\Http\Controllers\api\AccController;
use App\Http\Controllers\api\AccExperienceController;
use App\Http\Controllers\api\AccLangController;
use App\Http\Controllers\api\AccountController;
use App\Http\Controllers\api\AccProjectController;
use App\Http\Controllers\api\AccSkillController;
use App\Http\Controllers\api\AskForServiceController;
use App\Http\Controllers\api\CaseStudyController;
use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\GuestMessageController;
use App\Http\Controllers\api\PagesTextsController;
use App\Http\Controllers\api\PartnerController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\ProjectController;
use App\Http\Controllers\api\ServiceController;
use App\Http\Controllers\api\PagesImagesController;
use App\Http\Controllers\api\VacAccController;
use App\Http\Controllers\api\VacancyController;
use App\Models\AccDuty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ClientController;
use App\Http\Controllers\api\ConfigController;
use App\Http\Controllers\api\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/email', [AuthController::class, 'sendCodeToEmail']);
Route::post('/check', [AuthController::class, 'checkCodeForEmail']);
Route::post('/reset_password', [AuthController::class, 'reset_password']);
Route::post('/verifyemail', [AuthController::class, 'emailverifycodecheck']);
Route::post('/guestmessage', [GuestMessageController::class, 'send']);
Route::post('/askservice', [AskForServiceController::class, 'send']);

//protected routes
Route::group(['middleware' => ['auth:sanctum','verified']], function () {
    // Route::get('/users/all', [AuthController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/changepassword', [AuthController::class, 'change_password']);


    //AccountController
    Route::get('/accounts', [AccountController::class, 'index']);
    Route::post('/account/add', [AccountController::class, 'add']);
    Route::post('/account/edit/{id}', [AccountController::class, 'edit']);

    //AccEducationController
    Route::post('/account/education/add', [AccEducationController::class, 'add']);
    Route::post('/account/education/edit/{id}', [AccEducationController::class, 'edit']);
    Route::post('/account/education/delete/{id}', [AccEducationController::class, 'delete']);

    //AccExperienceController
    Route::post('/account/experience/add', [AccExperienceController::class, 'add']);
    Route::post('/account/experience/edit/{id}', [AccExperienceController::class, 'edit']);
    Route::post('/account/experience/delete/{id}', [AccExperienceController::class, 'delete']);

    //AccSkillController
    Route::post('/account/skill/add', [AccSkillController::class, 'add']);
    Route::post('/account/skill/edit/{id}', [AccSkillController::class, 'edit']);
    Route::post('/account/skill/delete/{id}', [AccSkillController::class, 'delete']);

    //AccLangController
    Route::post('/account/lang/add', [AccLangController::class, 'add']);
    Route::post('/account/lang/edit/{id}', [AccLangController::class, 'edit']);
    Route::post('/account/lang/delete/{id}', [AccLangController::class, 'delete']);

    //AccContactController
    Route::post('/account/contact/add', [AccContactController::class, 'add']);
    Route::post('/account/contact/edit/{id}', [AccContactController::class, 'edit']);
    Route::post('/account/contact/delete/{id}', [AccContactController::class, 'delete']);

    //AccProjectController
    Route::post('/account/project/add', [AccProjectController::class, 'add']);
    Route::post('/account/project/edit/{id}', [AccProjectController::class, 'edit']);
    Route::post('/account/project/delete/{id}', [AccProjectController::class, 'delete']);

    //AccDutyController
    Route::post('/account/duty/add', [AccDutyController::class, 'add']);
    Route::post('/account/duty/edit/{id}', [AccDutyController::class, 'edit']);
    Route::post('/account/duty/delete/{id}', [AccDutyController::class, 'delete']);

    //VacAccController
    Route::get('/account/vacancy', [VacAccController::class, 'index']);
    Route::post('/account/vacancy/add', [VacAccController::class, 'add']);
    // Route::post('/account/vacancy/edit/{id}', [VacAccController::class, 'edit']);
    Route::post('/account/vacancy/delete/{id}', [VacAccController::class, 'delete']);

});




Route::get('/configs', [ConfigController::class, 'index']);
Route::get('/clients', [ClientController::class, 'index']);
Route::get('/partners', [PartnerController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/pagesimages', [PagesImagesController::class, 'index']);
Route::get('/pagestexts', [PagesTextsController::class, 'index']);
Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/project/technology/{id}', [ProjectController::class, 'project_tech']);

Route::get('/casestudy', [CaseStudyController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/vacancies', [VacancyController::class, 'index']);