@extends('layouts.user')

@section('title', 'Pemilihan Ditutup')

@section('content')
<div class="container mt-5 text-center">
    <h1>Pemilihan Ditutup</h1>
    <p>Maaf, pemilihan telah berakhir pada tanggal {{ \Carbon\Carbon::parse($setting->tgl_akhir)->format('d M Y') }}.</p>
</div>
@endsection
