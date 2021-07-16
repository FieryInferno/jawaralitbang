<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Berita/Artikel</h1>
  <hr>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="post" action="<?= base_url('ELitbang/Admin/Admin/kelolaberitaartikel'); ?>" enctype="multipart/form-data">
        <!-- Biodata Tables -->
        <div class="form-group">
          <label>Judul Berita</label>
          <input type="text" class="form-control" name="judulberita"> 
        </div>
        <div class="form-group">
          <label>Thumbnail Berita</label>
          <input type="file" class="form-control" name="thumbnailberita"> 
        </div>
        <div class="form-group">
          <label>Headline Berita</label>
          <input type="text" class="form-control" name="headlineberita"> 
        </div>
        <div class="form-group">
          <label>Isi Berita</label>
          <textarea name="isiberita" class="form-control" value="" id="editor1"></textarea> 
        </div>
          <div class="card-footer text-left">
          <a class="btn btn-primary" href="<?= base_url('ELitbang/Admin/Admin/beritaartikel'); ?>">Kembali</a>
          <button type="submit" class="btn btn-success">Unggah</button>
        </div>
      </form>
    </div>
  </div>
</div>