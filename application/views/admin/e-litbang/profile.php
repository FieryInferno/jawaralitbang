<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Profile</h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="<?= base_url(); ?>admin/edit_profile" class="btn btn-primary mb-2">Edit</a>
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <img class="img-fluid rounded mb-4" src="<?= base_url('assets/' . $fotoheader); ?>" alt="" width="100%">
      </div> 
      <div class="card-body">
        <h4 align="center"><?= $judul; ?></h4>
        <?= $isi; ?>
      </div>
    </div>
  </div>
</div>