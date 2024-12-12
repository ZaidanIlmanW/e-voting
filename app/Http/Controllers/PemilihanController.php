<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilihan;
use App\Models\Setting;
use App\Models\Kandidat;
use Illuminate\Support\Facades\DB;

class PemilihanController extends Controller
{
    public function index()
    {
        // Ambil setting aktif
        $setting = Setting::where('is_aktif', 1)->firstOrFail();
    
        // Periksa apakah sudah melewati tanggal akhir
        $currentDate = now();
        if ($currentDate->greaterThan($setting->tgl_akhir)) {
            return view('pemilihan.index', [
                'kandidat' => [],
                'limitMin' => null,
                'limitMax' => null,
                'isClosed' => true, // Tambahkan flag bahwa pemilihan ditutup
            ]);
        }
    
        $limitMin = $setting->limit_voting_min;
        $limitMax = $setting->limit_voting_max;
    
        $kandidat = Kandidat::where('id_setting', $setting->id_setting)
            ->orderBy('nourut')
            ->get();
    
        return view('pemilihan.index', compact('kandidat', 'limitMin', 'limitMax'))
            ->with('isClosed', false); // Flag bahwa pemilihan masih terbuka
    }
    

    
    

    public function pilih(Request $request)
    {
        $setting = Setting::where('is_aktif', 1)->firstOrFail();
    
        // Cek apakah sudah melewati tanggal akhir
        if (now()->greaterThan($setting->tgl_akhir)) {
            return redirect()->route('pemilihan.index')->withErrors(['error' => 'Pemilihan telah ditutup.']);
        }
    
        // Ambil token dari session
        $token = session()->get('token');
        $kandidatIds = $request->input('kandidat');
    
        // Validasi kandidat yang dipilih
        if (empty($kandidatIds)) {
            return redirect()->back()->withErrors(['error' => 'Anda harus memilih setidaknya satu kandidat.']);
        }
    
        if (count($kandidatIds) < $setting->limit_voting_min || count($kandidatIds) > $setting->limit_voting_max) {
            return redirect()->back()->withErrors(['error' => 'Jumlah kandidat yang dipilih tidak sesuai dengan batasan.']);
        }
    
        // Buat entri pemilihan baru
        $pemilihan = Pemilihan::create([
            'tgl' => now(),
            'id_setting' => $setting->id_setting,
        ]);
    
        // Pastikan pemilihan dibuat sebelum melanjutkan
        if (!$pemilihan || !$pemilihan->id) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memproses data pemilihan.']);
        }
    
        // Tambahkan detail pemilihan untuk setiap kandidat yang dipilih
        foreach ($kandidatIds as $id_kandidat) {
            DB::table('pemilihan_detail')->insert([
                'id_pemilihan' => $pemilihan->id,
                'id_kandidat' => $id_kandidat,
            ]);
        }
    
        // Tandai token sebagai sudah dipakai
        DB::table('token')->where('token', $token)->update(['is_pakai' => 1]);
    
        // Redirect ke halaman terima kasih
        return redirect()->route('thanks.index');
    }
    




    
    

}
