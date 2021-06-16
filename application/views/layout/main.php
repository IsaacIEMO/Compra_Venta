<?php
  $url = $this->uri->segment(2);
  $urls = $this->uri->segment(1);
?>

<script language="JavaScript">
	function calcular() {
		var existencia = parseFloat(document.getElementById("stock").value);
		var precio_compra = parseFloat(document.getElementById("compra").value);
		var precio_venta = parseFloat(document.getElementById("venta").value);
		var sub_total = precio_venta - precio_compra;
		var conDecimal = sub_total.toFixed(2);
		var total = existencia * conDecimal;

		function separator(total) {
			var str = total.toString().split(".");
			str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			return str.join(".");
		}

		var total = document.getElementById("utilidad").value = separator(total);
	}

</script>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" <?= $url === 'new_products' || $urls === "Store" ? 'onload="calcular();"' : ' '?>>
	<div class="wrapper">

		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__wobble" src="<?= base_url('assets/');?>dist/img/AdminLTELogo.png" alt="AdminLTELogo"
				height="60" width="60">
		</div>

		<nav class="main-header navbar navbar-expand navbar-dark">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?= base_url('index.php/Dashboard');?>" class="nav-link">Inicio</a>
				</li>

			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('index.php/Login/logout');?>">
						<i class="fas fa-window-close"></i>
					</a>
				</li>
			</ul>
		</nav>

		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<a href="<?= base_url('index.php/Dashboard');?>" class="brand-link">
				<img src="<?= base_url('assets/');?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
					class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">El Rancho</span>
			</a>

			<div class="sidebar">
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<i class="fas fa-user"></i>
					</div>
					<div class="info">
						<a href="#" class="d-block"><?= $_SESSION['nombre'];?> <?= $_SESSION['apellido']?></a>
					</div>
				</div>

				<div class="form-inline">
					<div class="input-group" data-widget="sidebar-search">
						<input class="form-control form-control-sidebar" type="search" placeholder="Buscar"
							aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-sidebar">
								<i class="fas fa-search fa-fw"></i>
							</button>
						</div>
					</div>
				</div>

				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">

						<li class="nav-item">
							<a href="<?= base_url('index.php/Dashboard');?>"
								class="nav-link <?= $urls === 'Dashboard' ? 'active' : '' ;?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Inicio
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?= base_url('index.php/Store');?>"
								class="nav-link <?= $urls === 'Store' ? 'active' : '' ;?>">
								<i class="fas fa-shopping-cart nav-icon"></i>
								<p>Compras</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?= base_url('index.php/Supplier');?>"
								class="nav-link <?= $urls === 'Supplier' ? 'active' : '' ;?>">
								<i class="fas fa-truck nav-icon"></i>
								<p>Proveedores</p>
							</a>
						</li>

						<li class="nav-item <?= $urls === 'Products' ? 'menu-open' : '' ;?>">
							<a href="#" class="nav-link <?= $urls === 'Products' ? 'active' : '' ;?>">
								<i class="nav-icon fas fa-th"></i>
								<p>
									Productos
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="<?= base_url('index.php/Products/new_products');?>"
										class="nav-link <?= $url === 'new_products' ? 'active' : '' ;?>">
										<i class="far fa-edit nav-icon"></i>
										<p>Registro de Productos</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('index.php/Products/list_products');?>"
										class="nav-link <?= $url === 'list_products' ? 'active' : '' ;?>">
										<i class="far fa-list-alt nav-icon"></i>
										<p>Inventario</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('index.php/Products/category');?>"
										class="nav-link <?= $url === 'category' ? 'active' : '' ;?>">
										<i class="fas fa-plus nav-icon"></i>
										<p>Categorias</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item <?= $urls === 'Sales' ? 'menu-open' : '' ;?>">
							<a href="#" class="nav-link <?= $urls === 'Sales' ? 'active' : '' ;?>">
								<i class="nav-icon fas fa-store"></i>
								<p>
									Ventas
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="<?= base_url('index.php/Products/new_products');?>"
										class="nav-link <?= $url === 'new_products' ? 'active' : '' ;?>">
										<i class="far fa-edit nav-icon"></i>
										<p>Venta de producto</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="<?= base_url('index.php/Products/list_products');?>"
										class="nav-link <?= $url === 'list_products' ? 'active' : '' ;?>">
										<i class="far fa-list-alt nav-icon"></i>
										<p>Inventario</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="<?= base_url('index.php/Products/category');?>"
										class="nav-link <?= $url === 'category' ? 'active' : '' ;?>">
										<i class="fas fa-plus nav-icon"></i>
										<p>Categorias</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item <?= $urls === 'Users' ? 'menu-open' : '' ;?>">
							<a href="#" class="nav-link <?= $urls === 'Users' ? 'active' : '' ;?>">
								<i class="nav-icon fas fa-users"></i>
								<p>
									Usuarios
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('index.php/Users/New_user');?>"
										class="nav-link <?= $url === 'New_user' ? 'active' : '' ;?>">
										<i class="fas fa-user-plus nav-icon"></i>
										<p>Registro de usuarios</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('index.php/Users/List_user');?>"
										class="nav-link <?= $url === 'List_user' ? 'active' : '' ;?>">
										<i class="fas fa-users nav-icon"></i>
										<p>Listado de Usuarios</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item <?= $urls === 'Settings' ? 'menu-open' : '' ;?>">
							<a href="#" class="nav-link <?= $urls === 'Settings' ? 'active' : '' ;?>">
								<i class="nav-icon fas fa-cog"></i>
								<p>
									Configuraciones
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('index.php/Settings/Presentation');?>"
										class="nav-link <?= $url === 'Presentation' ? 'active' : '' ;?>">
										<i class="fas fa-weight nav-icon"></i>
										<p>Presentacion</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('index.php/Settings/Roles');?>"
										class="nav-link <?= $url === 'Roles' ? 'active' : '' ;?>">
										<i class="fas fa-briefcase nav-icon"></i>
										<p>Roles</p>
									</a>
								</li>
							</ul>
						</li>

					</ul>
				</nav>
			</div>
		</aside>
