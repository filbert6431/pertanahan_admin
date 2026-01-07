<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MultipleUpload;
use Illuminate\Support\Facades\Storage;

class MultipleUploadController extends Controller
{
    /**
     * Halaman upload (opsional)
     */
    public function index()
    {
        return view('multipleuploads');
    }

    /**
     * Simpan file multiple upload
     */
    public function store(Request $request)
    {
        $request->validate([
            'files.*'   => 'required|file|max:2048',
            'ref_table' => 'required|string',
            'ref_id'    => 'required|integer',
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {

                // Nama file unik
                $filename = time() . '_' . str_replace(' ', '-', $file->getClientOriginalName());

                // Simpan ke storage
                $file->storeAs('public/uploads', $filename);

                // Simpan record database
                MultipleUpload::create([
                    'filename'  => $filename,
                    'ref_table' => $request->ref_table,   // contoh: 'pelanggan'
                    'ref_id'    => $request->ref_id,      // contoh: pelanggan_id
                ]);
            }
        }

        return back()->with('success', 'File berhasil diupload!');
    }

    /**
     * Menampilkan semua file milik sebuah data
     * contoh: semua file milik pelanggan id 5
     */
    public function showFiles($table, $id)
    {
        $files = MultipleUpload::where('ref_table', $table)
            ->where('ref_id', $id)
            ->get();

        return view('components.multiupload-files', compact('files', 'table', 'id'));
    }

    /**
     * Hapus file
     */
    public function destroy($id)
    {
        $file = MultipleUpload::findOrFail($id);

        // Hapus file fisik
        Storage::delete('public/uploads/' . $file->filename);

        // Hapus database
        $file->delete();

        return back()->with('success', 'File berhasil dihapus!');
    }
}
