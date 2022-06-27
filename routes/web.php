<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Postcontroller;
use Illuminate\Support\Facades\Auth;

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
// Route::get('/create', function () {
//     return view('backend.post.create');
// });
// Route::get('/update', function () {
//     return view('backend.post.update');
// });
// Route::get('/index', function () {
//     return view('backend.post.index');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('post',Postcontroller::class);
