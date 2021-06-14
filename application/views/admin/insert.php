  <div class="content-wrapper">
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">Registro de productos</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
  						<li class="breadcrumb-item active">Registro de productos</li>
  					</ol>
  				</div><!-- /.col -->
  			</div><!-- /.row -->
  		</div><!-- /.container-fluid -->
  	</div>

  	<section class="content">
  		<div class="container-fluid">
  			<div class="card card-primary card-outline">
  				<div class="card-header">
  					<h3 class="card-title">Registro de Productos</h3>
  				</div> <!-- /.card-body -->
  				<form action="<?= base_url('index.php/Products/Insert_Products');?>" method="post">
  					<div class="card-body">

  						<div class="row">
  							<div class="col-lg-3 col-md-3 col-sm-12 form-group">
  								<label for="producto">Nombre del producto</label>
  								<input type="text" name="producto" id="producto" class="form-control">
  							</div>
  							<div class="col-lg-3 col-md-3 col-sm-12">
  								<div class="form-group">
  									<label for="categoria">Categoria</label>
  									<select name="categoria" id="categoria" class="form-control select2"
  										style="width: 100%;">
  										<option selected>Seleccionar una categoria</option>
  										<?php foreach($categorias as $item): ?>
  										<option value="<?= $item->codigo_categoria; ?>"><?= $item->categoria; ?>
  										</option>
  										<?php endforeach; ?>
  									</select>
  								</div>
  							</div>
  							<div class="col-lg-3 col-md-3 col-sm-12 form-group">
  								<label for="presentacion">Presentacion</label>
  								<select name="presentacion" id="presentacion" class="form-control select2"
  									style="width: 100%;">
  									<option selected>Seleccionar una presentacion</option>
  									<?php foreach($presentacion as $item): ?>
  									<option value="<?= $item->codigo_presentacion; ?>"><?= $item->presentacion; ?>
  									</option>
  									<?php endforeach; ?>
  								</select>
  							</div>

  							<div class="col-lg-3 col-md-3 col-sm-12 form-group">
  								<label for="stock">Exitencia</label>
  								<input type="number" name="stock" id="stock" class="form-control">
  							</div>
  						</div>

  						<div class="row">
  							<div class="col-lg-4 col-md-4 col-sm-12 form-group">
  								<label for="compra">Precio Compra</label>
  								<input type="number" name="compra" id="compra" class="form-control" step="any">
  							</div>
  							<div class="col-lg-4 col-md-4 col-sm-12 form-group">
  								<label for="venta">Precio Venta</label>
  								<input type="number" name="venta" id="venta" class="form-control" step="any">
  							</div>
  							<div class="col-lg-4 col-md-4 col-sm-12 form-group">
  								<label for="utilidad">Utilidad</label>
  								<input type="number" name="utilidad" id="utilidad" class="form-control" readonly
  									value="0">
  							</div>
  						</div>
  						<div class="row">
  							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
  								<label for="descripcion">Descripcion</label>
  								<textarea name="descripcion" id="descriocion" cols="30" rows="2"
  									class="form-control"></textarea>
  							</div>
  						</div>

  					</div><!-- /.card-body -->
  					<div class="card-footer">
  						<div class="form-group">
  							<div class="col-12">
  								<input type="submit" value="Guardar" class="btn btn-success form-control" id="save">
  							</div>
  						</div>
  					</div>
  				</form>
  			</div>
  		</div><!-- /.container-fluid -->
  	</section>
  </div>
