<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">SOP Litbang</h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahfoto"><i class="fas fa-plus fa-sm"></i> Tambah SOP</button>
      </div> 
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="not_mapped_style" style="text-align: center;">Jenis</th>
                <th class="not_mapped_style" style="text-align: center;">Judul</th>
                <th class="not_mapped_style" style="text-align: center;">File</th>
                <th class="not_mapped_style" style="text-align: center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($sop as $key) { ?>
                  <tr>
                    <td><?= $key['jenis'] ?></td>
                    <td><?= $key['judul'] ?></td>
                    <td><a href="<?= base_url('assets/' . $key['file']); ?>" class="btn btn-primary">Lihat File</a></td>
                    <td>
                      <a href="<?= base_url('admin/sop_litbang/edit/' . $key['id_sop']); ?>" class="btn btn-success">Edit</a>
                      <a href="<?= base_url('admin/sop_litbang/hapus/' . $key['id_sop']); ?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
              <?php } ?>
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
              <h5 class="modal-title" id="exampleModalLabel">Tambah SOP Litbang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('admin/sop_litbang'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Jenis</label>
                  <select name="jenis" id="jenis" class="form-control">
                    <option>Pilih Jenis</option>
                    <option value="Dasar Hukum">Dasar Hukum</option>
                    <option value="SOP">SOP</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>File</label><br>
                  <input type="file" name="file" class="form-control" required>
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