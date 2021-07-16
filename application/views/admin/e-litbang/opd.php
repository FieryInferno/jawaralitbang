  <!-- Begin Page Content -->
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Hasil Penelitian OPD</h1>
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahhasilpenelitianopd"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
      </div>

      <div class="card-body">
        <?= $this->session->pesan ? $this->session->pesan : ''; ?> 
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="not_mapped_style" style="text-align: center;">No</th>
                <th class="not_mapped_style" style="text-align: center;">Nama Peneliti</th>
                <th class="not_mapped_style" style="text-align: center;">Asal OPD</th>
                <th class="not_mapped_style" style="text-align: center;">Judul Penelitian</th>
                <th class="class="not_mapped_style" style="text-align: center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($opd as $key) { ?>
                <tr>
                  <td align="center"><?php echo $no++ ?></td>
                  <td>
                      <?php echo $key ['namapenelitiopd'] ?>
                  </td>
                  <td>
                      <?php echo $key ['asalopd'] ?>
                  </td>
                  <td>
                      <?php echo $key ['judulpenelitianopd'] ?>
                  </td>
                  <td class="text-center">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit<?= $key['id_penelitiopd']; ?>"><i class="fas fa-edit"></i></button>

                    <div class="modal fade" id="edit<?= $key['id_penelitiopd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit OPD</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="<?= base_url('admin/opd/edit/' .$key['id_penelitiopd']); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                              <div class="form-group">
                                <label>Nama Peneliti</label>
                                <input type="text" name="namapenelitiopd" class="form-control" value="<?= $key['namapenelitiopd']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Asal OPD</label>
                                <input type="text" name="asalopd" class="form-control" value="<?= $key['asalopd']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Judul Penelitian</label>
                                <input type="text" name="judulpenelitianopd" class="form-control" value="<?= $key['judulpenelitianopd']; ?>">
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
                    
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?= $key['id_penelitiopd']; ?>"><i class="fas fa-times"></i></button>

                    <div class="modal fade" id="hapus<?= $key['id_penelitiopd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus OPD</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Apakah anda yakin akan menghapus data?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                            <a class="btn btn-danger" href="<?= base_url('ELitbang/Admin/Admin/hapusopd/' .$key['id_penelitiopd']); ?>">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
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
      <div class="modal fade" id="tambahhasilpenelitianopd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Hasil Penelitian OPD Baru</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="<?php echo base_url('ELitbang/Admin/Admin/opd') ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                              <label>Nama Peneliti</label>
                              <input type="text" name="namapenelitiopd" class="form-control">
                          </div>

                          <div class="form-group">
                              <label>Asal OPD</label>
                              <input type="text" name="asalopd" class="form-control">
                          </div>

                          <div class="form-group">
                              <label>Judul Penelitian</label>
                              <input type="text" name="judulpenelitianopd" class="form-control">
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