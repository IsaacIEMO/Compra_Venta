  <div class="content-wrapper">
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">Roles</h1>
  				</div>
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
  						<li class="breadcrumb-item active">Roles</li>
  					</ol>
  				</div>
  			</div>
  		</div>
  	</div>

  	<section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de categorias</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach($users as $item): 
                          ?>
                            <tr>
                                <td class="text_v"><?= $item->nombre; ?></td>
                                <td class="text_v"><?= $item->apellido; ?></td>
                                <td class="text_v"><?= $item->usuario; ?></td>
                                <td class="text_v">
                                    <a href="<?= base_url('index.php/Users/Delete_User');?>/<?= $item->codigo_usuario; ?>" class="btn btn-danger" title="Eliminar Usuario"><i class="fas fa-trash"></i></a>
                                    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#user<?= $item->codigo_usuario; ?>" title="Actualizar categoria"><i class="fas fa-sync"></i></button>
                                    <a href="" class="btn btn-success" title="Ventas de categoria"><i class="far fa-list-alt"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="user<?= $item->codigo_usuario; ?>">
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
                                            <input type="hidden" name="user" id="user" class="form-control" value="<?= $item->codigo_usuario;?>">
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
                                <th>Codigo</th>
                                <th>Categoria</th>
                                <th>Productos vinculados</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
  </div>