@extends("_layout.master")
@section("title","Daftar Peserta $matkul")

@section("konten")
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <p class="display-6"><b>Daftar Peserta Mata Kuliah</b></p>
            <p class="display-4"><b>{{ $matkul }}</b></p>

            <hr class="my-1">
            <x-navbar></x-navbar>
            <hr class="my-1 mt-3 mb-3">

            @if(count($data[3]) === 1)
                <p class="display-6"><b>Data Tidak Ditemukan 😭</b></p>
            @else
            <table class="table table-striped table-hover" id="data">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>NRP</th>
                    <th>Nama Lengkap</th>
                    <th>Alih Kredit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $d)
                    <tr>
                        <td>{{ $d[0] }}</td>
                        <td>{{ $d[1] }}</td>
                        <td>{{ $d[2] }}</td>
                        <td>{{ $d[3] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
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
