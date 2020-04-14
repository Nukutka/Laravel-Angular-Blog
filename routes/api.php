<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'UserController@registerUser');
Route::post('login', 'UserController@loginUser');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('posts', 'PostController@store');    
    Route::delete('posts/{post_id}', 'PostController@destroy');    
    Route::put('posts/{post_id}', 'PostController@update');     
    
    // TODO: admin role
    Route::post('categories', 'CategoryController@store');    
    Route::delete('categories/{category_id}', 'CategoryController@destroy');    
    Route::put('categories/{category_id}', 'CategoryController@update');     
 });

 Route::get('categories/{category_id}', 'CategoryController@show');  
 Route::get('categories', 'CategoryController@index');  

 Route::get('categories/{category_id}', 'CategoryController@show');  
 Route::get('categories', 'CategoryController@index'); 





