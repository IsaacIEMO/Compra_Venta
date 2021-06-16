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
  				<form method="POST" action="<?= base_url('assets/');?>Store/Insert_Store">
  					<div class="card-body">
  						<div class="row">
  							<div class="col-lg-6 col-md-6 col-sm-12" style="width: 100%;">
  								<div class="form-group">
  									<label for="producto">Producto</label>
  									<select name="producto" id="producto" class="form-control select2" required>
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
  </div>
