  <div class="content-wrapper">
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0">Cortes</h1>
  				</div>
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url('index.php/Dashboard');?>">Inicio</a></li>
  						<li class="breadcrumb-item active">Cortes</li>
  					</ol>
  				</div>
  			</div>
  		</div>
  	</div>

  	<section class="content">
  		<div class="container-fluid">
  			<div class="card card-primary card-outline">
  				<div class="card-header">
  					<h3 class="card-title">Corte del dia</h3>
  				</div>
  				<div class="card-body">
  					<table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
  						<thead>
  							<tr>
  								<th>Codigo</th>
  								<th>Cliente</th>
								<th>Cantidad</th>
  								<th>Producto</th>
  								<th>Total</th>
  								<th>Descuento</th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php 
							  	foreach($dia as $item): 
									$codigo_factura = $item->codigo_factura;
									$stock = $item->cantidad;

									$this->db->select('*');
									$this->db->from('factura');
									$this->db->where('codigo_factura', $codigo_factura);
									$fac = $this->db->get();
									foreach($fac->result() as $inte);
									$correlativo = $inte->correlativo;
									$cliente = $inte->cliente;


									$codigo_categoria = "fb85aee11e7190e586d2422f24a604e6";

									$this->db->select('*');
									$this->db->from('corte');
									$this->db->order_by('fecha_fin', 'desc');
									$consultas = $this->db->get();
									foreach($consultas->result() as $items);
									$ultima_fecha = $items->fecha_fin;
									$nuevafecha = strtotime ( '+1 day' , strtotime ( $ultima_fecha ) ) ;
									$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
									
									$date = date('Y-m-d');

									$this->db->select('*');
									$this->db->select_sum('subtotal', 'total');
									$this->db->select_sum('general', 'des');
									$this->db->from('detalle_factura');
									$this->db->where('codigo_categoria != ', $codigo_categoria);
									$this->db->where('fecha >= ', $nuevafecha);
									$this->db->where('fecha <= ', $date);
									$this->db->where('estado', 1);
									$consulta = $this->db->get();

									$codigo_producto = $item->codigo_producto;
									

									$this->db->select('*');
									$this->db->from('producto');
									$this->db->where('codigo_producto', $codigo_producto);
									$prod = $this->db->get();
									foreach($prod->result() as $produc);
									$producto = $produc->producto;
									
									foreach($consulta->result() as $detalle);
									if (isset($detalle->total)) {
										$total = 0;
									}else {
										$total = $detalle->total;
									}
									$descuento = $detalle->des;
									$general = 0;
									$general = $general + $total ;
							?>
  							<tr>
  								<td class="text_v"><?= $correlativo;?></td>
  								<td class="text_v"><?= $cliente;?></td>
								<td class="text_v"><?= number_format($stock, '0', '.', ',');?></td>
  								<td class="text_v"><?= $producto;?></td>
  								<td class="text_v">Q <?= number_format($item->subtotal, '2', '.', ',');?></td>
  								<td class="text_v">Q <?= number_format(($item->descuento)*$stock, '2', '.', ',');?></td>


  							</tr>
  							<?php endforeach;?>
  							<td font color="#000000">z</td>
  							<td></td>
  							<td></td>
  							<td></td>
  							<td>Total: </td>
  							<td>
  								<div class="text_v">
  									Q <?= isset($total) ? number_format($total, '2', '.', ',') : '0'; ?>
  								</div>
  							</td>
  						</tbody>
  						<tfoot>
  							<tr>
  								<th>Codigo</th>
  								<th>Cliente</th>
								<th>Cantidad</th>
  								<th>Producto</th>
  								<th>Total</th>
  								<th>Descuento</th>
  							</tr>
  						</tfoot>
  					</table>
  					<div class="text_v">
  						Q <?= isset($total) ? number_format($total, '2', '.', ',') : '0'; ?>
  					</div>

  				</div>
  				<div class="card-footer">
  					<a href="<?= base_url('index.php/Settings/Ultimo_Corte_S')?>" class="btn btn-block btn-success"
  						id="corte">Guardar Corte</a>
  				</div>
  			</div>
  		</div>
  	</section>
  </div>
