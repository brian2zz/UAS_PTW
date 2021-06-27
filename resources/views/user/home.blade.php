@extends('layout_user')
@section('badan')


<div class="row">
  <div class="col-xs-2 col-xs-offset-5" id="produk-laris">
    <h3 style="font-family: Blacksword; font-size:2.2em;"><strong>Daftar Produk</strong></h3>
  </div>
</div>

<div class="container" id="produk">
  
    <div class="tab-content">
      <!-- pria -->
      <div id="pria" class="tab-pane fade in active">
      <ul>
          @foreach($produk as $barang)
            <li>
              <a href="#{{$barang->id_produk}}">
                <img style="height: 400px;" src="{{asset("img/".$barang->file)}}" alt="{{$barang->nama}}">
                <span style="font-size: 18; text-align:center; color: white">{{$barang->nama}}</span>
                <span style="font-size: 18; text-align:center; color: gray;"><br><br><br>Rp {{$barang->harga}}</span>
                
              </a>
              <div class="overlay" id="{{$barang->id_produk}}">
                <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
                <img style="width: 150px;" src="{{asset("img/".$barang->file)}}">
                <div class="keterangan">
                  <div class="container">
                    <h4><strong>{{$barang->nama}}</strong></h4>
                    <p>{{$barang->keterangan}}</p>
                    <h5>Rp.{{$barang->harga}}</h5>
                    <h5 class="ukur">Ukuran : {{$barang->ukuran}}</h5>
                    <h5 class="ukur">Stok : {{$barang->stok}}</h5>
                    
                  <a href="/pesan/{{$barang->id_produk}}"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>                
            </div>
          </div>
        </div>
      </li>  
      
    @endforeach
    @if(Session::has('warning'))

                  <script>
                      var pesan ='{{ Session::get('warning') }}';
                      alert(pesan);
                  </script>             
    @endif

    <div class="clear"></div>
    </ul>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}

@endsection