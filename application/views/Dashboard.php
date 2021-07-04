  <div class="content-wrapper">
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">Inicio</h1>
  				</div>
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="#">Inicio</a></li>
  						<li class="breadcrumb-item active">General</li>
  					</ol>
  				</div>
  			</div>
  		</div>
  	</div>

  	<section class="content">
  		<div class="container-fluid">
  			<div class="row">
  				<div class="col-12 col-sm-6 col-md-3">
  					<div class="info-box">
  						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-list-alt"></i></span>

  						<div class="info-box-content">
  							<span class="info-box-text">Productos registrados</span>
  							<span class="info-box-number">
  								<?= $row;?>
  								<small>productos</small>
  							</span>
  						</div>
  					</div>
  				</div>
  				<div class="col-12 col-sm-6 col-md-3">
  					<div class="info-box mb-3">
  						<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-basket"></i></span>

  						<div class="info-box-content">
  							<span class="info-box-text">Compras</span>
  							<span class="info-box-number"><?= $store;?></span>
  						</div>
  					</div>
  				</div>

  				<div class="clearfix hidden-md-up"></div>

  				<div class="col-12 col-sm-6 col-md-3">
  					<div class="info-box mb-3">
  						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

  						<div class="info-box-content">
  							<span class="info-box-text">Ventas</span>
  							<span class="info-box-number"><?= $sales;?></span>
  						</div>
  					</div>
  				</div>
  				<div class="col-12 col-sm-6 col-md-3">
  					<div class="info-box mb-3">
  						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

  						<div class="info-box-content">
  							<span class="info-box-text">Usuario</span>
  							<span class="info-box-number"><?= $users; ?></span>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>

  	<section class="content">
  		<div class="row">
  			<div class="col-lg-6 col-md-6 col-sm-12">
  				<div class="card card-primary card-outline">
  					<div class="card-header">
  						<h3 class="card-title">Productos cercanos a vencer</h3>
  					</div>
  					<div class="card-body">
  						<table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
  							<thead>
  								<tr>
  									<th>Vencimiento</th>
  									<th>Producto</th>
  									<th>Categoria</th>
  									<th>Presentacion</th>
  									<th>Stock</th>
  								</tr>
  							</thead>
  							<tbody>
  								<?php foreach($vencer as $item): ?>
  								<tr>
  									<?php
                $codigo_categoria = $item->codigo_categoria;
                $codigo_producto = $item->codigo_producto;
                $this->db->select('*');
                $this->db->from('producto');
                $this->db->where('codigo_producto', $codigo_producto);
                $prooduc = $this->db->get();
                foreach($prooduc->result() as $produ);
                $producto = $produ->producto;
              ?>
  									<td class="text_v"><?= $item->vencimiento; ?>
  									<td><?= $producto; ?></td>
  									<?php
                $this->db->select('categoria');
                $this->db->from('categoria');
                $this->db->where('codigo_categoria', $codigo_categoria);
                $consulta = $this->db->get();
                foreach($consulta->result() as $cate);
                $categoria = $cate->categoria;
              ?>
  									<td class="text_v"><?= $categoria; ?></td>

  									<?php
                $stock = $item->stock;
                $libras = $item->stock_libras;
                $codigo_presentacion = $item->codigo_presentacion;
                $compra = $item->precio_compra;
                $venta = $item->precio_venta;
                $utilidad = $item->utilidad;

                $ganancia = $stock * $utilidad;

                $this->db->select('presentacion');
                $this->db->from('presentacion');
                $this->db->where(array('codigo_presentacion' => $codigo_presentacion, 'estado' => 1));
                $cons = $this->db->get();
                foreach($cons->result() as $pres);
                $presentacion = $pres->presentacion;
              ?>

  									<td class="text_v"><?= $presentacion; ?></td>

  									<td class="text_v"><?= $stock; ?>
  										<?= $libras > 0 ? " -- ".number_format($libras, -2, '.', ',').' lbs' : ''?></td>
  								</tr>
  								<?php endforeach; ?>
  							</tbody>
  							<tfoot>
  								<tr>
  									<th>Vencimiento</th>
  									<th>Producto</th>
  									<th>Categoria</th>
  									<th>Presentacion</th>
  									<th>Stock</th>
  								</tr>
  							</tfoot>
  						</table>
  					</div>
  					<div class="card-footer">
  					</div>
  				</div>
  			</div>
  			<div class="col-lg-6 col-md-6 col-sm-12">
  				<div class="card card-primary card-outline">
  					<div class="card-header">
  						<h3 class="card-title">Ulimas Ventas</h3>
  					</div>
  					<div class="card-body">
  						<table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
  							<thead>
  								<tr>
  									<th>Codigo</th>
  									<th>Cliente</th>
  									<th>Total</th>
  									<th>Accion</th>
  								</tr>
  							</thead>
  							<tbody>
  								<?php foreach($list as $item): ?>
  								<tr>
  									<td class="text_v"><?= $item->correlativo; ?></td>
  									<td class="text_v"><?= $item->cliente; ?></td>
  									<td class="text_v">Q <?= number_format($item->total, 2, '.', ','); ?></td>
  									<td class="text_v">
  										<a href="<?= base_url('index.php/Sales/Printer/');?><?= $item->codigo_factura; ?>" class="btn btn-secondary" title="Imprimir comprobante"><i class="fas fa-print"></i></a>
  									</td>
  								</tr>
  								<?php endforeach; ?>
  							</tbody>
  							<tfoot>
  								<tr>
  									<th>Codigo</th>
  									<th>Cliente</th>
  									<th>Total</th>
  									<th>Accion</th>
  								</tr>
  							</tfoot>
  						</table>
  					</div>
  					<div class="card-footer">
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
