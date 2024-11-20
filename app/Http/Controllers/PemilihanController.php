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
        $setting = Setting::where('is_aktif', 1)->firstOrFail();

        $limitMin = $setting->limit_voting_min;
        $limitMax = $setting->limit_voting_max;

        $kandidat = Kandidat::where('id_setting', $setting->id_setting)
            ->orderBy('nourut')
            ->get();

        return view('pemilihan.index', compact('kandidat', 'limitMin', 'limitMax'));
    }

    public function pilih(Request $request)
{
    $token = session()->get('token'); // Ambil token dari session
    $kandidatIds = $request->input('kandidat'); // Ambil kandidat yang dipilih

    if (empty($kandidatIds)) {
        return redirect()->back()->withErrors(['error' => 'Anda harus memilih setidaknya satu kandidat.']);
    }

    $setting = Setting::where('is_aktif', 1)->firstOrFail();

    if (count($kandidatIds) < $setting->limit_voting_min || count($kandidatIds) > $setting->limit_voting_max) {
        return redirect()->back()->withErrors(['error' => 'Jumlah kandidat yang dipilih tidak sesuai dengan batasan.']);
    }

    $pemilihan = Pemilihan::where('id_setting', $setting->id_setting)->orderBy('tgl', 'desc')->first();

    if (!$pemilihan) {
        // Tambahkan data default jika diperlukan
        Pemilihan::create([
            'tgl' => now(),
            'id_setting' => $setting->id_setting,
        ]);
    
        // Setelah menambahkan, ambil ulang data
        $pemilihan = Pemilihan::where('id_setting', $setting->id_setting)->orderBy('tgl', 'desc')->first();
    }

    foreach ($kandidatIds as $id_kandidat) {
        DB::table('pemilihan_detail')->insert([
            'id_pemilihan' => $pemilihan->id_pemilihan,
            'id_kandidat' => $id_kandidat,
        ]);
    }

    DB::table('token')->where('token', $token)->update(['is_pakai' => 1]);

    return redirect()->route('hasil.index')->with('success', 'Pilihan Anda telah disimpan.');
    }

}
