<?php
namespace App\Http\Controllers;

use App\Models\dokumen_persil;
use App\Models\media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenPersilController extends Controller
{
    // Menampilkan semua dokumen untuk 1 persil
    public function index($persil_id)
    {
        $dokumen = dokumen_persil::where('persil_id', $persil_id)->get();

        return view('pages.Dokumen_persil.index', compact('dokumen', 'persil_id'));
    }

    // Form tambah dokumen persil
    public function create($persil_id)
    {
        return view('pages.Dokumen_persil.create', compact('persil_id'));
    }

    // Menyimpan dokumen persil dan file-file nya
    public function store(Request $request)
    {
        $validated = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'jenis_dokumen' => 'required',
            'nomor'      => 'required',
            'keterangan' => 'required',
            'files.*'    => 'file|max:2048',
        ]);

        // 2️⃣ SIMPAN dokumen (PARENT)
        $dokumen = dokumen_persil::create([
            'persil_id'    => $validated['persil_id'],
            'jenis_dokumen' => $validated['jenis_dokumen'],
            'nomor'        => $validated['nomor'],
            'keterangan'   => $validated['keterangan'],
        ]);

        // ⛔ GUARD – pastikan benar-benar tersimpan
        if (! $dokumen->dokumen_id) {
            return back()->withErrors('Gagal menyimpan data dokumen.');
        }

        // 3️⃣ SIMPAN FILE (CHILD)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads', $filename, 'public');

                media::create([
                    'ref_table'  => 'dokumen_persil',
                    'ref_id'     => $dokumen->dokumen_id,
                    'file_url'   => $filename,
                    'caption'    => 'File dokumen persil',
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

        // 4️⃣ REDIRECT
        return redirect()
            ->route('dokumen_persil.index', $dokumen->persil_id)
            ->with('success', 'dokumen persil berhasil ditambahkan');
    }

    public function destroy($dokumen_id)
    {
        $dokumen = dokumen_persil::with('media')->findOrFail($dokumen_id);

        // hapus semua file fisik & data media
        foreach ($dokumen->media as $media) {
            if (Storage::disk('public')->exists('uploads/' . $media->file_url)) {
                Storage::disk('public')->delete('uploads/' . $media->file_url);
            }
            $media->delete();
        }

        $persil_id = $dokumen->persil_id;

        // hapus dokumen
        $dokumen->delete();

        return redirect()
            ->route('dokpersil.index', $persil_id)
            ->with('success', 'Dokumen persil berhasil dihapus');
    }

    public function show($dokumen_id)
    {
        $dokumen = dokumen_persil::findOrFail($dokumen_id);

        $files = media::where('ref_table', 'dokumen_persil')
            ->where('ref_id', $dokumen_id)
            ->get();

        return view('pages.Dokumen_persil.show', compact('dokumen', 'files'));
    }

}
