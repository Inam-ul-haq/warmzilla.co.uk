<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EdgeController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\FinishController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
 	return view('welcome');
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
});

Route::get('/admin',function(){
	return view('dashboard');
})->middleware('auth');
Route::resource('users',UserController::class)->middleware('auth');
Route::resource('finish',FinishController::class)->middleware('auth');
Route::resource('edges',EdgeController::class)->middleware('auth');
Route::resource('designs',DesignController::class)->middleware('auth');
Route::resource('/estimate', EstimateController::class);
Route::POST('getDimensions', [EstimateController::class, 'getDimensions']);
// Route::view('/estimate', 'estimate');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::POST('create_estimate', [EstimateController::class , 'create']);
Route::POST('estimate_submit', [EstimateController::class , 'store']);
Route::POST('send_mail', [EstimateController::class , 'email']);
Route::GET('home_msg', [EstimateController::class , 'after_email_msg']);
