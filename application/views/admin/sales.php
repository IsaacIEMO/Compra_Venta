<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Ventas</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a>
						</li>
						<li class="breadcrumb-item active">Ventas</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title">Nueva Venta</h3>
						</div>
						<form action="<?= base_url('index.php/Sales/Insert_Sales');?>" method="post">
							<div class="card-body">

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label for="nombre">Cliente</label>
											<input type="text" name="nombre" id="nombre" class="form-control" autofocus required>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label for="direccion">Direccion</label>
											<input type="text" name="direccion" id="direccion" class="form-control">
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="telefono">Telefono</label>
											<input type="text" name="telefono" id="telefono" class="form-control">
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="producto">Listado de productos</label>
											<select name="producto" id="producto"
												class="form-control select2" style="width: 100%;">
												<option value="0">Productos</option>
												<?php 
                                                                 foreach($productos as $item): 
                                                                      $codigo_producto = $item->codigo_producto;
                                                                      $this->db->select('*');
                                                                      $this->db->from('inventario');
                                                                      $this->db->join('categoria', 'categoria.codigo_categoria = inventario.codigo_categoria');
                                                                      $this->db->join('presentacion', 'presentacion.codigo_presentacion = inventario.codigo_presentacion');
                                                                      $this->db->where('codigo_producto', $codigo_producto);
                                                                      $consulta = $this->db->get();
                                                                      foreach($consulta->result() as $prod):
                                                                           $categoria = $prod->codigo_categoria;
                                                                           $codigo_presentacion = $prod->codigo_presentacion;
                                                            ?>
												<option value="<?= $item->codigo_producto; ?>">
													<?= $item->producto; ?> <?= $prod->categoria; ?>
													<?= $prod->presentacion; ?></option>
												<?php endforeach; endforeach; ?>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<div class="stock_actual">
											<label for="old">Existencia Quintal</label>
											<input type="text" name="old" id="old" class="form-control text_v" readonly step="any">
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<div class="precio">
											<label for="precios">Precio Quintal</label>
											<input type="text" name="precio" id="precio" class="form-control text_v" readonly step="any">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="form-group">
											<label for="venta"></label>
                                                       <select name="venta" id="venta" class="form-control">
                                                            <option value="3">Libra / Quintal</option>
                                                            <option value="0">Quintal</option>
                                                            <option value="1">Libra</option>
                                                       </select>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="form-group">
											<label for="stock">Cantidad</label>
											<input type="number" name="stock" id="stock" class="form-control text_v" onkeyup="calcula();">
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="form-group">
											<label for="subtotal">Sub total</label>
											<input type="number" name="subtotal" id="subtotal" class="form-control text_v" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
									<div class="col-12">
										<div class="form-group">
											<label for=""></label>
											<button type="button" class="btn btn-block btn-info"
												onclick="detalles();">Agregar</button>
										</div>
									</div>
								
							</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title">Detalle de factura</h3>
						</div>
						
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										
										<table id="example2" class="table table-bordered">
											<thead>
												<tr>
													<th>Codigo</th>
													<th>Producto</th>
													<th>Cantidad</th>
													<th>Subtotal</th>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($detalles as $item): ?>
												<tr>
													<?php
                                                                      $codigo_producto = $item->codigo_producto;
                                                                      $this->db->select('*');
                                                                      $this->db->from('producto');
                                                                      $this->db->where('codigo_producto', $codigo_producto);
                                                                      $consulta = $this->db->get();
                                                                      foreach($consulta->result() as $prod);
                                                                      $codigo = $prod->codigo;
                                                                      $producto = $prod->producto;
                                                                      $codigo_presentacion = $prod->codigo_presentacion;
               
                                                                      $this->db->select('presentacion');
                                                                      $this->db->from('presentacion');
                                                                      $this->db->where(array('codigo_presentacion' => $codigo_presentacion, 'estado' => 1));
                                                                      $cons = $this->db->get();
                                                                      foreach($cons->result() as $pres);
                                                                      $presentacion = $pres->presentacion;
                                                                 ?>
													<td class="text_v"><?= $codigo; ?></td>
													<td class="text_v"><?= $producto; ?>
														<?= $presentacion; ?></td>
													<td class="text_v"><?= number_format($item->cantidad, 0, '.', ',') ?> <?= $item->tipo == 0 ? ($item->cantidad > 1 ? 'Quintales': 'Quintal') : ($item->cantidad > 1 ? 'Libras': 'Libra')?></td>
													<td class="text_v">Q
														<?=  number_format($item->subtotal, 2, '.', ','); ?>
													</td>
													<td class="text_v">
														<a href="<?= base_url('index.php/Sales/Delete_Product_Detalle')?>/<?= $item->codigo_detalle;?>" class="btn btn-danger" title="Eliminacion categoria"><i class="fas fa-trash"></i></a>
													</td>
												</tr>


												<?php endforeach; ?>
											</tbody>
											<tfoot>
												<tr>
													<th>Codigo</th>
													<th>Producto</th>
													<th>Cantidad</th>
													<th>Subtotal</th>
													<th>Acciones</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>

							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="form-group">
											<a href="<?= base_url('index.php/Sales/Delete_Detalle')?>" class="btn btn-block btn-danger text_v">Cancelar</a>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12"></div>
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="form-group">
											<button type="submit" class="btn btn-block btn-success text_v">Comprar</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
