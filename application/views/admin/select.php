  <div class="content-wrapper">
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">Inventario</h1>
  				</div>
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
  						<li class="breadcrumb-item active">Inventario</li>
  					</ol>
  				</div>
  			</div>
  		</div>
  	</div>

  	<section class="content">
  		<div class="container-fluid">
  			<div class="card card-primary card-outline">
  				<div class="card-header">
  					<h3 class="card-title">Inventario</h3>
  				</div>
  				<div class="card-body">
  					<table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
  						<thead>
  							<tr>
  								<th>Codigo</th>
  								<th>Categoria</th>
  								<th>Producto</th>
  								<th>Presentacion</th>
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
									$libras = $inve->libras;
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

  								<td class="text_v"><?= $presentacion; ?></td>
  								<td class="text_v"><?= $stock; ?> <?= $libras > 0 ? " -- ".number_format($libras, -2, '.', ',').' lbs' : ''?></td>
  								<td class="text_v">Q <?= number_format($ganancia, 2, '.', ','); ?></td>
  								<td class="text_v">
  									<a href="<?= base_url('index.php/Products/Delete_Product')?>/<?= $item->codigo_producto;?>" class="btn btn-danger" title="Eliminacion categoria"><i class="fas fa-trash"></i></a>
  									<a href="" class="btn btn-success" title="Ventas de categoria"><i class="far fa-list-alt"></i></a>
  									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#prs<?= $item->codigo_producto; ?>" title="Infomacion General"><i class="fas fa-info-circle"></i></button>
  									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#up<?= $item->codigo_producto; ?>" title="Actualizar Existencia"><i class="fas fa-sync-alt"></i></button>
  									<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#cash<?= $item->codigo_producto; ?>" title="Actualizar Precios"><i class="fas fa-money-bill-wave"></i></button>
  								</td>
  							</tr>

							  <!-- datos generales -->
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
																	<input type="text" name="compra" id="compra" class="form-control text_v" disabled value="Q <?= $compra;?>">
																</div>
															</div>
															<div class="col-12">
																<div class="form-group">
																	<label for="venta">Precio Venta</label>
																	<input type="text" name="venta" id="venta" class="form-control text_v" disabled value="Q <?= $venta;?>">
																</div>
															</div>
															<div class="col-12">
																<div class="form-group">
																	<label for="utilidad">Utilidad</label>
																	<input type="text" name="utilidad" id="utilidad" class="form-control text_v" disabled value="Q <?= $utilidad;?>">
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
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12">
														<u class="text_v">
															<i>*Nota: Los precios que se muestran en esta ventana son por unidad, la ganancia del lote esta en la tabla pricipal.</i>
														</u>
													</div>
												</div>
											</div>
											<div class="modal-footer justify-content-between">
												<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
											</div>
										</div>
									</div>
								</div>
							  <!-- datos generales -->

							  <!-- actualizar stock -->
								<div class="modal fade" id="up<?= $item->codigo_producto; ?>">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title"><?= $item->producto; ?></h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form action="<?= base_url('index.php/Products/Update_Stock');?>" method="POST">
												<div class="modal-body">
													<div class="row">
														<div class="col-lg-6 col-md-6 col-sm-12">
															<div class="form-group">
																<label for="old">Existencia Actual</label>
																<input type="text" name="old" id="old" class="form-control text_v" disabled value="<?= $stock; ?>">
																<input type="hidden" name="codigo_producto" value="<?= $codigo_producto;?>">
																<input type="hidden" name="utilidad" value="<?= $utilidad;?>">
															</div>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12">
															<div class="form-group">
																<label for="new">Nueva Existencia</label>
																<input type="number" name="new" id="new" class="form-control text_v">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12">
															<u class="text_v">
																<i class="text_v">*Nota: Al momento de actualizar no se suman la existencia, se cambia el total.</i>
															</u>
														</div>
													</div>
												</div>
												<div class="modal-footer justify-content-between">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
													<button type="submit" class="btn btn-primary">Actualizar existencia</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							  <!-- actualizar stock -->

							  <!-- actualizar stock -->
								<div class="modal fade" id="cash<?= $item->codigo_producto; ?>">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title"><?= $item->producto; ?></h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form action="<?= base_url('index.php/Products/Update_Cash');?>" method="POST">
												<div class="modal-body">
													<div class="row">
														<div class="col-lg-6 col-md-6 col-sm-6">
															<div class="form-group">
																<label for="old">Precio Compra Actual</label>
																<input type="text" name="old_c" id="old_c" class="form-control text_v" disabled value="<?= $compra; ?>">
																<input type="hidden" name="codigo_producto" value="<?= $codigo_producto;?>">
																<input type="hidden" name="stock" value="<?= $stock;?>">
															</div>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-6">
															<div class="form-group">
																<label for="new">Precio Compra Nuevo</label>
																<input type="number" name="new_c" id="new_c" class="form-control text_v">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-6 col-md-6 col-sm-6">
															<div class="form-group">
																<label for="old">Precio Venta Actual</label>
																<input type="text" name="old_v" id="old_v" class="form-control text_v" disabled value="<?= $venta; ?>">
															</div>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-6">
															<div class="form-group">
																<label for="new">Precio Venta Nuevo</label>
																<input type="number" name="new_v" id="new_v" class="form-control text_v">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12">
															<u class="text_v">
																<i class="text_v">*Nota: Al momento de actualizar se cambia el precio general, sin incluir lo vendido antes del cambio.</i>
															</u>
														</div>
													</div>
												</div>
												<div class="modal-footer justify-content-between">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
													<button type="submit" class="btn btn-primary">Actualizar existencia</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							  <!-- actualizar stock -->
  							<?php endforeach; ?>
  						</tbody>
  						<tfoot>
  							<tr>
  								<th>Codigo</th>
  								<th>Categoria</th>
  								<th>Productos</th>
								<th>Presentacion</th>
  								<th>Stock</th>
								<th>Ganancias</th>
  								<th>Acciones</th>
  							</tr>
  						</tfoot>
  					</table>
  				</div>
  			</div>
  		</div>
  	</section>
  </div>