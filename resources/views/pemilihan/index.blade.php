@extends('layouts.user')

@section('title', 'Pemilihan Kandidat')

@section('content')
<div class="container">
    <h1 class="text-center my-5 display-5 fw-bold" style="color: #c30010;">Silahkan Memilih Kandidat</h1>

    <!-- Pesan Error -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Pemilihan -->
    <form action="{{ route('pemilihan.pilih') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <!-- Loop untuk setiap kandidat -->
            @foreach($kandidat as $k)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card shadow-sm border-0 h-100" style="border-radius: 15px; overflow: hidden;" onclick="toggleCheckbox(this)">
                        <!-- Foto Kandidat -->
                        <div class="img-container">
                            <img src="{{ asset('storage/' . $k->foto) }}" class="card-img-top" alt="Foto {{ $k->nama_kandidat }}">
                        </div>
                            
                        <div class="card-body text-center">
                            <!-- Nomor Urut -->
                            <h5 class="card-title fw-semibold" style="color: #333;">No. {{ $k->nourut }}</h5>
                            <!-- Nama Kandidat -->
                            <p class="card-text text-muted">{{ $k->nama_kandidat }}</p>

                            <!-- Checkbox Pilih Kandidat -->
                            <label>
                                <input type="checkbox" name="kandidat[]" value="{{ $k->id_kandidat }}" class="checkbox-kandidat">
                                Pilih
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tombol Submit -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-sm px-4 py-2" 
                    style="border-radius: 10px; background-color: #c30010; border: none;">
                Pilih
            </button>
        </div>
    </form>
</div>

<style>
    .container h1 {
        font-family: 'Poppins', sans-serif;
    }
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    .card-title {
        font-size: 1.1rem;
    }
    .card-text {
        font-size: 0.9rem;
    }
    .btn-primary {
        font-size: 0.85rem;
    }
    
    /* Pengaturan foto kandidat agar sesuai dengan bingkai */
    .img-container {
        width: 100%;
        height: 60%;
        overflow: hidden;
    }
    .img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 15px 15px 0 0;
    }
</style>

@endsection

@section('scripts')
<script>
// Function untuk toggle checkbox saat card diklik
function toggleCheckbox(card) {
    var checkbox = card.querySelector('input[type="checkbox"]');
    if (checkbox) {
        checkbox.checked = !checkbox.checked; // Toggle checkbox checked state
    }
}
</script>
@endsection
