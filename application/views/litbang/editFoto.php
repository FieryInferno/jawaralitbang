<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Edit Data Foto Kegiatan</h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <form action="<?php echo base_url('litbang/foto_kegiatan/edit/' .$id_foto); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Judul Foto</label>
          <input type="text" name="judulfoto" class="form-control" value="<?= $judulfoto ?>">
        </div>

        <div class="form-group">
          <label>Foto</label><br>
          <input type="hidden" name="fotolama" value="<?= $foto ?>">
          <input type="file" name="foto" class="form-control" value="">
        </div>

        <div class="form-group">
          <label>Keterangan Foto</label>
          <input type="text" name="keteranganfoto" class="form-control" value="<?= $keteranganfoto ?> ">
        </div>
      </div>
      <div class="modal-footer">
        <a href="<?= base_url('litbang/foto_kegiatan'); ?>" type="button" class="btn btn-primary">Batalkan</a>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>