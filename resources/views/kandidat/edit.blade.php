@extends('layouts.app')

@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg my-4">
                <div class="card-header">
                    <h3>Edit Kandidat</h3>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('kandidat.update', $kandidat->id_kandidat) }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Yakin ingin mengubah data ?')">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_kandidat" class="form-label">Nama</label>
                            <input type="text" name="nama_kandidat" class="form-control form-control-lg @error('nama_kandidat') is-invalid @enderror" value="{{ $kandidat->nama_kandidat }}" required>
                            @error('nama_kandidat')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control form-control-lg @error('alamat') is-invalid @enderror" value="{{ $kandidat->alamat }}" required>
                            @error('alamat')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $kandidat->tanggal_lahir }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="{{ $kandidat->tempat_lahir }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nourut" class="form-label">No Urut</label>
                            <input type="number" name="nourut" class="form-control form-control-lg @error('nourut') is-invalid @enderror" value="{{ $kandidat->nourut }}" required>
                            @error('nourut')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_setting" class="form-label">Setting</label>
                            <select name="id_setting" class="form-control form-control-lg @error('id_setting') is-invalid @enderror" required>
                                <option value="">Pilih Setting</option>
                                @foreach($setting as $setting)
                                    <option value="{{ $setting->id_setting }}" {{ $kandidat->id_setting == $setting->id_setting ? 'selected' : '' }}>
                                        {{ $setting->nama_setting }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_setting')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Kandidat</label>
                            <input type="file" name="foto" class="form-control">
                            @if(isset($kandidat->foto))
                                <img src="{{ asset('storage/' . $kandidat->foto) }}" width="100" alt="Foto Kandidat">
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kandidat.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
