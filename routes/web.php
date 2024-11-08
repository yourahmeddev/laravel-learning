<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;
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
Route::get('test', function () {
    return view('master-test');
});
// opening blade file in laravel from controller
Route::get('/users/{name}', [UserController::class, 'index']);
// how to add data in database using laravel model
Route::get('/insert', function () {
    Post::create([
        'title' => 'Fourth Post in Laravel',
        'description' => 'Fourth Post Description',
        'is_active' => false,
        'is_publish' => true
    ]);
    return 'Data Inserting Successfully';
});
// how to get data from datbase using ORM
Route::get('/getData', function () {
    // when we want to get all data from table
    $posts = Post::all();
    // when we want to get specific row we can use this
    $post = Post::where('title', 'Fourth Post in Laravel')->get();
    return $post;
});
// how to update the data in database
Route::get('/update', function () {
    $post = Post::findOrFail(1);
    $post->update([
        'title' => 'First New Updated Post in Laravel Updated',
        'description' => 'First New Updated Post Description in Laravel Updated',
        'is_active' => true,
        'is_publish' => true
    ]);
    return 'Data Updated Successfully';
});
// how to delete the data in database using ORM
Route::get('/delete', function () {
    $post = Post::findOrFail(1);
    if (!$post) {
        abort(404);
    } else {

        $post->delete();
    }
    return 'Post Deleted Successfully';
});
// creating the resource route for the table
Route::resource('posts', PostController::class);
// adding routes for undo posts in laravel
Route::get('posts/soft-delete/{id}', [PostController::class, 'softDelete'])->name('posts.soft-delete');
Route::get('QueryBuilder', [PostController::class, 'QueryBuilder'])->name('posts.queryBuilder');
//one to one relation in laravel
Route::get('one-to-one', function () {
    $user = User::first();
    return $user->Post;
});
Route::get('one-to-one-belongs-to', function () {
    $post = Post::first();
    return $post->User;
});
// one to many relationship
Route::get('one-to-many', function () {
    $user = User::first();
    if(!$user){
        abort(404);
    }
    return $user->Posts;
});
Route::get('one-to-many-inverse', function () {
    $post = Post::first();
    if(!$post){
        abort(404);
    }
    return $post->User;
});
