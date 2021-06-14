<?php
  $url = $this->uri->segment(2);
  $urls = $this->uri->segment(1);
?>
  <aside class="control-sidebar control-sidebar-dark"></aside>

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
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


<?php if($url === "new_products" || $url === "category" || $url === "List_user" || $urls === "Store" || $urls === "Products"): ?>

  <script src="<?= base_url('assets/');?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/');?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/');?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets/');?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/');?>plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url('assets/');?>plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url('assets/');?>plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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



<script src="<?= base_url('assets/');?>plugins/select2/js/select2.full.min.js"></script>

<script>
  $(function () {
    $('.select2').select2()
  })
</script>

<?php endif; ?>

</body>
</html>
