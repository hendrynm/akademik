@extends("_layout.master")
@section("title","Beranda Daftar Peserta")

@section("konten")
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <p class="display-6"><b>Daftar Peserta Mata Kuliah</b></p>
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

        $('#prodi').change(function()
        {
            let prodi = $(this).val();
            let matkul = $("#matkul");
            $.ajax(
                {
                    type: 'GET',
                    url: '/ajax-daftar_matkul/' + prodi,
                    dataType: 'JSON',
                    success: function(data)
                        {
                            if(data)
                            {
                                $(matkul).empty();
                                $(matkul).append('<option selected disabled value="">-- Pilih salah satu --</option>')
                                $.each(data,function(i){
                                    $(matkul).append('<option value="' + data[i].kode_matkul + '">' +
                                        data[i].kode_matkul + " - " + data[i].nama_matkul + '</option>');
                                });
                            }
                            else
                            {
                                alert("PENGAMBILAN DATA GAGAL");
                            }
                        }
                })
        });
    </script>
@endsection
