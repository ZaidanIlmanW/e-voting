@extends('layouts.admin')

@section('title', 'Daftar Kandidat')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <h1 class="text-center mb-4">Daftar Kandidat</h1>
            
            <a href="{{ route('kandidat.create') }}" class="btn btn-danger mb-3">Tambah Kandidat</a>

            <!-- cari -->
            <form action="{{ route('kandidat.index') }}" method="GET" class="d-flex mb-3 col-md-4">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari Kandidat..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-danger">Cari</button>
            </form>

            <!-- Tampilkan Pesan Sukses Jika Ada -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Daftar Kandidat -->
            <table class="table table-bordered table-hover">
                <thead class="table-danger text-center">
                    <tr>
                        <th>Foto</th>
                        <th>Nama Kandidat</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Alamat</th>
                        <th>No Urut</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kandidat as $kandidat)
                    <tr class="text-center align-middle">
                    <td>
                        @if($kandidat->foto)
                            <img src="{{ Storage::url($kandidat->foto) }}" width="150" height="170" style="object-fit: cover;" alt="Foto Kandidat">
                        @else
                            Tidak Ada Foto
                        @endif
                    </td>
                        <td>{{ $kandidat->nama_kandidat }}</td>
                        <td>{{ $kandidat->tanggal_lahir }}</td>
                        <td>{{ $kandidat->tempat_lahir }}</td>
                        <td>{{ $kandidat->alamat }}</td>
                        <td>{{ $kandidat->nourut }}</td>
                        <td>
                            <!-- Ganti tombol dengan icon -->
                            <a href="{{ route('kandidat.edit', $kandidat->id_kandidat) }}" class="btn btn-warning btn-sm me-2">
                                <i class="fas fa-edit"></i> <!-- Icon Edit -->
                            </a>
                            <form action="{{ route('kandidat.destroy', $kandidat->id_kandidat) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kandidat ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> <!-- Icon Hapus -->
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
