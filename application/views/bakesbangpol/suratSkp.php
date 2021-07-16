<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800"></h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambahfoto"><i class="fas fa-edit fa-sm"></i> Edit Surat SKP</button>
      </div> 
      <div class="card-body">
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="not_mapped_style" style="text-align: center;">Nomor</th>
                <th class="not_mapped_style" style="text-align: center;">Dasar</th>
                <th class="not_mapped_style" style="text-align: center;">Kabid</th>
                <th class="not_mapped_style" style="text-align: center;">NIP Kabid</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?= $nomor; ?></td>
                <td><?= $dasar; ?></td>
                <td><?= $kabid; ?></td>
                <td><?= $nip_kabid; ?></td>
              </tr>
            </tbody>
          </table>
          <hr>
          <br>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="tambahfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Surat SKP</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('bakesbangpol/surat_skp/edit'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Nomor</label>
                  <input type="text" class="form-control" value="<?= $nomor; ?>" name="nomor" required>
                </div>
                <div class="form-group">
                  <label>Dasar</label>
                  <textarea name="dasar" class="form-control" value="" id="editor1" required>
                    <?= $dasar; ?> 
                  </textarea> 
                </div>
                <div class="form-group">
                  <label>Kabid</label>
                  <input type="text" class="form-control" value="<?= $kabid; ?>" name="kabid" required>
                </div>
                <div class="form-group">
                  <label>NIP Kabid</label>
                  <input type="text" name="nip_kabid" id="nip_kabid" class="form-control" required value="<?= $nip_kabid; ?>">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>