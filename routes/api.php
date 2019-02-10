<?php

Route::group(['namespace'=>'Api', 'as'=>'api.'],function(){
    Route::name('login')->post('login','AuthController@login');
    Route::name('refresh')->post('refresh','AuthController@refresh');

    // Rotas authenticadas
    Route::group(['middleware'=>['auth:api','jwt.refresh']], function(){
        Route::name('logout')->post('logout','AuthController@logout');
        Route::name('me')->get('me','AuthController@me');
        Route::patch('products/{product}/restore', 'ProductController@restore');
        Route::resource('products', 'ProductController', ['except'=>['create','edit']]);
        Route::resource('products_inputs', 'ProductInputController', ['only'=>['index','store','show']]);
        Route::resource('products_outputs', 'ProductOutputController', ['only'=>['index','store','show']]);
        Route::resource('products.categories', 'ProductCategoryController', ['only'=>['index','store','destroy']]);
        Route::resource('products.photos', 'ProductPhotoController', ['except'=>['create','edit']]);
        Route::resource('categories', 'CategoryController', ['except'=>['create','edit']]);
        Route::resource('users', 'UserController', ['except'=>['create','edit']]);
    });

});
