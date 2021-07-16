<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Alamat Kontak</h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editAlamatKontak"><i class="fas fa-plus fa-sm"></i> Edit Alamat Kontak</button>
      </div> 
      <div class="card-body">
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="not_mapped_style" style="text-align: center;">Alamat Kantor</th>
                <th class="not_mapped_style" style="text-align: center;">Nomor Kantor</th>
                <th class="not_mapped_style" style="text-align: center;">Email Kantor</th>
                <th class="not_mapped_style" style="text-align: center;">Jam Kerja</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?= $alamatkantor; ?></td>
                <td><?= $nomorkantor; ?></td>
                <td><?= $emailkantor; ?></td>
                <td><?= $jamkerja; ?></td>
              </tr>
            </tbody>
          </table>
          <hr>
          <br>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="editAlamatKontak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Alamat Kontak</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url(); ?>admin/alamat_kontak" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Alamat Kantor</label>
                  <textarea name="alamatkantor" id="alamatkantor" cols="30" rows="5" class="form-control"><?= $alamatkantor; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Nomor Kantor</label>
                  <input type="text" name="nomorkantor" class="form-control" required value="<?= $nomorkantor; ?>">
                </div>
                <div class="form-group">
                  <label>Email Kantor</label>
                  <input type="email" name="emailkantor" class="form-control" required value="<?= $emailkantor; ?>">
                </div>
                <div class="form-group">
                  <label>Jam Kerja</label>
                  <input type="text" name="jamkerja" class="form-control" required value="<?= $jamkerja; ?>">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>