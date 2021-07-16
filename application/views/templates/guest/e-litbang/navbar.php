<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jawara Litbang | E-Litbang Kabupaten Subang</title>
  <link rel="icon" type="text/css" href="<?php echo base_url('assets/img/icon/logosubangkecil.png'); ?>">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/litbang/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <!-- <link href="<?php echo base_url('assets/else/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet"> -->
  <link href="<?php echo base_url('assets/litbang/css/modern-business.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css') ?>">

  <!-- <style type="text/css">
    nav{
  height: 100px;
  transition: all .6s;
}
  p {
    text-align: justify;
    text-justify: inter-word;
  }
  </style> -->

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

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container-fluid ml-4 mr-4">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img src="<?php echo base_url('assets/img/icon/logosubangkecil.png'); ?>"> JAWARA LITBANG</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tentang Kami
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="<?= base_url('Dashboard/Profil'); ?>">Profil</a>
              <a class="dropdown-item" href="<?= base_url('Dashboard/alamatkontak'); ?>">Alamat & Kontak</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hasil Litbang
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="<?= base_url('Dashboard/opd') ?>">Organisasi Perangkat Daerah</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Publikasi
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="<?= base_url(); ?>agenda_kegiatan">Agenda Kegiatan</a>
              <a class="dropdown-item" href="<?= base_url('berita_artikel'); ?>">Berita/Artikel</a>
              <a class="dropdown-item" href="<?= base_url('Dashboard/dokumentasifoto'); ?>">Galeri Foto</a>
              <a class="dropdown-item" href="<?= base_url(); ?>sop_litbang">SOP Litbang</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Dashboard/dashboardsrponline'); ?>">Pelayanan SKP</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>