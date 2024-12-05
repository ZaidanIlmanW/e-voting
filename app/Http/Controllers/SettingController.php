<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Menampilkan satu setting
    public function index()
    {
        // Ambil satu data setting pertama
        $setting = Setting::first(); 
        return view('setting.index', compact('setting'));
    }

    // Menampilkan form edit untuk setting tertentu
    public function edit($id)
    {
        $setting = Setting::findOrFail($id); // Temukan setting berdasarkan ID
        return view('setting.edit', compact('setting'));
    }

    // Mengupdate setting
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'nama_setting' => 'required|string|max:255',
            'judul_pemilihan' => 'required|string|max:255',
            'limit_voting_min' => 'required|integer|lte:limit_voting_max',
            'limit_voting_max' => 'required|integer|gte:limit_voting_min',
            'tgl_awal' => 'required|date|before_or_equal:tgl_akhir',
            'tgl_akhir' => 'required|date|after_or_equal:tgl_awal',
        ], [
            'limit_voting_min.required' => 'Limit voting minimal harus diisi.',
            'limit_voting_max.required' => 'Limit voting maksimal harus diisi.',
            'limit_voting_min.integer' => 'Limit voting minimal harus berupa angka.',
            'limit_voting_max.integer' => 'Limit voting maksimal harus berupa angka.',
            'limit_voting_min.lte' => 'Limit voting minimal tidak boleh lebih besar dari limit voting maksimal.',
            'limit_voting_max.gte' => 'Limit voting maksimal tidak boleh lebih kecil dari limit voting minimal.',
            'tgl_awal.before_or_equal' => 'Tanggal awal tidak boleh melebihi tanggal akhir.',
            'tgl_akhir.after_or_equal' => 'Tanggal akhir tidak boleh lebih awal dari tanggal awal.',
        ]);

        // Temukan setting berdasarkan ID
        $setting = Setting::findOrFail($id);

        // Update data setting
        $setting->update($request->all());

        // Redirect kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('setting.index')->with('success', 'Pengaturan berhasil diubah.');
    }

    // Menghapus setting
    public function destroy($id)
    {
        // Cek jika ada lebih dari satu setting
        if (Setting::count() > 1) {
            $setting = Setting::findOrFail($id);
            $setting->delete();
            return redirect()->route('setting.index')->with('success', 'Pengaturan berhasil dihapus.');
        } else {
            return redirect()->route('setting.index')->with('error', 'Tidak dapat menghapus setting karena hanya ada satu setting.');
        }
    }

    // Menampilkan form untuk membuat setting baru (meskipun kita tidak membutuhkan fitur ini)
    public function create()
    {
        // Bisa mengarahkan ke form edit jika setting sudah ada
        return redirect()->route('setting.index');
    }

    // Menyimpan setting baru (di-skip karena kita hanya menginginkan satu setting)
    public function store(Request $request)
    {
        // Mengarahkan langsung ke halaman index, karena tidak perlu menambah setting baru
        return redirect()->route('setting.index');
    }
}
