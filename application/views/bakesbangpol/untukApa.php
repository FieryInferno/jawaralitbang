<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Untuk apa SKP?</h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambahfoto"><i class="fas fa-edit fa-sm"></i> Edit Informasi</button>
      </div> 
      <div class="card-body">
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="not_mapped_style" style="text-align: center;">Isi Informasi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?= $isi; ?></td>
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
              <h5 class="modal-title" id="exampleModalLabel">Edit Informasi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('bakesbangpol/skp/untuk_apa'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Isi</label>
                  <textarea name="isi" class="form-control" value="" id="editor1" required>
                    <?= $isi; ?> 
                  </textarea> 
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