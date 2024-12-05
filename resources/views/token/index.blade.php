@extends('layouts.admin')

@section('title', 'Daftar Token')

@section('content')
<div class="container">
    <h1 class="text-center mt-4">Daftar Token Pemilih</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form untuk Generate Token -->
    <div class="mt-5">
        
        <form action="{{ route('token.store') }}" method="POST" class="mt-3">
            @csrf
            <div class="row justify-content-center">
                <div class="form-group col-md-4">
                    <label for="id_setting">Pilih Setting Pemilihan:</label>
                    <select name="id_setting" id="id_setting" class="form-control" required>
                        <option value="" disabled selected>Pilih Setting</option>
                        @foreach ($setting as $s)
                            <option value="{{ $s->id_setting }}">{{ $s->nama_setting }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="jumlah_token">Jumlah Token:</label>
                    <input type="number" name="jumlah_token" id="jumlah_token" class="form-control" required min="1" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100">Generate Token</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tombol Export dan Hapus Semua Token -->
    <div class="row justify-content-center mt-4">
       
        <div class="col-md-3 mb-3 text-center">
            <a href="{{ route('token.export.unused.pdf') }}" class="btn btn-info w-100">Print Token</a>
        </div>
        <div class="col-md-3 mb-3 text-center">
            <form action="{{ route('token.delete.all') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua token?')" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">Hapus Semua Token</button>
            </form>
        </div>
    </div>

    <!-- Tabel Token -->
    <div class="mt-5">
        
        <table class="table table-bordered mt-4 text-center" id="token-table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Token</th>
                    <th>Setting Pemilihan</th>
                    <th>Status Penggunaan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($token as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->token }}</td>
                        <td>{{ $item->setting->nama_setting ?? 'Tidak Ada' }}</td>
                        <td>
                            @if ($item->is_pakai)
                                <span class="badge bg-success">Sudah Digunakan</span>
                            @else
                                <span class="badge bg-warning">Belum Digunakan</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada token yang dibuat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
