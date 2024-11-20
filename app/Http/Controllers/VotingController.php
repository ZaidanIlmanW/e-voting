<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    //  nemapilkan balik data 
    public function index()
    {
        $kandidats = Kandidat::orderBy('id_kandidat', 'desc')->paginate(8);
        $name = 'Daftar Kandidat';
        return view('kandidats.index', compact('kandidats', 'name'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    // ===============================================================
    // ===============================================================
    // ===============================================================
    // Tambah data 

    public function create()
    {
        $name = 'Tambah Kandidat';
        return view('kandidats.create', compact('name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kandidat' => 'required|string|max:255',
            'id_setting' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure the file is an image
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_urut' => 'required|integer|unique:kandidat,nomor_urut', // No need for $kandidat here
        ]);

        // Handle the file upload for the photo if present
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
        } else {
            $filename = null;
        }

        // Insert data into the database
        Kandidat::create([
            'nama_kandidat' => $request->nama_kandidat,
            'id_setting' => $request->id_setting,
            'foto' => $filename,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'nomor_urut' => $request->nomor_urut,
        ]);

        // Redirect back with success message
        return redirect()->route('kandidats.index')->with('success', 'Kandidat created successfully.');
    }


    // ===============================================================
    // ===============================================================
    // ===============================================================
    // show menampilkan detail
    public function show(Kandidat $kandidat)
    {
        $name = 'Detail Kandidat';
        return view('kandidats.show', compact('kandidat', 'name'));
    }

    // ===============================================================
    // ===============================================================
    // ===============================================================
    // edit menampilkan form edit
    public function edit(Kandidat $kandidat)
    {
        $name = 'Edit Kandidat';
        return view('kandidats.edit', compact('kandidat', 'name'));
    }

    public function update(Request $request, Kandidat $kandidat)
    {
        $request->validate([
            'nama_kandidat' => 'required|string|max:255',
            'id_setting' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // sesuai jika foto adalah file gambar
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_urut' => 'required|integer|unique:kandidat,nomor_urut,' . $kandidat->id_kandidat . ',id_kandidat', // Corrected part
        ]);

        $kandidat->update($request->all());

        return redirect()->route('kandidats.index')->with('success', 'kandidat updated successfully.');
    }

    // ===============================================================
    // ===============================================================
    // ===============================================================
    // hapus data 
    public function destroy(Kandidat $kandidat)
    {
        $kandidat->delete();

        return redirect()->route('kandidats.index')->with('success', 'kandidat deleted successfully.');
    }
}