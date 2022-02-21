@extends("_layout.master")
@section("title","Beranda Daftar Peserta")

@section("konten")
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <p class="display-6"><b>Presensi Mahasiswa per Mata Kuliah</b></p>
            <p class="display-4"><b>{{ $matkul }}</b></p>

            <hr class="my-1">

            <div class="mt-3">
                <a class="btn btn-primary" href="/" role="button">Beranda</a>
                <a class="btn btn-primary" href="/peserta" role="button">Daftar Peserta per Mata Kuliah</a>
                <a class="btn btn-primary" href="/presensi-mhs" role="button">Presensi Mahasiswa per Mata Kuliah</a>
                <a class="btn btn-primary" href="/presensi-dosen" role="button">Presensi Dosen per Mata Kuliah</a>
                <a class="btn btn-primary" href="/nilai" role="button">Nilai Mahasiswa per Semester</a>
            </div>

            <hr class="my-1 mt-3 mb-3">

            <table class="table table-striped table-hover" id="data" style="font-size:12px">
                <thead align="center">
                <tr>
                    <td rowspan="2"><strong>No.</strong></td>
                    <td rowspan="2"><strong>NRP</strong></td>
                    <td rowspan="2"><strong>Nama Lengkap</strong></td>
                    <td colspan="{{ $data[5][array_key_last($data[5])-9] }}"><strong>Pertemuan Ke-</strong></td>
                    <td colspan="5"><strong>Jumlah</strong></td>
                </tr>
                <tr>
                    @for($i = 0 ; $i <= count($data[5])-5 ; $i++)
                        @if($i % 6 === 0)
                            <td>
                                <span><b>{{ $data[5][$i] }}</b></span><br>
                                <span style="font-size:10px">{{ $data[5][$i+1] }}<br></span>
                                {!! strpos(($data[5][$i+2]),"ONLINE") === 0 ?
                                    "<span style='color:green;font-size:10px'><b>".$data[5][$i+2]."</b></span>" :
                                    "<span style='color:grey;font-size:10px'><b>".$data[5][$i+2]."</b></span>" !!}
                            </td>
                        @endif
                    @endfor
                    <td><b>Hadir</b></td>
                    <td><b>Izin</b></td>
                    <td><b>Sakit</b></td>
                    <td><b>Alfa</b></td>
                    <td><b>% Hadir</b></td>
                </tr>
                </thead>
                <tbody>
                @for($j = 6 ; $j <= array_key_last($data) ; $j++)
                    <tr>
                        <td>{{ $data[$j][0] }}</td>
                        <td>{{ $data[$j][1] }}</td>
                        <td>{{ $data[$j][2] }}</td>
                        @for($k = 4 ; $k <= array_key_last($data[$j])-5 ; $k++)
                            @if($k % 2 === 0)
                                <td style="text-align:center">
                                    @if(substr($data[$j][$k],2,1) === "H")
                                        <span style="color:black;font-weight:bold">{{ substr($data[$j][$k],2,1) }}</span>
                                        <br>
                                        {!! substr(($data[$j][$k]),3,6) === "ONLINE" ?
                                        "<span style='color:green;font-size:10px'>".substr($data[$j][$k],3,6)."</span>" :
                                        "<span style='color:grey;font-size:10px'>".substr($data[$j][$k],10)."</span>" !!}
                                    @elseif(substr($data[$j][$k],2,1) === "S")
                                        <span style="color:green;font-weight:bold">{{ substr($data[$j][$k],2,1) }}</span>
                                    @elseif(substr($data[$j][$k],2,1) === "I")
                                        <span style="color:grey;font-weight:bold">{{ substr($data[$j][$k],2,1) }}</span>
                                    @else
                                        <span style="color:red;font-weight:bold">{{ substr($data[$j][$k],1,2) }}</span>
                                    @endif
                                </td>
                            @endif
                        @endfor
                        <td align="center">{{ $data[$j][array_key_last($data[$j])-4] }}</td>
                        <td align="center">{{ $data[$j][array_key_last($data[$j])-3] }}</td>
                        <td align="center">{{ $data[$j][array_key_last($data[$j])-2] }}</td>
                        <td align="center">{{ $data[$j][array_key_last($data[$j])-1] }}</td>
                        <td align="center">{{ $data[$j][array_key_last($data[$j])] }}</td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section("js")
    <script type="text/javascript">
        $('#data').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.11.4/i18n/id.json"
            }
        });
    </script>
@endsection
