<?php

namespace App\Http\Controllers;
use App\Models\Warga; // ini jangan lupa
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $filterableColumns = ['status'];
        $searchablecolumns = ['nama', 'no_ktp', 'jenis_kelamin', 'agama', 'pekerjaan', 'no_hp', 'email'];
        $dataWarga = Warga::filter($request, $filterableColumns)
        ->search($request, $searchablecolumns)
        ->paginate(5)
        ->oneachSide(2);
        return view('pages.warga.index', compact('dataWarga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $data['no_ktp'] = $request->no_ktp;
    $data['nama'] = $request->nama;
    $data['jenis_kelamin'] = $request->jenis_kelamin;
    $data['agama'] = $request->agama;
    $data ['pekerjaan'] = $request->pekerjaan;
    $data['no_hp'] = $request->no_hp;
    $data['email'] = $request->email;

    $data = $request->validate([
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'nullable|string|max:50',
        'agama' => 'nullable|string|max:50',
        'pekerjaan' => 'nullable|string|max:100',
        'no_hp' => 'nullable|string|max:50',
        'email' => 'nullable|email|max:255',
        'no_ktp' => 'nullable|string|max:255|unique:Warga,no_ktp',
    ]);

    DB::table('Warga')->insert([
        'nama' => $data['nama'],
        'jenis_kelamin' => $data['jenis_kelamin'] ?? null,
        'agama' => $data['agama'] ?? null,
        'pekerjaan' => $data['pekerjaan'] ?? null,
        'no_hp' => $data['no_hp'] ?? null,
        'email' => $data['email'] ?? null,
        'no_ktp' => $data['no_ktp'] ?? null,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

      return redirect()->route('warga.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

public function updateStatus(Request $request, $id)
{
    $warga = \App\Models\Warga::find($id);

    if (!$warga) {
        // kalau null, kita tahu ID tidak ditemukan
        return redirect()->back()->with('destroy', 'Warga tidak ditemukan (id='.$id.')');
    }

    // cek apakah kolom 'status' ada di tabel
    $hasColumn = Schema::hasColumn($warga->getTable(), 'status');

    if (!$hasColumn) {
        return redirect()->back()->with('destroy', 'Kolom status tidak ditemukan di tabel '.$warga->getTable());
    }

    $warga->status = $request->input('status');
    // debug: log atau dd sebelum save
    Log::info('Update status debug', ['id'=>$id, 'status'=>$request->input('status'), 'warga_table'=>$warga->getTable()]);
    // dd($warga->toArray(), $hasColumn);

    $warga->save();

    return redirect()->route('warga.index')->with('update', 'Status diupdate');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataWarga'] = Warga::findOrFail($id);
        return view('pages.warga.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $warga_id)
{
    $data = $request->validate([
        'nama' => 'required|string|max:255',
        'no_ktp' => 'required|string|max:255|unique:warga,no_ktp,' . $warga_id . ',warga_id',
        'jenis_kelamin' => 'nullable|string|max:50',
        'agama' => 'nullable|string|max:50',
        'pekerjaan' => 'nullable|string|max:100',
        'no_hp' => 'nullable|string|max:50',
        'email' => 'nullable|email|max:255|unique:warga,email,' . $warga_id . ',warga_id',
    ]);

    DB::table('Warga')->where('warga_id', $warga_id)->update([
        'nama' => $data['nama'],
        'jenis_kelamin' => $data['jenis_kelamin'] ?? null,
        'agama' => $data['agama'] ?? null,
        'pekerjaan' => $data['pekerjaan'] ?? null,
        'no_hp' => $data['no_hp'] ?? null,
        'email' => $data['email'] ?? null,
        'updated_at' => now(),
    ]);

    return redirect()->route('warga.index')->with('success', 'Data Berhasil Diupdate');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataWarga = Warga::findOrFail($id);
        $dataWarga->delete();
        return redirect()->route('warga.index')->with('success', 'Data Berhasil Dihapus');
    }
}
