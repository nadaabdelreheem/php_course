<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('Message/{id}/{name?}',function ($id,$name = "Vistor"){
    echo 'welcome  '.$name.' Your Id :'.$id ;
})->where(['id' => '[0-9]+', 'name'=>'[a-z]+']);*/

//Route::view('Create','blog');

//Route::post('Blog','blogController@blog');

#Register Route ......
Route::view('Create','register');
Route::post('Register','registerController@store');


