<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Guests\PageController as GuestsPageController;
use App\Models\Project;

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

Route::get('/', [GuestsPageController::class, 'home'])->name('guests.home');

Route::get('/admin', [AdminPageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')
->name('admin.')
->prefix('admin')
->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified')
->name('admin.')
->prefix('admin')
->group(function () {
    Route::get('/', [AdminPageController::class, 'dashboard'])->name('dashboard');
    Route::get('project/trashed', [ProjectController::class, 'trashed'])->name('project.trashed');
    Route::post('project/{project}/restore', [ProjectController::class, 'restore'])->name('project.restore');
    Route::delete('project/{project}/harddelete', [ProjectController::class, 'harddelete'])->name('project.harddelete');
    Route::resource('project', ProjectController::class);
});

require __DIR__.'/auth.php';
