<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">SOP Litbang</h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3"></div> 
      <div class="card-body">
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="not_mapped_style" style="text-align: center;">Nama Lengkap</th>
                <th class="not_mapped_style" style="text-align: center;">No. Telepon</th>
                <th class="not_mapped_style" style="text-align: center;">Email</th>
                <th class="not_mapped_style" style="text-align: center;">Pesan</th>
                <th class="not_mapped_style" style="text-align: center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($pertanyaan as $key) { ?>
                  <tr>
                    <td><?= $key['nama'] ?></td>
                    <td><?= $key['no_hape'] ?></td>
                    <td><?= $key['email'] ?></td>
                    <td><?= $key['pesan'] ?></td>
                    <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong<?= $key['id_pertanyaan']; ?>">
                        Jawab
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModalLong<?= $key['id_pertanyaan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Jawab Pertanyaan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="<?= base_url(); ?>admin/pertanyaan/jawab" method="post">
                              <input type="hidden" name="id_pertanyaan" value="<?= $key['id_pertanyaan']; ?>">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label>Jawaban</label>
                                  <textarea name="jawaban" id="jawaban" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <a href="<?= base_url('admin/pertanyaan/hapus/' . $key['id_pertanyaan']); ?>" class="btn btn-danger">Hapus</a>
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