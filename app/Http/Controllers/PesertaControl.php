<?php

namespace App\Http\Controllers;

use App\Models\PesertaModel;
use App\Models\SiakadModel;
use Illuminate\Http\Request;

class PesertaControl extends Controller
{
    public function index()
    {
        $prodi = (new SiakadModel)->daftar_prodi();
        return view("peserta.index",["prodi"=>$prodi]);
    }

    public function cek(Request $request)
    {
        $prodi = $request->prodi;
        $matkul = $request->matkul;
        $smt = $request->smt;
        $tahun = $request->tahun;
        $kelas = $request->kelas;
        $log = $request->log;
        $sess = $request->phpsess;
        $link = "https://akademik.its.ac.id/lv_peserta.php?mkJur=".$prodi."&mkID=".$matkul."&mkSem=".$smt."&mkThn=".$tahun."&mkKelas=".$kelas."&mkLog=".$log;

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
        echo "<pre>".print_r($DOM,true)."</pre>";
        $Header = $DOM->getElementsByTagName('tr');
        $dataHeader = null;
        foreach($Header as $NodeHeader)
        {
            $dataHeader[] = trim($NodeHeader->textContent);
        }
        echo "<pre>".print_r($dataHeader,true)."</pre>";
        if($dataHeader !== null)
        {
            $dataMatkul = $dataHeader[1];
            $total_rec = count($dataHeader)-5;
            for($i = 3 ; $i < $total_rec ; $i++)
            {
                $dataDetail[$i] = explode("\n\t\t",$dataHeader[$i]);
            }
            return ($log === '0') ?
                view("peserta.no_log",["data"=>$dataDetail,"matkul"=>$dataMatkul]) :
                view("peserta.log",["data"=>$dataDetail,"matkul"=>$dataMatkul]);
        }
        return redirect(route("peserta.index"))
            ->with("error","PHPSESSID yang dimasukkan salah atau tidak valid!");
    }
}
