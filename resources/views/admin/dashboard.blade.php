@extends('layouts.admin')

@section('title', 'Dashboard - Admin')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="dashboard-container text-center">
        <h2 class="text-center mb-5">ADMIN</h2>

        <!-- Gambar Admin -->
        <div class="image-container mb-4">
            <img src="{{ asset('image/smk1.png') }}" alt="Admin Photo" class="img-fluid rounded-circle" style="width: 300px; height: 230px;">
        </div>

        <!-- Deskripsi atau info tambahan -->
        <p>Selamat Datang di Dashboard Admin.</p>
        
    </div>
</div>
@endsection
