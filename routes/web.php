<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
// here we are creating our first route in laravel
Route::get('/greeting', function(){
return 'Hello world';
});
// parameterized Routes
Route::get('/user/{id}', function($id){
return 'User Id'.$id;
});
// optional parameterized Route
Route::get('student/{name?}', function($name=null){
   return 'Student Name'.$name;
});
// adding contrainsts to routes in laravel
Route::get('/teacher/{id}', function($id){
return 'User Id is'.$id;
})->where('id','[0-9]+');
// Riderecting from one route to another route
Route::redirect('/test', '/greeting');
// how to open route list in laravel
//php artisan route:list
// if we want to get without vendor 
// php artisan route:list --except-vendor
// How to redirect from one to another using href
Route::get('/home', function(){
return '<a href="/greeting">Greeting</a>';
});
// opening blade file from route
Route::get('/greeting', function(){
return view('greeting');
});
// pass data from route to blade with using array method
// Route::get('/teacher/{name}', function($name){
// return view('user', ['name'=>$name]);
// });
// pass data from route to blade with using compact method 
// Route::get('/teacher/{name}', function($name){
// return view('user', compact('name'));
// });
// pass data from route to blade using with helper
Route::get('teacher/{name}', function($name){
return view('user')->with('name',$name);
});
// opening the blade file from controller
Route::get('/users/{name}', [UserController::class, 'index']);
// here we have resource routes for the post controller
Route::resource('posts', PostController::class);