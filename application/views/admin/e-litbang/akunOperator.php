<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Akun Operator</h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahfoto"><i class="fas fa-plus fa-sm"></i> Tambah Akun Operator</button>
      </div> 
      <div class="card-body">
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="not_mapped_style" style="text-align: center;">No</th>
                <th class="not_mapped_style" style="text-align: center;">Username</th>
                <th class="not_mapped_style" style="text-align: center;">Role</th>
                <th class="not_mapped_style" style="text-align: center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($akun as $key) { ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $key['username']; ?></td>
                    <td>
                      <?php
                        switch ($key['role']) {
                          case '2':
                            echo 'Litbang';
                            break;
                          case '3':
                            echo 'Bakesbangpol';
                            break;
                          case '1':
                            echo 'Superuser';
                            break;
                          
                          default:
                            # code...
                            break;
                        }
                      ?>
                    </td>
                    <td>
                      <a href="<?= base_url('admin/akun_operator/edit/' . $key['id_user']); ?>" class="btn btn-success">Edit</a>
                      <a href="<?= base_url('admin/akun_operator/hapus/' . $key['id_user']); ?>" class="btn btn-danger">Hapus</a>
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
              <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Operator</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('admin/akun_operator'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Password</label><br>
                  <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select name="role" id="role" class="form-control">
                    <option>Pilih Role</option>
                    <option value="1">Superuser</option>
                    <option value="2">Litbang</option>
                    <option value="3">Bakesbangpol</option>
                  </select>
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