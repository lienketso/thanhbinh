<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$FrontRoute = 'frontend';
$moduleRoute = 'home';

Route::get('/', 'HomeController@getIndex')->name('frontend::home');
Route::get('lang/{lang}', 'HomeController@changeLang')->name('frontend::lang');
Route::get('about', 'HomeController@about')->name('frontend::about.detail.get');



Route::group(['prefix'=>'project'],function(Router $router){
    $router->get('/','ProjectController@index')
        ->name('frontend::project.index.get');
    $router->get('{slug}','ProjectController@detail')
        ->name('frontend::project.detail.get');
});

Route::group(['prefix'=>'category'],function(Router $router){
    $router->get('/','CategoryController@index')
        ->name('frontend::category.index.get');
    $router->get('{slug}','ProductController@index')
        ->name('frontend::product.index.get');
});

Route::group(['prefix'=>'product'],function(Router $router){
   $router->get('{slug}','ProductController@detail')
       ->name('frontend::product.detail.get');
});

Route::group(['prefix'=>'page'],function(Router $router){
    $router->get('{slug}','BlogController@page')
        ->name('frontend::page.index.get');
});

Route::group(['prefix'=>'post'],function(Router $router){
    $router->get('{slug}','BlogController@detail')
        ->name('frontend::blog.detail.get');
});
Route::group(['prefix'=>'blog'],function(Router $router){
    $router->get('{slug}','BlogController@index')
        ->name('frontend::blog.index.get');
});

Route::group(['prefix'=>'search'],function(Router $router){
    $router->get('/','ProductController@search')
        ->name('frontend::product.search.get');
});

Route::group(['prefix'=>'contact'],function(Router $router){
    $router->get('/','HomeController@contact')
        ->name('frontend::home.contact.get');
    $router->post('/','HomeController@postContact')
        ->name('frontend::home.contact.post');
});

Route::group(['prefix'=>'factory'],function(Router $router){
    $router->get('/','FactoryController@index')
        ->name('frontend::factory.index.get');
    $router->get('{sluf}','FactoryController@detail')
        ->name('frontend::factory.detail.get');
});

