@extends('layouts.admin')

@section('title', 'Dashboard - Admin')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="dashboard-container text-center">
        <h2 class="text-center mb-5">Selamat Datang di Dashboard Admin</h2>

        <!-- Gambar Admin -->
        <div class="image-container mb-4">
            <img src="{{ asset('image/Logo-pdi.png') }}" alt="Admin Photo" class="img-fluid rounded-circle">
        </div>

        <!-- Deskripsi atau info tambahan -->
        <p>Kelola aplikasi Anda dengan mudah dan efisien melalui dashboard ini.</p>
        
        <!-- Button Logout -->  
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Logout</button>
        </form>
    </div>
</div>
@endsection
