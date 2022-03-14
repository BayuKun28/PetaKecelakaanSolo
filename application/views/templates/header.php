<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url('assets/') ?>images/favicon.png" type="image" />

  <title><?= $title; ?></title>
  
  <link href="<?= base_url('assets/') ?>css/select2.min.css" rel="stylesheet" />
  <!-- Bootstrap -->
  <link href="<?= base_url('assets/'); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('assets/'); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('assets/'); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?= base_url('assets/'); ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?= base_url('assets/'); ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?= base_url('assets/'); ?>vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?= base_url('assets/'); ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?= base_url('assets/'); ?>build/css/custom.min.css" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url(); ?>/assets/leaflet/leaflet.css" />
  <script src="<?= base_url(); ?>/assets/leaflet/leaflet.js"></script>

  <link href="<?= base_url('assets/') ?>js/sweetalert/dist/sweetalert2.min.css" rel="stylesheet">

  <link href="<?= base_url('assets/') ?>datepicker/jquery.datetimepicker.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=Promise"></script>

  <style type="text/css">
    #map {
      height: 100vh;
    }

    .icon {
      display: inline-block;
      margin: 2px;
      height: 16px;
      width: 16px;
      background-color: #ccc;
    }

    .icon-bar {
      background: url('assets/js/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;
    }

    .leaflet-tooltip.no-background {
      background: transparent;
      border: 0;
      box-shadow: none;
      color: #fff;
      font-weight: bold;
      text-shadow: 1px 1px 1px #000, -1px 1px 1px #000, 1px -1px 1px #000, -1px -1px 1px #000;
    }
  </style>
</head>