<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blogcontroller;

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

Route::get('/blog', [Blogcontroller::class, 'index']);
// Route::get('/blog/create', [Blogcontroller::class, 'create']);
Route::post('/blog/store', [Blogcontroller::class, 'store']);
Route::get('/blog/{blog}', [Blogcontroller::class, 'show']);
Route::patch('/blog/{blog}', [Blogcontroller::class, 'update']);
Route::delete('/blog/destroy/{blog}', [Blogcontroller::class, 'destroy']);

