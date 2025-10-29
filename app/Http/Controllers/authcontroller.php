<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	// show login form (placed under resources/views/admin/)
	public function index()
	{
		return view('admin.login');
	}

	// process login form posted to /auth/proses-login
	public function login(Request $request)
	{
		$request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);

		$email = $request->input('email');
		$password = $request->input('password');

		// read from 'warga' table (adjust if your admin table differs)
		$user = DB::table('warga')->where('email', $email)->first();

		if ($user && isset($user->password) && Hash::check($password, $user->password)) {
			// store minimal admin info in session
			$request->session()->put('admin', [
				'id' => $user->warga_id ?? $user->id ?? null,
				'email' => $user->email,
				'name' => $user->nama ?? $user->name ?? null,
			]);
			$request->session()->regenerate();
			return redirect()->intended('/dashboard');
		}

		return back()->withInput($request->only('email'))
		             ->withErrors(['email' => 'Credentials do not match our records.']);
	}

	// logout (clears admin session)
	public function logout(Request $request)
	{
		$request->session()->forget('admin');
		$request->session()->regenerateToken();
		return redirect('/');
	}
}
