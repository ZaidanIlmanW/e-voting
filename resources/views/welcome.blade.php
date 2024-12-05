@extends('layouts.user')

@section('title', 'E-Voting')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">Welcome</h2>
        <div class="text-center mb-4">
            <img src="{{ asset('image/UNY.png') }}" alt="Logo UNY" class="img-fluid w-25 mb-4">
        </div>
        <div class="bg-white rounded shadow-sm p-4 mx-auto" style="max-width: 800px;">
            <p class="text-center mb-3">
                Berikut adalah langkah-langkah untuk menggunakan aplikasi E-Voting kami :
            </p>
            <ul class="list-unstyled mb-4">
                <li class="mb-2">1. Masukkan token yang diberikan oleh panitia ke dalam kolom token.</li>
                <li class="mb-2">2. Pilih kandidat yang Anda dukung.</li>
                <li class="mb-2">3. Tekan tombol "Simpan" untuk mengirimkan suara Anda.</li>
                <li>4. Jika sudah memilih dan menekan tombol Simpan maka tidak dapat memilih lagi.</li>
            </ul>
            <div class="text-center">
                <a href="/home" class="btn btn-danger btn-lg">Masuk</a>
            </div>
        </div>
    </div>
@endsection
