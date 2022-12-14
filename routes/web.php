<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LawController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PpidController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\guest\HomeController;
use App\Http\Controllers\NewsVideoController;
use App\Http\Controllers\TextEditorController;
use App\Http\Controllers\InfographicController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\ServiceListController;
use App\Http\Controllers\ServiceProgramController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\guest\NewsGuestController;
use App\Http\Controllers\ContactController;

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

Route::get('/beranda', [HomeController::class,'home']);
Route::get('/profil/{profile:slug}',[HomeController::class,'profile'])->name('profile');
Route::get('/data/{data:slug}',[HomeController::class,'data'])->name('data');
Route::get('/law/{law:slug}',[HomeController::class,'law'])->name('law');
Route::get('/report/{report:slug}',[HomeController::class,'report'])->name('report');
Route::get('/info/{info:slug}',[HomeController::class,'info'])->name('info');
Route::get('/ppid/{ppid:slug}',[HomeController::class,'ppid'])->name('ppid');
Route::get('/download/{file}/{fileName}',[HomeController::class,'downloadFile'])->name('download.file');

Route::get('/berita',[NewsGuestController::class,'index'])->name('news.guest.index');
Route::get('/berita/kategori/{category:slug}',[NewsGuestController::class,'category'])->name('news.guest.category');
Route::get('/berita/{news:slug}',[NewsGuestController::class,'show'])->name('news.guest.show');

Route::get('login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class,'authenticate'])->name('login.auth');


Route::group(['prefix'=>'admin','middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class,'index']);
    Route::resource('banner', BannerController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('institution', InstitutionController::class);
    Route::resource('infographic', InfographicController::class);

    Route::resource('news', NewsController::class);
    Route::resource('category', CategoryController::class);

    Route::post('editor/fileUpload', [TextEditorController::class,'fileUpload'])->name('editor.fileUpload');
    Route::post('editor/fileDelete', [TextEditorController::class,'fileDelete'])->name('editor.fileDelete');

    Route::post('news/image/delete',[NewsController::class,'imageDelete'])->name('news.image.delete');

    Route::resource('newsVideo', NewsVideoController::class);
    Route::resource('user', UserController::class);

    // for landing page
    Route::resource('partner', PartnerController::class);
    Route::resource('about', AboutController::class);
    Route::resource('contact', ContactController::class);


    // menu
    Route::resource('company/profile',ProfileController::class);
    Route::resource('serviceProgram', ServiceProgramController::class);

    Route::get('serviceProgram/{serviceProgram}/list',[ServiceListController::class,'index'])->name('serviceList.index');
    Route::get('serviceProgram/{serviceProgram}/list/create',[ServiceListController::class,'create'])->name('serviceList.create');
    Route::post('serviceProgram/{serviceProgram}/list',[ServiceListController::class,'store'])->name('serviceList.store');
    Route::get('serviceProgram/list/edit/{serviceList}',[ServiceListController::class,'edit'])->name('serviceList.edit');
    Route::put('serviceProgram/list/{serviceList}',[ServiceListController::class,'update'])->name('serviceList.update');
    Route::delete('serviceProgram/list/{serviceList}',[ServiceListController::class,'destroy'])->name('serviceList.destroy');

    Route::get('download/servcieList/file/{serviceFile}', [ServiceListController::class,'download'])->name('serviceList.download');
    Route::post('serviceList/file/delete',[ServiceListController::class,'deleteFile'])->name('serviceList.file.delete');

    Route::resource('data',DataController::class);
    Route::get('download/data/file/{dataFile}', [DataController::class,'download'])->name('data.download');
    Route::post('data/file/delete',[DataController::class,'deleteFile'])->name('data.file.delete');

    Route::resource('law',LawController::class);
    Route::get('download/law/file/{lawFile}', [LawController::class,'download'])->name('law.download');
    Route::post('law/file/delete',[LawController::class,'deleteFile'])->name('law.file.delete');

    Route::resource('report',ReportController::class);
    Route::get('download/report/file/{reportFile}', [ReportController::class,'download'])->name('report.download');
    Route::post('report/file/delete',[ReportController::class,'deleteFile'])->name('report.file.delete');

    Route::resource('information',InformationController::class);
    Route::get('download/information/file/{infoFile}', [InformationController::class,'download'])->name('information.download');
    Route::post('information/file/delete',[InformationController::class,'deleteFile'])->name('information.file.delete');

    Route::resource('ppid',PpidController::class);
    Route::get('download/ppid/file/{ppidFile}', [PpidController::class,'download'])->name('ppid.download');
    Route::post('ppid/file/delete',[PpidController::class,'deleteFile'])->name('ppid.file.delete');

    Route::resource('user', UserController::class);

    // Data for chart
    Route::get('get-datachart-visitor', [DashboardController::class,'getDataChartVisitor'])->name('data.chart.visitor');
    Route::get('get-datachart-category', [DashboardController::class,'getDataChartCategory'])->name('data.chart.category');

    Route::post('logout',[LoginController::class,'logout'])->name('logout');
});

Route::get('getvisitors', [VisitorController::class,'getVisitor']);

