  <div class="content-wrapper">
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">Registro de productos</h1>
  				</div>
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
  						<li class="breadcrumb-item active">Registro de productos</li>
  					</ol>
  				</div>
  			</div>
  		</div>
  	</div>

  	<section class="content">
  		<div class="container-fluid">
  			<div class="card card-primary card-outline">
  				<div class="card-header">
  					<h3 class="card-title">Registro de Productos</h3>
  				</div>
  				<form action="<?= base_url('index.php/Products/Insert_Products');?>" method="post">
  					<div class="card-body">

  						<div class="row">
  							<div class="col-lg-3 col-md-3 col-sm-12">
  								<div class="form-group">
  									<label for="producto">Nombre del producto</label>
  									<input type="text" name="producto" id="producto" class="form-control" required autofocus onkeyup="mayus(this);">
  								</div>
  							</div>
  							<div class="col-lg-3 col-md-3 col-sm-12">
  								<div class="form-group">
  									<label for="categoria">Categoria</label>
  									<select name="categoria" id="categoria" class="form-control select2" style="width: 100%;" required>
  										<option selected>Seleccionar una categoria</option>
  										<?php foreach($categorias as $item): ?>
  										<option value="<?= $item->codigo_categoria; ?>"><?= $item->categoria; ?>
  										</option>
  										<?php endforeach; ?>
  									</select>
  								</div>
  							</div>
  							<div class="col-lg-3 col-md-3 col-sm-12">
  								<div class="form-group">
  									<label for="presentacion">Presentacion</label>
  									<select name="presentacion" id="presentacion" class="form-control select2" style="width: 100%;" required>
  										<option selected>Seleccionar una presentacion</option>
  										<?php foreach($presentacion as $item): ?>
  										<option value="<?= $item->codigo_presentacion; ?>"><?= $item->presentacion; ?>
  										</option>
  										<?php endforeach; ?>
  									</select>
  								</div>
  							</div>

  							<div class="col-lg-2 col-md-2 col-sm-10">
  								<div class="form-group">
  									<label for="stock">Exitencia</label>
  									<input type="number" name="stock" id="stock" class="form-control text_v" required>
  								</div>
  							</div>
							  <style>
							input[type=checkbox]{
								/* Double-sized Checkboxes */
								-ms-transform: scale(0.6); /* IE */
								-moz-transform: scale(0.6); /* FF */
								-webkit-transform: scale(0.6); /* Safari and Chrome */
								-o-transform: scale(0.6); /* Opera */
								transform: scale(0.6);
							}
						</style>
							<div class="col-lg-1 col-md-1 col-sm-2">
								<div class="form-group">
									<label for="check">En libras</label>
									<input type="checkbox" name="librass" id="librass" class="form-control" checked value="1">
								</div>
							</div>
  						</div>
						<script type="text/javascript">
							$(document).ready(function(){
								$('#librass').on('change',function(){
									if (this.checked) {
										document.getElementById('ventas').style.display = 'none';
										document.getElementById('venta').style.display = 'none';
										$("#libras").show();
										$("#libra").show();
									} else {
										document.getElementById('venta').style.display = 'block';
										document.getElementById('ventas').style.display = 'block';
										$("#libras").hide();
										$("#libra").hide();
									}  
								})
							});
						</script>
						
  						<div class="row">
  							<div class="col-lg-3 col-md-3 col-sm-12">
  								<div class="form-group">
  									<label for="compra">Precio Compra</label>
  									<input type="number" name="compra" id="compra" class="form-control text_v" step="any" required>
  								</div>
  							</div>
  							<div class="col-lg-3 col-md-3 col-sm-12">
  								<div class="form-group">
  									<label id="ventas" for="ventas" style="display: none;">Precio Venta</label>
  									<label id="libras" for="libras">Precio en Libras</label>
  									<input type="number" name="venta" id="venta" class="form-control text_v" step="any" onkeyup="calcular();" style="display: none;">
  									<input type="number" name="libra" id="libra" class="form-control text_v" step="any" onkeyup="calc();">
  								</div>
  							</div>
  							<div class="col-lg-3 col-md-3 col-sm-12">
  								<div class="form-group">
  									<label for="utilidad">Utilidad por lote</label>
  									<input type="number" name="utilidad" id="utilidad" class="form-control text_v" readonly value="0">
  								</div>
  							</div>
  							<div class="col-lg-3 col-md-3 col-sm-12">
  								<div class="form-group">
  									<label>Fecha de vencimiento:</label>
  									<div class="input-group date" id="reservationdate" data-target-input="nearest">
  										<input type="text" class="form-control datetimepicker-input" id="reservationdate" name="reservationdate" data-target="#reservationdate" />
  										<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
  											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
  										</div>
  									</div>
  								</div>
  							</div>
  						</div>
  						<div class="row">
  							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
  								<label for="descripcion">Descripcion</label>
  								<textarea name="descripcion" id="descriocion" cols="30" rows="2" class="form-control"></textarea>
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
