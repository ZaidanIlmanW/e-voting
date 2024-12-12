@extends('layouts.app')

@section('title', 'Edit Setting')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pengaturan Edit') }}</div>
                <div class="card-body">
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('setting.update', $setting->id_setting) }}" method="post" onsubmit="return confirm('Yakin ingin mengubah data?')">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_setting">Nama Setting</label>
                            <input type="text" name="nama_setting" class="form-control" value="{{ $setting->nama_setting }}" required>
                        </div>

                        <div class="form-group">
                            <label for="judul_pemilihan">Judul Pemilihan</label>
                            <input type="text" name="judul_pemilihan" class="form-control" value="{{ $setting->judul_pemilihan }}" required>
                        </div>

                        <div class="form-group">
                            <label for="limit_voting_min">Limit Voting Min</label>
                            <input type="number" name="limit_voting_min" class="form-control" value="{{ $setting->limit_voting_min }}" required>
                        </div>

                        <div class="form-group">
                            <label for="limit_voting_max">Limit Voting Max</label>
                            <input type="number" name="limit_voting_max" class="form-control" value="{{ $setting->limit_voting_max }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tgl_awal">Tanggal Awal</label>
                            <input type="datetime-local" name="tgl_awal" class="form-control" value="{{ $setting->tgl_awal }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tgl_akhir">Tanggal Akhir</label>
                            <input type="datetime-local" name="tgl_akhir" class="form-control" value="{{ $setting->tgl_akhir }}" required>
                        </div>

                        <div class="form-group">
                            <label for="is_aktif">is_aktif</label>
                            <select name="is_aktif" class="form-control" required>
                                <option value="1" {{ $setting->is_aktif == 1 ? 'selected' : '' }}>Aktif</option>

                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <a href="{{ route('setting.index') }}" class="btn btn-danger mt-3">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
