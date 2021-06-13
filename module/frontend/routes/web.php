<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$FrontRoute = 'frontend';
$moduleRoute = 'home';

Route::get('/', 'HomeController@getIndex')->name('frontend::home');
Route::get('lang/{lang}', 'HomeController@changeLang')->name('frontend::lang');

Route::group(['prefix'=>'member'],function(Router $router){
        $router->get('register','MemberController@register')
            ->name('frontend::member.register.get');
});

Route::group(['prefix'=>'company'],function(Router $router){
    $router->get('/','CompanyController@index')
        ->name('frontend::company.index.get');
    $router->get('{slug}','CompanyController@detail')
        ->name('frontend::company.detail.get');
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

