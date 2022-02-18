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
}
