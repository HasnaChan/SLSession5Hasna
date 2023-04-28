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
    return view('index',["title" => "index"]);
});

Route::get('/index', function () {
    return view('index',["title" => "index"]);
});
Route::get('/about', function () {
    return view('about',["title" => "about"]);
});

Route::get('/resume', function () {
    return view('resume',["title" => "resume"]);
});
Route::get('/blog', function () {
    return view('blog',["title" => "blog"]);
});
Route::get('/project', function () {
    return view('project',["title" => "project"]);
});
Route::get('/achievement', function () {
    return view('achievement',["title" => "achievement"]);
});