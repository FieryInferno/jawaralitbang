<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">SOP & Dasar Hukum Litbang</h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahfoto"><i class="fas fa-plus fa-sm"></i> Tambah SOP/Dasar Hukum</button>
      </div> 
      <div class="card-body">
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
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
                    <td><a href="<?= base_url('./assets/documents/elitbang/soplitbang/' . $key['file']); ?>" class="btn btn-primary">Lihat File</a></td>
                    <td>
                      <a href="<?= base_url('litbang/sop_litbang/edit/' . $key['id_sop']); ?>" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>

                      <button class="btn btn-danger" data-toggle="modal" data-target="#hapusSOP<?= $key['id_sop']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>

                      <!-- Modal -->
                      <div class="modal fade" id="hapusSOP<?= $key['id_sop']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt"></i>Hapus</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Anda yakin ingin menghapus file ini?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                              <a href="<?= base_url('litbang/sop_litbang/hapus/' . $key['id_sop']); ?>" class="btn btn-danger">Hapus</a>
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
    </div>
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
        <form action="<?php echo base_url('litbang/sop_litbang'); ?>" method="post" enctype="multipart/form-data">
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
        <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-success">Unggah</button>
      </div>
        </form>
    </div>
  </div>
</div>