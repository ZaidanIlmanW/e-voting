@extends('layouts.user')

@section('title', 'Terimakasih')

@section('content')
    <div class="container text-center" style="margin-top: 100px;">
        <img src="{{ asset('image/Logo-pdi.png') }}" alt="Terima Kasih" class="img-fluid" style="max-width: 300px; margin-bottom: 20px;">
        <h2 class="mb-4">Terima Kasih Sudah Memilih</h2>
        <p>Kami sangat menghargai partisipasi Anda.</p>
        <!-- <div class="text-center">
                <a href="/home" class="btn btn-danger btn-lg">Kembali</a>
            </div> -->
    </div>
@endsection
