<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admin_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function forminput ()
    {
        return view ('input');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function hasil_inputan()
    {
    $data_dokumen = [
        'dokumen_id' => request ('dokumen_id'),
        'persil_id' => request ('persil_id'),
        'jenis_dokumen' => request ('jenis_dokumen'),
        'nomor' => request ('nomor'),
        'keterangan' => request ('keterangan'),
    ];

    return view ('proses-input', compact('data_dokumen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
