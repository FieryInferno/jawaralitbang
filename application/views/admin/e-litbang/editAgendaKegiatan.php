<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Agenda Kegiatan</h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3"></div> 
      <div class="card-body">
        <form action="<?= base_url('admin/agenda_kegiatan/edit/' . $id_agenda); ?>" method="post">
          <div class="form-group">
            <label>Tanggal Kegiatan</label>
            <input type="date" name="tanggal_kegiatan" class="form-control" required value="<?= $tanggalkegiatan; ?>">
          </div>
          <div class="form-group">
            <label>Nama Kegiatan</label><br>
            <input type="text" name="nama_kegiatan" class="form-control" required value="<?= $namakegiatan; ?>">
          </div>
          <div class="form-group">
            <label>Keterangan Kegiatan</label>
            <input type="text" name="keterangan_kegiatan" class="form-control" required value="<?= $keterangankegiatan; ?>">
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>