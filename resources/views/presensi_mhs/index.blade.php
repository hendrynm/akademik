@extends("_layout.master")
@section("title","Beranda Daftar Peserta")

@section("konten")
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <p class="display-6"><b>Presensi Mahasiswa per Mata Kuliah</b></p>
            <hr class="my-1">
            <div class="mt-3">
                <a class="btn btn-primary" href="/" role="button">Beranda</a>
                <a class="btn btn-primary" href="/peserta" role="button">Daftar Peserta per Mata Kuliah</a>
                <a class="btn btn-primary" href="/presensi-mhs" role="button">Presensi Mahasiswa per Mata Kuliah</a>
                <a class="btn btn-primary" href="/presensi-dosen" role="button">Presensi Dosen per Mata Kuliah</a>
                <a class="btn btn-primary" href="/nilai" role="button">Nilai Mahasiswa per Semester</a>
            </div>
            <hr class="my-1 mt-3 mb-3">

            @if(session()->has("error"))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>
                <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                        <b>{{ session()->get("error") }}</b>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route("pre-mhs.cek") }}" method="post">
                @csrf
                <div class="form-group col-lg-5">
                    <label class="form-label" for="phpsess"><b>PHPSESSID</b></label>
                    <input class="form-control" type="password" id="phpsess" name="phpsess" placeholder="Masukkan PHPSESSID yang ada di Siakad">
                    <a data-bs-toggle="collapse" href="#phpsess_help" role="button" aria-expanded="false"
                       aria-controls="phpsess_help">Perlu bantuan mendapatkan PHPSESSID?</a>
                    <div class="collapse" id="phpsess_help">
                        <div class="card card-body">
                            <span>
                                1. Buka aplikasi Siakad melalui
                                <a href="https://akademik.its.ac.id/myitsauth.php" target="_blank">link ini</a>
                            </span>
                            <span>
                                2. Buka halaman Transkrip Mata Kuliah
                                <a href="https://akademik.its.ac.id/xrep_transkrip_sementara.php" target="_blank">di sini</a>
                            </span>
                            <span>
                                3. Copy kode di bawah ini dan tempelkan di bagian Tanggal<br>
                                <code>{{ "<script>alert(document.cookie)</script>" }}</code>
                            </span>
                            <span>
                                4. Klik tombol "Tampilkan" dan copy PHPSESSID yang muncul
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group col-lg-5">
                    <label class="form-label" for="prodi"><b>Program Studi</b></label>
                    <select class="form-select" id="prodi" name="prodi" required>
                        <option selected disabled value="">-- Pilih --</option>
                        <option value="52100">S-1 SISTEM INFORMASI</option>
                        <option value="52102">S-1 SISTEM INFORMASI KELAS INTERNASIONAL</option>
                    </select>
                </div>
                <br>
                <div class="form-group col-lg-5">
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
