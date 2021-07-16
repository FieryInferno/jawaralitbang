<!-- Begin Page Content -->
<div class="container">

  <!-- DataTables Example -->
  <div class="card shadow mb-4 mt-5">
    <div class="card-header text-center">
      <div>
        <img src="<?= base_url('assets/img/elitbang/thumbnailberita/' .$thumbnailberita) ?>" width="100%">
      </div>
    </div>
    <div class="card-body">
      <a class="btn btn-primary" href="<?= base_url(); ?>berita_artikel"><i class="far fa-arrow-alt-circle-left"></i> Kembali</a></div>
                <hr>
        <div class="ml-5 mr-5">
            <h1><?php echo $judulberita; ?></h1>
            <p><?php echo $tanggalberita; ?></p>
            </div>
            <hr>
            <div class="ml-4 mr-4 mt-4 mb-4">
            <?php echo $isiberita; ?>
        </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->