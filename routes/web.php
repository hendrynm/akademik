<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiakadControl;
use App\Http\Controllers\PesertaControl;
use App\Http\Controllers\PresensiMhsControl;

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

Route::get("/",[SiakadControl::class,"index"])
    ->name("index");
Route::get("/ajax-daftar_matkul/{id_prodi}",[SiakadControl::class,"daftar_matkul"])
    ->name("ajax.matkul");

Route::prefix("/peserta")
    ->controller(PesertaControl::class)
    ->group(function ()
    {
        Route::get("/","index")
            ->name("peserta.index");
        Route::post("/cek","cek")
            ->name("peserta.cek");
    });

Route::prefix("/presensi-mhs")
    ->controller(PresensiMhsControl::class)
    ->group(function ()
    {
        Route::get("/","index")
            ->name("pre-mhs.index");
        Route::post("/cek","cek")
            ->name("pre-mhs.cek");
    });

Route::prefix("/presensi-dosen")
    ->controller(SiakadControl::class)
    ->group(function ()
    {
        Route::get("/","ups");
    });

Route::prefix("/nilai")
    ->controller(SiakadControl::class)
    ->group(function ()
    {
        Route::get("/","ups");
    });
