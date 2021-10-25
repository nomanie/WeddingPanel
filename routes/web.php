<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\GroupsController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\WeddingsController;


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
Auth::routes();


Route::get('/', [\App\Http\Controllers\Home\IndexController::class, 'index'])->name('home.index');
Route::get('/formularz', [\App\Http\Controllers\Home\IndexController::class, 'index'])->name('home.form.index');
Route::post('/formularz', [\App\Http\Controllers\Home\IndexController::class, 'post'])->name('home.form.post');


Route::view('/formularz', 'home.components.form.form')->name('home.form.index');
Route::view('/galeria', 'home.pages.gallery.gallery')->name('home.gallery.index');
Route::get('/galeria/{token}', [\App\Http\Controllers\Home\GalleryController::class, 'gallery'])->name('home.gallery.index');
Route::post('/galeria/{token}', [\App\Http\Controllers\Home\GalleryController::class, 'form'])->name('home.gallery.post');

Route::group(['middleware' => ['admin']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {


        Route::get('/', [IndexController::class, 'index'])->name('index');

        Route::resource('users', UsersController::class);
        Route::post('/users/get', [UsersController::class, 'getData'])->name('users.get');
        Route::post('/users/get/edit/{id}', 'UsersController@update')->name('users.update.post');

        Route::resource('groups', GroupsController::class);
        Route::post('/groups/get', [GroupsController::class, 'getData'])->name('groups.get');

        Route::resource('permissions', PermissionsController::class);
        Route::post('/permissions/get', [PermissionsController::class, 'getData'])->name('permissions.get');

        Route::resource('weddings', WeddingsController::class);
        Route::post('/weddings/get', [WeddingsController::class, 'getData'])->name('weddings.get');
        Route::post('/weddings/{wedding}', [WeddingsController::class, 'update'])->name('weddings.update');

        Route::resource('weddingsAssigned', WeddingsController::class);
        Route::post('/weddings/assigned/get', [WeddingsController::class, 'getAssignedData'])->name('weddings.assigned.get');
        Route::post('/weddings/assigned/{wedding}', [WeddingsController::class, 'update'])->name('weddings.assigned.update');


        Route::post('/weddings/archive/images/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'addImages'])->name('weddings.archive.addImages');
        Route::delete('/weddings/archive/images/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'deleteImages'])->name('weddings.archive.deleteImages');
        Route::put('/weddings/archive/images/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'sendNotifications'])->name('weddings.archive.sendNotifications');

        Route::resource('weddingsArchive', WeddingsController::class);

        Route::post('/weddings/archive/get', [WeddingsController::class, 'archiveGetData'])->name('weddings.archive.get');
        Route::post('/weddings/archive/{wedding}', [WeddingsController::class, 'archive'])->name('weddings.archive.send');
      });
});

Route::get('/blade/{id}', function () {
    return view('emails.pdfSender');
});
Route::any('/logout', function () {
    Auth::logout();
    return redirect()->route('admin.index');
})->name('logout');
