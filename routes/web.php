<?php

use App\Http\Controllers\blade\AskForServiceController;
use App\Http\Controllers\blade\GuestMessageController;
use App\Http\Controllers\blade\ImagesConfigController;
use App\Http\Controllers\blade\PagesImagesController;
use App\Http\Controllers\blade\PagesTextsController;
use App\Http\Controllers\blade\ProductController;
use App\Http\Controllers\blade\ProductGalleryController;
use App\Http\Controllers\blade\ProductServiceController;
use App\Http\Controllers\blade\UserController;
use App\Http\Controllers\blade\VacancyController;
use App\Http\Controllers\blade\VacancyCriteraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ChangepasswordController;
use App\Http\Controllers\blade\EmployeeController;
use App\Http\Controllers\blade\ClientController;
use App\Http\Controllers\blade\PartnerController;
use App\Http\Controllers\blade\TechnologyController;
use App\Http\Controllers\blade\ServiceController;
use App\Http\Controllers\blade\ServiceTechController;
use App\Http\Controllers\blade\ProjectController;
use App\Http\Controllers\blade\ServiceProjectController;
use App\Http\Controllers\blade\EmployeeProjectController;
use App\Http\Controllers\blade\ProjectGalleryController;
use App\Http\Controllers\blade\CaseStudyController;
use App\Http\Controllers\blade\CaseAttachmentController;
use App\Http\Controllers\blade\CaseStudyChartController;
use App\Http\Controllers\blade\ConfigController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ChangepasswordController
Route::get('/user/change/password',[ChangepasswordController::class, 'password'])->name('password');
Route::post('/user/change/password',[ChangepasswordController::class, 'change_password'])->name('change_password');

//EmployeeController
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('store_employee');
Route::get('/employee/add', [EmployeeController::class, 'add'])->name('add_employee');
Route::get('/employees', [EmployeeController::class, 'all'])->name('all_employee');
Route::get('/employee/edit/{id}',[EmployeeController::class, 'edit'])->name('edit_employee');
Route::post('/employee/edit/{id}',[EmployeeController::class, 'update'])->name('edit_o_employee');
Route::get('/employee/delete/{id}',[EmployeeController::class, 'delete'])->name('delete_employee');

//ClientController
Route::post('/client/store', [ClientController::class, 'store'])->name('store_client');
Route::get('/client/add', [ClientController::class, 'add'])->name('add_client');
Route::get('/clients', [ClientController::class, 'all'])->name('all_client');
Route::get('/client/edit/{id}',[ClientController::class, 'edit'])->name('edit_client');
Route::post('/client/edit/{id}',[ClientController::class, 'update'])->name('edit_o_client');
Route::get('/client/delete/{id}',[ClientController::class, 'delete'])->name('delete_client');

//PartnerController
Route::post('/partner/store', [PartnerController::class, 'store'])->name('store_partner');
Route::get('/partner/add', [PartnerController::class, 'add'])->name('add_partner');
Route::get('/partners', [PartnerController::class, 'all'])->name('all_partner');
Route::get('/partner/edit/{id}',[PartnerController::class, 'edit'])->name('edit_partner');
Route::post('/partner/edit/{id}',[PartnerController::class, 'update'])->name('edit_o_partner');
Route::get('/partner/delete/{id}',[PartnerController::class, 'delete'])->name('delete_partner');
//TechnologyController
Route::post('/tech/store', [TechnologyController::class, 'store'])->name('store_tech');
Route::get('/tech/add', [TechnologyController::class, 'add'])->name('add_tech');
Route::get('/techs', [TechnologyController::class, 'all'])->name('all_tech');
Route::get('/tech/edit/{id}',[TechnologyController::class, 'edit'])->name('edit_tech');
Route::post('/tech/edit/{id}',[TechnologyController::class, 'update'])->name('edit_o_tech');
Route::get('/tech/delete/{id}',[TechnologyController::class, 'delete'])->name('delete_tech');

//ServiceController
Route::post('/service/store', [ServiceController::class, 'store'])->name('store_service');
Route::get('/service/add', [ServiceController::class, 'add'])->name('add_service');
Route::get('/services', [ServiceController::class, 'all'])->name('all_service');
Route::get('/service/edit/{id}',[ServiceController::class, 'edit'])->name('edit_service');
Route::post('/service/edit/{id}',[ServiceController::class, 'update'])->name('edit_o_service');
Route::get('/service/delete/{id}',[ServiceController::class, 'delete'])->name('delete_service');

//ServiceTechController
Route::post('/service/tech/store', [ServiceTechController::class, 'store'])->name('store_servicetech');
Route::get('/service/tech/add/{id}', [ServiceTechController::class, 'add'])->name('add_servicetech');
Route::get('/services/techs/{id}', [ServiceTechController::class, 'all_technology_for_service'])->name('all_servicetech');
Route::get('/service/tech/edit/{id}',[ServiceTechController::class, 'edit'])->name('edit_servicetech');
Route::post('/service/tech/edit/{id}',[ServiceTechController::class, 'update'])->name('edit_o_servicetech');
Route::get('/service/tech/delete/{id}',[ServiceTechController::class, 'delete'])->name('delete_servicetech');

//ProjectController
Route::post('/project/store', [ProjectController::class, 'store'])->name('store_project');
Route::get('/project/add', [ProjectController::class, 'add'])->name('add_project');
Route::get('/projects', [ProjectController::class, 'all'])->name('all_project');
Route::get('/project/edit/{id}',[ProjectController::class, 'edit'])->name('edit_project');
Route::post('/project/edit/{id}',[ProjectController::class, 'update'])->name('edit_o_project');
Route::get('/project/delete/{id}',[ProjectController::class, 'delete'])->name('delete_project');

//ServiceProjectController
Route::post('/service/project/store', [ServiceProjectController::class, 'store'])->name('store_serviceproject');
Route::get('/service/project/add/{id}', [ServiceProjectController::class, 'add'])->name('add_serviceproject');
Route::get('/services/projects/{id}', [ServiceProjectController::class, 'all_servie_for_project'])->name('all_serviceproject');
Route::get('/service/project/edit/{id}',[ServiceProjectController::class, 'edit'])->name('edit_serviceproject');
Route::post('/service/project/edit/{id}',[ServiceProjectController::class, 'update'])->name('edit_o_serviceproject');
Route::get('/service/project/delete/{id}',[ServiceProjectController::class, 'delete'])->name('delete_serviceproject');

//EmployeeProjectController
Route::post('/employee/project/store', [EmployeeProjectController::class, 'store'])->name('store_employeeproject');
Route::get('/employee/project/add/{id}', [EmployeeProjectController::class, 'add'])->name('add_employeeproject');
Route::get('/employees/projects/{id}', [EmployeeProjectController::class, 'all_servie_for_project'])->name('all_employeeproject');
Route::get('/employee/project/edit/{id}',[EmployeeProjectController::class, 'edit'])->name('edit_employeeproject');
Route::post('/employee/project/edit/{id}',[EmployeeProjectController::class, 'update'])->name('edit_o_employeeproject');
Route::get('/employee/project/delete/{id}',[EmployeeProjectController::class, 'delete'])->name('delete_employeeproject');

//ProjectGalleryController
Route::get('/project/gallery/all/{id}', [ProjectGalleryController::class, 'allimageforprojectid'])->name('allimageforprojectid');
Route::get('/project/gallery/add/{id}', [ProjectGalleryController::class, 'addwithprojectid'])->name('addwithprojectid');
Route::post('/project/gallery/store/', [ProjectGalleryController::class, 'storewithprojectid'])->name('storewithprojectid');
Route::get('/project/gallery/edit/{id}',[ProjectGalleryController::class, 'editimagewithprojectid'])->name('editimagewithprojectid');
Route::post('/project/gallery/edit/{id}',[ProjectGalleryController::class, 'updateimagewithprojectid'])->name('updateimagewithprojectid');
Route::get('/project/gallery/delete/{id}',[ProjectGalleryController::class, 'deletewithid']);//->name('deletewithid');

//CaseStudyController
Route::get('/casestudy/all/{id}', [CaseStudyController::class, 'allcaseforprojectid'])->name('allcaseforprojectid');
Route::get('/casestudy/add/{id}', [CaseStudyController::class, 'addwithprojectid'])->name('addcasewithprojectid');
Route::post('/casestudy/store/', [CaseStudyController::class, 'storewithprojectid'])->name('storecasewithprojectid');
Route::get('/casestudy/edit/{id}',[CaseStudyController::class, 'editcasewithprojectid'])->name('editcasewithprojectid');
Route::post('/casestudy/edit/{id}',[CaseStudyController::class, 'updatecasewithprojectid'])->name('updatecasewithprojectid');
Route::get('/casestudy/delete/{id}',[CaseStudyController::class, 'deletewithid']);//->name('deletewithid');

//CaseAttachmentController
Route::get('/caseatt/all/{id}', [CaseAttachmentController::class, 'allcaseattforcaseid'])->name('allcaseattforcaseid');
Route::get('/caseatt/add/{id}', [CaseAttachmentController::class, 'addwithcaseid'])->name('addwithcaseid');
Route::post('/caseatt/store/', [CaseAttachmentController::class, 'storewithcaseid'])->name('storewithcaseid');
Route::get('/caseatt/edit/{id}',[CaseAttachmentController::class, 'editcaseattwithcaseid'])->name('editcasewithcaseid');
Route::post('/caseatt/edit/{id}',[CaseAttachmentController::class, 'updatecaseattwithcaseid'])->name('updatecasewithcaseid');
Route::get('/caseatt/delete/{id}',[CaseAttachmentController::class, 'deletewithid']);//->name('deletewithid');

//CaseStudyChartController
Route::get('/casech/all/{id}', [CaseStudyChartController::class, 'allcasechforcaseid'])->name('allcasechforcaseid');
Route::get('/casech/add/{id}', [CaseStudyChartController::class, 'addwithcaseid'])->name('addwithcasechid');
Route::post('/casech/store/', [CaseStudyChartController::class, 'storewithcaseid'])->name('storewithcasechid');
Route::get('/casech/edit/{id}',[CaseStudyChartController::class, 'editcasechwithcaseid'])->name('editcasewithcasechid');
Route::post('/casech/edit/{id}',[CaseStudyChartController::class, 'updatecasechwithcaseid'])->name('updatecasewithcasechid');
Route::get('/casech/delete/{id}',[CaseStudyChartController::class, 'deletewithid']);//->name('deletewithchid');

//ConfigController
Route::post('/config/store', [ConfigController::class, 'store'])->name('store_config');
Route::get('/config/add', [ConfigController::class, 'add'])->name('add_config');
Route::get('/configs', [ConfigController::class, 'all'])->name('all_config');
Route::get('/config/edit/{id}',[ConfigController::class, 'edit'])->name('edit_config');
Route::post('/config/edit/{id}',[ConfigController::class, 'update'])->name('edit_o_config');
Route::get('/config/delete/{id}',[ConfigController::class, 'delete'])->name('delete_config');


//ProductController
Route::post('/product/store', [ProductController::class, 'store'])->name('store_product');
Route::get('/product/add', [ProductController::class, 'add'])->name('add_product');
Route::get('/products', [ProductController::class, 'all'])->name('all_product');
Route::get('/product/edit/{id}',[ProductController::class, 'edit'])->name('edit_product');
Route::post('/product/edit/{id}',[ProductController::class, 'update'])->name('edit_o_product');
Route::get('/product/delete/{id}',[ProductController::class, 'delete'])->name('delete_product');

//ProductGalleryController
Route::get('/product/gallery/all/{id}', [ProductGalleryController::class, 'allimageforproductid'])->name('allimageforproductid');
Route::get('/product/gallery/add/{id}', [ProductGalleryController::class, 'addwithproductid'])->name('addwithproductid');
Route::post('/product/gallery/store/', [ProductGalleryController::class, 'storewithproductid'])->name('storewithproductid');
Route::get('/product/gallery/edit/{id}',[ProductGalleryController::class, 'editimagewithproductid'])->name('editimagewithproductid');
Route::post('/product/gallery/edit/{id}',[ProductGalleryController::class, 'updateimagewithproductid'])->name('updateimagewithproductid');
Route::get('/product/gallery/delete/{id}',[ProductGalleryController::class, 'deletewithid']);//->name('deletewithid');

//ProductServiceController
Route::post('/service/product/store', [ProductServiceController::class, 'store'])->name('store_serviceproduct');
Route::get('/service/product/add/{id}', [ProductServiceController::class, 'add'])->name('add_serviceproduct');
Route::get('/services/products/{id}', [ProductServiceController::class, 'all_servie_for_product'])->name('all_serviceproduct');
Route::get('/service/product/edit/{id}',[ProductServiceController::class, 'edit'])->name('edit_serviceproduct');
Route::post('/service/product/edit/{id}',[ProductServiceController::class, 'update'])->name('edit_o_serviceproduct');
Route::get('/service/product/delete/{id}',[ProductServiceController::class, 'delete'])->name('delete_serviceproduct');


//ImagesConfigController
Route::post('/image/config/store', [ImagesConfigController::class, 'store'])->name('store_image_config');
Route::get('/image/config/add', [ImagesConfigController::class, 'add'])->name('add_image_config');
Route::get('/image/configs', [ImagesConfigController::class, 'all'])->name('all_image_config');
Route::get('/image/config/edit/{id}',[ImagesConfigController::class, 'edit'])->name('edit_image_config');
Route::post('/image/config/edit/{id}',[ImagesConfigController::class, 'update'])->name('edit_o_image_config');
Route::get('/image/config/delete/{id}',[ImagesConfigController::class, 'delete'])->name('delete_image_config');Route::get('/image/config/edit/{id}',[ImagesConfigController::class, 'edit'])->name('edit_image_config');

Route::get('/getfields/{table}',[ImagesConfigController::class, 'get_fields'])->name('get_fields');

//PagesTextsController
Route::post('/text/store', [PagesTextsController::class, 'store'])->name('store_text');
Route::get('/text/add', [PagesTextsController::class, 'add'])->name('add_text');
Route::get('/texts', [PagesTextsController::class, 'all'])->name('all_text');
Route::get('/text/edit/{id}',[PagesTextsController::class, 'edit'])->name('edit_text');
Route::post('/text/edit/{id}',[PagesTextsController::class, 'update'])->name('edit_o_text');
Route::get('/text/delete/{id}',[PagesTextsController::class, 'delete'])->name('delete_text');

//PagesImagesController
Route::post('/image/store', [PagesImagesController::class, 'store'])->name('store_image');
Route::get('/image/add', [PagesImagesController::class, 'add'])->name('add_image');
Route::get('/images', [PagesImagesController::class, 'all'])->name('all_image');
Route::get('/image/edit/{id}',[PagesImagesController::class, 'edit'])->name('edit_image');
Route::post('/image/edit/{id}',[PagesImagesController::class, 'update'])->name('edit_o_image');
Route::get('/image/delete/{id}',[PagesImagesController::class, 'delete'])->name('delete_image');


//VacancyController
Route::post('/vacancy/store', [VacancyController::class, 'store'])->name('store_vacancy');
Route::get('/vacancy/add', [VacancyController::class, 'add'])->name('add_vacancy');
Route::get('/vacancies', [VacancyController::class, 'all'])->name('all_vacancy');
Route::get('/vacancy/edit/{id}',[VacancyController::class, 'edit'])->name('edit_vacancy');
Route::post('/vacancy/edit/{id}',[VacancyController::class, 'update'])->name('edit_o_vacancy');
Route::get('/vacancy/delete/{id}',[VacancyController::class, 'delete'])->name('delete_vacancy');
Route::get('/vacancy/applications/{id}',[VacancyController::class, 'applications']);
Route::post('/vacancy/applications/update/{id}',[VacancyController::class, 'status_update']);
Route::get('/vacancy/applications/details/{id}',[VacancyController::class, 'application_details']);

//VacancyCriteraController
Route::get('/vacancy/critera/all/{id}', [VacancyCriteraController::class, 'allcriteraforvacancyid'])->name('allimageforvacancyid');
Route::get('/vacancy/critera/add/{id}', [VacancyCriteraController::class, 'addwithvacancyid'])->name('addwithvacancyid');
Route::post('/vacancy/critera/store/', [VacancyCriteraController::class, 'storewithvacancyid'])->name('storewithvacancyid');
Route::get('/vacancy/critera/edit/{id}',[VacancyCriteraController::class, 'editcriterawithvacancyid'])->name('editimagewithvacancyid');
Route::post('/vacancy/critera/edit/{id}',[VacancyCriteraController::class, 'updatecriterawithvacancyid'])->name('updateimagewithvacancyid');
Route::get('/vacancy/critera/delete/{id}',[VacancyCriteraController::class, 'deletewithid']);//->name('deletewithid');



//GuestMessageController
Route::get('/guestmessages', [GuestMessageController::class, 'all'])->name('all_guestmessage');
Route::post('/guestmessage/edit/{id}',[GuestMessageController::class, 'update']);
Route::get('/guestmessage/delete/{id}',[GuestMessageController::class, 'delete'])->name('delete_guestmessage');


//UserController
Route::get('/users', [UserController::class, 'all'])->name('all_user');
Route::post('/user/edit/{id}',[UserController::class, 'update']);
Route::get('/user/view/{id}',[UserController::class, 'view']);
Route::get('/user/application/{id}',[UserController::class, 'application']);

//GuestMessageController
Route::get('/askforservices', [AskForServiceController::class, 'all'])->name('all_askforservices');




Route::get('/{any}', function(){
    //return view('about');//pointing to the index file of the frontend
    return file_get_contents(public_path().'/index.html');
 })->where('any', '^(?!user|api)$');