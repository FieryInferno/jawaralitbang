<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pelayanan SKP Online Kabupaten Subang</title>
  <link rel="icon" type="text/css" href="<?php echo base_url('assets/img/icon/logosubangkecil.png'); ?>">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/litbang/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <!-- <link href="<?php echo base_url('assets/litbang/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet"> -->
  <link href="<?php echo base_url('assets/litbang/css/modern-business.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css') ?>">


<!--   <style type="text/css">
    nav{
  height: 100px;
  transition: all .6s;
}
  </style> -->

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container-fluid ml-4 mr-4">
      <a class="navbar-brand" href="<?php echo base_url('Dashboard/dashboardsrponline'); ?>">
        <img src="<?php echo base_url('assets/img/icon/logosubangkecil.png'); ?>"> PELAYANAN SKP ONLINE</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Dashboard/dashboardsrponline'); ?>">Beranda</a>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Dashboard/lacakpenelitian'); ?>">Lacak Penelitian</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('SKP/Guest/PermohonanSKP/index'); ?>">Permohonan SKP</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Login'); ?>">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(''); ?>">E-Litbang</a>
          </li>
        </ul>

         <script type="text/javascript">
          var scroll1 = window.pageYOffset;
          window.onscroll = function(){
            var scroll2 = window.pageYOffset;
            if(scroll1 > scroll2){
              document.querySelector('nav').style.top = "0";
            }else{
              document.querySelector('nav').style.top = "-100px"
            }
            scroll1 = scroll2
          }
          </script>
          
      </div>
    </div>
  </nav>