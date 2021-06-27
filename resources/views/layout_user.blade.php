<html>

<head>
  <title>Toko Online</title>
  <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
  <link rel="stylesheet" href="{{asset("css/main.css")}}">
</head>

<body>
  <nav class="navbar navbar-fixed">

    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="/home">
          <img style="width:10vw; height:13vh; padding-left:50px;" alt="Brand" src="{{asset("img/Untag.png")}}">
        </a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="/logout"><button class="btn navbar-btn" id="btn-logout" style="color:#7986cb;margin-top:-0.8vh;
                      background-color: white;"><b>Logout</b></button></a>
        </li>
        <li style="border-left: 1px solid white"><a class="not-active" href="/keranjang" data-toggle="dropdown"
            data-placement="bottom" title="akun"><i class="glyphicon glyphicon-menu-hamburger" id="trolly"></i></a>
          <ul class="dropdown-menu">
            <li>
              <a class="not-active" href="/keranjang" data-toggle="tooltip" data-placement="bottom" title="Keranjang"><i
                  class="glyphicon glyphicon-shopping-cart" id="trolly">Keranjang</i></a>
            </li>
            <br>
            <li>
              <a class="not-active" href="/pembelian" data-toggle="tooltip" data-placement="bottom" title="pembelian"><i
                  class="glyphicon glyphicon-gift" id="pembelian"></i>Pembelian</a>
            </li>
            <br>
            <li>
              <a class="not-active" href="/akun" data-toggle="tooltip" data-placement="bottom" title="akun"><i
                  class="glyphicon glyphicon-user" id="akun"></i>Akun</a>
            </li>
          </ul>

        </li>

      </ul>


      <form action="/pencarian" method="get" class="navbar-form navbar-right" style="margin-top: 1vh">
        @csrf
        <div class="input-group" style="width:45vw; margin-right: 20vw; margin-top: 1vh;">
          <input type="text" class="form-control" placeholder="Masukan kata kunci pencarian..." name="keyword">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search" style="opacity: 0.7"></i>
            </button>
          </div>
        </div>
      </form>



      <div class="col-xs-6">
        <ul class="nav nav-pills kategori2" style="width:45vw; margin-right: 8vw; margin-top: 1vh; margin-left: 10vh;">
          <li ><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dewasa<span
                class="caret" style="margin-left:10px"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/kategori/pria">Pria</a></li>
              <li><a href="/kategori/wanita">Wanita</a></li>
            </ul>
          </li>
          <li><a href="/kategori/couple">Couple</a></li>
          <li><a href="/kategori/anak">Anak-anak</a></li>
          <li><a href="/kategori/aksesoris">Aksesoris</a></li>
        </ul>
      </div>
  </nav>
  <div class="container-fluid" id="isi">

    @yield('badan')

  </div>

  <script type="text/javascript" src="{{asset("Javascript/jquery.min.js")}}"></script>
  <script type="text/javascript" src="{{asset("bootstrap/js/bootstrap.js")}}"></script>
  <script type="text/javascript" src="{{asset("js/script.js")}}"></script>
</body>

</html>