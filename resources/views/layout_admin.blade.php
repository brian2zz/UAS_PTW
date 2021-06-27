<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin.css")}}">
    <script type="text/javascript" src="{{asset("Javascript/jquery.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("bootstrap/js/bootstrap.js")}}"></script>
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2" id="sideLeft">
            <h4><strong>Administrator</strong></h4>
            <ul class="nav nav-pills nav-stacked" id="data">
                <li><a style="color: #4523be;" href="/user">User</a></li>
                <li><a style="color: #4523be;" href="/barang">Barang</a></li>
                <li><a style="color: #4523be;" href="/transaksi">Transaksi</a></li>
                <li><a style="color: #4523be;" href="/laporan">Laporan</a></li>
                <li><a style="color: #4523be;" href="/admin">Admin</a></li>
                <li><a href="/logout">
                <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span>Logout</button></a>
                </li>
            </ul>
            </div>

            @yield('badan')
            
        </div>
    </div>
   
    

</body>
</html>