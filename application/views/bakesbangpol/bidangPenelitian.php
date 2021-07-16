<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Bidang Penelitian</h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahfoto"><i class="fas fa-plus fa-sm"></i> Tambah Bidang Penelitian</button>
      </div> 
      <div class="card-body">
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="not_mapped_style" style="text-align: center;">No</th>
                <th class="not_mapped_style" style="text-align: center;">Bidang Penelitian</th>
                <th class="not_mapped_style" style="text-align: center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($bidang_penelitian as $key) { ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $key['bidang_penelitian'] ?></td>
                    <td class="text-center">
                      <button class="btn btn-success" data-toggle="modal" data-target="#tambahfoto<?= $key['id_bidang_penelitian']; ?>"><i class="fas fa-edit"></i> Edit</button>

                      <!-- Modal -->
                      <div class="modal fade" id="tambahfoto<?= $key['id_bidang_penelitian']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Bidang Penelitian</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <form action="<?php echo base_url('bakesbangpol/bidang_penelitian/edit/' . $key['id_bidang_penelitian']); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label>Bidang Penelitian</label>
                                    <input type="text" name="bidang_penelitian" class="form-control" required value="<?= $key['bidang_penelitian']; ?>">
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

                      <button class="btn btn-danger" data-toggle="modal" data-target="#hapusfoto<?= $key['id_bidang_penelitian']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>

                      <!-- Modal -->
                      <div class="modal fade" id="hapusfoto<?= $key['id_bidang_penelitian']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Hapus Bidang Penelitian</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <div class="modal-body">
                                Apakah Anda yakin ingin menghapus bidang penelitian ini?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                                <a href="<?= base_url('bakesbangpol/bidang_penelitian/hapus/' . $key['id_bidang_penelitian']); ?>" class="btn btn-danger">Hapus</a>
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
      <div class="modal fade" id="tambahfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Bidang Penelitian</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="<?php echo base_url('bakesbangpol/bidang_penelitian'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Bidang Penelitian</label>
                    <input type="text" name="bidang_penelitian" class="form-control" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                  <button type="submit" class="btn btn-success">Unggah</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>