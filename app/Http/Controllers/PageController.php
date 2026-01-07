<?php
namespace App\Http\Controllers;

use App\Models\Persil;
use App\Models\Warga;
use App\Models\User;
use App\Models\dokumen_persil;
use App\Models\peta_persil;
use App\Models\sengketa_persil;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $data = [
                'total_persil' => Persil::count(),
                'total_warga' => Warga::count(),
                'total_users' => User::count(),
                'total_dokumen' => dokumen_persil::count(),
                'total_peta' => peta_persil::count(),
                'total_sengketa' => sengketa_persil::count(),
                'recent_persil' => Persil::with('pemilik')->orderBy('persil_id', 'desc')->take(5)->get(),
                'recent_warga' => Warga::orderBy('warga_id', 'desc')->take(5)->get(),
                'recent_dokumen' => dokumen_persil::orderBy('dokumen_id', 'desc')->take(5)->get(),
            ];
            return view('pages.index', $data);
        } else {
            return redirect()->route('halaman-login');
        }
    }

    public function identitas()
    {
        if (auth()->check()) {
            return view('pages.identitas_pengembang');
        }
        return redirect()->route('halaman-login');
    }

    public function form()
    {
        if (auth::check()) {
            return view('pages.form');
        }
        return redirect()->route('halaman-login');
    }

}
