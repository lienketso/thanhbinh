<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

$adminRoute = config('base.admin_route');
$moduleRoute = 'setting';

Route::group(['prefix'=>$adminRoute],function(Router $router) use($adminRoute,$moduleRoute){
    $router->group(['prefix'=>$moduleRoute],function(Router $router) use ($adminRoute,$moduleRoute){
        $router->get('index','SettingController@getIndex')
            ->name('wadmin::setting.index.get')->middleware('permission:setting_index');
        $router->post('index','SettingController@postIndex')
            ->name('wadmin::setting.index.post')->middleware('permission:setting_index');
        $router->get('fact','SettingController@getFact')
            ->name('wadmin::setting.fact.get')->middleware('permission:setting_fact');

    });
});
