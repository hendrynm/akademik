<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SiakadModel extends Model
{
    public function daftar_prodi()
    {
        return DB::table("prodi")
            ->orderBy("nama_prodi")
            ->get();
    }

    public function daftar_matkul($id_prodi)
    {
        return DB::table("matkul")
            ->where("id_prodi",$id_prodi)
            ->select("kode_matkul","nama_matkul")
            ->orderBy("nama_matkul")
            ->get();
    }
}
