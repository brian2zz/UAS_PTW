@extends('layout_admin')
@section('badan')

<div class="col-xs-10">
    <div class="tab-content">
        <div id="tabel" class="tab-pane fade in active">
        <div class="row">
            <div class="col-xs-11 col-offset-xs-1">
                <h3 class="table-title"><strong>Tabel Transaksi</strong></h3>  
                <table class="table table-condensed" style="width:80vw">
                    <thead>
                        <tr>
                            {{-- <th class="id-barang text-center">ID transaksi</th> --}}
                            <th class="nama-barang text-center">ID Keranjang</th>
                            <th class="harga-barang text-center">Harga</th>
                            <th class="harga-barang text-center">Tanggal</th>
                            <th class="ukuran-barang text-center">Status</th>
                            <th class="hapus"></th>
                            <th class="hapus"></th>
                            <th class="hapus"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $trans)
                        <tr>
                            {{-- <th class="id-barang text-center">{{$trans->id_transaksi}}</th> --}}
                            <th class="nama-barang text-center">{{$trans->id_keranjang}}</th>
                            <th class="nama-barang text-center">{{$trans->total}}</th>
                            <th class="harga-barang text-center">{{$trans->tanggal}}</th>
                            <th class="ukuran-barang text-center">{{$trans->status}}</th>
                            <th class="hapus">
                                <th class="hapus">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{$trans->id_keranjang}}">Detail</button>
                                </th>
                            </th>
                            <th class="hapus">
                               <a href="/transaksi/kirim/{{$trans->id_keranjang}}"><button type="button" class="btn btn-success">Kirim</button>
                            </th>
                        </tr>

                        <div class="modal fade" id="modal{{$trans->id_keranjang}}" role="dialog">
                            <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 style="margin-left:280px"><strong>Detail Transaksi</strong></h4>
                              </div>
                              <div class="modal-body">
                                    @foreach(DB::table("transaksi")->where("id_keranjang",$trans->id_keranjang)->get() as $Barang)
                                        <div class="keterangan">
                                            <div class="container">
                                                <h4><strong>{{$Barang->id_produk}}</strong></h4>
                                                <h5>Nama Produk &nbsp; : {{$Barang->nama}}</h5>
                                                <h5>Harga &nbsp;: Rp.{{$Barang->harga}}</h5>
                                                <h5>Pembeli &nbsp;: <a href="/user/{{$trans->id_user}}">{{$trans->name}}</a></h5>
                                                <h5>Jumlah &nbsp;: {{$Barang->jumlah}}</h5>
                                                <h5>Bukti Pembayaran &nbsp;: <img width="150px" src="{{asset("/img/pembayaran/".$Barang->bukti_bayar)}}"></h5>
                                                <hr style="border: 1px solid black; float : left" width="58%">
                                                               
                                            </div>
                                        </div>
                                    @endforeach
                              </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{-- {{$barang->links()}} --}}
                
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
