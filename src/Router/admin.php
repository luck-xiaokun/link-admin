<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
$groupMap = ['prefix'=>'admin-api','namespace'=>'Lynk\LynkAdmin\Controllers'];
Route::group($groupMap,function ($router){
    //auth
    $router->get('/login',"AuthController@login");
});


