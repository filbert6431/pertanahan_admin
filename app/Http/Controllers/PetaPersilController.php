<?php

namespace App\Http\Controllers;

use App\Models\peta_persil;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetaPersilController extends Controller
{
    /**
     * Menampilkan semua peta untuk 1 persil
     */
    public function index($persil_id)
    {
        if (auth()->check()) {

        $peta = peta_persil::where('persil_id', $persil_id)->get();
        return view('pages.Peta_persil.index', compact('peta', 'persil_id'));
        }
        return redirect()->route('halaman-login');
    }

    /**
     * Form tambah peta persil
     */
    public function create($persil_id)
    {
        return view('pages.Peta_persil.create', compact('persil_id'));
    }

    /**
     * Menyimpan peta persil dan file-file nya
     */
    public function store(Request $request)
    {
        // 1️⃣ VALIDASI
        $validated = $request->validate([
            'persil_id'    => 'required|exists:persil,persil_id',
            'panjang_m'    => 'required|integer|min:1',
            'lebar_m'      => 'required|integer|min:1',
            'geojson'      => 'nullable|string',
            'file_peta'    => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // 2️⃣ SIMPAN DATA PETA (PARENT)
        $peta = peta_persil::create([
            'persil_id' => $validated['persil_id'],
            'panjang_m' => $validated['panjang_m'],
            'lebar_m'   => $validated['lebar_m'],
            'geojson'   => $validated['geojson'] ?? null,
        ]);

        // ⛔ GUARD – pastikan benar-benar tersimpan
        if (!$peta->peta_id) {
            return back()->withErrors('Gagal menyimpan data peta.');
        }

        // 3️⃣ SIMPAN FILE (CHILD)
        if ($request->hasFile('file_peta')) {
            $file = $request->file('file_peta');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Simpan file ke storage
            $file->storeAs('uploads', $filename, 'public');

            // Simpan ke tabel media
            Media::create([
                'ref_table'  => 'peta_persil',
                'ref_id'     => $peta->peta_id,
                'file_url'   => $filename,
                'caption'    => 'File peta persil',
                'mime_type'  => $file->getClientMimeType(),
                'sort_order' => 1,
            ]);
        }

        // 4️⃣ REDIRECT
        return redirect()
            ->route('peta_persil.index', $peta->persil_id)
            ->with('success', 'Peta persil berhasil ditambahkan');
    }

    /**
     * Menampilkan detail peta
     */
    public function show($peta_id)
    {
        $peta = peta_persil::findOrFail($peta_id);

        // Ambil file dari media
        $files = Media::where('ref_table', 'peta_persil')
            ->where('ref_id', $peta_id)
            ->get();

        return view('pages.Peta_persil.show', compact('peta', 'files'));
    }

    /**
     * Form edit peta persil
     */
    public function edit($peta_id)
    {
        $peta = peta_persil::findOrFail($peta_id);
        $files = Media::where('ref_table', 'peta_persil')
            ->where('ref_id', $peta_id)
            ->get();

        return view('pages.Peta_persil.edit', compact('peta', 'files'));
    }

    /**
     * Update peta persil
     */
    public function update(Request $request, $peta_id)
    {
        $peta = peta_persil::findOrFail($peta_id);

        // Validasi
        $validated = $request->validate([
            'panjang_m' => 'required|integer|min:1',
            'lebar_m'   => 'required|integer|min:1',
            'geojson'   => 'nullable|string',
            'file_peta' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Update data peta
        $peta->update([
            'panjang_m' => $validated['panjang_m'],
            'lebar_m'   => $validated['lebar_m'],
            'geojson'   => $validated['geojson'] ?? null,
        ]);

        // Update file jika ada yang diupload
        if ($request->hasFile('file_peta')) {
            // Hapus file lama jika ada
            $oldFiles = Media::where('ref_table', 'peta_persil')
                ->where('ref_id', $peta_id)
                ->get();

            foreach ($oldFiles as $oldFile) {
                if (Storage::disk('public')->exists('uploads/' . $oldFile->file_url)) {
                    Storage::disk('public')->delete('uploads/' . $oldFile->file_url);
                }
                $oldFile->delete();
            }

            // Simpan file baru
            $file = $request->file('file_peta');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename, 'public');

            Media::create([
                'ref_table'  => 'peta_persil',
                'ref_id'     => $peta_id,
                'file_url'   => $filename,
                'caption'    => 'File peta persil',
                'mime_type'  => $file->getClientMimeType(),
                'sort_order' => 1,
            ]);
        }

        return redirect()
            ->route('peta_persil.show', $peta_id)
            ->with('success', 'Peta persil berhasil diperbarui');
    }

    /**
     * Hapus peta persil
     */
    public function destroy($peta_id)
    {
        $peta = peta_persil::with('media')->findOrFail($peta_id);
        $persil_id = $peta->persil_id;

        // Hapus semua file fisik & data media
        foreach ($peta->media as $media) {
            if (Storage::disk('public')->exists('uploads/' . $media->file_url)) {
                Storage::disk('public')->delete('uploads/' . $media->file_url);
            }
            $media->delete();
        }

        // Hapus data peta
        $peta->delete();

        return redirect()
            ->route('peta_persil.index', $persil_id)
            ->with('success', 'Peta persil berhasil dihapus');
    }
}
