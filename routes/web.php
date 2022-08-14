<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
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
})->name('home');


Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
], function() {

    /*Route::group([
        'prefix' => '/categories',
        'as' => 'categories.',
    ], function() {
        Route::get('/', [CategoriesController::class, 'index'])
            ->name('index');

        Route::get('/create', [CategoriesController::class, 'create'])
            ->name('create');

        Route::post('/', [CategoriesController::class, 'store'])
            ->name('store');

        Route::get('/{id}/edit', [CategoriesController::class, 'edit'])
            ->name('edit');

        Route::put('/{id}', [CategoriesController::class, 'update'])
            ->name('update');

        Route::delete('/{id}', [CategoriesController::class, 'destroy'])
            ->name('destroy');
    });*/
    Route::resource('categories', CategoriesController::class);

    // Define 7 routes
    /*
    GET admin/posts -> index@PostsController  -> admin.posts.index
    GET admin/posts/create -> create@PostsController -> admin.posts.create
    POST admin/posts -> store@PostsController -> admin.posts.store
    GET admin/posts/{post} -> show@PostsController -> admin.posts.show
    GET admin/posts/{post}/edit -> edit@PostsController -> admin.posts.edit
    PUT admin/posts/{post} -> update@PostsController -> admin.posts.update
    DELETE admin/posts/{post} -> destroy@PostsController -> admin.posts.destroy
    */
    Route::resource('posts', PostsController::class);

});