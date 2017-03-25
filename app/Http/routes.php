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


//后台路由配置
Route::controller('admin', 'Backend\AdminController');
Route::controller('teaching', 'Backend\TeachingController');
Route::controller('exam', 'Backend\ExamController');
Route::controller('news', 'Backend\NewsController');
Route::controller('wechat', 'Backend\WechatController');            //微信管理

Route::controller('onewechat', 'Backend\OneWechatController');      //微信管理
Route::controller('system', 'Backend\SystemController');            //系统设置
Route::controller('file', 'Backend\FileController');            //文件管理

Route::get('/image/grayscale', function(){
    $img = Image::make(public_path('uploads/LaravelAcademy.jpg'))->greyscale();
    return $img->response('jpg');
});

//前台微信API
Route::controller('wechatapi', 'Frontend\WeixinController');


// API 相关[为路由组添加前缀]
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function(){
    Route::any('router', 'RouterController@index');  // API 入口  http://www.tuicool.com/articles/vEBjE3N?spm=0.0.0.0.CdxWZb
});

//创建RESTFUL风格路由
Route::resource('post','PostController');

