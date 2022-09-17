<?php

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCategoryController;

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

//Home Page Route
Route::get('/', [MasterController::class, 'dashboard']);

// User CRUD System Route
Route::get('users/user_list', [UserController::class, 'userList']);
Route::get('users/user_add', [UserController::class, 'addList']);
Route::get('users/edite_list/{id}', [UserController::class, 'editeList']);
Route::put('users/edite_list/{id}', [UserController::class, 'updateList']);
Route::delete('users/delete_list/{id}', [UserController::class, 'delteList']);
Route::post('users/store', [UserController::class, 'store']);

// Blogs Category Route
Route::resource('blogCategory', BlogCategoryController::class);

// Blogs Route
Route::resource('blog', BlogController::class);




