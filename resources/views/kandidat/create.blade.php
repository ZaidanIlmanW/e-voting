@extends('layouts.app')

@section('title', 'Create')

@section('content')
   <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg my-4">
                <div class="card-header">
                    <h3>Kandidat</h3>
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

<form action="{{ route('kandidat.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_kandidat" class="form-label">Nama</label>
                            <input type="text" class="form-control form-control-lg @error('nama_kandidat') is-invalid @enderror" placeholder="Masukkan Nama Kandidat" name="nama_kandidat" value="{{ old('nama_kandidat') }}">
                            @error('nama_kandidat')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control form-control-lg @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="nourut" class="form-label">No Urut</label>
                            <input type="number" class="form-control form-control-lg @error('nourut') is-invalid @enderror" placeholder="Masukkan No Urut" name="nourut" value="{{ old('nourut') }}">
                            @error('nourut')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
    <label for="id_setting" class="form-label">Setting</label>
    <select name="id_setting" class="form-control form-control-lg @error('id_setting') is-invalid @enderror">
        <option hidden>Pilih Setting</option>
        @foreach($setting as $setting)
            <option value="{{ $setting->id_setting }}" {{ old('id_setting') == $setting->id_setting ? 'selected' : '' }}>
                {{ $setting->nama_setting }}
            </option>
        @endforeach
    </select>
    @error('id_setting')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>                 
                      
<div class="mb-3"></div>
    <label for="foto" class="form-label">Foto Kandidat</label>
    <input type="file" name="foto" class="form-control" accept="image/*">
    </div>
@if(isset($kandidat) && $kandidat->foto)
    <img src="{{ asset('storage/' . $kandidat->foto) }}" width="100" alt="Foto Kandidat">
@endif

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('kandidat.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection