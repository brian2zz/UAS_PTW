<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Auth;
use Session;
use App\models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function home()
    {
        $barang = DB::table('produk')->get();
        return view('user.home', ['produk' => $barang]);
    }
    public function pria()
    {
        $barang = DB::table('produk')->where('kategori', '=', 'pria')->get();
        return view('user.home', ['produk' => $barang]);
    }
    public function wanita()
    {
        $barang = DB::table('produk')->where('kategori', '=', 'wanita')->get();
        return view('user.home', ['produk' => $barang]);
    }
    public function anak()
    {
        $barang = DB::table('produk')->where('kategori', '=', 'anak-anak')->get();
        return view('user.home', ['produk' => $barang]);
    }
    public function couple()
    {
        $barang = DB::table('produk')->where('kategori', '=', 'couple')->get();
        return view('user.home', ['produk' => $barang]);
    }
    public function aksesoris()
    {
        $barang = DB::table('produk')->where('kategori', '=', 'aksesoris')->get();
        return view('user.home', ['produk' => $barang]);
    }

    public function keranjang()
    {
        $user_id = Auth::user()->id;
        $data = DB::table('keranjang')->where('id_user', '=', $user_id)->join('produk', 'keranjang.id_produk', '=', 'produk.id_produk')->get();
        $count = DB::table('keranjang')->where('id_user', '=', $user_id)->count();
        // dd($data);
        if ($count > 0) {
            Session::flash('ada');
            return view('user.keranjang', ['keranjang' => $data]);
        } else {
            Session::flash('tidak');
            return view('user.keranjang');
        }
    }
    public function pesan($id)
    {

        $user_id = Auth::user()->id;
        $barang = DB::table('produk')->where('id_produk', $id)->first();
        $count = DB::table('keranjang')->where('id_produk', $id)->count();
        if ($count == 0) {
            DB::table('keranjang')->insert([
                'id_user' => $user_id,
                'id_produk' => $id,
                'nama_produk' => $barang->nama,
                'total' => $barang->harga,
                'jumlah' => 1,
            ]);
            return redirect('/home');
        } else {
            return redirect()->back()->with('warning', 'Produk sudah terdaftar di keranjang');
        }
        // dd($count,$barang);
    }

    public function update_keranjang(Request $request)
    {
        $user = Auth::user()->id;
        $data = DB::table('produk')->select('harga')->where('id_produk', $request->id_produk)->first();
        $data2 = $data->harga;
        $jumlah = (int)$request->jumlah;
        $total = $jumlah * $data2;
        DB::table('keranjang')->where('id_user', $user)->where('id_produk', $request->id_produk)
            ->update([
                'jumlah' => $request->jumlah,
                'total' => $total,
            ]);
        return redirect('/keranjang');
    }
    public function delete_keranjang($id)
    {
        DB::table('keranjang')->where('id_produk', $id)->delete();
        return redirect('/keranjang');
    }

    public function tambah_transaksi(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'img/pembayaran';

        $file->move($tujuan_upload, $nama_file);

        $user = Auth::user()->id;
        $keranjang = DB::table('keranjang')->where('id_user', $user)->get();
        $num = rand(0, 9999);
        $kode = 'INV-' . sprintf("%04s", $num);
        foreach ($keranjang as $cart) {
            DB::table('transaksi')->insert([
                'id_keranjang' => $kode,
                'id_produk' => $cart->id_produk,
                'id_user' => $user,
                'nama' => $cart->nama_produk,
                'jumlah' => $cart->jumlah,
                'harga' => $cart->total,
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'bukti_bayar' => $nama_file,
                'status' => 'Diproses',
            ]);
            $sql = DB::table('produk')->select('stok')->where('id_produk', $cart->id_produk)->first();
            $data = (int)$sql->stok;
            $stok = $data - $cart->jumlah;
            DB::table('produk')->where('id_produk', $cart->id_produk)->update(['stok' => $stok]);
        }

        DB::table('keranjang')->where('id_user', $user)->delete();
        return redirect('/keranjang');
    }
    public function pembelian()
    {

        $user = Auth::user()->id;
        $transaksi = DB::table('transaksi')->select(DB::raw('id_keranjang, sum(harga) as harga, status'))->where('id_user', $user)->groupby('id_keranjang')->get();
        return view('user.pembelian', ['pembelian' => $transaksi]);
    }

    public function selesai($id)
    {

        DB::table('transaksi')->where('id_keranjang', $id)->update([
            'status' => 'Selesai',
            'tanggal_selesai' => Carbon::now()->format('Y-m-d'),
        ]);
        return redirect('/pembelian');
    }

    public function akun()
    {
        $user = Auth::user()->id;
        $data = User::where('id', $user)->get();
        // dd($data->all());
        return view('user.user', ['akun' => $data]);
    }

    public function akun_edit(Request $request)
    {
        // dd($request->all());
        $user = Auth::user()->id;
        if ($request->password != null) {
            // echo 'password ada';
            User::where('id', $user)->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'username' => $request->username,
                'no_telp' => $request->nomer,
                'password' => bcrypt($request->password),
            ]);
        } else {
            // echo 'password tidak ada';
            User::where('id', $user)->update([
                'name' => $request->nama,
                'alamat' => $request->alamat,
                'username' => $request->username,
                'no_telp' => $request->nomer,
            ]);
        }
        return redirect('/akun');
    }
    public function cari(request $request)
    {
        $produk = DB::table('produk')->where('nama', 'like', '%' . $request->keyword . '%')->get();
        // dd($data->all());
        return view('user.home', ['produk' => $produk]);
    }
}
