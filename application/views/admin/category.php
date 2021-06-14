  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registro de categorias</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
              <li class="breadcrumb-item active">Registro de categotias</li>
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
            <h3 class="card-title">Registro de categoria</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
          <form action="<?= base_url('index.php/Products/Insert_category');?>" method="post">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="produto">Categoria</label>
                  <input type="text" name="category" id="category" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="produto">Descripcion de la categoria</label>
                  <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="3"></textarea>
                </div>
              </div>
            </div>

          </div><!-- /.card-body -->
          <div class="card-footer">
            <div class="form-group">
              <div class="col-12"><input type="submit" value="Guardar" class="btn btn-success form-control" id="save"></div>
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
                    <h3 class="card-title">Listado de categorias</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Categoria</th>
                                <!--th>Subcategotias vinculadas</th-->
                                <th>Productos vinculados</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach($categorias as $item): 
                              $codigo_categoria = $item->codigo_categoria;
                          ?>
                            <tr>
                                <td class="text_v"><?= $item->codigo; ?></td>
                                <td class="text_v"><?= $item->categoria; ?></td>
                                <!--td class="text_v">5</td-->
                                <td class="text_v"> </td>
                                <td class="text_v">
                                    <a href="<?= base_url('index.php/Products/Delete_Category')?>/<?= $item->codigo_categoria;?>" class="btn btn-danger" title="Eliminacion categoria"><i class="fas fa-trash"></i></a>
                                    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#CA<?= $item->codigo_categoria; ?>" title="Actualizar categoria"><i class="fas fa-sync"></i></button>
                                    <a href="" class="btn btn-success" title="Ventas de categoria"><i class="far fa-list-alt"></i></a>
                                    <!--a href="" class="btn btn-success" title="Subcategorias"><i class="fas fa-plus"></i></a-->
                                </td>
                            </tr>
                            <div class="modal fade" id="CA<?= $item->codigo_categoria; ?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Actualizacion de categoria</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="form-group col-12">
                                        <label for="categoria">Nombre de la categotria</label>
                                        <input type="text" name="categoria" id="categoria" class="form-control" placeholder="<?= $item->categoria; ?>">
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
                                <th>Codigo</th>
                                <th>Categoria</th>
                                <!--th>Subcategotias vinculadas</th-->
                                <th>Productos vinculados</th>
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