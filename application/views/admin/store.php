  <div class="content-wrapper">
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">Compras</h1>
  				</div>
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
  						<li class="breadcrumb-item active">Compras</li>
  					</ol>
  				</div>
  			</div>
  		</div>
  	</div>

  	<section class="content">
  		<div class="container-fluid">
  			<div class="card card-primary card-outline">
  				<div class="card-header">
  					<h3 class="card-title">Compras</h3>
  				</div>
  				<div class="card-body">

  					<div class="row">
  						<div class="col-lg-4 col-md-4 col-sm-12">
  							<div class="form-group">
  								<label for="producto">Producto</label>
  								<select name="producto" id="producto" class="form-control select2">
  									<option selected>Productos</option>
  									<?php foreach($productos as $item): ?>
  									<option value="<?= $item->codigo_producto; ?>"><?= $item->producto; ?></option>
  									<?php endforeach; ?>
  								</select>
  							</div>
  						</div>

  						<div class="detalles"></div>
						  
  						<script src="<?= base_url('assets/dist/js/ajax_producto.js'); ?>"></script>
  					</div>
  					<div class="row">
  						<div class="col-lg-4 col-md-4 col-sm-12">
  							<div class="form-group">
  								<label for="proveedor">Proveedor</label>
  								<select name="proveedord" id="proveedor" class="form-control">
  									<option selected>Proveedores</option>
  								</select>
  							</div>
  						</div>
  						<div class="col-lg-4 col-md-4 col-sm-12">
  							<div class="form-group">
  								<label for="categoria">Categoria</label>
  								<select name="" id="" class="form-control">
  									<option value="">Categorias</option>
  								</select>
  							</div>
  						</div>
  						<div class="col-lg-4 col-md-4 col-sm-12">
  							<div class="form-group">
  								<label for="presentacion">Presentacions</label>
  								<select name="" id="" class="form-control">
  									<option value="">Presentaciones</option>
  								</select>
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-lg-6 col-md-6 col-sm-12">
  							<div class="form-group">
  								<label for="descripcion">Descripcion</label>
  								<textarea name="descripcion" id="descripcion" cols="30" rows="4"
  									class="form-control"></textarea>
  							</div>
  						</div>
  						<div class="col-lg-6 col-md-6 col-sm-12">
  							<div class="row">
  								<div class="col-12">
  									<div class="form-group">
  										<label for="fecha">Fecha de compra</label>
  										<input type="datetime-local" id="fecha" class="form-control text_v"
  											value="<?= date('Y-m-d H:i:s A'); ?>" readonly>
  									</div>
  								</div>
  								<div class="col-12">
  									<div class="form-group">
  										<label for="factura">Factura</label>
  										<input type="text" class="form-control text_v" value="##1" name="factura"
  											id="factura" readonly>
  									</div>
  								</div>
  							</div>
  						</div>
  					</div>

  				</div>
  				<div class="card-footer">

  				</div>
  			</div>
  		</div>
  	</section>
  </div>
