<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="{{asset("css/style_login.css")}}">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

	<div class="login-wrap">
		<div class="login-html">
			<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
				In</label>
			<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
			<div class="login-form">
				<form role="form" action="/login" method="post" class="sign_in-form">
					@csrf
					<div class="sign-in-htm">
						<div class="group">
							<label for="user" class="label">Username</label>
							<input id="user" type="text" class="input" name="username">
						</div>
						<div class="group">
							<label for="pass" class="label">Password</label>
							<input id="pass" type="password" class="input" name="password">
						</div>

						<div class="group">
							<input type="submit" class="button" value="Sign In" name="submit">
						</div>
						<div class="hr"></div>

					</div>
				</form>

				<form action="/daftar" method="post" class="sign_up-form">
					@csrf
					<div class="sign-up-htm">
						<div class="group">
							<label for="user" class="label">Name</label>
							<input id="user" type="text" class="input" name="nama">
						</div>

						<div class="group">
							<label for="user" class="label">Username</label>
							<input id="user" type="text" class="input" name="username">
						</div>
						<div class="group">
							<label for="pass" class="label">Password</label>
							<input id="pass" type="password" class="input" name="password">
						</div>

						<div class="group">
							<label for="pass" class="label">Repeat Password</label>
							<input id="pass" type="password" class="input" name="confirm">
						</div>

						<div class="group">
							<label for="user" class="label">Email Address</label>
							<input id="user" type="email" class="input" name="email">
						</div>

						<div class="group">
							<label for="user" class="label">Address</label>
							<input id="user" type="text" class="input" name="alamat">
						</div>

						{{-- <div class="group">
						<label for="user" class="label">phone</label>
						<input id="user" type="text" onkeypress="return hanyaAngka(event)" class="input" name="telp">
					</div> --}}

						<div class="group">
							<input type="submit" class="button" value="Sign Up">
						</div>
					</div>
				</form>
			</div>
		</div>
		@if($notif = Session::get('login'))
		<div class="alert alert-warning alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $notif }}</strong>
		</div>
		@endif
		@if($notif = Session::get('password'))
		<div class="alert alert-warning alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $notif }}</strong>
		</div>
		@endif

		@if($notif = Session::get('warning'))
		<div class="alert alert-warning alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $notif }}</strong>
		</div>
		@endif

		@if($notif = Session::get('gagal'))
		<div class="alert alert-warning alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $notif }}</strong>
		</div>
		@endif
	</div>
	<script>
		function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
	</script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>


</body>

</html>