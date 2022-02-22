<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresensiDosenControl extends Controller
{
    public function index()
    {
        return view("presensi_dosen.index");
    }

    public function cek(Request $request)
    {
        $matkul = $request->matkul;
        $smt = $request->smt;
        $tahun = $request->tahun;
        $kelas = $request->kelas;
        $sess = $request->phpsess;
        $link = "https://akademik.its.ac.id/list_presensi_dosen.php?id=2018|".$matkul."|".$tahun."|".$smt."|".$kelas;

        $options = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"Cookie: PHPSESSID=$sess\r\n"
            )
        );

        $context = stream_context_create($options);
        $htmlContent = file_get_contents($link, false, $context);

        $DOM = new \DOMDocument();
        @$DOM->loadHTML($htmlContent);

        $Header = $DOM->getElementsByTagName('tr');
        $dataHeader = null;
        foreach($Header as $NodeHeader)
        {
            $dataHeader[] = trim($NodeHeader->textContent);
        }

        if($dataHeader !== null)
        {
            $matkul_raw = explode("Mata Kuliah (Kelas):",$dataHeader[2]);
            $matkul = substr($matkul_raw[1],13);
            $total_rec = count($dataHeader);
            for($i = 2 ; $i < $total_rec ; $i++)
            {
                $dataDetail[$i] = explode("\n\t\t",$dataHeader[$i]);
            }
            return view("presensi_dosen.hasil",["data"=>$dataDetail,"matkul"=>$matkul]);
        }
        return redirect(route("pre-dosen.index"))
            ->with("error","PHPSESSID yang dimasukkan salah atau tidak valid!");
    }
}
