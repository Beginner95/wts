<?php

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

Route::resource('/', 'IndexController', [
    'only' => ['index'],
    'names' => [
        'index' => 'home'
    ]
]);

Route::resource('portfolio', 'PortfolioController', [
    'parameters' => [
        'portfolio' => 'slug'
    ]
]);

Route::resource('blog', 'BlogController', [
    'parameters' => [
        'blog' => 'slug'
    ]
]);

Route::resource('service', 'ServiceController', [
    'parameters' => [
        'service' => 'slug'
    ]
]);