<?php

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| This is where all of Vivid's public routes are registered. These
| routes are exclusively for displaying your blog. Here, we can
| load all the routes for the blog listing and for the posts.
|
*/

/** @var \Illuminate\Routing\Router $router */

$router->group(['namespace' => '\\Phroggyy\\Vivid\\Http\\Controllers', 'as' => 'vivid::'], function (\Illuminate\Routing\Router $router) {
    $router->get('/', 'PostController@index')->name('posts.index');
    $router->get('{post}', 'PostController@show')->name('posts.show');

    $router->get('/tags', 'TagController@index');
    $router->get('/tags/{tag}', 'TagController@show');
});