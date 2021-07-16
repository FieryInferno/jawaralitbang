<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pelayanan SKP Online Kabupaten Subang</title>
  <link rel="icon" type="text/css" href="<?php echo base_url('assets/img/icon/Smaller Litbang.png'); ?>">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/else/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <!-- <link href="<?php echo base_url('assets/else/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet"> -->
  <link href="<?php echo base_url('assets/else/css/modern-business.css') ?>" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container-fluid ml-4 mr-4">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img src="<?php echo base_url('assets/img/icon/Litbang kecil.png'); ?>"> PELAYANAN SKP ONLINE</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Dashboard/dashboardsrponline'); ?>">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(''); ?>">Permohonan SKP</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(''); ?>">Feedback & Saran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(''); ?>">e-Litbang</a>
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