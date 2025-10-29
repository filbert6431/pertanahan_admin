<?php

namespace App\Http\Controllers;
use App\Models\Warga; // ini jangan lupa
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataWarga = Warga::paginate(5);
        return view('admin.form.warga.warga-index', compact('dataWarga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form.warga.warga-create');
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

    Warga::create($data);

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
        return view('admin.form.warga.warga-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Warga $warga)
{
    $validated = $request->validate([
        'no_ktp' => 'required|string|unique:wargas,no_ktp,' ,
        'nama' => 'required|string|max:40',
        'jenis_kelamin' => 'required|string',
        'agama' => 'required|string',
        'pekerjaan' => 'required|string 15',
        'no_hp' => 'required|string 15',
        'email' => 'required|email|unique:wargas,email,' ,
    ]);

    $warga->no_ktp = $request->no_ktp;
    $warga->nama = $request->nama;
    $warga->jenis_kelamin = $request->jenis_kelamin;
    $warga->agama = $request->agama;
    $warga->pekerjaan = $request->pekerjaan;
    $warga->no_hp = $request->no_hp;
    $warga->email = $request->email;
    $warga->save();

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
