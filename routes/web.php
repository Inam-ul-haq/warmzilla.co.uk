<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EdgeController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\FinishController;
use App\Http\Controllers\BoilertypeController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoilerBrandController;
use App\Http\Controllers\BoilerCategoryController;
use App\Http\Controllers\BoilerLocationController;
use App\Http\Controllers\BoilerLocationAreaController;

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

/* Clear Cache */ 
Route::get('/clear', function() { 
$exitCode = Artisan::call('config:clear'); 
$exitCode = Artisan::call('cache:clear');
$exitCode = Artisan::call('config:cache'); 
$exitCode = Artisan::call('route:cache'); 

$exitCode = Artisan::call('view:cache'); 
return 'DONE'; /*Return anything*/
});
// Route::group(['prefix' => 'boiler'], function () {
Route::get('/', [HomeController::class, 'index']);
Route::get('/boiler-brand',[HomeController::class,'index']);
Route::get('/boiler-comparison-results', [HomeController::class, 'boilerComparison']);

Route::post('/addtocompare', [HomeController::class, 'compare'])->name('addtocompare');

Route::post('/deleteSessionItems', [HomeController::class, 'deleteSessionItems'])->name('deleteSessionItems');

Route::post('/getMoreRecords', [HomeController::class, 'getMoreRecords'])->name('getMoreRecords');
Route::post('/getMoreCombi', [HomeController::class,'getMoreCombi'])->name('getMoreCombi');
Route::post('/getMoreBrand',[HomeController::class,'getMoreBrand'])->name('getMoreBrand');

Route::post('/getMoreRecordsBrand', [HomeController::class, 'getMoreRecordsBrand'])->name('getMoreRecordsBrand');

Route::get('/boiler-finance', [HomeController::class, 'boilerFinance']);

Route::get('/boiler-installation-locations', [HomeController::class, 'locations']);

Route::get('/boiler-installation-locations/{slug}', [HomeController::class, 'locationCity']);



Route::get('/boilertypes', [HomeController::class, 'boilerType']);
Route::get('/boiler', [HomeController::class, 'index']);
Route::get('/boiler-comparison/{slug?}/{slug2?}/{slug3?}', [HomeController::class, 'brands']);
Route::get('/boiler-brands/{slug?}/{slug2?}/{slug3?}', [HomeController::class, 'brands']);

Route::get('/boiler-brand/{slug?}/{slug2?}/{slug3?}', [HomeController::class, 'brand']);

Route::get('/combi-boilers/{slug?}/{slug2?}', [HomeController::class, 'combi']);

Route::get('/system-boilers/{slug?}/{slug2?}', [HomeController::class, 'system']);

Route::get('/regular-boilers/{slug?}/{slug2?}', [HomeController::class, 'regular']);

Route::get('/compareboilertool', [HomeController::class, 'compareBoilerTool']);


Route::GET('/dashboard', [DashboardController::class , 'index'])->middleware(['auth'])->name('dashboard');


Route::resource('users',UserController::class)->middleware('auth');
Route::resource('finish',FinishController::class)->middleware('auth');
Route::post('/featured', [FinishController::class, 'featured'])->name('featured');


Route::POST('/onchange', [FinishController::class , 'onchange'])->name('onchange')->middleware(['auth']);

Route::GET('/paginate/{slug}/{slug2?}', [FinishController::class , 'paginate'])->middleware(['auth']);

Route::resource('boilertype',BoilertypeController::class)->middleware('auth');
Route::resource('boilerbrand',BoilerBrandController::class)->middleware('auth');

Route::resource('boilercategory',BoilerCategoryController::class)->middleware('auth');

Route::post('/featuredcat', [BoilerCategoryController::class, 'featured'])->name('featuredcat');

Route::resource('boilerlocation',BoilerLocationController::class)->middleware('auth');

Route::resource('boilerlocationarea',BoilerLocationAreaController::class)->middleware('auth');


Route::resource('edges',EdgeController::class)->middleware('auth');
Route::resource('designs',DesignController::class)->middleware('auth');
Route::resource('estimate', EstimateController::class)->middleware('auth');
Route::POST('getDimensions', [EstimateController::class, 'getDimensions']);
// Route::view('/estimate', 'estimate');


require __DIR__.'/auth.php';



Route::POST('create_estimate', [EstimateController::class , 'create']);
Route::POST('estimate_submit', [EstimateController::class , 'store']);
Route::POST('send_mail', [EstimateController::class , 'email']);
Route::GET('home_msg', [EstimateController::class , 'after_email_msg']);

Route::resource('options',OptionController::class)->middleware('auth');

// Route::get('/options', [OptionController::class, 'index'])->middleware('auth');

Route::get('/paginate/{slug}', [OptionController::class, 'paginate'])->middleware('auth');

Route::get('/pages/{slug}', [OptionController::class, 'pages'])->middleware('auth');

Route::get('/page/comparison',[OptionController::class,'comparison'])->middleware('auth');
Route::get('/page/title',[OptionController::class,'title'])->middleware('auth');
Route::get('/page/comparison_page',[OptionController::class,'comparison_page'])->middleware('auth');
Route::get('/page/finance', [OptionController::class, 'finance'])->middleware('auth');

Route::get('/page/boilerLocation', [OptionController::class, 'boilerlocation'])->middleware('auth');

Route::get('/page/combiboiler', [OptionController::class, 'combiboiler'])->middleware('auth');

Route::get('/page/regularboiler', [OptionController::class, 'regularboiler'])->middleware('auth');

Route::get('/page/systemboiler', [OptionController::class, 'systemboiler'])->middleware('auth');
Route::get('/page/boilerseo', [OptionController::class, 'boilerseo'])->middleware('auth');


Route::get('/page/singleboiler', [OptionController::class, 'singleboiler'])->middleware('auth');






Route::POST('option_update',[OptionController::class , 'update'])->middleware('auth');
Route::POST('show_dimensions', [EstimateController::class , 'show_dimensions']);
// });
