@extends('layout_admin')
@section('badan')

<div class="col-xs-10">
    <div class="tab-content">
        <div id="tabel" class="tab-pane fade in active">
        <div class="row">
            <div class="col-xs-11 col-offset-xs-1">
                <h3 class="table-title"><strong>Tabel Laporan</strong></h3> 
                <form method="POST" action="/laporan/laporan_bulanan">
                    @csrf
                    <label style="color:white;font-size:100%">Bulan </label>
                       <select style="background-color: rgba(0, 0, 0, 0.25);width: 150px;height: 30px" class="browser-default" name="bulan">
                        <option value="">-</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                       </select>
                       <button style="height: 30px" type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
                      </form> 
                <table class="table table-condensed" style="width:80vw">
                    <thead>
                        <tr>
                            <th class="harga-barang text-center">Tanggal</th>
                            <th class="id-barang text-center">Jumlah Transaksi</th>
                            <th class="harga-barang text-center">Pendapatan</th>
                            <th class="hapus"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporan as $Laporan)
                        
                        <tr>
                            <th class="id-barang text-center">{{$Laporan->tanggal_selesai}}</th>
                            <th class="nama-barang text-center">{{DB::table('transaksi')->where('tanggal_selesai', $Laporan->tanggal_selesai)->count(DB::raw('distinct(id_keranjang)'))}}</th>
                            <th class="keterangan-barang text-center">{{$Laporan->pendapatan}}</th>
                            <th class="hapus">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{$Laporan->tanggal_selesai}}">Info</button>
                            </th>
                        </tr>

                        <div class="modal fade" id="modal{{$Laporan->tanggal_selesai}}" role="dialog">
                            <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 style="margin-left:280px"><strong>Detail Transaksi</strong></h4>
                              </div>
                              <div class="modal-body">
                                    
                                        <div class="keterangan">
                                            @foreach(DB::table('transaksi')->where('tanggal', $Laporan->tanggal_selesai)->groupby('id_keranjang')->get() as $data)
                                            <div class="container">
                                                <h4><strong>{{$data->id_keranjang}}</strong></h4>
                                                @foreach(DB::table("transaksi")->where("id_keranjang",$data->id_keranjang)->get() as $Barang)
                                                <h5>ID Produk &nbsp; : {{$Barang->id_produk}}</h5>
                                                <h5>Nama Produk &nbsp; : {{$Barang->nama}}</h5>
                                                <h5>Harga &nbsp;: Rp.{{$Barang->harga}}</h5>
                                                <h5>Jumlah &nbsp;: {{$Barang->jumlah}}</h5>
                                                @endforeach  
                                                <hr style="border: 1px solid black; float : left" width="58%">
                                                <br><br>
                                            </div>
                                            @endforeach
                                        </div>
                              </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                    <tr>
                        <th class="keterangan-barang text-center" colspan="2">Total pendapatan</th>
                        @foreach($sum as $Sum)
                        <th class="harga-barang text-center">{{$Sum->total}}</th>
                        @endforeach
                        <th class="hapus"></th>
                    </tr>
                </table>
                <br>
                {{-- {{$barang->links()}} --}}
            </div>
        </div>
    </div>
</div>
@endsection
