<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\models\gambar;
use App\models\User;
use File;
use Session;

class adminController extends Controller
{
    public function user()
    {
        $user = DB::table('users')->where('role', '=', 'user')->get();
        // dump($user);
        return view('admin.user', ['user' => $user]);
    }
    public function barang()
    {
        $barang = gambar::paginate(3);
        return view('admin.tabel_barang', ['barang' => $barang]);
    }
    public function pria()
    {
        $barang = gambar::where('kategori', '=', 'pria')->paginate(3);
        return view('admin.tabel_barang', ['barang' => $barang]);
    }
    public function wanita()
    {
        $barang = gambar::where('kategori', '=', 'wanita')->paginate(3);
        return view('admin.tabel_barang', ['barang' => $barang]);
    }
    public function anak()
    {
        $barang = gambar::where('kategori', '=', 'anak-anak')->paginate(3);
        return view('admin.tabel_barang', ['barang' => $barang]);
    }
    public function couple()
    {
        $barang = gambar::where('kategori', '=', 'couple')->paginate(3);
        return view('admin.tabel_barang', ['barang' => $barang]);
    }
    public function aksesoris()
    {
        $barang = gambar::where('kategori', '=', 'aksesoris')->paginate(3);
        return view('admin.tabel_barang', ['barang' => $barang]);
    }
    public function admin()
    {
        $admin = DB::table('users')->where('role', '=', 'admin')->paginate(3);
        // dump($user);
        return view('admin.admin', ['admin' => $admin]);
    }

    public function tambah_barang(Request $produk)
    {
        if ($produk->kategori == 'pria') {
            $data = gambar::where('kategori', '=', 'pria')->max('id_produk');
            $id = (int) substr($data, 3, 3);
            $id++;
            $kode = 'pr' . sprintf("%03s", $id);
        } elseif ($produk->kategori == 'wanita') {
            $data = gambar::where('kategori', '=', 'wanita')->max('id_produk');
            $id = (int) substr($data, 3, 3);
            $id++;
            $kode = 'wn' . sprintf("%03s", $id);
        } elseif ($produk->kategori == 'anak-anak') {
            $data = gambar::where('kategori', '=', 'anak-anak')->max('id_produk');
            $id = (int) substr($data, 3, 3);
            $id++;
            $kode = 'an' . sprintf("%03s", $id);
        } elseif ($produk->kategori == 'couple') {
            $data = gambar::where('kategori', '=', 'couple')->max('id_produk');
            $id = (int) substr($data, 3, 3);
            $id++;
            $kode = 'cp' . sprintf("%03s", $id);
        } else {
            $data = gambar::where('kategori', '=', 'aksesoris')->max('id_produk');
            $id = (int) substr($data, 3, 3);
            $id++;
            $kode = 'acc' . sprintf("%03s", $id);
        }
        $this->validate($produk, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $produk->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'img';

        $file->move($tujuan_upload, $nama_file);

        gambar::create([
            'id_produk' => $kode,
            'nama' => $produk->nama,
            'file' => $nama_file,
            'keterangan' => $produk->keterangan,
            'ukuran' => $produk->ukuran,
            'kategori' => $produk->kategori,
            'harga' => $produk->harga,
            'stok' => $produk->stock,
        ]);
        return redirect()->back();
    }

    public function transaksi()
    {
        $data = DB::table('transaksi')->select(DB::raw('id_keranjang,sum(harga) as total,name,id_user,tanggal,status'))->join('users','id_user','=','id')->where('status', 'Diproses')->groupby('id_keranjang')->get();
        return view('admin.transaksi', ['transaksi' => $data]);
    }

    public function pembeli($id){
        $user = DB::table('users')->where('role', '=', 'user')->where('id',$id)->get();
        return view('admin.user', ['user' => $user]);
    }

    public function data_barang($id)
    {
        $data = DB::table('transaksi')->where('id_keranjang', $id)->get();
        // dd($id);
        return view('admin.detail_transaksi', ['data' => $data]);
    }

    public function laporan()
    {
        $data = DB::table('transaksi')->select(DB::raw('tanggal_selesai, id_keranjang, sum(harga) as pendapatan'))->where('status', 'Selesai')->groupby('tanggal')->get();
        // $count = DB::table('transaksi')->select(DB::raw('count(id_keranjang) as jumlah')->groupby('id_keranjang')->get();
        $sum = DB::table('transaksi')->select(DB::raw('sum(harga) as total'))->where('status', 'Selesai')->get();
        return view('admin.laporan', ['laporan' => $data, 'sum' => $sum]);
    }

    public function edit_barang(Request $barang)
    {
        if ($barang->harga > 0 && $barang->stok > 0) {
            DB::table('produk')->where('id_produk', '=', $barang->idProduk)
                ->update([
                    'harga' => $barang->harga,
                    'stok' => $barang->stok
                ]);
            return redirect()->back();
        } elseif ($barang->harga == 0 && $barang->stok > 0) {
            DB::table('produk')->where('id_produk', '=', $barang->idProduk)
                ->update(['stok' => $barang->stok]);
            return redirect()->back();
        } elseif ($barang->harga > 0 && $barang->stok == 0) {
            DB::table('produk')->where('id_produk', '=', $barang->idProduk)
                ->update(['harga' => $barang->harga]);
            return redirect()->back();
        } else {
            return redirect()->back()->with('alert', 'Error');
        }
    }

    public function hapus_barang($id)
    {
        $gambar = gambar::where('id_produk', $id)->first();
        File::delete('img/' . $gambar->file);
        DB::table('produk')->where('id_produk', $id)->delete();
        return redirect()->back();
    }

    public function hapus_admin($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function tambah_admin(Request $admin)
    {
        $password = bcrypt($admin->password);
        User::create([
            'name' => $admin->namaadmin,
            'username' => $admin->username,
            'password' => $password,
            'alamat' => $admin->alamatadmin,
            'email' => $admin->emailadmin,
            'role' => 'admin',
        ]);
        return redirect()->back();
    }

    public function kirim($id)
    {
        DB::table('transaksi')->where('id_keranjang', $id)
            ->update([
                'status' => 'Dikirim',
            ]);
        // dd($id);
        return redirect('/transaksi');
    }

    public function laporan_bulanan(Request $request)
    {
        if ($request->bulan == null) {
            return redirect('/laporan');
        } else {
            $data = DB::table('transaksi')->select(DB::raw('tanggal_selesai, id_keranjang, sum(harga) as pendapatan'))->where('status', 'Selesai')->whereMonth('tanggal_selesai', '=', $request->bulan)->groupby('tanggal')->get();
            $sum = DB::table('transaksi')->select(DB::raw('sum(harga) as total'))->where('status', 'Selesai')->whereMonth('tanggal_selesai', '=', $request->bulan)->get();
            return view('admin.laporan', ['laporan' => $data, 'sum' => $sum]);
        }
    }
}
