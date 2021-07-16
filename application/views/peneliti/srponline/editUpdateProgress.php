<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Edit Progres Penelitian</h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-header py-3"></div>
    <div class="card-body">
      <form method="post" action="<?= base_url('peneliti/update_progress/edit/' . $id_progress); ?>" enctype="multipart/form-data">
        <div class="row">
          <div class="col-6">
            <!-- <div class="form-group">
              <label>Tanggal</label>
              <input type="date" name="tanggal" class="form-control" required value="<?= $tanggal; ?>">
            </div> -->
            <input type="hidden" name="tanggal" class="form-control" required value="<?= $tanggal; ?>">
            <div class="form-group">
              <label>Progres</label>
              <input type="text" name="progress" class="form-control" required value="<?= $progress; ?>">
            </div>
            <div class="form-group">
              <label>Tahapan Penelitian</label>
              <input type="text" name="tahapan_penelitian" class="form-control" required value="<?= $tahapan_penelitian; ?>">
            </div>
            <div class="form-group">
              <label>Lokasi Terkait</label>
              <input type="text" name="lokasi_terkait" class="form-control" required value="<?= $lokasi_terkait; ?>">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Pihak Terkait</label>
              <input type="text" name="pihak_terkait" class="form-control" required value="<?= $pihak_terkait; ?>">
            </div>
            <div class="form-group">
              <label>Peran Pihak Terkait</label>
              <input type="text" name="peran_pihak_terkait" class="form-control" required value="<?= $peran_pihak_terkait; ?>">
            </div>
            <div class="form-group">
              <label>Dokumentasi Pendukung</label>
              <input type="file" name="dokumentasi_pendukung" class="form-control">
              <input type="hidden" name="dokumentasi_pendukung_lama" value="<?= $dokumentasi_pendukung; ?>">
            </div>
            <div class="form-group">
              <label>Persentase Penelitian</label>
              <input type="text" name="persentase_penelitian" class="form-control" required value="<?= $persentase_penelitian; ?>">
            </div>
          </div>
        </div>
         <a class="btn btn-primary" href="<?= base_url('peneliti/update_progress'); ?>">Batalkan</a>
        <button type="submit" class="btn btn-success">Simpan</button>
      </form>
    </div>
  </div>
</div>