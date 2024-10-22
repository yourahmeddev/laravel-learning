<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// first route in laravel
Route::get('greeting', function(){
return 'Hello world';
});
// adding parameterzied route neccessary
Route::get('/user/{name}', function($name){
return 'User Name:'.$name;
});
// adding parameterized Route optional
Route::get('/employee/{id?}', function($id=null){
return 'Employee Id: '.$id;
});
// adding route contraints in laravel
Route::get('/student/{name}', function($name){
return  'User Name:'.$name;
})->where('name',  '[a-zA-Z]+');
// how to redirect from one route to another using redirect method
Route::redirect('/home', '/');
// how to open route list in laravel
// php artisan route:list --except-vendor
// how to redirect from one to another using href tag
Route::get('/about', function(){
return '<a href="/home">Home</a>';
});
