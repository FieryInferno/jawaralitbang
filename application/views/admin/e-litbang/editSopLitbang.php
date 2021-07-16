<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">SOP Litbang</h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3"></div> 
      <div class="card-body">
        <form action="<?= base_url('admin/sop_litbang/edit/' . $id_sop); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Jenis</label>
            <select name="jenis" id="jenis" class="form-control">
              <option value="Dasar Hukum" <?= $jenis == 'Dasar Hukum' ? 'selected' : '' ; ?>>Dasar Hukum</option>
              <option value="SOP" <?= $jenis == 'SOP' ? 'selected' : '' ; ?>>SOP</option>
            </select>
          </div>
          <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required value="<?= $judul; ?>">
          </div>
          <div class="form-group">
            <label>File</label><br>
            <input type="file" name="file" class="form-control">
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>