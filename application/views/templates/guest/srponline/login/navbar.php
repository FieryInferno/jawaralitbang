<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>
  <link rel="icon" type="text/css" href="<?php echo base_url('assets/img/icon/Smaller Litbang.png'); ?>">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/else/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <!-- <link href="<?php echo base_url('assets/else/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet"> -->
  <link href="<?php echo base_url('assets/else/css/modern-business.css') ?>" rel="stylesheet">

  <style type="text/css">
    nav{
  height: 100px;
  transition: all .6s;
}
  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container-fluid ml-4 mr-4">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img src="<?php echo base_url('assets/img/icon/Litbang kecil.png'); ?>"></a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Dashboard/dashboardsrponline'); ?>">Kembali</a>
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
  </nav>