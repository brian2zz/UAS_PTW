@extends('layout_user')
@section('badan')

<div class="container-fluid">
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2">
        <div class="table-responsive">          
          <table class="table">
            <thead>
              <tr>
                <h3 style="font-family: Forte; color:"><strong>History Pembelian</strong></h3>
              </tr>
            </thead>
            <tbody>
                {{-- @if($cart = Session::get('ada')) --}}
                @foreach($pembelian as $beli)
                <tr>
                
                <td>
                
                  <h4><strong>{{$beli->id_keranjang}}</strong></h4>
                  <h5><strong>Harga</strong><span class="titik-harga">:</span> Rp.{{$beli->harga}}</h5>
                  <h5><strong>Status</strong><span class="titik-harga">:</span> {{$beli->status}}</h5>
                    
                </td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{$beli->id_keranjang}}">Detail</button></td>
                @if($beli->status == 'Diproses')
                <td><a href="#"><button disabled type="button" class="btn btn-warning"><strong>Pesanan Tiba</strong></button></a></td>
                @endif
                @if($beli->status == 'Dikirim')
                <td><a href="/pembelian/selesai/{{$beli->id_keranjang}}"><button type="button" class="btn btn-warning"><strong>Pesanan Tiba</strong></button></a></td>
                @endif
                <td></td>
              </tr>
                  <div class="modal fade" id="modal{{$beli->id_keranjang}}" role="dialog">
                    <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 style="margin-left:280px"><strong>Detail Pembelian</strong></h4>
                      </div>
                      <div class="modal-body">
                            @foreach(DB::table("transaksi")->where("id_keranjang",$beli->id_keranjang)->get() as $Barang)
                                <div class="keterangan">
                                    <div class="container">
                                        <h4><strong>{{$Barang->id_produk}}</strong></h4>
                                        <h5>Nama Produk &nbsp; : {{$Barang->nama}}</h5>
                                        <h5>Harga &nbsp;: Rp.{{$Barang->harga}}</h5>
                                        <h5>Jumlah &nbsp;: {{$Barang->jumlah}}</h5>
                                        <hr style="border: 1px solid black; float : left" width="58%">
                                                      
                                    </div>
                                </div>
                            @endforeach
                      </div>
                    </div>
                </div>
              @endforeach
              <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
              {{-- @endif --}}

            </tbody>
        </table>
        
  </div>
</div>
    </div>
  </div>
@endsection