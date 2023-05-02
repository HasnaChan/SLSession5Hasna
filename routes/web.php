<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\CardController;
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
Route::get('/detail', function () {
    return view('detail',["title" => "detail"]);
});

Route::get('/achievement', [AchievementController::class, 'index']);

Route::get('/achievement/{id}', [AchievementController::class, 'detail']);

