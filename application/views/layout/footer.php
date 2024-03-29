<?php
  $url = $this->uri->segment(2);
  $urls = $this->uri->segment(1);
?>
<aside class="control-sidebar control-sidebar-dark"></aside>

<footer class="main-footer">
	<strong>Copyright &copy; 2021 <a href="http://chapinesgo.com/" target="_blank">Chapinesgo</a>.</strong> Todos los derechos reservados. <div class="float-right d-none d-sm-inline-block"> <b>Version</b> 3.1.0 </div>
</footer>
</div>



<script src="<?= base_url('assets/');?>dist/js/function.js"></script>
<script src="<?= base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url('assets/');?>dist/js/adminlte.js"></script>

<script src="<?= base_url('assets/');?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url('assets/');?>plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/chart.js/Chart.min.js"></script>

<script src="<?= base_url('assets/');?>dist/js/demo.js"></script>


<?php if($url === "new_products" || $url === "category" || $url === "List_user" || $urls === "Store" || $urls === "Products" || $urls === "Supplier" || $url === "Presentation" || $url === "Sales" || $url === "Sales_L" || $urls === "Dashboard" || $urls === "Settings"): ?>

<script src="<?= base_url('assets/');?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/pdfmake/vfs_fonts.js"></script>

<script src="<?= base_url('assets/');?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script src="<?= base_url('assets/');?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/');?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
	$(function () {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});

</script>

<script>
	$(function () {
		$('.select2').select2()

		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})

		$('#reservationdate').datetimepicker({
			format: 'L'
		});

		$('#reservation').daterangepicker();

		$('#timepicker').datetimepicker({
			format: 'LT'
		})
	})

</script>


<script src="<?= base_url('assets/');?>plugins/select2/js/select2.full.min.js"></script>

<script>
	$(function () {
		$('.select2').select2()
	})

</script>

<?php 
	endif; 
	if($urls === "Store"):
?>
	<script src="<?= base_url('assets/');?>dist/js/ajax_producto.js"></script>
<?php 
	endif; 
	if($urls === "Sales"):
?>
	<script src="<?= base_url('assets/');?>dist/js/productos.js"></script>
	<script src="<?= base_url('assets/');?>dist/js/precios.js"></script>
	<script src="<?= base_url('assets/');?>dist/js/detalle_factura.js"></script>
	<script src="<?= base_url('assets/');?>dist/sweetalert2/sweetalert2.all.js"></script>
	<script src="<?= base_url('assets/');?>dist/sweetalert2/sweetalert2.all.min.js"></script>
	<script src="<?= base_url('assets/');?>dist/sweetalert2/sweetalert2.js"></script>
	<script src="<?= base_url('assets/');?>dist/sweetalert2/sweetalert2.min.js"></script>
<?php endif; 
	if($urls === "Settings"):
?>
	<script src="<?= base_url('assets/');?>dist/js/cortes.js"></script>
<?php endif; ?>

</body>

</html>
