<!-- Page Content -->
<div class="container mt-5 mb-4">

  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">Dokumentasi Foto
  </h1>

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?= base_url(); ?>">Beranda</a>
    </li>
    <li class="breadcrumb-item active">Publikasi</li>
    <li class="breadcrumb-item active">Dokumentasi Foto</li>
  </ol>

  <div class="row">
    <?php
      $j  = 1;
      for ($i=0; $i < count($foto); $i++) { 
        $key  = $foto[$i]; ?>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="<?= base_url('assets/img/elitbang/dokumentasifoto/' .$key['foto']); ?>" target="_blank"><img class="card-img-top" src="<?= base_url('assets/img/elitbang/dokumentasifoto/' .$key['foto']); ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="<?= base_url('assets/img/elitbang/dokumentasifoto/' .$key['foto']); ?>" target="_blank"><?php echo $key['judulfoto']; ?></a>
              </h4>
              <p class="card-text"><?php echo $key['keteranganfoto']; ?></p>
            </div>
          </div>
        </div>
      <?php }
    ?>
  </div>

  <!-- Pagination -->
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>

</div>
<!-- /.container -->