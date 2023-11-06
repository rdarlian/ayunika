<?php

use App\Http\Controllers\DashboardGuestController;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardThemeController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\GeocodeSearch;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('index', [
        'active' => 'beranda',
        'theme' => Theme::latest()->take(6)->get(),
    ]);
});
Route::get('/blogs', [PostController::class, 'index']);

Route::get('/dashboard', function () {
    return view('coba');
});
Route::get('/dashboard/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Posts or Berita or NEWS
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    // Route::resource('theme', 'ThemeController');
    Route::resource('users', UserController::class);
    Route::resource('themes', DashboardThemeController::class);
    Route::resource('guests', DashboardGuestController::class);
});

Route::get('/coba', [PostController::class, 'lazyload']);

// Route::get('{undangan}', 'UndanganController@show')->name('undangan.show');
// Undangan routes
Route::middleware('auth')->group(function () {
    // Route::get('/status/update', 'UndanganController@updateStatus')->name('update.status');
    // Route::get('/theme/{id}', 'UndanganController@show')->name('theme.show');
    // Route::get('/dashboard/theme-select', 'ThemeController@themeSelect')->name('theme.select');
    // Route::post('/dashboard/theme-select', 'ThemeController@themeSelected')->name('theme.post');
    Route::resource('dashboard/undangan', UndanganController::class);

    // Route::post('/dashboard/storeBride', 'UndanganController@storeBrideData')->name('store.bride');
    // Route::post('/dashboard/storeGroom', 'UndanganController@storeGroomData')->name('store.groom');
    // Route::post('/dashboard/storeEvent', 'UndanganController@storeEventData')->name('store.event');


    Route::get('/dz/upload-ui', [FileUploadController::class, 'dropzoneUi'])->name('upload.dropzone');
    Route::post('/dz/file-upload', [FileUploadController::class, 'dropzoneFileUpload'])->name('dropzoneFileUpload');
    Route::post('/dz/file-delete', [FileUploadController::class, 'filedestroy'])->name('dropzoneFileDelete');
});

// Geocoding routes
Route::get('get-geocode', [GeocodeSearch::class, 'action'])->name('get-geocode');
Route::get('get-reverse-geocode', 'ReverseGeocodeSearch@action')->name('get-reverse-geocode');
