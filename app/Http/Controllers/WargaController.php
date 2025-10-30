<?php

namespace App\Http\Controllers;
use App\Models\Warga; // ini jangan lupa
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataWarga = Warga::paginate(5);
        return view('admin.Pages.warga.index', compact('dataWarga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Pages.warga.create');
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
        'no_ktp' => 'nullable|string|max:255|unique:warga,no_ktp',
    ]);

    DB::table('warga')->insert([
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataWarga'] = Warga::findOrFail($id);
        return view('admin.Pages.warga.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $no_ktp)
{
    $data = $request->validate([
        'nama' => 'required|string|max:255',
        'no_ktp' => 'required|string|max:255|unique:warga,no_ktp,' . $no_ktp . ',no_ktp',
        'jenis_kelamin' => 'nullable|string|max:50',
        'agama' => 'nullable|string|max:50',
        'pekerjaan' => 'nullable|string|max:100',
        'no_hp' => 'nullable|string|max:50',
        'email' => 'nullable|email|max:255|unique:warga,email,' . $no_ktp . ',no_ktp',
    ]);

    DB::table('warga')->where('no_ktp', $no_ktp)->update([
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
