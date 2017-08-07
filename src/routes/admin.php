<?php

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| This is where all of Vivid's admin routes are registered. These
| routes are used for managing your content, viewing analytics,
| and configuring how Vivid appears to your users, neat huh?
|
*/

/** @var \Illuminate\Routing\Router $router */

$router->group(['namespace' => 'Phroggyy\\Vivid\\Http\\Controllers\\Admin', 'as' => 'vivid::admin.'], function (\Illuminate\Routing\Router $router) {
    $router->get('/', 'OverviewController@index')->name('overview');
    $router->get('/posts/new', 'PostController@create')->name('posts.create');
    $router->get('/posts/{post}', 'PostController@edit')->name('posts.edit');
    $router->put('/posts/{post}', 'PostController@update')->name('posts.update');
    $router->post('/posts', 'PostController@store')->name('posts.store');
});