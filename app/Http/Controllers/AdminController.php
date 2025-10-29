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
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:admin,email',
        'password' => 'required|min:6',

        ]);

        // 🔹 Hash password sebelum disimpan
        $validated['password'] = Hash::make($request->password);

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
    $data['dataAdmin'] = Admin::findOrFail($admin->admin_id);
    return view('admin.form.form-admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Admin $admin)
{
    // Validasi input (opsional tapi direkomendasikan)
 $admin = \App\Models\Admin::findOrFail($id);

    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:admins,email,'.$id,
        'password' => 'nullable|min:6', // bisa kosong
    ]);

    // Jika user isi password baru, maka di-hash
    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    } else {
        unset($data['password']); // biar password lama tidak kehapus
    }
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
        $admin = Admin::findOrFail($admin->admin_id);

        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Data Berhasil Dihapus');
    }
}
