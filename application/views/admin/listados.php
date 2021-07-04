<div class="content-wrapper">
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">Lista de Ventas</h1>
  				</div>
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
  						<li class="breadcrumb-item active">Lista de Ventas</li>
  					</ol>
  				</div>
  			</div>
  		</div>
  	</div>

  	<section class="content">
  		<div class="container-fluid">
  			<div class="card card-primary card-outline">
  				<div class="card-header">
  					<h3 class="card-title">Lista de Ventas</h3>
  				</div>
  				<div class="card-body">
  					<table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
  						<thead>
  							<tr>
  								<th>Codigo</th>
  								<th>Cliente</th>
  								<th>Total</th>
  								<th>Fecha de compra</th>
  								<th></th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php 
							  	foreach($factura as $item): 
									
							?>
  							<tr>
  								<td class="text_v"><?= $item->correlativo; ?></td>
  								<td class="text_v"><?= $item->cliente; ?></td>
  								<td class="text_v">Q <?= number_format($item->total, 2, '.', ','); ?></td>
  								<td class="text_v"> <?= date("d/m/Y", strtotime($item->fecha));?> </td>
                                <input type="hidden" name="codigo_factura<?= $item->codigo_factura; ?>" id="codigo_factura" value="<?= $item->codigo_factura; ?>">
  								<td class="text_v">
  									<a href="<?= base_url('index.php/Sales/Printer/');?><?= $item->codigo_factura; ?>" class="btn btn-secondary" title="Imprimir comprobante"><i class="fas fa-print"></i></a>
  									<a href="<?= base_url('index.php/Sales/Delete_Sales')?>/<?= $item->codigo_factura; ?>" class="btn btn-danger" title="Eliminacion categoria"><i class="fas fa-trash"></i></a>
  									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#prs" title="Infomacion General"><i class="fas fa-info-circle"></i></button>
  								</td>
  							</tr>

							  <!-- datos generales -->
								<div class="modal fade" id="prs">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title"></h4>
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
															<input type="text" name="producto" id="producto" class="form-control text_v" disabled value="">
														</div>
													</div>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="form-group">
															<label for="categoria">Categoria</label>
															<input type="text" name="categoria" id="categoria" class="form-control text_v" disabled value="">
														</div>
													</div>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="form-group">
															<label for="presentacion">Presentacion</label>
															<input type="text" name="presentacion" id="presentacion" class="form-control text_v" disabled value="">
														</div>
													</div>
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="form-group">
															<label for="stock">Existencia</label>
															<input type="text" name="stock" id="stock" class="form-control text_v" disabled value="">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-12">
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label for="compra">Precio Compra</label>
																	<input type="text" name="compra" id="compra" class="form-control text_v" disabled value="Q ">
																</div>
															</div>
															<div class="col-12">
																<div class="form-group">
																	<label for="venta">Precio Venta</label>
																	<input type="text" name="venta" id="venta" class="form-control text_v" disabled value="Q ">
																</div>
															</div>
															<div class="col-12">
																<div class="form-group">
																	<label for="utilidad">Utilidad</label>
																	<input type="text" name="utilidad" id="utilidad" class="form-control text_v" disabled value="Q ">
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<div class="form-group">
															<label for="descripcion">Descripcion</label>
															<textarea name="descriociin" id="descripcion" class="form-control text_e" cols="30" rows="8" disabled></textarea>
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
  							<?php endforeach; ?>
  						</tbody>
  						<tfoot>
  							<tr>
                                <th>Codigo</th>
  								<th>Cliente</th>
  								<th>Total</th>
  								<th>Fecha de compra</th>
  								<th></th>
  							</tr>
  						</tfoot>
  					</table>
  				</div>
  			</div>
  		</div>
  	</section>
  </div>