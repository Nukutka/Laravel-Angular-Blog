<?php

use Illuminate\Http\Request;
use Http\Controllers\PostController;
use Http\Controllers\CategoryController;

Route::apiResource('/posts', 'PostController');
Route::apiResource('/categories', 'CategoryController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
