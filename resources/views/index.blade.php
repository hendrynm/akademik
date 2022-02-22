@extends("_layout.master")
@section("title","Beranda")

@section("konten")
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <h1 class="display-4"><b>Selamat Datang</b></h1>
            <p class="display-6">Pengambilan data Sistem Informasi Akademik</p>

            <hr class="my-1">
            <x-navbar></x-navbar>
            <hr class="my-1 mt-3">
        </div>
    </div>
@endsection
