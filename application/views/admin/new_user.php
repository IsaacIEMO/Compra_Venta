  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">Usuarios</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
  						<li class="breadcrumb-item active">Usuarios</li>
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
  					<h3 class="card-title">Usuarios</h3>
  				</div> <!-- /.card-body -->
  				<form method="POST" action="<?= base_url('index.php/Users/Insert_User');?>">
            <div class="card-body">
            
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" required>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="form-group">
                    <label for="roles">Roles</label>
                    <select name="roles" id="roles" class="form-control" required>
                      <option selected>Selecciones el rol</option>
                      <?php foreach($roles as $item): ?>
                        <option value="<?= $item->codigo_rol; ?>"><?= $item->rol; ?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
              </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                      <label for="nombre">Usuario</label>
                      <input type="text" name="user" id="user" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                      <label for="pass">Contraseña</label>
                      <input type="password" name="pass" id="pass" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                      <label for="password">Confirme Contraseña</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                      </div>
                    </div>
                  </div>
            
            </div><!-- /.card-body -->
            <div class="card-footer">
                  <div class="col-12">
                    <input type="submit" value="Registrar" class="form-control btn btn-success">
                  </div>
            </div>
          </form>
  			</div>
  		</div><!-- /.container-fluid -->
  	</section>
  	<!-- /.content -->
  </div>
