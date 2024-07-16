<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        if (session('users')->level == 'Admin') {
            $jumlahartikel = DB::table('artikel')->orderBy('idartikel', 'desc')->count();
            $jumlahkategori = DB::table('kategori')->orderBy('idkategori', 'desc')->count();
            $jumlahtag = DB::table('tag')->orderBy('idtag', 'desc')->count();
        }

        $data = [
            'title' => 'Selamat Datang Di',
            'jumlahartikel' => $jumlahartikel,
            'jumlahkategori' => $jumlahkategori,
            'jumlahtag' => $jumlahtag,
        ];
        return view('admin/dashboard', $data);
    }
    public function artikel()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $artikel = DB::table('artikel')
            ->orderBy('idartikel', 'desc')->get();
        $data = [
            'title' => 'Daftar artikel',
            'artikel' => $artikel,
            'idwarga' => '',
        ];
        return view('admin/artikeldaftar', $data);
    }

    public function artikeltambah()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $tags = DB::table('tag')->get();
        $kategori = DB::table('kategori')->get();
        $data = [
            'title' => 'Tambah artikel',
            'tags' => $tags,
            'kategori' => $kategori,
        ];
        return view('admin/artikeltambah', $data);
    }

    public function artikeltambahsimpan(Request $request)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }

        $tags = implode(',', $request->tag); // Menggabungkan array tag menjadi string

        DB::table('artikel')->insert([
            'judul' => $request->judul,
            'isiartikel' => $request->isiartikel,
            'kategori' => $request->kategori,
            'tag' => $tags, // Menyimpan string tag
            'tanggal' => $request->tanggal,
        ]);

        session()->flash('success', 'Berhasil menambahkan data!');
        return redirect('panel/artikel');
    }

    public function artikeledit($id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $tags = DB::table('tag')->get();
        $kategori = DB::table('kategori')->get();
        $artikel = DB::table('artikel')->where('idartikel', $id)->first();
        $data = [
            'title' => 'Tambah artikel',
            'tags' => $tags,
            'kategori' => $kategori,
            'artikel' => $artikel,
        ];
        return view('admin/artikeledit', $data);
    }

    public function artikeleditsimpan(Request $request, $id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $tags = implode(',', $request->tag);
        DB::table('artikel')->where('idartikel', $id)->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'isiartikel' => $request->isiartikel,
            'tag' => $tags,
            'tanggal' => $request->tanggal,
        ]);
        session()->flash('success', 'Berhasil mengedit data!');
        return redirect('panel/artikel');
    }

    public function artikelhapus($id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        DB::table('artikel')->where('idartikel', $id)->delete();
        session()->flash('success', 'Berhasil menghapus data!');
        return redirect('panel/artikel');
    }

    public function kategori()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $kategori = DB::table('kategori')
            ->orderBy('idkategori', 'desc')->get();
        $data = [
            'title' => 'Daftar kategori',
            'kategori' => $kategori,
            'idwarga' => '',
        ];
        return view('admin/kategoridaftar', $data);
    }


    public function kategoritambah()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $data = [
            'title' => 'Tambah kategori',
        ];
        return view('admin/kategoritambah', $data);
    }

    public function kategoritambahsimpan(Request $request)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $kategori = $request->input('kategori');
        DB::table('kategori')->insert([
            'kategori' => $kategori,
        ]);
        session()->flash('success', 'Berhasil menambahkan data!');
        return redirect('panel/kategori');
    }

    public function kategoriedit($id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }

        $kategori = DB::table('kategori')->where('idkategori', $id)->first();
        $data = [
            'title' => 'Edit Kategori',
            'kategori' => $kategori,
        ];
        return view('admin/kategoriedit', $data);
    }

    public function kategorieditsimpan(Request $request, $id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $kategori = $request->input('kategori');
        DB::table('kategori')->where('idkategori', $id)->update([
            'kategori' => $kategori,
        ]);
        session()->flash('success', 'Berhasil mengedit data!');
        return redirect('panel/kategori');
    }

    public function kategorihapus($id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        DB::table('kategori')->where('idkategori', $id)->delete();
        session()->flash('success', 'Berhasil menghapus data!');
        return redirect('panel/kategori');
    }

    public function tag()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $tag = DB::table('tag')
            ->orderBy('idtag', 'desc')->get();
        $data = [
            'title' => 'Daftar tag',
            'tag' => $tag,
        ];
        return view('admin/tagdaftar', $data);
    }

    public function tagtambah()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $data = [
            'title' => 'Tambah Tag',
        ];
        return view('admin/tagtambah', $data);
    }

    public function tagtambahsimpan(Request $request)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $tag = $request->input('tag');
        DB::table('tag')->insert([
            'tag' => $tag,
        ]);
        session()->flash('success', 'Berhasil menambahkan data!');
        return redirect('panel/tag');
    }

    public function tagedit($id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }

        $tag = DB::table('tag')->where('idtag', $id)->first();
        $data = [
            'title' => 'Edit tag',
            'tag' => $tag,
        ];
        return view('admin/tagedit', $data);
    }

    public function tageditsimpan(Request $request, $id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $tag = $request->input('tag');
        DB::table('tag')->where('idtag', $id)->update([
            'tag' => $tag,
        ]);
        session()->flash('success', 'Berhasil mengedit data!');
        return redirect('panel/tag');
    }

    public function taghapus($id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        DB::table('tag')->where('idtag', $id)->delete();
        session()->flash('success', 'Berhasil menghapus data!');
        return redirect('panel/tag');
    }





















    
    public function profil()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $id = session('users')->idusers;
        if (session('users')->level == 'Admin' || session('users')->level == 'Kepala Desa') {
            $row = DB::table('users')->where('idusers', $id)->first();
        } else {
            $row = DB::table('users')
                ->join('warga', 'users.idusers', '=', 'warga.idusers')

                ->where('users.idusers', $id)
                ->first();
        }
        $data = [
            'title' => 'Profil',
            'row' => $row,
        ];
        return view('admin/profil', $data);
    }
    public function profiledit()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $id = session('users')->idusers;
        if (session('users')->level == 'Admin' || session('users')->level == 'Kepala Desa') {
            $row = DB::table('users')->where('idusers', $id)->first();
        } else {
            $row = DB::table('users')
                ->join('warga', 'users.idusers', '=', 'warga.idusers')

                ->where('users.idusers', $id)
                ->first();
        }
        $data = [
            'title' => 'Edit Profile',
            'row' => $row,
        ];
        return view('admin/profiledit', $data);
    }
    public function profileditsimpan(Request $request)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        if (session('users')->level == 'Admin' or session('users')->level == 'Kepala Desa') {
            $id = session('users')->idusers;
            $data = [
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];
            DB::table('users')->where('idusers', $id)->update($data);
        } else {
            $nama = $request->input('nama');
            $email = $request->input('email');
            $password = $request->input('password');
            $status = $request->input('status');
            $alamat = $request->input('alamat');

            $nokk = $request->input('nokk');
            $tanggallahir = $request->input('tanggallahir');
            $pendidikanterakhir = $request->input('pendidikanterakhir');
            $agama = $request->input('agama');

            $id = session('users')->idusers;
            $data = [
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'status' => $request->input('status'),
            ];
            DB::table('users')->where('idusers', $id)->update($data);
            $simpanwarga = [
                'nama' => $nama,
                'alamat' => $alamat,
                'nokk' => $nokk,
                'tanggallahir' => $tanggallahir,
                'pendidikanterakhir' => $pendidikanterakhir,
                'agama' => $agama,
            ];
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move(public_path('foto'), $foto);
                $simpanwarga['fotoprofil'] = $foto;
            }
            DB::table('warga')->where('idusers', $id)->update($simpanwarga);
        }
        session()->flash('success', 'Data berhasil diedit!');
        return redirect('panel/profil');
    }
    public function login()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $data = [
            'title' => 'Login',
        ];
        return view('login', $data);
    }
    public function logincek(Request $request)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $email = $request->input('email');
        $password = $request->input('password');
        $akun = DB::table('users')
            ->where('email', $email)
            ->where('password', $password)
            ->first();
        if ($akun) {
            session(['users' => $akun]);
            return redirect('panel/dashboard')->with('success', 'Login berhasil');
        } else {
            return redirect()->back()->with('success', 'Anda gagal login, Email atau password salah');
        }
    }
    public function logout()
    {
        session()->flush();
        return redirect('/loginakun');
    }
    
}
