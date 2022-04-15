<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route :: get ('/',[TaskController :: class ,'index']) -> name('task.index') ;
Route :: get ('/task/{id}',[TaskController :: class ,'show'])-> name('task.show') ;
Route :: post ('/store',[TaskController :: class ,'store']) -> name('task.store') ;
Route :: delete('delete/{id}',[TaskController :: class,'delete']) -> name('task.delete'); // الصح ما أستخدم post  لانو ببعث كل المحتوى بيانات زيادة 
Route::put('edit/{id}',[TaskController::class, 'edit']);
Route::patch('update/{id}',[TaskController::class, 'update']);