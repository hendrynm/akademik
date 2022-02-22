@extends("_layout.master")
@section("title","Presensi Dosen $matkul")

@section("konten")
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <p class="display-6"><b>Presensi Dosen per Mata Kuliah</b></p>
            <p class="display-4"><b>{{ $matkul }}</b></p>

            <hr class="my-1">
            <x-navbar></x-navbar>
            <hr class="my-1 mt-3 mb-3">

            <table class="table table-striped table-hover" id="data" style="font-size:12px;width:100%">
                <thead align="center">
                <tr>
                    <td style="font-weight:bold">No.</td>
                    <td style="font-weight:bold">Jenis</td>
                    <td style="font-weight:bold">Tanggal</td>
                    <td style="font-weight:bold">Mulai</td>
                    <td style="font-weight:bold">Selesai</td>
                    <td style="font-weight:bold">Dosen</td>
                    <td style="font-weight:bold">Topik</td>
                    <td style="font-weight:bold">Berita Acara</td>
                </tr>
                </thead>
                <tbody>
                @for($i = 5 ; $i <= array_key_last($data) ; $i++)
                    <tr>
                        <td align="center">{{ $data[$i][0] }}</td>
                        @if(strpos(($data[$i][3]),"ONLINE") === 0)
                            <td style='color:green'><b>{{ $data[$i][3] }}</b></td>
                        @elseif(strpos(($data[$i][3]),"HYBRID") === 0)
                            <td style='color:tomato'><b>{{ $data[$i][3] }}</b></td>
                        @else
                            <td style='color:grey'><b>{{ $data[$i][3] }}</b></td>
                        @endif
                        <td align="center">{{ $data[$i][4] }}</td>
                        <td align="center">{{ $data[$i][5] }}</td>
                        <td align="center">{{ $data[$i][6] }}</td>
                        <td>{{ $data[$i][7] }}</td>
                        <td>{{ $data[$i][8] }}</td>
                        <td>
                            @for($j = 10 ; $j < array_key_last($data[$i]) ; $j+=2)
                                <ul><li>{{ substr($data[$i][$j],3) }}<br>{{ substr($data[$i][$j+1],1) }}</li></ul>
                            @endfor
                        </td>
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
