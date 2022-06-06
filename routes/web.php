<?php

use App\Http\Controllers\AmilController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MustahikController;
use App\Http\Controllers\MuzakkiController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\SugestionController;
use App\Models\Reception;
use App\Models\Sugestion;
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

Route::get('/', [HomeController::class, 'index'])->name('login');
Route::get('/about', function() {
    return view('about.about');
});

Route::get('/loginadmin', [HomeController::class, 'loginadmin']);
Route::post('/loginadminpost', [HomeController::class, 'loginadminpost']);

Route::get('/loginmuzakki', [HomeController::class, 'loginmuzakki']);
Route::post('/loginmuzakkipost', [HomeController::class, 'loginmuzakkipost']);
Route::get('/registermuzakki', [HomeController::class, 'registermuzakki']);
Route::post('/registermuzakkipost', [HomeController::class, 'registermuzakkipost']);

Route::get('/loginamil', [HomeController::class, 'loginamil']);
Route::post('/loginamilpost', [HomeController::class, 'loginamilpost']);
Route::get('/registeramil', [HomeController::class, 'registeramil']);
Route::post('/registeramilpost', [HomeController::class, 'registeramilpost']);

Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/profile', [ProfileController::class, 'profile']);
Route::patch('/profile/update/{id}', [ProfileController::class, 'update']);

Route::group(['middleware' => ['auth', 'checkrole:admin,amil']], function() {
    Route::get('/amil', [AmilController::class, 'index']);
    Route::get('reception/totaldana', [ReceptionController::class, 'totaldana']);
    Route::get('distribution/totaldana', [DistributionController::class, 'totaldana']);

    Route::get('/datamuzakki', [AmilController::class, 'datamuzakki']);
    Route::get('/datamuzakkiedit/{id}', [AmilController::class, 'datamuzakkiedit']);
    Route::delete('/datamuzakkidestroy/{id}', [AmilController::class, 'datamuzakkidestroy']);
    Route::patch('/datamuzakkiupdate/{id}', [AmilController::class, 'datamuzakkiupdate']);
    
    Route::get('/dataamil', [AmilController::class, 'dataamil']);
    Route::get('/dataamiledit/{id}', [AmilController::class, 'dataamiledit']);
    Route::delete('/dataamildestroy/{id}', [AmilController::class, 'dataamildestroy']);
    Route::patch('/dataamilupdate/{id}', [AmilController::class, 'dataamilupdate']);

    Route::resource('mustahik', MustahikController::class);
    Route::resource('reception', ReceptionController::class);
    Route::resource('distribution', DistributionController::class);
    Route::resource('article', ArticleController::class);
    Route::get('datasugestion', [AmilController::class, 'datasugestion']);
});
Route::group(['middleware' => ['auth', 'checkrole:muzakki']], function() {
    Route::get('/muzakki', [MuzakkiController::class, 'index']);
    Route::get('/payment', [PaymentController::class, 'index']);
    Route::get('/berita', [MuzakkiController::class, 'berita']);
    Route::get('/berita/bacaberita/{id}', [MuzakkiController::class, 'bacaberita']);
    Route::get('sugestion', [SugestionController::class, 'index']);
    Route::post('sugestion/post', [SugestionController::class, 'post']);
});
