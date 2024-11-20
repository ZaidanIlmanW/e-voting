@extends('layouts.app')

@section('title', 'Generate Token')

@section('content')
<div class="container">
    <h1 class="text-center mt-4">Generate Token Pemilih</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('token.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_setting" class="form-label">Setting Pemilihan</label>
            <select class="form-control" name="id_setting" id="id_setting" required>
                @foreach ($settings as $setting)
                    <option value="{{ $setting->id_setting }}">{{ $setting->nama_setting }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Generate Token</button>
    </form>
</div>
@endsection
