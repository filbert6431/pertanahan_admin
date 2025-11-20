<?php

namespace App\Http\Controllers;

use App\Models\Persil;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class PersilController extends Controller
{
    public function index()
    {
        // ambil semua data persil + nama warga (relasi)
        $dataPersil = Persil::with('pemilik')->get();
        return view('pages.persil.index', compact('dataPersil'));
    }

public function create()
{
    $wargaList = Warga::all(); // ambil semua data warga
    return view('pages.persil.create', compact('wargaList'));
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_persil' => 'required|unique:persil,kode_persil',
            'pemilik_warga_id' => 'required|exists:warga,warga_id',
            'luas_m2' => 'required|numeric',
            'penggunaan' => 'required',
            'alamat_lahan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ]);

        Persil::create($validated);

        return redirect()->route('persil.index')->with('success', 'Data Persil berhasil disimpan!');
    }

    public function edit($id)
    {
        $dataPersil = Persil::findOrFail($id);
        $wargaList = Warga::all();
        return view('pages.persil.edit', compact('dataPersil', 'wargaList'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_persil' => 'required|string|unique:persil,kode_persil,' . $id . ',persil_id',
            'pemilik_warga_id' => 'required|exists:warga,warga_id',
            'luas_m2' => 'required|numeric',
            'penggunaan' => 'required|string|max:100',
            'alamat_lahan' => 'required|string|max:40',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
        ]);

        $dataPersil = Persil::findOrFail($id);
        $dataPersil->update($validated);

        return redirect()->route('persil.index')->with('success', 'Data berhasil diperbarui!');
    }

public function updateStatus(Request $request, $id)
{
    $datapersil = Persil::find($id);

    if (!$datapersil) {
        return redirect()->back()->with('destroy', 'Persil tidak ditemukan (id=' . $id . ')');
    }

    // Cek apakah kolom status ada di tabel
    if (Schema::hasColumn($datapersil->getTable(), 'status')) {
        return redirect()->back()->with('destroy', 'Kolom status tidak ditemukan di tabel ' . $datapersil->getTable());
    }

    // Update kolom status
    $datapersil->status = $request->input('status');
    $datapersil->save();

    return redirect()->route('persil.index')->with('update', 'Status persil berhasil diperbarui!');
}



    public function destroy($id)
    {
        $dataPersil = Persil::findOrFail($id);
        $dataPersil->delete();

        return redirect()->route('persil.index')->with('success', 'Data berhasil dihapus!');
    }
}
