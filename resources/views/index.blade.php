@extends("_layout.master")
@section("title","Beranda")

@section("konten")
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <h1 class="display-4"><b>Selamat Datang</b></h1>
            <p class="display-6">Pengambilan data Sistem Informasi Akademik ITS.</p>
            <hr class="my-1">
            <div class="mt-3">
                <a class="btn btn-primary" href="#" role="button">Daftar Peserta per Mata Kuliah</a>
                <a class="btn btn-primary" href="#" role="button">Presensi Mahasiswa per Mata Kuliah</a>
                <a class="btn btn-primary" href="#" role="button">Presensi Dosen per Mata Kuliah</a>
                <a class="btn btn-primary" href="#" role="button">Nilai Mahasiswa per Semester</a>
            </div>
        </div>
    </div>
@endsection
