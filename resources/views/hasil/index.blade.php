@extends('layouts.app')

@section('title', 'Hasil Pemilihan')

@section('content')
<div class="container">
    <h1 class="text-center my-5 display-5 fw-bold" style="color: #c30010;">Hasil Pemilihan</h1>

    <!-- Informasi -->
    <p class="text-center text-muted mb-4">Berikut adalah hasil akhir dari pemilihan kandidat berdasarkan total suara yang masuk.</p>

    <!-- Daftar Kandidat dengan Hasil Suara -->
    <div class="row justify-content-center">
        <!-- Loop untuk setiap kandidat -->
        @foreach($hasil as $index => $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card shadow-sm border-0 h-100" style="border-radius: 15px; overflow: hidden;">
                    <!-- Foto Kandidat -->
                    <div class="img-container">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="Foto {{ $item->nama_kandidat }}">
                    </div>
                    
                    <div class="card-body text-center">
                        <!-- Nomor Urut -->
                        <h5 class="card-title fw-semibold" style="color: #333;">No. {{ $item->nourut }}</h5>
                        <!-- Nama Kandidat -->
                        <p class="card-text text-muted mb-2">{{ $item->nama_kandidat }}</p>
                        <!-- Total Suara -->
                        <span class="badge bg-primary fs-6 px-3 py-2">
                            <i class="fas fa-vote-yea me-1"></i>{{ $item->total_suara }} Suara
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Catatan -->
    <div class="text-center mt-4">
        <p class="text-muted">Hasil ini berdasarkan total suara yang dihitung hingga saat ini.</p>
    </div>
</div>

<style>
    .container h1 {
        font-family: 'Poppins', sans-serif;
    }
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: default;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    .card-title {
        font-size: 1.1rem;
    }
    .card-text {
        font-size: 0.9rem;
    }
    .badge {
        font-size: 0.9rem;
    }
    
    /* Pengaturan foto kandidat agar sesuai dengan bingkai */
    .img-container {
        width: 100%;
        height: 60%;
        overflow: hidden;
    }
    .img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 15px 15px 0 0;
    }
</style>
@endsection
