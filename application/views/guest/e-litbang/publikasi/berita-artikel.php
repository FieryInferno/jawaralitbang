<head>
  <style>
    p {
      text-align: justify;
      text-justify: inter-word;
    }
  </style>
</head>

<!-- Page Content -->
<div class="container mt-5 my-4">
  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">Berita & Artikel</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<? base_url(''); ?>">Beranda</a>
    </li>
    <li class="breadcrumb-item active">Publikasi</li>
    <li class="breadcrumb-item active">Berita & Artikel</li>
  </ol>

  <div class="card mb-4">
    <div class="card-body">
      <form action="<?= base_url(); ?>berita_artikel" method="get">
        <div class="row">
          <div class="col-10">
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" id="inputPassword2" placeholder="Cari" name="judul">
            </div>
          </div>
          <div class="col-2">
            <button type="submit" class="btn btn-primary mb-2">Cari</button>
          </div>
        </div>
      </form>
    </div>
    <div class="card-footer text-muted">
    </div>
  </div>  
  <!-- Blog Post -->
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

    foreach ($beritaartikel as $key) { ?>
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <a href="#">
                <img class="img-fluid rounded" src="<?= base_url('assets/img/elitbang/thumbnailberita/' .$key['thumbnailberita']); ?>" alt="" width="750px" height="300px">
              </a>
            </div>
            <div class="col-lg-6">
              <h2 class="card-title"><?= $key['judulberita'] ?></h2>
              <p class="card-text"><?= $key['headlineberita'] ?></p>
              <a href="<?= base_url('Dashboard/bacaberita/' .$key ['id_berita']); ?>" class="btn btn-primary">Baca Lebih Lanjut &rarr;</a>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted">
          <?php echo tgl_indo(substr($key['tanggalberita'], 0, 10)); ?>
        </div>
      </div>  
    <?php } 
  ?>
  <div class="row d-flex justify-content-center" id="pagination">
    <?= $this->pagination->create_links(); ?>
  </div>

</div>
<!-- /.container -->