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
			<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">Nueva Venta</h3>
				</div>
				<form action="<?= base_url('index.php/Sales/Ajax');?>" method="post">
					<div class="card-body">
                         
                              <div class="row">
                                   <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                             <label for="nombre">Cliente</label>
                                             <input type="text" name="nombre" id="nombre" class="form-control" autofocus>
                                        </div>
                                   </div>
                                   <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                             <label for="direccion">Direccion</label>
                                             <input type="text" name="direccion" id="direccion" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                             <label for="telefono">Telefono</label>
                                             <input type="text" name="telefono" id="telefono" class="form-control">
                                        </div>
                                   </div>
                              </div>

                              <div class="row">
                                   <div class="col-lg-6 col-md-6 col-sm-12" >
                                        <div class="form-group">
                                             <label for="producto">Listado de productos</label>
                                             <select name="producto" id="producto" class="form-control select2" style="width: 100%;">
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
                                                  <option value="<?= $item->codigo_producto; ?>"><?= $item->producto; ?> <?= $prod->categoria; ?> <?= $prod->presentacion; ?></option>
                                                  <?php endforeach; endforeach; ?>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="stock_actual">
                                             <label for="old">Existencia</label>
                                             <input type="text" name="old" id="old" class="form-control text_v" readonly step="any">
                                        </div>
                                   </div>
                                   <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="precio">
                                             <label for="precio">Precio</label>
                                             <input type="text" name="precio" id="precio" class="form-control text_v" readonly step="any">
                                        </div>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="form-group">
                                             <label for="stock">Cantidad</label>
                                             <input type="number" name="stock" id="stock" class="form-control text_v" onkeyup="calcula();">
                                        </div>
                                   </div>
                                   <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="form-group">
                                             <label for="subtotal">Sub total</label>
                                             <input type="number" name="subtotal" id="subtotal" class="form-control text_v" readonly>
                                        </div>
                                   </div>
                                   <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                             <label for=""></label>
                                             <button type="button" class="btn btn-block btn-info" onclick="detalles();">Agregar</button>
                                        </div>
                                   </div>
                              </div>

                              <div class="row">
                                   <div class="detalle"></div>
                              </div>

					</div>
					<div class="card-footer">
						<div class="form-group">
							<div class="col-12">

							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
