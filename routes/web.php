<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProjectListController;

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
# every time you have a link, it will be a GET
# FORM can be only GET or POST, can change method with '@' directive 
Route::get('/', function () {
    return view('welcome');
});



Route:: get('/register',[RegisterController::class,'index']);
Route:: post('/register',[RegisterController::class,'store']);

Route:: get('/login',[LoginController::class,'index']) ->name('login');
Route:: get('/logout',[LoginController::class,'logout']);
Route:: post('/login',[LoginController::class,'login']);


Route::group([
    'middleware'=>['auth']
    
],

function(){
    Route::get('/roles',[RoleController::class,'index']);
    Route::post('/roles/store',[RoleController::class,'store']);
    Route::delete('/roles/{id}',[RoleController::class,'destroy']);
    Route::get('/roles/{id}/edit',[RoleController::class,'edit']);
    Route::put('/roles/{id}/',[RoleController::class,'update']);

    Route::resource('project-list',ProjectListController::class);
    Route:: get('project-list/{id}/tasks',[ProjectListController::class,'tasks']);
})  ;


# resource or API (this is to include ALL routes)

// Route::get('/role',function (){
//     return Role::all();
// });


Route::get('/home', [HomeController::class, 'index'])->name('home');

// creating a route to the tasks page

Route::get('/tasks',[TasksController::class, 'store'])->name('tasks');

Route:: get('/tasks/{id}/edit', [TasksController::class, 'edit'])->name('tasks.edit');

