<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Beranda',
        ];
        return view('beranda', $data);
    }
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('login', $data);
    }
    public function logincek(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $akun = DB::table('users')
            ->where('email', $email)
            ->where('password', $password)
            ->first();
        if ($akun) {
            session(['users' => $akun]);
            return redirect('panel/dashboard')->with('success', 'Login Berhasil');
        } else {
            return redirect()->back()->with('error', 'Anda gagal login, Email atau password salah');
        }
    }
    public function daftar()
    {
        $data = [
            'title' => 'Daftar',
        ];
        return view('daftar', $data);
    }
    public function daftarsimpan(Request $request)
    {
        $nama = $request->input('nama');
        $email = $request->input('email');
        $password = $request->input('password');

        DB::table('users')->insertGetId([
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'level' => 'Admin',
        ]);

        session()->flash('success', 'Daftar akun berhasil, silahkan login');
        return redirect('daftar');
    }

    public function artikel()
    {
        $artikel = DB::table('artikel')->paginate(6);


        $data = [
            'title' => 'Daftar artikel',
            'artikel' => $artikel,
        ];

        return view('artikeldaftar', $data);
    }

    public function artikeldaftarcari(Request $request)
    {
        $keyword = $request->input('keyword');
        $artikel = DB::table('artikel')
            ->where('judul', 'LIKE', "%{$keyword}%")
            ->orWhere('kategori', 'LIKE', "%{$keyword}%")
            ->orWhere('tag', 'LIKE', "%{$keyword}%")
            ->paginate(10);

        return view('artikeldaftar', ['artikel' => $artikel, 'title' => 'Hasil Pencarian']);
    }


    public function artikeldetail($id)
    {
        $row = DB::table('artikel')->where('idartikel', $id)->first();
        $comments = DB::table('komentar')->join('artikel','komentar.idartikel','=','artikel.idartikel')->where('artikel.idartikel',$id)->paginate(10);
        $data = [
            'title' => 'Detail artikel',
            'row' => $row,
            'comments' => $comments,
        ];

        // dd($comments);
        return view('artikeldetail', $data);
    }

    public function komentartambah(Request $request,$id)
    {

        DB::table('komentar')->insert([
            'idartikel' => $id,
            'komentar' => $request->input('komentar'),
            'nama' => $request->input('nama'),
            'tanggalkomen' => now()
        ]);
            // Mengembalikan respon atau redirect
    return back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function kategori()
    {
        $kategori = DB::table('kategori')->paginate(6);


        $data = [
            'title' => 'Daftar kategori',
            'kategori' => $kategori,
        ];

        return view('kategoridaftar', $data);
    }

    public function kategoridetail($id)
    {
        $artikel = DB::table('artikel')->where('kategori', $id)->paginate(6);
        $data = [
            'title' => 'Detail kategori',
            'artikel' => $artikel,
        ];

        return view('artikeldaftar', $data);
    }
}
