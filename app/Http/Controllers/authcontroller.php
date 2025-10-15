<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   return view('halaman_login');
    }

    public function login(Request $request)
{
    // semua data form
    //dd($request->all());

    // ambil spesifik input
    $username = $request->input('username');
    $password = $request->input('password');

    $data['nama'] = $request->nama;
    $data['password'] = $request->password;

        $request->validate([
            'nama'  =>[
            'required',
            'max:10',
          'regex:/[A-Z]/'],

            'password' => 'required|min:3'
        ], [
        'nama.required' => 'hatimu tidak boleh kosong',
        'nama.regex' => 'nama harus mengandung minimal satu huruf kapital',
        'password.required' => 'password tidak boleh kosong'

        ]);



        return view('selamat_login', $data);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
