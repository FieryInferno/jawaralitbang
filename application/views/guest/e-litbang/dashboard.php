<!-- Page Content -->
<div class="container">
  <h2 class="my-4" align="center">Selamat Datang di E-Litbang Kabupaten Subang</h1>
    <hr>
    <br><br><br><br><br>

    <!----------------Fade-Up Animation---------------->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <!-- Berita -->
    <div class="card mb-4" data-aos="fade-up">
    <div class="card-body" data-aos="fade-up">


    <h3 align="center" data-aos="fade-up"><a href="<?= base_url('Dashboard/beritaartikel'); ?>">Berita Terkini</a></h3>
    <div class="row" data-aos="fade-up">
      <!-- Page Content -->
      <div class="container mt-3">

        <?php 
          function tgl_indo($tanggal){
            $bulan = array (
              1 =>   'Januari',
              'Februari',
              'Maret',
              'April',
              'Mei',
              'Juni',
              'Juli',
              'Agustus',
              'September',
              'Oktober',
              'November',
              'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
          }
        foreach ($beritaartikel as $key): ?>
          <!-- Blog Post -->
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <a href="#">
                    <img class="img-fluid rounded" src="<?= base_url('assets/img/elitbang/thumbnailberita/' .$key['thumbnailberita']); ?>" alt="">
                  </a>
                </div>
                <div class="col-lg-6">
                  <h2 class="card-title"><?php echo $key['judulberita']; ?></h2>
                  <p class="card-text"><?php echo $key['headlineberita']; ?></p>
                  <a href="<?= base_url('Dashboard/beritadashboard/' .$key ['id_berita']); ?>" class="btn btn-primary">Baca Lebih Lanjut &rarr;</a>
                </div>
              </div>
            </div>
            <div class="card-footer text-muted">
            <?= tgl_indo(substr($key['tanggalberita'], 0, 10)); ?>
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>

<!-- /.row -->
<br>
<br>
<br>

<!-- Dokumentasi Kegiatan Foto -->
<div class="card mb-4" data-aos="fade-up">
  <div class="card-body">
    <h3 align="center" data-aos="fade-up"><a href="<?= base_url('Dashboard/dokumentasifoto'); ?>">Galeri Foto</a></h3>
    <br>

    <div class="container mt-3">
      <div class="row">
        <?php
          $j  = 1;
          for ($i=0; $i < count($foto); $i++) { 
            $key  = $foto[$i]; ?>
            <div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?= base_url('assets/img/elitbang/dokumentasifoto/' .$key['foto']); ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $key['judulfoto']; ?></a>
                  </h4>
                  <p class="card-text"><?php echo $key['keteranganfoto']; ?></p>
                </div>
              </div>
            </div>
          <?php }
        ?>
      </div>
    </div>
  </div>
</div>

      <!-- /.row -->
    </div>
  </div>
</div>
</div>
<!-- /.container -->