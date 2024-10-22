<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// first route in laravel
Route::get('greeting', function () {
    return 'Hello world';
});
// adding parameterzied route neccessary
Route::get('/user/{name}', function ($name) {
    return 'User Name:' . $name;
});
// adding parameterized Route optional
Route::get('/employee/{id?}', function ($id = null) {
    return 'Employee Id: ' . $id;
});
// adding route contraints in laravel
Route::get('/student/{name}', function ($name) {
    return 'User Name:' . $name;
})->where('name', '[a-zA-Z]+');
// how to redirect from one route to another using redirect method
Route::redirect('/home', '/');
// how to open route list in laravel
// php artisan route:list --except-vendor
// how to redirect from one to another using href tag
Route::get('/about', function () {
    return '<a href="/home">Home</a>';
});
// opening blade file from route
Route::get('/greeting', function () {
    return view('greeting');
});
// passing dynamic data from route to blade - using array method
Route::get('trainer/{name}', function ($name) {
    return view('trainer', ['name' => $name]);
});
// passing dynamic data from route to blade - using compact method
Route::get('trainer/{name}', function ($name) {
    return view('trainer', compact('name'));
});
// passing dynamic data from route to blade using with method
Route::get('trainer/{name}', function ($name) {
    return view('trainer')->with('name', $name);
});
Route::get('test', function(){
return view('master-test');
});