@extends("_layout.master")
@section("title","Beranda Daftar Peserta")

@section("konten")
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <p class="display-6"><b>Daftar Peserta per Mata Kuliah</b></p>
            <hr class="my-1">
            <x-navbar></x-navbar>
            <hr class="my-1 mt-3 mb-3">
            <x-alert_error></x-alert_error>

            <form action="{{ route("peserta.cek") }}" method="post">
                <x-form_default></x-form_default>
                <div class="form-group col-sm-3">
                    <label class="form-label" for="log"><b>Tampilkan Waktu Ambil Matkul</b></label>
                    <select class="form-select" id="log" name="log" required>
                        <option selected disabled value="">-- Pilih --</option>
                        <option value="0">Sembunyikan</option>
                        <option value="1">Tampilkan</option>
                    </select>
                </div>
                <br>
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
