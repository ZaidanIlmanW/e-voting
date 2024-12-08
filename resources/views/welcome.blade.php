@extends('layouts.user')

@section('title', 'E-Voting')

@section('content')
    <!-- Header Section -->
    <div class="py-2" style="background-color: #f8f9fa;">
        <div class="container text-center">
            <h1 class="fw-bold" style="font-size: 2.5rem; color: #343a40;">E-Voting</h1>
            <p class="mt-3" style="color: #6c757d; font-size: 1.1rem;">
                SMK NEGERI 1 PURWOKERTO
            </p>
        </div>
    </div>

    <!-- Logo Section -->
    <div class="container text-center my-5">
        <img src="{{ asset('image/smk1.png') }}" alt="Logo SMKN 1 Purwokerto" class="img-fluid w-25 mx-auto">
    </div>

    <!-- Panduan Section -->
    <div class="container">
        <div class="card mx-auto shadow-sm" style="max-width: 700px; border-radius: 12px; border: none;">
            <div class="card-body p-4">
                <h5 class="text-center fw-bold" style="color: #495057;">Panduan Penggunaan</h5>
                <p class="text-center text-muted mb-4">
                    Ikuti langkah-langkah berikut untuk menggunakan aplikasi E-Voting kami.
                </p>
                <ul class="list-unstyled" style="line-height: 1.8; color: #495057;">
                    <li>1. Masukkan token yang diberikan oleh panitia ke dalam kolom token.</li>
                    <li>2. Pilih kandidat yang Anda dukung.</li>
                    <li>3. Tekan tombol "Simpan" untuk mengirimkan suara Anda.</li>
                    <li>4. Setelah memilih, Anda tidak dapat mengubah suara Anda.</li>
                </ul>
                <div class="text-center mt-4">
                    <a href="/home" class="btn btn-danger btn-lg" style="border-radius: 25px;">Masuk</a>
                </div>
            </div>
        </div>
    </div>
@endsection
