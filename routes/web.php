<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
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

require __DIR__ . '/admin.php';

require __DIR__ . '/auth.php';
