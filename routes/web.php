<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

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
    Log::info("PAGINA DE INICIO");
    return view('inicio');
});
Route::get('conexion_aut1', function () {
    Log::info("INGRESO DE AUTOMATA 1");
    return view('conexion_aut1');
});
Route::get('recoleccion_de_datos1', function () {
    Log::info("INGRESO DE DATOS AUTOMATA 1");
    return view('recoleccion_de_datos1');
});
Route::get('automata2', function () {
    Log::info("INGRESO DE AUTOMATA 2");
    return view('automata2');
});
Route::get('conexion_aut2', function () {
    Log::info("INGRESO DE DATOS AUTOMATA 2");
    return view('conexion_aut2');
});
Route::get('recoleccion_de_datos2', function () {
    Log::info("INGRESO DE DATOS AUTOMATA 2");
    return view('recoleccion_de_datos2');
});
Route::get('resultados', function () {
    Log::info("MUESTRA DE RESULTADOS");
    return view('resultados');
});
Route::get('prueba',function () {
    Log::info("ZONA DE PRUEBAS DESPLEGADA (ONLY DEVELOPER)");
    return view('prueba2');
});