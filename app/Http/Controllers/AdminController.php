<?php

namespace App\Http\Controllers;
use App\Models\Admin; // ini jangan lupa
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $dataAdmin = Admin::all();
    return view('pages.form-admin.index', compact('dataAdmin'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          	return view('pages.form-admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:admin,email',
        'password' => 'required|min:6',
    ]);

    // Hash password sebelum disimpan
    $validated['password'] = Hash::make($validated['password']);

    // Buat admin lewat model (pastikan Admin::$fillable mencakup name,email,password)
    Admin::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => $validated['password'],
    ]);

    return redirect()->route('admin.index')->with('success', 'Data Berhasil Ditambahkan');
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
        // gunakan route-model-binding langsung
        return view('pages.form-admin.edit', ['dataAdmin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Admin $admin)
{
    // Validasi input, gunakan id dari $admin untuk rule unique
    $data = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:admin,email,' . $admin->admin_id . ',admin_id',
        'password' => 'nullable|min:6',
    ]);

    // Jika user isi password baru, maka di-hash; jika tidak, jangan ubah password
    if ($request->filled('password')) {
        $data['password'] = Hash::make($data['password']);
    } else {
        unset($data['password']);
    }

    // Update model
    $admin->update($data);

    return redirect()->route('admin.index')->with('success', 'Data Berhasil Diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        // Hapus lewat model yang sudah di-bind
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Data Berhasil Dihapus');
    }
}
