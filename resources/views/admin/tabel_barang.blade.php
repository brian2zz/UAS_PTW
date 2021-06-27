@extends('layout_barang')
@section('tabel_barang')

<div class="tab-content">
    <div id="tabel" class="tab-pane fade in active">
      <div class="row">
        <div class="col-xs-11 col-offset-xs-1">
            <table class="table table-condensed" style="width:80vw">
                <thead>
                    <tr>
                        <th class="id-barang text-center">ID Barang</th>
                        <th class="nama-barang text-center">Nama Barang</th>
                        <th class="keterangan-barang text-center">Keterangan</th>
                        <th class="harga-barang text-center">Harga</th>
                        <th class="ukuran-barang text-center">Ukuran</th>
                        <th class="stock-barang text-center">Stock</th>
                        <th class="gambar">Gambar Barang</th>
                        <th class="hapus"></th>
                        <th class="hapus"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barang as $Barang)
                    <tr>
                        <th class="id-barang text-center">{{$Barang->id_produk}}</th>
                        <th class="nama-barang text-center">{{$Barang->nama}}</th>
                        <th class="keterangan-barang text-center">{{$Barang->keterangan}}</th>
                        <th class="harga-barang text-center">{{$Barang->harga}}</th>
                        <th class="ukuran-barang text-center">{{$Barang->ukuran}}</th>
                        <th class="stock-barang text-center">{{$Barang->stok}}</th>
                        <th class="gambar"><img width="150px" src="{{asset("img/".$Barang->file)}}"></td>
                        <th class="hapus">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{$Barang->id_produk}}"><i class="glyphicon glyphicon-pencil"></i></button>
                        </th>
                        <th class="hapus"><a href="/barang/hapus/{{$Barang->id_produk}}">
                            <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                        </th>
                    </tr>

                    <div class="modal fade" id="modal{{$Barang->id_produk}}" role="dialog">
                        <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 style="margin-left:150px"><strong>Edit Barang</strong></h4>
                          </div>
                          <div class="modal-body">
                                <form action="/barang/edit" method="get" role="form">
                                    <label for="idProduk">ID Produk :</label>
                                    <input type="text" readonly name="idProduk" value="{{$Barang->id_produk}}">
                                <div class="form-group">
                                    <label for="harga">Harga (Jangan diisi apabila Harga tetap)</label>
                                    <input type="number" class="form-control" name="harga" id="harga">
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock Barang (Jangan diisi apabila Stock tetap)</label>
                                    <input type="number" class="form-control" id="stok" name="stok">
                                </div>
                              <button type="reset" data-dismiss="modal" class="btn btn-primary">Batal</button>
                              <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{$barang->links()}}
        </div>
    </div>
</div>
@endsection
