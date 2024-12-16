@extends('layouts.admin')

@section('title', 'Setting')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Setting</h1>

        @if ($setting) <!-- Pastikan setting ada -->
            <div class="card shadow-lg border-0 rounded-lg">
                <!-- Menghapus background biru pada header -->
                <div class="card-header text-center py-3">
                    <!-- Anda bisa menambahkan judul atau logo di sini jika diperlukan -->
                </div>
                <div class="card-body">
                    <!-- Menggunakan padding dan margin untuk membuat tampilan lebih rapi -->
                    <div class="row mb-3">
                        <div class="col-4 font-weight-bold"><strong>Nama Setting :</strong></div>
                        <div class="col-8">{{ $setting->nama_setting }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 font-weight-bold"><strong>Judul Pemilihan :</strong></div>
                        <div class="col-8">{{ $setting->judul_pemilihan }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 font-weight-bold"><strong>Limit Voting Min :</strong></div>
                        <div class="col-8">{{ $setting->limit_voting_min }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 font-weight-bold"><strong>Limit Voting Max :</strong></div>
                        <div class="col-8">{{ $setting->limit_voting_max }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 font-weight-bold"><strong>Tanggal Awal :</strong></div>
                        <div class="col-8">{{ $setting->tgl_awal }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 font-weight-bold"><strong>Tanggal Akhir :</strong></div>
                        <div class="col-8">{{ $setting->tgl_akhir }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 font-weight-bold"><strong>Status :</strong></div>
                        <div class="col-8">
                            <span class="badge bg-{{ $setting->is_aktif ? 'success' : 'secondary' }} text-white">
                                {{ $setting->is_aktif ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <!-- Tombol dengan efek hover -->
                    <a href="{{ route('setting.edit', $setting->id_setting) }}" class="btn btn-danger btn-sm px-4 py-2 rounded-pill shadow-sm hover-zoom" >
                        Edit Setting
                    </a>
                </div>
            </div>
        @else
            <p class="text-center text-muted">Setting tidak ditemukan.</p>
        @endif
    </div>
@endsection

<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .hover-zoom:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }
</style>
