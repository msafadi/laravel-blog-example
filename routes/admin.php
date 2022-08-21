<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UpdateUserPasswordController;
use App\Http\Controllers\Admin\UpdateUserProfileController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'verified', 'user.type:admin'],
], function() {

    Route::resource('categories', CategoriesController::class);
    Route::resource('posts', PostsController::class);

    Route::patch('comments/status/approve', [
        CommentsController::class, 'approve'
    ])->name('comments.approve');
    
    Route::resource('comments', CommentsController::class);

    Route::get('account/profile', [UpdateUserProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::put('account/profile', [UpdateUserProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('account/password', [UpdateUserPasswordController::class, 'edit'])
        ->name('password.edit');
    Route::put('account/password', [UpdateUserPasswordController::class, 'update'])
        ->name('password.update');

    Route::get('settings', function() {
        echo 'Secret Settings';
    })->middleware('password.confirm');

});