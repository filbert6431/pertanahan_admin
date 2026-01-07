<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

// ini jangan lupa

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        if (auth()->check()) {

            $filterableColumns = ['status', 'role'];
            $searchableColumns = ['name', 'email'];

            $dataUser = User::filter($request, $filterableColumns)
                ->search($request, $searchableColumns)
                ->paginate(10)
                ->onEachSide(2);

            return view('pages.form-admin.index', compact('dataUser'));
        }

        return redirect()->route('halaman-login');
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
        // Debug: Check request data
        // dd($request->all());

        $validated = $request->validate([
            'name'            => 'required|string|max:100',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Debug: Validation passed
        // dd('Validation passed');

        // Upload foto
        if ($request->hasFile('profile_picture')) {
            $filename = time() . '_' . $request->profile_picture->getClientOriginalName();
            $request->profile_picture->storeAs('user_profiles', $filename, 'public');
            $validated['profile_picture'] = 'user_profiles/' . $filename;
        }

          User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'user',
        'status' => 'aktif',
    ]);

        return redirect()->route('user.index')->with('success', 'Data Berhasil Ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // gunakan route-model-binding langsung
        return view('pages.form-admin.edit', ['dataUser' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Request $request, $id)
    {
        $user = User::find($id);

        $user->status = $request->input('status'); // debug: log atau dd sebelum save
        Log::info('Update status debug', ['id' => $id, 'status' => $request->input('status'), 'user_table' => $user->getTable()]);

        $user->save();

        return redirect()->route('admin.index')->with('update', 'Status diupdate');
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'            => 'required|string|max:100',
            'email'           => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'password'        => 'nullable|min:6',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'role'            => 'required|string|max:50',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        // Upload foto baru
        if ($request->hasFile('profile_picture')) {

            // Hapus foto lama jika ada
            if ($user->profile_picture && \Storage::disk('public')->exists($user->profile_picture)) {
                \Storage::disk('public')->delete($user->profile_picture);
            }

            $filename = time() . '_' . $request->profile_picture->getClientOriginalName();
            $request->profile_picture->storeAs('user_profiles', $filename, 'public');
            $data['profile_picture'] = 'user_profiles/' . $filename;
        }

        $user->update($data);

        return redirect()->route('admin.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Hapus lewat model yang sudah di-bind
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'Data Berhasil Dihapus');
    }
}
