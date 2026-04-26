<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // show login form (placed under resources/views/user/)
    public function index()
    {
           if (Auth::check()) {
            return redirect('/dashboard');
		    }
        return view('pages.signin');
    }

    // process login form posted to /auth/proses-login
    public function login(Request $request)
    {

        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();


        if (! $user || ! Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }


        Auth::login($user); // 🔑 INI YANG PENTING
        $request->session()->regenerate();

        return redirect('/dashboard');
    }

        public function signup(Request $request)
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
        'role' => 'admin',
        'status' => 'aktif',
    ]);

      return redirect()->route('login')->with('success', 'Akun berhasil dibuat, silakan login');
    }

// logout (clears user session)
function logout(Request $request)
{
		Auth::logout();
    $request->session()->invalidate();     // Hapus semua session
    $request->session()->regenerateToken(); // Cegah CSRF

		// Redirect ke halaman login
        return redirect('/login');
}

}
