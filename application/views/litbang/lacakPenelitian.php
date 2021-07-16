<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Lacak Progres Penelitian</h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-body">
      <?php
        if ($this->session->flashdata('error')) { ?>
          <div class="alert alert-danger alert-dismissible fade show"">
            <?= $this->session->flashdata('error'); ?>
          </div>
        <?php } 
      ?>
      <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>No</th>
              <th>Nama Peneliti</th>
              <th>Asal Instansi</th>
              <th>Judul Penelitian</th>
              <th>Lokasi Penelitian</th>
              <th>Tangal Mulai Penelitian</th>
              <th>Tanggal Selesai Penelitian</th>
              <th>Tanggal Terakhir Update Progres</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              function tgl_indo($tanggal){
                $bulan = array (
                  1 =>   'Januari',
                  'Februari',
                  'Maret',
                  'April',
                  'Mei',
                  'Juni',
                  'Juli',
                  'Agustus',
                  'September',
                  'Oktober',
                  'November',
                  'Desember'
                );
                $pecahkan = explode('-', $tanggal);
                return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
              }
              $no = 1;
              foreach ($peneliti as $key) { 
                $key['tanggal_progress'] ? $tanggal  = explode(' ', $key['tanggal_progress']) : '' ; ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $key ['namalengkap'] ?></td>
                  <td><?php echo $key ['instansipeneliti'] ?></td>
                  <td><?php echo $key ['judulpenelitian'] ?></td>
                  <td><?php echo $key ['lokasipenelitian'] ?></td>
                  <td><?php echo tgl_indo($key ['tanggalmulaipenelitian']) ?></td>
                  <td><?php echo tgl_indo($key ['tanggalselesaipenelitian']) ?></td>
                  <td><?= $key['tanggal_progress'] ? $tanggal[1] . ' ' . tgl_indo($tanggal[0]) : ''; ?></td>
                  <td>
                    <a href="<?= base_url('litbang/rincian_progres_penelitian/' . $key['id_peneliti']); ?>" class="btn btn-primary mb-2"><i class="fas fa-info"></i> Rincian Progres Penelitian</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#kirimNotifikasi<?= $key['id_peneliti']; ?>"><i class="fas fa-bell"></i> Kirim Notifikasi
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="kirimNotifikasi<?= $key['id_peneliti']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Notifikasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="<?= base_url('litbang/kirim_notifikasi/' . $key['id_peneliti']); ?>" method="post">
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="">Kirim notifikasi kepada peneliti</label>
                                <textarea name="komentar" id="komentar" cols="30" rows="5" class="form-control"></textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Kirim Notifikasi</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php } 
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>