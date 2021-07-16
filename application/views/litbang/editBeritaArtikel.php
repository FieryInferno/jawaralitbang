<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Edit Berita/Artikel</h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-header py-3"></div>
      <div class="card-body">
        <form method="post" action="<?= base_url('litbang/berita_artikel/edit/' .$id_berita); ?>" enctype="multipart/form-data">
          <!-- Biodata Tables -->
          <div class="form-group">
            <label>Judul Berita</label>
            <input type="text" class="form-control" name="judulberita" value="<?= $judulberita ?>"> 
          </div>
          <div class="form-group">
            <label>Thumbnail Berita</label>
            <input type="file" class="form-control" name="thumbnailberita">
            <input type="hidden" name="thumbnailberita_lama" value="<?= $thumbnailberita ?>"> 
          </div>
          <div class="form-group">
            <label>Headline Berita</label>
            <input type="text" class="form-control" name="headlineberita" value="<?= $headlineberita ?>"> 
          </div>
          <div class="form-group">
            <label>Isi Berita</label>
            <textarea name="isiberita" class="form-control" id="editor1"><?= $isiberita ?></textarea> 
          </div>
            <div class="card-footer text-left">
            <a class="btn btn-primary" href="<?= base_url('litbang/berita_artikel'); ?>">Batalkan</a>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>