<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class TokenController extends Controller
{
    public function index()
    {
        $token = Token::orderBySetting()->get();
        $setting = Setting::orderBy('judul_pemilihan', 'asc')->get();
    
        // Kirim data token dan setting ke view
        return view('token.index', compact('token', 'setting'));
    }

    public function create()
    {
        $setting = Setting::orderBy('judul_pemilihan', 'asc')->get();
        
        return view('token.create', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_setting' => 'required|exists:setting,id_setting',
            'jumlah_token' => 'required|integer|min:1', // Validasi jumlah token
        ]);
    
        $tokens = []; // Array untuk menyimpan data token
    
        for ($i = 0; $i < $request->jumlah_token; $i++) {
            // Generate token unik
            $token = $this->generateUniqueToken();
    
            $tokens[] = [
                'token' => $token,
                'id_setting' => $request->id_setting,
                'is_pakai' => false, // Default: belum digunakan
               
            ];
        }
    
        // Masukkan semua token ke database dalam sekali operasi
        Token::insert($tokens);
    
        // Redirect dengan pesan sukses
        return redirect()->route('token.index')->with('success', $request->jumlah_token . ' token berhasil dibuat.');
    }
    

    public function verifikasiToken(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);

        // Cari token di database berdasarkan nilai token
        $token = Token::where('token', $request->token)->where('is_pakai', false)->first();

        if ($token) {
            // Tandai token sebagai sudah dipakai
            $token->is_pakai = true;
            $token->save();

            // Arahkan ke halaman pemilihan
            return redirect()->route('pemilihan.index')->with('success', 'Token valid. Silakan memilih.');
        } else {
            // Jika token tidak valid atau sudah dipakai
            return redirect()->back()->with('error', 'Token tidak valid atau sudah digunakan.');
        }
    }

    public function showGenerateForm()
    {
        $setting = Setting::orderBy('judul_pemilihan', 'asc')->get(); // Urutkan berdasarkan judul_pemilihan
        return view('token.generate', compact('setting')); // Pastikan halaman view benar
    }

    public function generateToken(Request $request)
    {
        $request->validate([
            'id_setting' => 'required|exists:setting,id_setting',
            'jumlah_token' => 'required|integer|min:1',
        ]);

        $tokens = [];
        for ($i = 0; $i < $request->jumlah_token; $i++) {
            // Generate token sesuai aturan
            $token = $this->generateUniqueToken();

            // Simpan token ke database
            $tokens[] = [
                'token' => $token,
                'id_setting' => $request->id_setting,
                'is_pakai' => false, // Default belum digunakan
            ];
        }

        Token::insert($tokens);

        return redirect()->route('token.index')->with('success', $request->jumlah_token . ' Token berhasil dibuat.');
    }

    // Fungsi untuk generate token unik sesuai aturan
    private function generateUniqueToken()
    {
        $forbiddenCharacters = ['i', 'j', '1', 'l', 'I', 'o', '0', 'q']; // Karakter yang tidak diperbolehkan
        $letters = 'abcdefghkmnprstuvwxyz'; // Huruf yang diperbolehkan (tanpa i, j, l, I, o, q)
        $numbers = '23456789'; // Angka yang diperbolehkan (tanpa 0, 1)

        do {
            // Generate 3 huruf acak
            $letterPart = '';
            for ($i = 0; $i < 3; $i++) {
                $letterPart .= $letters[rand(0, strlen($letters) - 1)];
            }

            // Generate 3 angka acak
            $numberPart = '';
            for ($i = 0; $i < 3; $i++) {
                $numberPart .= $numbers[rand(0, strlen($numbers) - 1)];
            }

            // Gabungkan huruf dan angka menjadi token
            $token = $letterPart . $numberPart;

        } while (Token::where('token', $token)->exists() || $this->hasForbiddenCharacters($token, $forbiddenCharacters)); // Pastikan token unik dan tidak mengandung karakter terlarang

        return $token;
    }

    // Fungsi untuk cek apakah token mengandung karakter terlarang
    private function hasForbiddenCharacters($token, $forbiddenCharacters)
    {
        foreach ($forbiddenCharacters as $char) {
            if (strpos($token, $char) !== false) {
                return true; // Jika ada karakter terlarang, return true
            }
        }
        return false; // Tidak ada karakter terlarang
    }

  

public function exportUnusedTokensPdf()
{
    // Ambil token yang belum digunakan saja
    $tokens = Token::with('setting')->where('is_pakai', false)->get();

    // Generate PDF hanya dengan token yang belum digunakan
    $pdf = PDF::loadView('exports.tokens_pdf', compact('tokens'));

    // Return file PDF
    return $pdf->download('daftar_tokens.pdf');
}


public function deleteAll()
{
    Token::truncate(); // Menghapus semua data token dari tabel
    return redirect()->route('token.index')->with('success', 'Semua token berhasil dihapus.');
}





}
