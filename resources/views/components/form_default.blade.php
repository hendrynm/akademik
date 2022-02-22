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
            <option value="Q">Q (B. Inggris)</option>
        </optgroup>
        <optgroup label="IUP">
            <option value="IUP">IUP</option>
            <option value="Q">Q</option>
        </optgroup>
        <optgroup label="MBKM">
            <option value="MPB">MPB (MBKM ITS)</option>
            <option value="M00">M00 (MBKM Dept.)</option>
            <option value="_">_ (MBKM SI Lama)</option>
        </optgroup>
        <optgroup label="Pengayaan">
            @foreach(range("A","G") as $char)
                <option value="{{ $char }}">{{ $char }}</option>
            @endforeach
            <option value="P">P</option>
            <option value="Q">Q</option>
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
