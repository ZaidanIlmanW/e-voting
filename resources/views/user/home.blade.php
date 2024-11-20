@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <h2 class="text-center mb-5">Selamat Datang</h2>

    <img src="{{ asset('image/UNY.png') }}" alt="" class="img-fluid mx-auto d-block w-25 mb-5">

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
    <form action="{{ route('verifikasi.token') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="col-md-6 mx-auto text-center">
                <label for="token">Masukkan Token</label>
                <input type="text" class="form-control" name="token" id="token" required>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-3 text">Masuk</button>
        </div>
    </form>
</div>
@endsection
