@extends('layout_admin')
@section('badan')
<div class="col-xs-10">
    <div class="tab-content">
      <!-- tabel user -->
      <div id="user" class="tab-pane fade in active">
        <div class="row">
          <div class="col-xs-11 col-offset-xs-1">
              <h3 class="table-title"><strong>Tabel User</strong></h3>  
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="id-user ">ID User</th>
                    <th class="nama-user ">Nama</th>
                    <th class="nama-user ">Username</th>
                    <th class="email-user ">Email</th>
                    <th class="alamat-user ">Alamat</th>
                    <th class="nama-user ">Role</th>
                    <th class="hapus "></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($user as $User)
                  <tr>
                    <th>{{$User->id}}</th>
                    <th>{{$User->name}}</th>
                    <th>{{$User->username}}</th>
                    <th>{{$User->email}}</th>
                    <th>{{$User->alamat}}</th>
                    <th>{{$User->role}}</th>
                    <td class="hapus"><a href="proses/hapusUser.php?idUser='.$arrayUser['idUser'].'">
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