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
    return view('inicio');
});
Route::get('conexion_aut1', function () {
    return view('conexion_aut1');
});
Route::get('recoleccion_de_datos1', function () {
    return view('recoleccion_de_datos1');
});
Route::get('automata2', function () {
    return view('automata2');
});
Route::get('conexion_aut2', function () {
    return view('conexion_aut2');
});
Route::get('recoleccion_de_datos2', function () {
    return view('recoleccion_de_datos2');
});
Route::get('resultados', function () {
    return view('resultados');
});
Route::get('prueba',function () {
    return view('prueba2');
});