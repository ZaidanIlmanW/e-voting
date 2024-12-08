@extends('layouts.user')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-5">Halo</h2>

    <img src="{{ asset('image/smk1.png') }}" alt="" class="img-fluid mx-auto d-block w-25 mb-5 gambar-geser">

    <!-- Menampilkan Pesan Sukses atau Error -->
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    <!-- Input Token -->
    <form action="{{ route('verifikasi.token') }}" method="POST" class="form-geser">
        @csrf
        <div class="form-group">
            <div class="col-md-6 mx-auto text-center">
                <label for="token">Masukkan Token</label>
                <input type="text" class="form-control input-token" name="token" id="token" required> <!-- Tambahkan kelas input-token -->
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger mt-3 text">Masuk</button>
        </div>
    </form>
</div>
@endsection
