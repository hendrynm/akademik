<?php

namespace App\Http\Controllers;

use App\Models\SiakadModel;
use Illuminate\Http\Request;


class SiakadControl extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function ups()
    {
        return view("ups");
    }

    public function daftar_matkul($id_prodi)
    {
        return response()->json((new SiakadModel)->daftar_matkul($id_prodi));
    }
}
