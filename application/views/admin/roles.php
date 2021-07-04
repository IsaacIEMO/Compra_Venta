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
  					<table id="example2" class="table table-bordered table-striped dataTable dtr-inline">
  						<thead>
  							<tr>
  								<th>Codigo</th>
  								<th>Cliente</th>
  								<th>Total</th>
  								<th>Fecha de compra</th>
  								<th></th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php 
							  	foreach($dia as $item): 
									$codigo_factura = $item->codigo_factura;

									$this->db->select('*');
									$this->db->select_sum('subtotal', 'total');
									$this->db->select_sum('descuento', 'des');
									$this->db->from('detalle_factura');
									$this->db->where('codigo_factura', $codigo_factura);
									$consulta = $this->db->get();
									foreach($consulta->result() as $detalle);
									$total = $detalle->total;
									
							?>
								<tr>
									<td class="text_v"><?= $item->correlativo;?></td>
									<td class="text_v"><?= $item->cliente;?></td>
									<td class="text_v">Q <?= number_format($total, '2', '.', ',');?></td>
									
								</tr>
  							<?php endforeach;?>
  						</tbody>
  						<tfoot>
  							<tr>
  								<th>Codigo</th>
  								<th>Cliente</th>
  								<th>Total</th>
  								<th>Fecha de compra</th>
  								<th></th>
  							</tr>
  						</tfoot>
  					</table>

  				</div>
  				<div class="card-footer">

  				</div>
  			</div>
  		</div>
  	</section>
  </div>
