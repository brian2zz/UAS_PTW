@extends('layout_admin')
@section('badan')
<div class="col-xs-10">
    <div class="tab-content">
        <div id="admin" class="tab-pane fade in active">
            <div class="row">
              <div class="col-xs-11 col-offset-xs-1">
                <h3 class="table-title"><strong>Tabel Admin</strong></h3>   
                <button type="button" class="btn btn-success" id="tambah-data-admin" data-toggle="modal" data-target="#form-admin">Add Admin</button>
  
                <!-- modal form-admin -->
                <div class="modal fade" id="form-admin" role="dialog">
                  <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 style="margin-left:150px"><strong>Tambahkan Admin</strong></h4>
                    </div>
                    <div class="modal-body">
                      <form action="admin/tambah" method="post" role="form">
                          @csrf
                          <div class="form-group">
                            <label for="nama-admin">Nama</label>
                            <input type="text" class="form-control" id="nama-admin" name="namaadmin">
                          </div>
                          <div class="form-group">
                            <label for="nama-admin">Username</label>
                            <input type="text" class="form-control" id="nama-admin" name="username">
                          </div>
                          <div class="form-group">
                            <label for="nama-admin">alamat</label>
                            <input type="text" class="form-control" id="alamat-admin" name="alamatadmin">
                          </div>
                        <div class="form-group">
                          <label for="email-admin">Email</label>
                          <input type="email" class="form-control" id="email-admin" name="emailadmin">
                        </div>
                        <div class="form-group">
                          <label for="password-admin">Password</label>
                          <input type="password" class="form-control" id="password-admin" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
                <!-- end of modal -->
        
      <div id="user" class="tab-pane fade in active">
        <div class="row">
          <div class="col-xs-11 col-offset-xs-1">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="id-user ">ID</th>
                    <th class="nama-user ">Nama</th>
                    <th class="nama-user ">Username</th>
                    <th class="email-user ">Email</th>
                    <th class="alamat-user ">Alamat</th>
                    <th class="nama-user ">Role</th>
                    <th class="hapus "></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($admin as $Admin)
                  <tr>
                    <th>{{$Admin->id}}</th>
                    <th>{{$Admin->name}}</th>
                    <th>{{$Admin->username}}</th>
                    <th>{{$Admin->email}}</th>
                    <th>{{$Admin->alamat}}</th>
                    <th>{{$Admin->role}}</th>
                    <td class="hapus"><a href="admin/hapus/{{$Admin->id}}">
                        <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection