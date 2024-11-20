<!-- resources/views/verifikasi.blade.php -->
@if (session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<form action="{{ route('token.verifikasi') }}" method="POST">
    @csrf
    <label for="token">Masukkan Token Anda:</label>
    <input type="text" name="token" id="token" required>

    <button type="submit">Verifikasi Token</button>
</form>
