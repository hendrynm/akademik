@extends("_layout.master")
@section("title","Beranda Daftar Peserta")

@section("konten")
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <p class="display-6"><b>MAAF YA MENU INI BELUM TERSEDIA :(</b></p>
            <hr class="my-1">
            <div class="mt-3">
                <a class="btn btn-primary" href="/" role="button">Beranda</a>
                <a class="btn btn-primary" href="/peserta" role="button">Daftar Peserta per Mata Kuliah</a>
                <a class="btn btn-primary" href="/presensi-mhs" role="button">Presensi Mahasiswa per Mata Kuliah</a>
                <a class="btn btn-primary" href="/presensi-dosen" role="button">Presensi Dosen per Mata Kuliah</a>
                <a class="btn btn-primary" href="/nilai" role="button">Nilai Mahasiswa per Semester</a>
            </div>
            <hr class="my-1 mt-3">
        </div>
    </div>
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <form action="/cek" method="post">

            </form>
        </div>
    </div>
@endsection
