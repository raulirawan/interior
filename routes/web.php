<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimoniController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/projects', [HomeController::class, 'projects'])->name('projects');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');


Auth::routes([
    'register' => false,
    'password.reset' => false,
    'password.request' => false,
    'password.email' => false,
    'password.update' => false,
    'password.confirm' => false,
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    // users
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('users/create', [UserController::class, 'store'])->name('admin.users.store');
    Route::post('users/update/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('users/delete/{user}', [UserController::class, 'delete'])->name('admin.users.delete');

    // categories
    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('categories/create', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::post('categories/update/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::get('categories/delete/{category}', [CategoryController::class, 'delete'])->name('admin.categories.delete');

    // projects
    Route::get('projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('projects/create', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('projects/edit/{project}', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::post('projects/update/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::get('projects/delete/{project}', [ProjectController::class, 'delete'])->name('admin.projects.delete');

    // services
    Route::get('services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('services/create', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('services/edit/{service}', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::post('services/update/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::get('services/delete/{service}', [ServiceController::class, 'delete'])->name('admin.services.delete');


    // blogs
    Route::get('blogs', [BlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('blogs/create', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('blogs/edit/{blog}', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::post('blogs/update/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::get('blogs/delete/{blog}', [BlogController::class, 'delete'])->name('admin.blogs.delete');

    // testimonial
    Route::get('testimonials', [TestimoniController::class, 'index'])->name('admin.testimonials.index');
    Route::get('testimonials/generate', [TestimoniController::class, 'generate'])->name('admin.testimonials.generate');
    Route::get('testimonials/delete/{testimonial}', [TestimoniController::class, 'delete'])->name('admin.testimonials.delete');


    // settings
    Route::get('settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::get('settings/edit', [SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::post('settings/update', [SettingController::class, 'update'])->name('admin.settings.update');
});
