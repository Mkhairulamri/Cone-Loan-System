<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use App\Models\File;
use App\Models\peminjaman;

class AdminController extends Controller
{

    //Method Testing (HARUS DI HAPUS NANTI)
    public function test(){
        $data = DB::table('peminjaman_cone')
            ->where('id', 4)
            ->get();

        return view('coba_disini',['data' => $data]);
    }

    //Method Halaman Dashboard
    public function dashboard()
    {

        ////mengirim nilai menu dan kehadiran footer
        $menu = 1;
        $footer = 1;

        $jumlah_cone = DB::table('pengadaan_cone')->sum('jumlah_pengadaan');
        $cone_rusak = DB::table('peminjaman_cone')->sum('jumlah_kerusakan');
        $cone_baik = intval($jumlah_cone - $cone_rusak);

        $cone_peminjaman = DB::table('peminjaman_cone')->where('status_pengembalian',1)->sum('jumlah_peminjaman');
        $peminjaman_aktif = DB::table('peminjaman_cone')->where('status_pengembalian',1)->count('nama_peminjam'); 

        $cone = array(
            'cone_baik'=>$cone_baik,
            'cone_rusak'=>$cone_rusak,
            'peminjaman'=>$cone_peminjaman,
            'peminjaman_aktiv'=>$peminjaman_aktif
        );

        // $data = DB::table('peminjaman_cone')->get();

        // dd($cone,$data);
        return view('dashboard',
            [
                'menu' => $menu, 
                'footer' => $footer,
                'cone'=>$cone
            ]);
    }

    //Method Halaman Profil
    public function profil()
    {

        //mengirim nilai menu dan kehadiran footer
        $menu = 2;
        $footer = 1;
        return view('profil',  ['menu' => $menu, 'footer' => $footer]);
    }

    //Method Update Profil
    public function update_profil(Request $request)
    {

        if ($request->password_baru == null) {
            DB::table('users')->where('id', $request->id)->update([
                'name' => Str::lower($request->name),
                'username' => Str::lower($request->username),
                'email' => $request->email
            ]);
            return back()->with('success', 'Profil Berhasil Di Update');
        } else {
            if (Hash::check($request->password_lama, Auth::user()->password)) {
                DB::table('users')->where('id', $request->id)->update([
                    'name' => Str::lower($request->name),
                    'username' => Str::lower($request->username),
                    'email' => $request->email,
                    'password' => Hash::make($request->password_baru)
                ]);
                return back()->with('success', 'Profil dan Password Berhasil Di Update');
            } else {
                return back()->with('error', 'Mohon Maaf Password Lama Anda Salah');
            }
        }
    }

    //Method halaman Data cone
    public function data_cone()
    {

        //mengirim nilai menu dan kehadiran footer
        $menu = 3;
        $footer = 1;

        return view('data_cone', ['menu' => $menu, 'footer' => $footer]);
    }

    //Method Halaman Pengadaan Cone
    public function pengadaan_cone()
    {

        $menu = 4;
        $footer = 1;

        $data = DB::table('pengadaan_cone')->orderBy('tahun', 'DESC')->orderBy('bulan', 'DESC')->get();

        return view('pengadaan_cone', ['menu' => $menu, 'footer' => $footer, 'data' => $data]);
    }

    //Method Tambah Pengadaan
    public function tambah_pengadaan(Request $request)
    {
        $insert = DB::table('pengadaan_cone')->insert([
            'nama_pengadaan' => $request->name,
            'jumlah_pengadaan' => $request->jumlah,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun
        ]);

        if ($insert) {
            return back()->with('success', 'Data Pengadaan Berhasil Di Tambah');
        } else {
            return back()->with('Error', 'Data Pengadaan Gagal Di Tambah');
        }
    }

    //Method Update Pengadaan
    public function update_pengadaan(Request $request)
    {
        $update = $insert = DB::table('pengadaan_cone')
            ->where('id', $request->id)->update([
                'nama_pengadaan' => $request->name,
                'jumlah_pengadaan' => $request->jumlah,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun
            ]);

        if ($update) {
            return back()->with('success', 'Data Pengadaan Berhasil Di Edit');
        } else {
            return back()->with('Error', 'Data Pengadaan Gagal Di Edit');
        }
    }

    // Method Hapus Pengadaan
    public function hapus_pengadaan($id)
    {
        echo $id;
    }

    //Method Halaman Daftar Peminjaman
    public function daftar_peminjaman()
    {

        $menu = 5;
        $footer = 1;

        $data = DB::table('peminjaman_cone')
            ->orderBy('status_pengembalian', 'ASC')
            ->orderBy('id','DESC')
            ->orderBy('waktu_mulai', 'ASC')
            ->get();

        return view('peminjaman/daftar', ['menu' => $menu, 'footer' => $footer, 'data' => $data]);
    }

    //Method Tambah Peminjaman
    public function tambah_peminjaman()
    {
        $menu = 5;
        $footer = 1;

        return view('peminjaman/tambah', ['menu' => $menu, 'footer' => $footer]);
    }

    //Method Detail Peminjaman
    public function detail($id)
    {
        $menu = 5;
        $footer = 1;

        $data = DB::table('peminjaman_cone')
            ->where('id', $id)
            ->get();

        return view('peminjaman/detail', ['menu' => $menu, 'footer' => $footer, 'data' => $data]);
    }

    //Method Upload dan Dan Simpan Peminjaman
    public function simpan_peminjaman(Request $request)
    {

        if ($request->lembaga != null) {

            $fileName = time() . '_' . $request->surat->getClientOriginalName();
            $request->surat->storeAs('img/', $fileName, 'public');

            $query = DB::table('peminjaman_cone')
                ->insert([
                    'nama_peminjam' => $request->nama,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                    'jumlah_peminjaman' => $request->jumlah,
                    'lembaga' => $request->lembaga,
                    'alamat' => $request->alamat,
                    'alasan_peminjaman' => $request->alasan,
                    'waktu_mulai' => $request->awal,
                    'waktu_pengembalian' => $request->akhir,
                    'surat_peminjaman' => $fileName,
                    'status_pengembalian' => 0
                ]);
            if ($query) {
                return redirect()->route('daftar_peminjaman')->with('success', 'Data Peminjaman Berhasil Di Tambah');
            } else {
                return back()->with('Error', 'Data Pengadaan Gagal Di Tambah');
            }
        } elseif ($request->lembaga == null) {
            echo "Peminjaman Di lakukan individu";
        }
    }

    //Method Halaman Hapus Peminjaman
    public function hapus_peminjaman($id)
    {
        $data = DB::table('peminjaman_cone')
            ->where('id', $id)
            ->delete();

        if ($data) {
            return back()->with('success', 'Data Peminjaman Berhasil Di Hapus');
        } else {
            return back()->with('error', 'Data Peminjaman Gagal Di Hapus');
        }
    }

    //Method Edit Peminjaman
    public function edit($id){
        $data = DB::table('peminjaman_cone')
                ->where('id',$id)
                ->get();

        $menu = 5;
        $footer = 1;

        return view('peminjaman/edit',['menu'=>$menu,'footer'=>$footer,'data'=>$data]);
    }

    //Method Halaman Riwayat Peminjaman
    public function riwayat_peminjaman()
    {
        $menu = 6;
        $footer = 1;

        $data = DB::table('peminjaman_cone')
            ->orderBy('status_pengembalian', 'DESC')
            ->orderBy('waktu_mulai', 'ASC')
            ->where('status_pengembalian', '=', 2)
            ->get();


        return view('riwayat_peminjaman', ['menu' => $menu, 'footer' => $footer, 'data' => $data]);
    }
}
