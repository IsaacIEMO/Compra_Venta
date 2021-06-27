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
  				<form method="POST" action="<?= base_url();?>index.php/Store/Insert_Store">
  					<div class="card-body">
  						<div class="row">
  							<div class="col-lg-6 col-md-6 col-sm-12">
  								<div class="form-group">
  									<label for="producto">Producto</label>
  									<select name="producto" id="producto" class="form-control select2" required style="width: 100%;">
  										<option selected>Productos</option>
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
  										<option value="<?= $item->codigo_producto; ?>"><?= $item->producto; ?> <?= $prod->categoria; ?> <?= $prod->presentacion; ?></option>
  										<?php endforeach; endforeach; ?>
  									</select>
  								</div>
  							</div>
  							<div class="col-lg-6 col-md-6 col-sm-12">
  								<div class="form-group">
  									<label for="proveedor">Proveedor</label>
  									<select name="proveedord" id="proveedor" class="form-control" required>
  										<option value="0">Seleccione un proveedor</option>
  										<?php foreach($proveedores as $item): ?>
  										<option value="<?= $item->codigo_proveedor; ?>"><?= $item->nombre; ?></option>
  										<?php endforeach; ?>
  									</select>
  								</div>
  							</div>
  						</div>
  						<div class="row">
  							<div class="col-12">
  								<div class="detalles"></div>
  							</div>
							  <input type="hidden" name="categoria" value="<?= $categoria; ?>"><input type="hidden" name="presentacion" value="<?= $codigo_presentacion;?>">
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
  											<label for="factura">Comprobante de compra</label>
  											<input type="text" class="form-control text_v" value="##1" name="factura"
  												id="factura" readonly>
  										</div>
  									</div>
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
  			<div class="card card-primary card-outline">
  				<div class="card-header">
  					<h3 class="card-title">Compras</h3>
  				</div>
  				<div class="card-body">
  					<table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
  						<thead>
  							<tr>
  								<th>Producto</th>
  								<th>Categoria</th>
  								<th>Presentacion</th>
  								<th>Stock</th>
  								<th>Ganancia por compra</th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php foreach($compras as $item): ?>
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
  								<td class="text_v">Q <?= number_format($ganancia * $stock, 2, '.', ','); ?></td>
  							</tr>
 							<?php endforeach; ?>
  						</tbody>
  						<tfoot>
  							<tr>
								<th>Producto</th>
  								<th>Categoria</th>
  								<th>Presentacion</th>
  								<th>Stock</th>
								<th>Ganancia por producto</th>
  							</tr>
  						</tfoot>
  					</table>
  				</div>
  			</div>
  		</div>
  	</section>
  </div>
