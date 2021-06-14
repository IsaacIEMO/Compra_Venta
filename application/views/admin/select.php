  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">Inventario</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
  						<li class="breadcrumb-item active">Inventario</li>
  					</ol>
  				</div><!-- /.col -->
  			</div><!-- /.row -->
  		</div><!-- /.container-fluid -->
  	</div>
  	<!-- /.content-header -->

  	<!-- Main content -->
  	<section class="content">
  		<div class="container-fluid">
  			<div class="card card-primary card-outline">
  				<div class="card-header">
  					<h3 class="card-title">Inventario</h3>
  				</div> <!-- /.card-body -->
  				<div class="card-body">
  					<table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
  						<thead>
  							<tr>
  								<th>Codigo</th>
  								<th>Categoria</th>
  								<th>Producto</th>
  								<th>Stock</th>
  								<th>Ganancias</th>
  								<th>Acciones</th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php foreach($productos as $item): ?>
  							<tr>
  								<td class="text_v"><?= $item->codigo; ?></td>
  								<?php
									$codigo_categoria = $item->codigo_categoria;
									$codigo_producto = $item->codigo_producto;
									$this->db->select('categoria');
									$this->db->from('categoria');
									$this->db->where('codigo_categoria', $codigo_categoria);
									$consulta = $this->db->get();
									foreach($consulta->result() as $cate);
									$categoria = $cate->categoria;
								?>
  								<td class="text_v"><?= $categoria; ?></td>
  								<td class="text_v"><?= $item->producto; ?></td>
								<?php
									$this->db->select('*');
									$this->db->from('inventario');
									$this->db->where('codigo_producto', $codigo_producto);
									$query = $this->db->get();
									foreach($query->result() as $inve);
									$stock = $inve->stock;
									$codigo_presentacion = $inve->codigo_presentacion;
									$compra = $inve->precio_compra;
									$venta = $inve->precio_venta;
									$utilidad = $inve->utilidad;

									$ganancia = $stock * $utilidad;

									$this->db->select('presentacion');
									$this->db->from('presentacion');
									$this->db->where(array('codigo_presentacion' => $codigo_presentacion, 'estado' => 1));
									$cons = $this->db->get();
									foreach($cons->result() as $pres);
									$presentacion = $pres->presentacion;
								?>
  								<td class="text_v"><?= $stock; ?></td>
  								<td class="text_v"><?= $ganancia; ?></td>
  								<td class="text_v">
  									<a href="" class="btn btn-danger" title="Eliminacion categoria"><i class="fas fa-trash"></i></a>
  									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" title="Actualizar categoria"><i class="fas fa-sync"></i></button>
  									<a href="" class="btn btn-success" title="Ventas de categoria"><i class="far fa-list-alt"></i></a>
  									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#prs<?= $item->codigo_producto; ?>" title="Infomacion General"><i class="fas fa-info-circle"></i></button>
  								</td>
  							</tr>
							<div class="modal fade" id="prs<?= $item->codigo_producto; ?>">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title"><?= $item->producto; ?></h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<?php
											
										?>
										<div class="modal-body">
											<div class="row">
												<div class="col-lg-3 col-md-3 col-sm-12">
													<div class="form-group">
														<label for="producto">Producto</label>
														<input type="text" name="producto" id="producto" class="form-control text_v" disabled value="<?= $item->producto; ?>">
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12">
													<div class="form-group">
														<label for="categoria">Categoria</label>
														<input type="text" name="categoria" id="categoria" class="form-control text_v" disabled value="<?= $categoria; ?>">
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12">
													<div class="form-group">
														<label for="presentacion">Presentacion</label>
														<input type="text" name="presentacion" id="presentacion" class="form-control text_v" disabled value="<?= $presentacion; ?>">
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12">
													<div class="form-group">
														<label for="stock">Existencia</label>
														<input type="text" name="stock" id="stock" class="form-control text_v" disabled value="<?= $stock; ?>">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-3 col-md-3 col-sm-12">
													<div class="row">
														<div class="col-12">
															<div class="form-group">
																<label for="compra">Precio Compra</label>
																<input type="text" name="compra" id="compra" class="form-control text_v" disabled value="<?= $compra;?>">
															</div>
														</div>
														<div class="col-12">
															<div class="form-group">
																<label for="venta">Precio Venta</label>
																<input type="text" name="venta" id="venta" class="form-control text_v" disabled value="<?= $venta;?>">
															</div>
														</div>
														<div class="col-12">
															<div class="form-group">
																<label for="utilidad">Utilidad</label>
																<input type="text" name="utilidad" id="utilidad" class="form-control text_v" disabled value="<?= $utilidad;?>">
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<div class="form-group">
														<label for="descripcion">Descripcion</label>
														<textarea name="descriociin" id="descripcion" class="form-control text_e" cols="30" rows="8" disabled><?= $item->detalles;?></textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer justify-content-between">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
										</div>
									</div>
								</div>
							</div>
  							<?php endforeach; ?>
  						</tbody>
  						<tfoot>
  							<tr>
  								<th>Codigo</th>
  								<th>Categoria</th>
  								<th>Productos</th>
  								<th>Stock</th>
								  <th>Ganancias</th>
  								<th>Acciones</th>
  							</tr>
  						</tfoot>
  					</table>
  				</div><!-- /.card-body -->
  			</div>
  		</div><!-- /.container-fluid -->
  	</section>
  	<!-- /.content -->
  </div>
