@extends('layout_user')
@section('badan')
<link rel="stylesheet" href="{{asset("css/keranjang.css")}}">

<div class="container-fluid" id="total-keranjang" >
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2">
        <div class="table-responsive">          
          <table class="table">
            <thead>
              <tr>
                <h3 style="font-family: Forte; color:"><strong>Keranjang Belanja</strong></h3>
              </tr>
            </thead>
            <tbody>
                @if($cart = Session::get('ada'))
                @foreach($keranjang as $barang)
                <tr>
                <td><img src="{{asset("img/".$barang->file)}}"></td>
                <td>
                
                  <h4><strong>{{$barang->nama}}</strong></h4>
                  <h5><strong>Harga</strong><span class="titik-harga">:</span> Rp.{{$barang->harga}}</h5>

                    <form action="/keranjang/update" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="jumlah"><strong>Jumlah</strong><span class="titik-total">:</span></label>
                        <input type="hidden" name="harga" value="{{$barang->harga}}">
                        <input type="hidden" name="id_produk" value="{{$barang->id_produk}}">
                        <input type="number" value="{{$barang->jumlah}}" name="jumlah" min="1" max="{{$barang->stok}}" style="margin-left:-1vw">
                    </div>
                    </form>

                    <h5><strong>Total</strong><span class="titik-total">: Rp. {{$barang->total}}</span></h5>
                    
                </td>
                <td><a href="/keranjang/hapus/{{$barang->id_produk}}"><button type="button" class="btn btn-warning"><strong>Batal Beli</strong></button></a></td>
              </tr>
              @endforeach
              <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
              @endif

              @if($cart = Session::get('tidak'))
              <div class="">
                <div class="col-xs-5" style="background: #6cd83a;height: 10vh; color:white; line-height:10vh;margin-left:20vw; border-radius:10px; text-align:center">
                  <p>Keranjang Masih Kosong !!!</p>
                </div>
              </div>
              @endif

              
            </tbody>
        </table>
        
  </div>
</div>
    </div>
  </div>
  @if ($cart = Session::get('ada'))
  <form action="/keranjang/beli" method="post" role="form" enctype="multipart/form-data">
    @csrf
    <div class="container" id="beli">
      <div class="form-group">
        <label for="foto">bukti pembayaran</label>
        <input type="file"  id="file" name="file">
        </div>
        <button style="margin-left:250px" type="submit" class="btn btn-success"><strong>Beli Sekarang</strong></button>
    </form>
    
    <a href="/home"><button type="button" class="btn btn-success" style="margin-left:38vw"><strong>Kembali Berbelanja</strong></button></a>
  </div>
  @endif
  
@endsection