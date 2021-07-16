<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lupa Password</title>
  <link rel="icon" type="text/css" href="<?php echo base_url('assets/img/icon/Smaller Litbang.png'); ?>">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
        <span class="login100-form-title p-b-32 text-center">
          Lupa Password
        </span>
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <form class="login100-form validate-form flex-sb flex-w" method="post" action="<?= base_url(); ?>lupa_password">
          <span class="txt1 p-b-11">
            Email
          </span>
          <div class="wrap-input100 validate-input m-b-36" data-validate = "Email harus diisi">
            <input class="input100" type="email" name="email">
            <span class="focus-input100"></span>
          </div>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
              Kirim
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/login/vendor/bootstrap/js/popper.js"></script>
  <script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
  <script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="assets/login/js/main.js"></script>

</body>
</html>