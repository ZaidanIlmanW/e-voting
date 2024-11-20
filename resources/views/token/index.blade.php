@extends('layouts.app')

@section('title', 'Daftar Token')

@section('content')
<div class="container">
    <h1 class="text-center mt-4">Daftar Token Pemilih</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Ekspor ke PDF -->
    <div class="text-center mt-4">
        <a href="{{ route('export.pdf') }}" class="btn btn-primary">Export semua ke PDF</a>
    </div>

    <div class="text-center mt-4">
    <a href="{{ route('token.export.unused.pdf') }}" class="btn btn-info">Ekspor Token yang Belum Digunakan</a>
</div>


    <!-- Form untuk Generate Token -->
    <form action="{{ route('token.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group mb-3 col-md-6 mx-auto">
            <label for="id_setting">Setting Pemilihan</label>
            <select name="id_setting" id="id_setting" class="form-control" required>
                @foreach($setting as $setting)
                    <option value="{{ $setting->id_setting }}">{{ $setting->nama_setting }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3 col-md-6 mx-auto">
            <label for="jumlah_token">Jumlah Token</label>
            <input type="number" name="jumlah_token" id="jumlah_token" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">Generate Token</button>
    </form>

    <!-- Tabel Token -->
    <table class="table table-bordered mt-4" id="token-table">
        <thead>
            <tr>
                <th>Token</th>
                <th>Setting Pemilihan</th>
                <th>Status Penggunaan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($token as $item)
                <tr>
                    <td>{{ $item->token }}</td>
                    <td>{{ $item->setting->nama_setting ?? 'Tidak Ada' }}</td>
                    <td>
                        @if ($item->is_pakai)
                            <span class="badge bg-success">Sudah Digunakan</span>
                        @else
                            <span class="badge bg-warning">Belum Digunakan</span>
                        @endif
                    </td>
                  


                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
