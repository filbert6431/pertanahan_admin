<?php

namespace App\Http\Controllers;
use App\Models\Admin; // ini jangan lupa
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $dataAdmin = Admin::all();
    return view('admin.form.form-admin.index', compact('dataAdmin'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          	return view('admin.form.form-admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;

        admin::create($data);

          return redirect()->route('admin.index')->with('success', 'Data Berhasil Diupdate');

    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Admin $admin)
{
    // Validasi input (opsional tapi direkomendasikan)
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    // Update data admin
    $admin->name = $request->name;
    $admin->email = $request->email;

    // Simpan perubahan
    $admin->save();

    // Redirect dengan pesan sukses
    return redirect()->route('admin.index')->with('success', 'Data Berhasil Diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
