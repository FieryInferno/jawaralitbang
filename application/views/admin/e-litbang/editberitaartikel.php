<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Berita/Artikel</h1>

    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>
        
        <div class="card-body">
          <form method="post" action="<?= base_url('ELitbang/Admin/Admin/editberitaartikel/' .$id_berita); ?>" enctype="multipart/form-data">

          <!-- Biodata Tables -->
          <div class="form-group">
            <label>Judul Berita</label>
            <input type="text" class="form-control" name="judulberita" value="<?= $judulberita ?>"> 
          </div>
          <div class="form-group">
            <label>Thumbnail Berita</label>
            <input type="file" class="form-control" name="thumbnailberita" value="<?= $thumbnailberita ?>"> 
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
            <a class="btn btn-danger" href="<?= base_url('ELitbang/Admin/Admin/beritaartikel'); ?>">Batalkan</a>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>