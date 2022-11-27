<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Client\MenuItemController;
use App\Http\Controllers\MenuViewController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/menu/{slug}', [MenuViewController::class, 'index']);

Route::middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
    Route::resource('clients', ClientController::class);
    Route::post('clients-images-upload', [ClientController::class, 'uploadClientImages'])->name('clients-images-upload');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'client', 'verified'])->group(function () {
    Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
    Route::get('/restu-info', [ClientDashboardController::class, 'restuInfo'])->name('restu-info');
    Route::resource('menus', MenuItemController::class);
    Route::post('menus-upload', [MenuItemController::class, 'menusUpload'])->name('menus-upload');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('migrate/{key}', function ($key) {
    if ($key == 'Rejohn') {
        try {
            \Artisan::call('migrate');
            echo 'Migrated Successfully!';
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    } else {
        echo 'Not matched!';
    }
});


Route::get('clear', function () {
    \Artisan::call('optimize:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    \Artisan::call('config:clear');
    echo "Run clear Successfully";
});

Route::get('storage-link/{key}', function ($key) {
    if ($key == 'Rejohn') {
        try {
            $targetFolder = storage_path('app/public');
            $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
            symlink($targetFolder, $linkFolder);
            echo "Create Storage Path";
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    } else {
        echo 'Not matched!';
    }
});

require __DIR__ . '/auth.php';
