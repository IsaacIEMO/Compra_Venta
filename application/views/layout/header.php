<?php
  $url = $this->uri->segment(2);
  $urls = $this->uri->segment(1)
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IEMO</title>

  <link rel="stylesheet" href="<?= base_url('assets/');?>dist/css/css.css">
  <script src="<?= base_url('assets/');?>dist/js/92273c49b9.js"></script>
  <script src="<?= base_url('assets/');?>dist/js/jquery.min.js"></script>
  <script src="<?= base_url('assets/');?>dist/js/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/');?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/');?>dist/css/style.css">

  <?php if($url === "new_products" || $url === "category" || $url === "List_user" || $urls === "Store" || $urls === "Products" || $urls === "Supplier" || $url === "Presentation" || $url === "Sales" ||  $url === "Sales_L" || $urls === "Dashboard" || $urls === "Settings"): ?>
    <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/daterangepicker/daterangepicker.css">
  <?php endif; ?>

  <?php if($url === "Sales"): ?>
    <link rel="stylesheet" href="<?= base_url('assets/');?>dist/sweetalert2/sweetalert2.css">
    <link rel="stylesheet" href="<?= base_url('assets/');?>dist/sweetalert2/sweetalert2.min.css">
  <?php endif;?>

</head>