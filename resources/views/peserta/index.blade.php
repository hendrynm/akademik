@extends("_layout.master")
@section("title","Beranda Daftar Peserta")

@section("konten")
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <p class="display-6"><b>Daftar Peserta per Mata Kuliah</b></p>
            <hr class="my-1">
            <div class="mt-3">
                <a class="btn btn-primary" href="/" role="button">Beranda</a>
                <a class="btn btn-primary" href="/peserta" role="button">Daftar Peserta per Mata Kuliah</a>
                <a class="btn btn-primary" href="/presensi-mhs" role="button">Presensi Mahasiswa per Mata Kuliah</a>
                <a class="btn btn-primary" href="/presensi-dosen" role="button">Presensi Dosen per Mata Kuliah</a>
                <a class="btn btn-primary" href="/nilai" role="button">Nilai Mahasiswa per Semester</a>
            </div>
            <hr class="my-1 mt-3 mb-3">

            <form action="{{ route("peserta.cek") }}" method="post">
                @csrf
                <div class="form-group col-lg-4">
                    <label class="form-label" for="phpsess"><b>PHPSESSID</b></label>
                    <input class="form-control" type="password" id="phpsess" name="phpsess" placeholder="Masukkan PHPSESSID yang ada di Siakad" required>
                    <div id="phpsess_help" class="form-text">Perlu bantuan mendapatkan PHPSESSID?</div>
                </div>
                <br>
                <div class="form-group col-lg-4">
                    <label class="form-label" for="prodi"><b>Program Studi</b></label>
                    <select class="form-select" id="prodi" name="prodi" required>
                        <option selected disabled value="">-- Pilih --</option>
                        @foreach($prodi as $p)
                            <option value="{{ $p->id_prodi }}">{{ $p->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group col-lg-4">
                    <label class="form-label" for="matkul"><b>Nama Mata Kuliah</b></label>
                    <select class="form-select" id="matkul" name="matkul" required>
                        <option selected disabled value="">-- Pilih --</option>
                    </select>
                </div>
                <br>
                <div class="form-group col-sm-2">
                    <label class="form-label" for="tahun"><b>Tahun</b></label>
                    <select class="form-select" id="tahun" name="tahun" required>
                        <option selected disabled value="">-- Pilih --</option>
                        @foreach(range(2015,2022) as $thn)
                            <option value="{{ $thn }}">{{ $thn }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group col-lg-2">
                    <label class="form-label" for="smt"><b>Semester</b></label>
                    <select class="form-select" id="smt" name="smt" required>
                        <option selected disabled value="">-- Pilih --</option>
                        <option value="1">Gasal</option>
                        <option value="2">Genap</option>
                    </select>
                </div>
                <br>
                <div class="form-group col-sm-2">
                    <label class="form-label" for="kelas"><b>Kelas</b></label>
                    <select class="form-select" id="kelas" name="kelas" required>
                        <option selected disabled value="">-- Pilih --</option>
                        <optgroup label="Reguler">
                            @foreach(range("A","G") as $char)
                                <option value="{{ $char }}">{{ $char }}</option>
                            @endforeach
                            <option value="P">P (Pengayaan)</option>
                            <option value="Q">Q (Bahasa Inggris)</option>
                        </optgroup>
                        <optgroup label="IUP">
                            <option value="IUP">IUP</option>
                            <option value="Q">Q</option>
                        </optgroup>
                        <optgroup label="Pengayaan">
                            @foreach(range("A","G") as $char)
                                <option value="{{ $char }}">{{ $char }}</option>
                            @endforeach
                            <option value="P">P</option>
                            <option value="Z">Z</option>
                        </optgroup>
                        <optgroup label="UPMB">
                            @foreach(range(1,100) as $int)
                                <option value="{{ $int }}">{{ $int }}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="MBKM">
                            <option value="MPB">MPB (MBKM ITS)</option>
                            <option value="M00">M00 (MBKM Dept.)</option>
                            <option value="_">_ (MBKM SI)</option>
                        </optgroup>
                    </select>
                </div>
                <br>
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
