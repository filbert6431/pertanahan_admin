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
