<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Update Progres Penelitian</h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-header py-3">

      <!-- Button trigger modal -->
      <?php
        switch ($status_penelitian) {
          case 'selesai':
            $warna1   = 'btn-secondary';
            $warna2   = 'btn-secondary';
            $warna3   = 'btn-secondary';
            $tombol   = 'disabled';
            $tombol2  = 'style="pointer-events: none"';
            break;
          case 'belum_selesai':
            $warna1   = 'btn-primary';
            $warna2   = 'btn-success';
            $warna3   = 'btn-danger';
            $tombol   = '';
            $tombol2  = '';
            break;
          
          default:
            # code...
            break;
        }
      ?>
      <button type="button" class="btn <?= $warna1; ?>" data-toggle="modal" data-target="#exampleModal" <?= $tombol; ?>><i class="fas fa-plus"></i>
        Tambah Progres
      </button>
      <?php
        switch ($status_penelitian) {
          case 'belum_selesai': 
            if ($persentase >= 100) { ?>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalSelesai"><i class="fas fa-check"></i>
                Penelitian Selesai
              </button>
              <div class="modal fade" id="modalSelesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Penelitian Selesai</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="post" action="<?= base_url(); ?>peneliti/update_progress">
                      <div class="modal-body">
                        Jika Anda yakin penelitian telah selesai, silakan klik tombol "Ya", maka fitur Update Progres Penelitian akan dikunci dan status penelitian Anda akan berubah menjadi "Selesai". Anda tetap bisa membatalkan pilihan selesai setelah ini.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                        <a href="<?= base_url(); ?>peneliti/update_progress/selesai" class="btn btn-success">Ya</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php }
            ?>
            <?php break;
          case 'selesai': ?>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalBatal"><i class="fas fa-times"></i>
              Batalkan
            </button>
            <div class="modal fade" id="modalBatal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Penelitian Selesai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?= base_url(); ?>peneliti/update_progress">
                    <div class="modal-body">
                      Klik "Ya" untuk membatalkan status penelitian selesai.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                      <a href="<?= base_url(); ?>peneliti/update_progress/batal" class="btn btn-success">Ya</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php break;
          
          default:
            # code...
            break;
        }
      ?>
      <p class="mb-0 mt-3" style="font-size: 12px;"><strong>Catatan:</strong><ol class="mb-0" style="font-size: 12px;">
        <ol>
          <li >
            Silakan update penelitian Anda minimal seminggu sekali
          </li>
          <li>
            Apabila Anda tidak meng-update penelitian lebih dari 9 hari, maka akun Anda akan di-suspend
          </li>
          <li>
            Anda masih bisa mendapatkan akun Anda kembali dengan memohon pengembalian via kolom pertanyaan di Tentang Kami/Alamat & Kontak
          </li>
          <li>
            Format permohonan: Nama Lengkap, Judul Penelitian, "Mohon untuk kembalikan akun saya. Saya tidak akan terlambat meng-update penelitian lagi. Apabila saya melanggar kembali, maka saya siap untuk di-suspend permanen."
          </li>
        </ol>
      </p>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Progres</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form method="post" action="<?= base_url(); ?>peneliti/update_progress" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Progres</label>
                      <input type="text" name="progress" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Tahapan Penelitian</label>
                      <input type="text" name="tahapan_penelitian" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Lokasi Terkait</label>
                      <input type="text" name="lokasi_terkait" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Pihak Terkait</label>
                      <input type="text" name="pihak_terkait" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Peran Pihak Terkait</label>
                      <input type="text" name="peran_pihak_terkait" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Dokumentasi Pendukung</label>
                      <input type="file" name="dokumentasi_pendukung" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Persentase Penelitian</label>
                      <input type="text" name="persentase_penelitian" class="form-control" required>
                    </div>
                  </div>
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
    <div class="card-body">
      <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>Tanggal</th>
              <th>Progres</th>
              <th>Tahapan Penelitian</th>
              <th>Lokasi Terkait</th>
              <th>Pihak Terkait</th>
              <th>Peran Pihak Terkait</th>
              <th>Dokumentasi Pendukung</th>
              <th>Persentase Penelitian</th>
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
              foreach ($progres as $key) { 
                $tanggal  = explode(' ', $key['tanggal']);
                echo 
                '<tr>
                  <td>' . $tanggal[1] . ' ' . tgl_indo($tanggal[0]) . '</td>
                  <td>' . $key['progress'] . '</td>
                  <td>' . $key['tahapan_penelitian'] . '</td>
                  <td>' . $key['lokasi_terkait'] . '</td>
                  <td>' . $key['pihak_terkait'] . '</td>
                  <td>' . $key['peran_pihak_terkait'] . '</td>
                  <td><img src="' . base_url()  . 'assets/' . $key['dokumentasi_pendukung'] . '" alt="" width="50%"></td>
                  <td>' . $key['persentase_penelitian'] . ' %</td>
                  <td>
                    <a href="' . base_url('peneliti/update_progress/edit/' . $key['id_progress']) . '" class="btn ' . $warna2 . '" ' . $tombol2 . '><i class="fas fa-edit"></i> Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn ' . $warna3 . '" ' . $tombol2 . ' data-toggle="modal" data-target="#hapus' . $key["id_progress"] . '"><i class="fas fa-trash"></i>
                      Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapus' . $key["id_progress"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Progres</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Apakah Anda yakin ingin menghapus progres ini?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                            <a href="' . base_url('peneliti/update_progress/hapus/' . $key['id_progress']) . '" class="btn ' . $warna3 . '" ' . $tombol2 . '>Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>