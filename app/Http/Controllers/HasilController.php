<?php

namespace App\Http\Controllers;

use App\Models\Pemilihan;
use App\Models\PemilihanDetail;
use App\Models\Kandidat;
use Illuminate\Http\Request;

class HasilController extends Controller
{

    public function index()
    {
        // Ambil data hasil pemilihan, termasuk foto kandidat
        $hasil = Kandidat::select('kandidat.nama_kandidat', 'kandidat.nourut', 'kandidat.foto', \DB::raw('COUNT(pemilihan_detail.id_detail) as total_suara'))
            ->leftJoin('pemilihan_detail', 'kandidat.id_kandidat', '=', 'pemilihan_detail.id_kandidat')
            ->groupBy('kandidat.id_kandidat', 'kandidat.nama_kandidat', 'kandidat.nourut', 'kandidat.foto')
            ->orderBy('total_suara', 'desc')
            ->get();

        // Kirim data ke view
        return view('hasil.index', compact('hasil'));
    }
}
