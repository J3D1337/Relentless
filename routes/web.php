<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\GameController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');



Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');
Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');
Route::resource('users', UserController::class)->only(['show']);


Route::post('users/{user}/follow', [FollowerController::class ,'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class ,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('ideas/{idea}/like', [IdeaLikeController::class ,'like'])->middleware('auth')->name('ideas.like');
Route::post('ideas/{idea}/unlike', [IdeaLikeController::class ,'unlike'])->middleware('auth')->name('ideas.unlike');

Route::get('terms', [TermsController::class, 'show'])->name('terms');
Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

Route::get('/admin', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', EnsureUserIsAdmin::class])
    ->name('admin.dashboard');

Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');



// Route::get('/terms', function () {
//     return view('terms');
// });
