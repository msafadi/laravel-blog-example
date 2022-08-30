<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/posts/{post}', [PostsController::class, 'show'])
    ->name('posts.show');

Route::post('comments', [CommentsController::class, 'store'])
    ->name('comments.store');

Route::get('search', [SearchController::class, 'index'])
    ->name('search');

Route::post('newsletter/subscribe', [NewsletterController::class, 'store'])
    ->name('newsletter.subscribe');

require __DIR__ . '/admin.php';

require __DIR__ . '/auth.php';
