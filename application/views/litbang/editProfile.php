<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Berita/Artikel</h1>
  <hr>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="post" action="<?= base_url(); ?>litbang/edit_profile" enctype="multipart/form-data">
        <!-- Biodata Tables -->
        <div class="form-group">
          <label>Foto Header</label>
          <div class="custom-file">
            <input type="file" class="form-control" id="customFile" name="fotoheader">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          <input type="hidden" name="fotoheader_lama" value="<?= $fotoheader; ?>">
        </div>
        <div class="form-group">
          <label>Judul Berita</label>
          <input type="text" class="form-control" name="judul" value="<?= $judul; ?>"> 
        </div>
        <div class="form-group">
          <label>Isi Berita</label>
          <textarea name="isi" class="form-control" value="" id="editor1"><?= $isi; ?></textarea> 
        </div>
          <div class="card-footer text-left">
          <a class="btn btn-primary" href="<?= base_url(); ?>litbang/profile">Batalkan</a>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>