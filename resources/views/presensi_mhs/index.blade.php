@extends("_layout.master")
@section("title","Beranda Daftar Presensi Mahasiswa")

@section("konten")
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <p class="display-6"><b>Presensi Mahasiswa per Mata Kuliah</b></p>
            <hr class="my-1">
            <x-navbar></x-navbar>
            <hr class="my-1 mt-3 mb-3">
            <x-alert_error></x-alert_error>

            <form action="{{ route("pre-mhs.cek") }}" method="post">
                <x-form_default></x-form_default>
                <button type="submit" class="btn btn-primary btn-lg">Tampilkan Data</button>
            </form>
        </div>
    </div>
@endsection

@section("js")
    <script type="text/javascript">
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
                                $(matkul).append('<option selected disabled value="">-- Pilih --</option>')
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
