<?php
namespace App\Http\Controllers;

use App\Models\media;
use App\Models\sengketa_persil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SengketaPersilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($persil_id)
    {
        if (auth()->check()) {
        $sengketa_persil = sengketa_persil::where('persil_id', $persil_id)->get();
        return view('pages.Sengketa_persil.index', compact('sengketa_persil', 'persil_id'));
    }
        return redirect()->route('halaman-login');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create($persil_id)
    {
        return view('pages.Sengketa_persil.create', compact('persil_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function updateStatus(Request $request, $id)
    {
        $sengketa = sengketa_persil::find($id);

        if (! $sengketa) {
            return redirect()->back()->with('destroy', 'Sengketa tidak ditemukan (id=' . $id . ')');
        }

        // Cek apakah kolom status ADA
        if (! Schema::hasColumn($sengketa->getTable(), 'status')) {
            return redirect()->back()->with('destroy', 'Kolom status tidak ditemukan di tabel ' . $sengketa->getTable());
        }

        // Update kolom status
        $sengketa->status = $request->input('status');
        $sengketa->save();

              return redirect()->route('sengketa_persil.index')->with('update', 'Status sengketa berhasil diperbarui!');
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
        'persil_id'        => 'required',
        'pihak_1'         => 'required',
        'pihak_2'         => 'required',
        'kronologi'      => 'nullable',
        'status'          => 'nullable',
        'penyelesaian'    => 'nullable',
        ]);

        $sengketa = sengketa_persil::create([
            'persil_id'        => $request->persil_id,
            'pihak_1'         => $request->pihak_1,
            'pihak_2'         => $request->pihak_2,
            'kronologi'      => $request->kronologi,
            'status'          => $request->status,
            'penyelesaian'    => $request->penyelesaian,

        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads', $filename, 'public');

                media::create([
                    'ref_table'  => 'sengketa_persil',
                    'ref_id'     => $sengketa->sengketa_id,
                    'file_url'   => $filename,
                    'caption'    => 'Dokumen Sengketa Persil',
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => 1,
                ]);
            }
        }

        return redirect()
            ->route('sengketa_persil.index', $sengketa->persil_id)
            ->with('success', 'Sengketa persil berhasil ditambahkan');
    }

   public function destroy($sengketa_id)
{
    $sengketa = sengketa_persil::with('media')->findOrFail($sengketa_id);

    // hapus file fisik & record media
    foreach ($sengketa->media as $media) {
        if (Storage::disk('public')->exists('uploads/' . $media->file_url)) {
            Storage::disk('public')->delete('uploads/' . $media->file_url);
        }
        $media->delete();
    }

    $persil_id = $sengketa->persil_id;

    // hapus sengketa
    $sengketa->delete();

    return redirect()
        ->route('sengketa_persil.index', ['persil_id' => $persil_id])
        ->with('success', 'Sengketa persil berhasil dihapus');
}

public function show($sengketa_id)
{
    $sengketa = sengketa_persil::findOrFail($sengketa_id);

    $files = media::where('ref_table', 'sengketa_persil')
        ->where('ref_id', $sengketa_id)
        ->get();

    return view('pages.sengketa_persil.show', compact('sengketa', 'files'));
}
}
