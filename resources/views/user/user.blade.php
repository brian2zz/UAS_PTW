@extends('layout_user')
@section('badan')
<link rel="stylesheet" href="{{asset("css/keranjang.css")}}">

<div class="container-fluid" id="total-keranjang" >
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2">
        <div class="table-responsive">          
          <table class="table">
            
            <tbody>
                @foreach($akun as $Akun)
                <tr>
                <td><img src="{{asset("img/user.png")}}"></td>
                <td>
                  <h5><strong>nama</strong></h5>
                  <h5><strong>Username  </strong><span class="titik-harga"></span></h5>
                  <h5><strong>Email     </strong><span class="titik-harga"></span></h5>
                  <h5><strong>Alamat    </strong><span class="titik-harga"></span></h5>                
                  <h5><strong>Nomor Telp</strong><span class="titik-harga"></span></h5>
                </td>
                <td>
                    <h5><strong>:</strong></h5>
                    <h5><strong>:</strong></h5>
                    <h5><strong>:</strong></h5>
                    <h5><strong>:</strong></h5>
                    <h5><strong>:</strong></h5>
                </td>
                
                <td>
                    <h5>{{$Akun->name}}</h5>
                    <h5>{{$Akun->username}}</h5>
                    <h5>{{$Akun->email}}</h5>
                    <h5>{{$Akun->alamat}}</h5>
                    <h5>{{$Akun->no_telp}}</h5> 
                </td>
                
             
              <tr>
                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{$Akun->username}}"><i class="glyphicon glyphicon-pencil"></i>&ensp;&ensp;Edit Data</button>
                </td>
              </tr>

              <div class="modal fade" id="modal{{$Akun->username}}" role="dialog">
                <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="margin-left:150px"><strong>Edit User</strong></h4>
                  </div>
                  <div class="modal-body">
                        <form action="/akun/edit" method="get" role="form">
                            <div class="form-group">
                                <label for="harga">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="{{$Akun->name}}">
                            </div>
                        <div class="form-group">
                            <label for="harga">username</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{$Akun->username}}">
                        </div>
                        <div class="form-group">
                            <label for="harga">password (kosongi bila tidak ingin mengganti)</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="stock">email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$Akun->email}}">
                        </div>
                        <div class="form-group">
                            <label for="stock">alamat</label>
                            <input type="alamat" class="form-control" id="alamat" name="alamat" value="{{$Akun->alamat}}">
                        </div>
                        <div class="form-group">
                            <label for="stock">no telpon</label>
                            <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" id="nomer" name="nomer" value="{{$Akun->no_telp}}">
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
        
  </div>
</div>
    </div>
  </div>
  <script>
        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
    </script>
  
@endsection