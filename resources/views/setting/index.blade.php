@extends('layouts.app')

@section('title', 'Setting')

@section('content')
    <div class="container">
        <h1>Setting</h1>
        <a href="{{ route('setting.create') }}" class="btn btn-primary">Add New Setting</a>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Setting</th>
                    <th>Judul Pemilihan</th>
                    <th>Limit Voting Min</th>
                    <th>Limit Voting Max</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($setting as $setting)
                    <tr>
                        <td>{{ $setting->id_setting }}</td>
                        <td>{{ $setting->nama_setting }}</td>
                        <td>{{ $setting->judul_pemilihan }}</td>
                        <td>{{ $setting->limit_voting_min }}</td>
                        <td>{{ $setting->limit_voting_max }}</td>
                        <td>
                            <a href="{{ route('setting.edit', $setting->id_setting) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('setting.destroy', $setting->id_setting) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
