  <div class="content-wrapper">
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">Cortes del dia - Atrasado</h1>
  				</div>
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
  						<li class="breadcrumb-item active">Cortes del dia - Atrasado</li>
  					</ol>
  				</div>
  			</div>
  		</div>
  	</div>

  	<section class="content">
  		<div class="container-fluid">
  			<div class="card card-primary card-outline">
  				<div class="card-header">
  					<h3 class="card-title">Cortes del dia - Atrasado</h3>
  				</div>
  				<div class="card-body">
  					<div class="row">
  						<div class="col-lg-8 col-md-12 col-sm-12">
  							<div class="form-group">
  								<label>Fecha de cortes: </label>
  								<div class="input-group">
  									<div class="input-group-prepend">
  										<span class="input-group-text">
  											<i class="far fa-calendar-alt"></i>
  										</span>
  									</div>
  									<input type="text" class="form-control text_v" id="reservation">
  								</div>
  							</div>
  						</div>
  						
  						<div class="col-lg-4 col-md-12 col-sm-12">
  							<label for="corte">Tipo de corte de dia atrasado</label>
  							<select name="corte" id="corte" class="form-control">
  								<option selected disabled>Seleccionar</option>
  								<option value="0">General</option>
  								<option value="1">Ventas sin gaseosas</option>
  								<option value="2">Ventas solo gaseosas</option>
  							</select>
  						</div>
  					</div>
  					<div class="detalles"></div>
  				</div>
  				<div class="card-footer">

  				</div>
  			</div>
  		</div>
  	</section>
  </div>
