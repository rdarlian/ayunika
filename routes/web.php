<?php

use App\Models\Post;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeocodeSearch;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UcapanController;
use App\Http\Controllers\StoriesController;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ReverseGeocodeSearch;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\UserUndanganController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardSongController;
use App\Http\Controllers\DashboardGuestController;
use App\Http\Controllers\DashboardThemeController;
use App\Http\Controllers\DashboardGreetingController;
use App\Http\Controllers\LawakController;
use App\Models\Undangan;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
        'posts' => Post::latest()->take(3)->get(),
    ]);
});
Route::get('/template', [ThemeController::class, 'index']);
Route::get('/blogs', [PostController::class, 'index']);
Route::get('/blogs/{post:slug}', [PostController::class, 'show']);

Route::get('/dashboard/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Geocoding routes
Route::get('/get-geocode', [GeocodeSearch::class, 'action'])->name('get-geocode');
Route::get('get-reverse-geocode', [ReverseGeocodeSearch::class, 'action'])->name('get-reverse-geocode');

// Excell
Route::post('/import-excel', [ExcelImportController::class, 'import'])->name('import-tamu');
Route::get('export/guest', [ExcelImportController::class, 'export']);
// Route Posts or Berita or NEWS
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::prefix('dashboard')->middleware('auth', 'admin')->group(function () {
    // Route::resource('theme', 'ThemeController');
    Route::resource('users', UserController::class);
    Route::resource('themes', DashboardThemeController::class);
    Route::resource('song', DashboardSongController::class)->except('show');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::resource('greeting', DashboardGreetingController::class);
    Route::get('guests/greeting', [GreetingController::class, 'index']);
    Route::put('guests/greeting/{guest}', [DashboardGuestController::class, 'updategreeting'])->name('guest.updateucapan');
    Route::post('guests/greeting', [GreetingController::class, 'store']);
    // Route::post('{slug}/{tamu}', [DashboardGuestController::class, 'greeting'])->name('whatsapp');
    Route::resource('guests', DashboardGuestController::class);
});
// Route::get('/coba', [PostController::class, 'lazyload']);



// Undangan routes
Route::middleware('auth')->group(function () {
    // Route::get('/status/update', 'UndanganController@updateStatus')->name('update.status');
    // Route::get('/theme/{id}', 'UndanganController@show')->name('theme.show');
    // Route::get('/dashboard/theme-select', 'ThemeController@themeSelect')->name('theme.select');
    // Route::post('/dashboard/theme-select', 'ThemeController@themeSelected')->name('theme.post');

    // Undangan Resource Routes
    Route::resource('dashboard/undangan', UndanganController::class)->middleware('admin')->except('index');
    Route::get('dashboard/undangan', [UndanganController::class, 'home']);


    Route::get('dashboard/undangan/{undangan}', [UndanganController::class, 'state_data']);
    Route::get('dashboard/states', [UndanganController::class, 'createstates']);
    Route::post('dashboard/states', [UndanganController::class, 'storestates'])->name('undangan.storestates');
    Route::get('dashboard/states/{state}/edit', [UndanganController::class, 'edit'])->name('undangan.editstates');
    Route::put('dashboard/states/{state}', [UndanganController::class, 'updateStates'])->name('undangan.updatestates');
    Route::delete('dashboard/states/{id}', [UndanganController::class, 'deleteData'])->name('undangan.deletestate');
    Route::resource('dashboard/user/undangan', UserUndanganController::class)->names('user');

    // Untuk Dropzone Upload File 
    Route::get('/dz/upload-ui', [FileUploadController::class, 'dropzoneUi'])->name('upload.dropzone');
    Route::post('/dz/file-upload', [FileUploadController::class, 'dropzoneFileUpload'])->name('dropzoneFileUpload');
    Route::post('/dz/file-delete', [FileUploadController::class, 'filedestroy'])->name('dropzoneFileDelete');
    Route::post('/dz/story-delete', [StoriesController::class, 'destroy'])->name('dropzoneStoryDelete');
    Route::post('/dz/story-upload', [StoriesController::class, 'submitForm'])->name('dropzoneStoryUpload');
});


// Ucapan routes
Route::post('ucapan', [UcapanController::class, 'store'])->name('ucapan.store');

// Undangan previewnya
// Route::get('/{undangan}', [UndanganController::class, 'show'])->name('undangan.show');
Route::get('/{undangan}', [UserUndanganController::class, 'show'])->name('undangan.show');
Route::get('/{slug}/{theme}', [UndanganController::class, 'show'])->name('undangan.show1');
