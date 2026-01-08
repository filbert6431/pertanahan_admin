<?php
namespace App\Http\Controllers;

use App\Models\Persil;
use App\Models\Warga;
use App\Models\User;
use App\Models\dokumen_persil;
use App\Models\peta_persil;
use App\Models\sengketa_persil;
use Illuminate\Support\Str;
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

    public function bilangan_prima($id)
    {

        if (Str::length($id) == 2) {


        if ($id < 2) {
            return "$id bukan bilangan prima.";
        }

        for ($i = 2; $i <= sqrt($id); $i++) {
            if ($id % $i == 0) {
                return "$id bukan bilangan prima.";
            }
        }
        }

         if (Str::length($id) == 4) {
        $tahun_sekarang = 2025;
        $id = $tahun_sekarang - $id;
        return view('pages.ujiantahun', ['id' => $id]);
         }
         return redirect()->route('halaman_ujian');
    }

    public function tampilan_halaman(Request $request, $id)
    {
        if (Str::length($id) == 2) {
            $hasil = $this->bilangan_prima($id);
            return view('pages.hasil_ujian', ['hasil' => $hasil]);
        }

        if (Str::length($id) == 4) {
            $hasil = $this->bilangan_prima($id);
            return view('pages.hasil_ujian', ['hasil' => $hasil]);
        }

        return view('pages.ujiantahun');
    }

}
