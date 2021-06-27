@extends('layout_admin')
@section('badan')
<div class="col-xs-10">
    <div class="tab-content">
        <div id="barang" class="tab-pane fade in active">
            <h3 class="table-title"><strong>Tabel Barang</strong></h3>
            <button type="button" class="btn btn-success" id="tambah-data-barang" data-toggle="modal"
                data-target="#form-barang">Add Barang</button>


            <div class="modal fade" id="form-barang" role="dialog">
                <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 style="margin-left:150px"><strong>Tambahkan Barang</strong></h4>
                    </div>
                    <div class="modal-body">
                        <form action="barang/tambahProduk" method="post" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input type="text" class="form-control" name="nama" id="nama">
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto Barang</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" name="harga" id="harga">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                    <option value="anak-anak">Anak-anak</option>
                                    <option value="couple">Couple</option>
                                    <option value="aksesoris">Aksesoris</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ukuran">Ukuran</label>
                                <select class="form-control" id="ukuran" name="ukuran">
                                    <option value="none">-</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="stock">Stock Barang</label>
                                <input type="number" class="form-control" id="stock" name="stock">
                            </div>
                            <div class="form-group">
                                <label for="pesan">Keterangan : </label>
                                <textarea class="form-control" name="keterangan" style="resize:vertical"></textarea>
                            </div>
                            <button type="reset" data-dismiss="modal" class="btn btn-primary">Batal</button>
                            <button type="submit" name="upload" class="btn btn-primary">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="container">
                <h4 class="draf-kategori">Kategori : </h4>
                <ul class="nav nav-pills" style="margin-left: 15vw;">
                    <li class="dropdown active item-kategori">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dewasa<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/barang/pria">Pria</a></li>
                            <li><a href="/barang/wanita">Wanita</a></li>
                        </ul>
                    </li>
                    <li class="item-kategori"><a href="/barang/anak">Anak-anak</a></li>
                    <li class="item-kategori"><a href="/barang/couple">Couple</a></li>
                    <li class="item-kategori"><a href="/barang/aksesoris">Aksesoris</a></li>
                </ul>
            </div>

            @yield('tabel_barang')

        </div>
    </div>
</div>

@endsection