<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PasswordController;

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

//Admin panel routes
Route::get('/admin', [PanelController::class, 'index'])->middleware('auth');
Route::get('/admin/header', [PanelController::class, 'header'])->middleware('auth');
Route::put('/admin/header', [PanelController::class, 'headerput'])->middleware('auth');
Route::get('/admin/new', [PanelController::class, 'new'])->middleware('auth');
Route::get('/admin/show', [PanelController::class, 'show'])->middleware('auth');
Route::post('/admin/new', [PostController::class, 'store'])->middleware('auth');
Route::get('/admin/edit/{id}', [PanelController::class, 'edit'])->middleware('auth');
Route::post('/admin/edit/{id}', [PanelController::class, 'update'])->middleware('auth');
Route::delete('/admin/delete/{id}', [PanelController::class, 'delete'])->middleware('auth');
Route::get('/admin/login', [PanelController::class, 'login'])->name('login');
Route::post('/admin/login', [PanelController::class, 'authenticate']);
Route::get('/admin/logout', [PanelController::class, 'logout'])->middleware('auth');
//Route::get('/admin/reset/{token}', [PasswordController::class, 'send']);
//Route::get('/admin/register', [PanelController::class, 'register']);

//Password reset for admin
Route::get('/admin/forgot', [PasswordController::class, 'forgot']);
Route::post('/admin/forgot', [PasswordController::class, 'send']);
Route::get('/admin/reset/{token}', [PasswordController::class, 'reset'])->name('reset.password.get');
Route::post('/admin/update',  [PasswordController::class, 'update']);

//Blog routes
Route::get('/', [BlogController::class, 'index']);
Route::get('/posts/{id}', [BlogController::class, 'show']);

//Comment routes
Route::post('/comment', [CommentController::class, 'store']);
