<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\CourseLinksController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DownloadController;

use App\Http\Controllers\Auth\LoginController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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


Route::get('/xac-nhan', [HomeController::class, 'confirmRegister'])->name('register.confirm');
Auth::routes(['verify' => true]);

Route::get('/login/redirect/{provider}', [LoginController::class, 'redirect'])->name('social.redirect');
Route::get('/login/callback/{provider}', [LoginController::class, 'callback']);

Route::get('/privacy',[HomeController::class, 'privacy'])->name('privacy');
Route::get('/terms',[HomeController::class, 'terms'])->name('terms');
Route::get('/how-to-delete', [HomeController::class, 'howToDelete']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::group(['prefix' => 'management', 'middleware' => ['isAdmin']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RolesController::class);
    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('data', DataController::class);
    Route::resource('courses', CoursesController::class);
    //Route::resource('courselinks', CourseLinksController::class);
    Route::get('/courses/{id}/links',[CourseLinksController::class, 'index'])->name('admin.links_in_course');
    Route::get('/courses/{id}/links/create',[CourseLinksController::class, 'create'])->name('admin.create_links_in_course_view');
    Route::post('/courses/{id}/links/create',[CourseLinksController::class, 'store'])->name('admin.create_links_in_course.store');
    Route::get('/courses/{id}/links/{link_id}/edit',[CourseLinksController::class, 'edit'])->name('admin.create_links_in_course.edit');
    Route::put('/courses/{id}/links/{link_id}/edit',[CourseLinksController::class, 'update'])->name('admin.create_links_in_course.update');
    Route::delete('/courses/{course_id}/links/{id}/destroy',[CourseLinksController::class, 'destroy'])->name('admin.create_links_in_course.destroy');
});

Route::group(['middleware' => []], function() {
    Route::get('/', [HomeController::class, 'index'])->name('homepage');
    Route::get('/lang/{locale}', [HomeController::class, 'changeLocale'])->name('change_locale');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/khoa-hoc', [App\Http\Controllers\CoursesController::class, 'index'])->name('client.list_courses');
    Route::get('/courses', [App\Http\Controllers\CoursesController::class, 'index'])->name('client.list_courses.en');
    
    Route::get('/khoa-hoc/{name}', [App\Http\Controllers\CoursesController::class, 'show'])->name('client.courses');
    Route::get('/courses/{name}', [App\Http\Controllers\CoursesController::class, 'show'])->name('client.courses.en');
    
    Route::get('/danh-muc/{name}', [App\Http\Controllers\CategoriesController::class, 'index'])->name('client.categories');
    Route::get('/category/{name}', [App\Http\Controllers\CategoriesController::class, 'index'])->name('client.categories.en');

    Route::get('/khoa-hoc/danh-muc/{name}', [App\Http\Controllers\CoursesController::class, 'CourseInCategory'])->name('client.courses.category');
    Route::get('/courses/category/{name}', [App\Http\Controllers\CoursesController::class, 'CourseInCategory'])->name('client.courses.category.en');

    Route::get('/download/{id}', [DownloadController::class, 'download'])->name('client.download');
    Route::get('/download/limitation', [DownloadController::class, 'limitation'])->name('client.download');
});


