  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Presentacion</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
              <li class="breadcrumb-item active">Presentacion</li>
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
            <h3 class="card-title">Presentacion</h3>
          </div> <!-- /.card-body -->
          <form action="<?= base_url('index.php/Settings/Insert_Presentation');?>" method="post">
          <div class="card-body">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                  <label for="presentacion">Presentacion</label>
                  <input type="text" name="presentacion" id="presentacion" class="form-control" required placeholder="LIBRAS" onkeypress="mayus(this);">
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                  <label for="libras">Libras</label>
                  <input type="number" name="libras" id="libras" class="form-control">
              </div>
          </div>
          <div class="row">
              <div class="col-12 form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea name="descripcion" id="descripcion" cols="30" rows="4" class="form-control"></textarea>
              </div>
          </div>
          </div><!-- /.card-body -->
          <div class="card-footer">
            <div class="col-12">
                <input type="submit" value="Guardar" class="btn btn-success form-control">
            </div>
          </div>
          </form>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de presentaciones</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Presentacion</th>
                                <th>Libras</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach($presentacion as $item): 
                              $codigo_presentacion = $item->codigo_presentacion;
                          ?>
                            <tr>
                                <td class="text_v"><?= $item->presentacion; ?></td>
                                <td class="text_v"><?= $item->libras; ?></td>
                                <td class="text_v">
                                    <a href="<?= base_url('index.php/Settings/Delete_Presentation');?>/<?= $item->codigo_presentacion;?>" class="btn btn-danger" title="Eliminacion categoria"><i class="fas fa-trash"></i></a>
                                    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#CA<?= $item->codigo_presentacion; ?>" title="Actualizar categoria"><i class="fas fa-sync"></i></button>
                                    <a href="" class="btn btn-success" title="Ventas de categoria"><i class="far fa-list-alt"></i></a>
                                    <!--a href="" class="btn btn-success" title="Subcategorias"><i class="fas fa-plus"></i></a-->
                                </td>
                            </tr>
                            <div class="modal fade" id="CA<?= $item->codigo_presentacion; ?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Actualizacion de presentacion</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label for="presentacion">Nombre de la presentacion</label>
                                        <input type="text" name="presentacion" id="presentacion" class="form-control" placeholder="<?= $item->presentacion; ?>">
                                      </div>
                                      <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label for="libras">Libras</label>
                                        <input type="text" name="libras" id="libras" class="form-control" placeholder="<?= $item->libras; ?>">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="form-group col-12">
                                        <label for="description">Descripcion</label>
                                        <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="<?= $item->descripcion; ?>"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                          <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Presentacion</th>
                                <th>Libras</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
  </div>