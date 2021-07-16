<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Dokumen Hasil Penelitian</h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-body">
      <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>Nama Lengkap</th>
              <th>Asal Instansi</th>                
              <th>Judul Penelitian</th>
              <th>Tanggal Unggah Dokumen</th>
              <th>Dokumen Penelitian</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($dokumenhasilpenelitian as $key) { ?>
                <tr>
                  <td><?= $key['namalengkap']; ?></td>
                  <td><?= $key['instansipeneliti']; ?></td>
                  <td><?= $key['judulpenelitian']; ?></td>
                  <td><?= $key['tanggalunggahdokumen']; ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/documents/skp/dokumenhasilpenelitian/' .$key['dokumen']) ?>">Unduh File</a>    
                  </td>
                  <td class="text-center">
                    <?php
                      switch ($key['status_dokumen']) {
                        case 'belum_diverifikasi': ?>
                          <a href="<?= base_url('bakesbangpol/hasil_penelitian/verifikasi/' . $key['id_dokumen']); ?>" class="btn btn-success"><i class="fas fa-check"></i> Verifikasi</a>
                          
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-times"></i>
                            Tolak Dokumen
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Tolak Dokumen</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="<?= base_url('bakesbangpol/hasil_penelitian/hapus/' . $key['id_dokumen']); ?>" method="post">
                                  <div class="modal-body">
                                    <div class="form-group" align="left">
                                      <label>Komentar penolakan dokumen</label>
                                      <textarea name="komentar" id="komentar" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <?php break;
                        case 'terverifikasi': ?>
                          <a href="<?= base_url('bakesbangpol/hasil_penelitian/batal/' . $key['id_dokumen']); ?>" class="btn btn-danger">Batal Verifikasi</a>
                          <?php break;
                        case 'ditolak': ?>
                          <a href="#" class="btn btn-danger">Ditolak</a>
                          <?php break;
                        
                        default:
                          # code...
                          break;
                      }
                    ?>
                  </td>
                </tr>
              <?php }
            ?>
          </tbody>
          <tfoot>
              <tr class="text-center">
                  <th>Nama Lengkap</th>
                  <th>Asal Instansi</th>     
                  <th>Judul Penelitian</th>
                  <th>Tanggal Unggah Dokumen</th>
                  <th>Dokumen Penelitian</th>
                  <th>Aksi</th>
              </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>