<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::controller('admin', 'Backend\AdminController');

// API 相关[为路由组添加前缀]
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function(){
    Route::any('router', 'RouterController@index');  // API 入口  http://www.tuicool.com/articles/vEBjE3N?spm=0.0.0.0.CdxWZb
});

//创建RESTFUL风格路由
Route::resource('post','PostController');

/**
 * 以下为路由配置实例
 * 路由命名：
 * Route::get('/hello/laravelacademy',['as'=>'academy',function($id){
    return 'Hello LaravelAcademy！';
   }]);

    Route::get('/testNamedRoute',function(){
        return redirect()->route('academy',['id'=>1]);      //跳转带参数
    });

 */