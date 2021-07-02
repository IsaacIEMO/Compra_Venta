<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>El Rancho</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="<?= base_url('assets/');?>plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/');?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/');?>dist/css/adminlte.min.css">

</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="<?= base_url();?>" class="h2"><b>COMERCIALIZADORA EL RANCHO</b></a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Inicio de sesión</p>

				<form action="<?= base_url('index.php/Login/Validation');?>" method="post" id="frm_login">

					<div class="form-group mb-3" id="username">
						<label for="username">Usuario</label>
						<input type="text" class="form-control" placeholder="Usuario" name="username">
						<div class="invalid-feedback"></div>
					</div>

					<div class="form-group mb-3" id="password">
						<label for="password">Contraseña</label>
						<input type="password" class="form-control" placeholder="Contaseña" name="password">
						<div class="invalid-feedback"></div>
					</div>
					<div class="form-group col-12">
						<button type="submit" class="btn btn-primary btn-block">Iniciar Sesion</button>
					</div>
					<div class="form-group" id="alert"></div>
				</form>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets/');?>dist/js/jquery-3.6.0.min.js"></script>
	<script src="<?= base_url('assets/');?>dist/js/auth/login.js"></script>
	<script src="<?= base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/');?>dist/js/adminlte.min.js"></script>
</body>

</html>
