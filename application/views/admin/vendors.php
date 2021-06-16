  <div class="content-wrapper">

  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">Proveedores</h1>
  				</div>
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
  						<li class="breadcrumb-item active">Proveedores</li>
  					</ol>
  				</div>
  			</div>
  		</div>
  	</div>

  	<section class="content">
  		<div class="container-fluid">
  			<div class="card card-primary card-outline">
  				<div class="card-header">
  					<h3 class="card-title">Proveedores</h3>
  				</div>
  				<form method="post" action="<?= base_url('index.php/Supplier/Insert_Supplier');?>">
  					<div class="card-body">
  						<div class="row">
  							<div class="col-lg-6 col-md-6 col-sm-6">
  								<div class="form-group">
  									<label for="nombre">Nombre del Proveedor</label>
  									<input type="text" name="nombre" id="nombre" class="form-control">
  								</div>
  							</div>
  							<div class="col-lg-6 col-md-6 col-sm-6">
  								<div class="form-group">
  									<label for="telefono">Telefono del Proveedor</label>
  									<input type="text" name="telefono" id="telefono" class="form-control">
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="card-footer">
  						<div class="form-group">
  							<div class="col-12">
  								<input type="submit" value="Guardar" class="btn btn-success form-control" id="save">
  							</div>
  						</div>
  					</div>
  				</form>
  			</div>
  		</div>
  	</section>


  	<section class="content">
  		<div class="container-fluid">
  			<div class="card">
  				<div class="card-header">
  					<h3 class="card-title">Listado de categorias</h3>
  				</div>
  				<div class="card-body">
  					<table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
  						<thead>
  							<tr>
  								<th>Nombre</th>
  								<th>Telefono</th>
  								<th>Acciones</th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php 
                  foreach($proveedor as $item): 
                ?>
  							<tr>
  								<td class="text_v"><?= $item->nombre; ?></td>
  								<td class="text_v"><?= $item->telefono; ?></td>
  								<td class="text_v">
  									<a href="<?= base_url('index.php/Supplier/Delete_Supplier');?>/<?= $item->codigo_proveedor; ?>" class="btn btn-danger" title="Eliminar proveedor"><i class="fas fa-trash"></i></a>
  									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user<?= $item->codigo_proveedor; ?>" title="Actualizar categoria"><i class="fas fa-sync"></i></button>
  									<a href="" class="btn btn-success" title="Ventas de categoria"><i class="far fa-list-alt"></i></a>
  								</td>
  							</tr>
  							<div class="modal fade" id="user<?= $item->codigo_proveedor; ?>">
  								<div class="modal-dialog modal-lg">
  									<div class="modal-content">
  										<div class="modal-header">
  											<h4 class="modal-title">Actualizacion de contraseña</h4>
  											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  												<span aria-hidden="true">&times;</span>
  											</button>
  										</div>
  										<form action="" method="post">
  											<div class="modal-body">
  												<div class="row">
  													<div class="col-lg-6 col-md-6 col-sm-12">
  														<div class="form-group">
  															<label for="pass">Nueva contraseña</label>
  															<input type="password" name="pass" id="pass" class="form-control">
  															<input type="hidden" name="user" id="user" class="form-control"
  																value="<?= $item->codigo_proveedor;?>">
  														</div>
  													</div>
  													<div class="col-lg-6 col-md-6 col-sm-12">
  														<div class="form-group">
  															<label for="password">Repita nueva contraseña</label>
  															<input type="password" name="password" id="password" class="form-control">
  														</div>
  													</div>
  												</div>
  											</div>
  											<div class="modal-footer justify-content-between">
  												<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
  												<button type="button" class="btn btn-primary">Cambiar contraseña</button>
  											</div>
  										</form>
  									</div>
  								</div>
  							</div>
  							<?php endforeach; ?>
  						</tbody>
  						<tfoot>
  							<tr>
  								<th>Nombre</th>
  								<th>Telefono</th>
  								<th>Acciones</th>
  							</tr>
  						</tfoot>
  					</table>
  				</div>
  			</div>
  		</div>
  	</section>

  </div>
