<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::namespace('v1')->prefix("v1")->group(function () {
    Route::middleware('auth:api')->get('/user', 'UserController@detail');

    //home
    Route::get('/home', 'HomeController@index');

    //注册用户
    Route::post('/register', 'RegisterController@register');

    //获取access_token
    Route::post('/oauth/token', 'AuthController@login');

    //user 列表
    Route::get('/users', 'UserController@list');

    Route::get('/send' , 'HomeController@send');

    //发送富文本邮件
    Route::get('/sendbeauty' , 'HomeController@beauty');
});


Route::namespace('v2')->prefix("v2")->group(function () {
    //抛出异常测试
    Route::get('/except', 'TestController@except');

    //获取request_id
    Route::get('/get_request_id', 'TestController@getRequestId');
});


//Route::middleware('auth:api')->group(function () {
//    Route::get('/user', function (Request $request) {
//        $user = $request->user();
//        if ($user->tokenCan('all-user-info')) {
//            // 如果用户令牌有获取所有信息权限，返回所有用户字段
//            return $user;
//        }
//        // 否则返回用户名和邮箱等基本信息
//        return ['name' => $user->name, 'email' => $user->email];
//    })->middleware('scope:basic-user-info,all-user-info');
//    Route::get('/post/{id}', function (Request $request, $id) {
//        return \App\Post::find($id);
//    })->middleware('scopes:get-post-info');
//});



