<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KandidatController extends Controller
{
    public function index(Request $request)
    {
        $kandidat = Kandidat::all();
        $search = $request->input('search'); // Ambil kata kunci pencarian dari request
    
        // Query untuk mendapatkan kandidat dengan pencarian
        $kandidat = Kandidat::when($search, function ($query, $search) {
            return $query->where('nama_kandidat', 'like', "%{$search}%")
                         ->orWhere('alamat', 'like', "%{$search}%")
                         ->orWhere('tempat_lahir', 'like', "%{$search}%");
        })->get();
        return view('kandidat.index', compact('kandidat'));
    }

    public function create()
    {
        $setting = Setting::all();
        return view('kandidat.create', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kandidat' => 'required|string|max:200',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:200',
            'alamat' => 'nullable|string|max:200',
            'nourut' => 'required|integer|unique:kandidat,nourut',
        ]);
    
        $data = $request->except(['foto']);
    
        if ($request->hasFile('foto')) {
            $filename = $request->file('foto')->store('images', 'public');
            $data['foto'] = $filename;
        }
    
        Kandidat::create($data);
    
        return redirect()->route('kandidat.index')->with('success', 'Kandidat berhasil ditambahkan.');
    }
    
    


    public function edit($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        $setting = Setting::all();
        return view('kandidat.edit', compact('kandidat', 'setting'));
    }

    public function update(Request $request, $id)
    {
        $kandidat = Kandidat::findOrFail($id);
    
        $request->validate([
            'nama_kandidat' => 'required|string|max:200',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:200',
            'alamat' => 'nullable|string|max:200',
            'nourut' => 'required|integer|unique:kandidat,nourut,' . $kandidat->id_kandidat . ',id_kandidat', // Ubah id menjadi id_kandidat
        ]);
    
        $data = $request->all();
    
        // Handle the new photo upload if provided
        if ($request->hasFile('foto')) {
            if ($kandidat->foto) {
                Storage::disk('public')->delete($kandidat->foto);
            }
            $file = $request->file('foto');
            $filename = $file->store('images', 'public');
            $data['foto'] = $filename;
        } else {
            $data = $request->except('foto');
        }
    
        $kandidat->update($data);
    
        return redirect()->route('kandidat.index')->with('success', 'Kandidat berhasil diubah.');
    }
    


    public function destroy($id)
    {
        // Cari kandidat berdasarkan ID
        $kandidat = Kandidat::findOrFail($id);
    
        // Periksa apakah kandidat memiliki file foto
        if ($kandidat->foto && Storage::disk('public')->exists($kandidat->foto)) {
            // Hapus foto dari storage
            Storage::disk('public')->delete($kandidat->foto);
        }
    
        // Hapus data kandidat dari database
        $kandidat->delete();
    
        // Redirect ke halaman kandidat dengan pesan sukses
        return redirect()->route('kandidat.index')->with('success', 'Kandidat berhasil dihapus.');
    }
    
}
