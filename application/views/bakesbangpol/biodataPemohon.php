<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Data Pemohon SKP</h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-header">
      <!-- <a href="<?= base_url(); ?>bakesbangpol/biodata_pemohon/cetak" class="btn btn-primary" target="_blank">Cetak</a> -->
    </div>
    <div class="card-body">
      
      <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>Alamat Rumah</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Nomor HP</th>
              <th>Alamat Email</th>
              <th>Asal Instansi Peneliti</th>                        
              <th>Judul Penelitian</th>                     
              <th>Proposal Penelitian</th>
              <th>Bidang Penelitian</th>
              <th>Tujuan Penelitian</th>
              <th>Lokasi Penelitian</th>
              <th>Tanggal Mulai Penelitian</th>
              <th>Tanggal Selesai Penelitian</th>
              <th>Penanggung Jawab/Koordinator/Ketua Penelitian</th>
              <th>Anggota Penelitian</th>
              <th>Scan KTP</th>
              <th>Foto</th>
              <th>Nama Pihak Terkait</th>
              <th>Email Pihak Terkait</th>
              <th>Jabatan Pihak Terkait</th>
              <th>Foto Verifikasi</th>
              <th>Verifikasi Akun</th>
              <th>Surat Keterangan Penelitian</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>Alamat Rumah</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Nomor HP</th>
              <th>Alamat Email</th>
              <th>Asal Instansi Peneliti</th>                        
              <th>Judul Penelitian</th>                       
              <th>Proposal Penelitian</th>
              <th>Bidang Penelitian</th>
              <th>Tujuan Penelitian</th>
              <th>Lokasi Penelitian</th>
              <th>Tanggal Mulai Penelitian</th>
              <th>Tanggal Selesai Penelitian</th>
              <th>Penanggung Jawab/Koordinator/Ketua Penelitian</th>
              <th>Anggota Penelitian</th>
              <th>Scan KTP</th>
              <th>Foto</th>
              <th>Nama Pihak Terkait</th>
              <th>Email Pihak Terkait</th>
              <th>Jabatan Pihak Terkait</th>
              <th>Foto Verifikasi</th>
              <th>Verifikasi Akun</th>
              <th>Surat Keterangan Penelitian</th>
            </tr>
          </tfoot>

          <tbody>
            <?php 
              $no = 1;
              foreach ($pemohon as $key) { ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $key ['namalengkap'] ?></td>
                  <td><?php echo $key ['alamatpeneliti'] ?></td>
                  <td><?php echo $key ['tempatlahir'] ?></td>
                  <td><?php echo $key ['tanggallahir'] ?></td>
                  <td><?php echo $key ['nomorhp'] ?></td>
                  <td><?php echo $key ['email'] ?></td>
                  <td><?php echo $key ['instansipeneliti'] ?></td>
                  <td><?php echo $key ['judulpenelitian'] ?></td>
                  <td>
                    <?php
                      foreach ($key['proposalpenelitian'] as $value) { ?>
                        <a href="<?= base_url('./assets/documents/skp/proposalpenelitian/' . $value['file']); ?>" class="btn btn-primary mb-2">Lihat File</a>
                        <br>
                      <?php }
                    ?>
                  </td>
                  <td><?php echo $key ['bidang_penelitian'] ?></td>
                  <td><?php echo $key ['tujuanpenelitian'] ?></td>
                  <td><?php echo $key ['lokasipenelitian'] ?></td>
                  <td><?php echo $key ['tanggalmulaipenelitian'] ?></td>
                  <td><?php echo $key ['tanggalselesaipenelitian'] ?></td>
                  <td><?php echo $key ['pjpenelitian'] ?></td>
                  <td><?php echo $key ['anggotapenelitian'] ?></td>
                  <!-- <td>
                    <a href="<?= base_url('assets/documents/skp/proposalpenelitian/'.$key ['proposalpenelitian']) ?>" width="150px" height="100px">Unduh File</a>
                  </td> -->
                  <td>
                    <img src="<?= base_url('assets/img/skp/scanktp/'.$key ['scanktp']) ?>" width="150px" height="100px">
                  </td>
                  <td>
                    <img src="<?= base_url('assets/img/skp/foto/'.$key ['foto']) ?>" width="150px" height="100px">
                  </td>
                  <td><?= $key['namapihakberwajib'] ? $key['namapihakberwajib'] : '' ; ?></td>
                  <td><?= $key['emailpihakberwajib'] ? $key['emailpihakberwajib'] : '' ; ?></td>
                  <td><?= $key['jabatanpihakberwajib'] ? $key['jabatanpihakberwajib'] : '' ; ?></td>
                  <td><img src="<?= base_url('assets/img/'.$key['foto_verifikasi']) ?>" width="150px" height="100px"></td>
                  <td class="text-center">
                    <?php
                      switch ($key['status']) {
                        case 'bisa_login': ?>
                          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#batalkanVerifikasi_<?= $key['id_user']?>">Batalkan Verifikasi Akun & Permohonan SKP</button>
                          <!-- Modal -->
                          <div class="modal fade" id="batalkanVerifikasi_<?= $key['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Batalkan Verifikasi Penelitian</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Apakah Anda yakin ingin membatalkan verifikasi akun & permohonan SKP ini?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                                  <a class="btn btn-danger" href="<?= base_url('bakesbangpol/biodata_pemohon/batal/'. $key['id_user']); ?>">Batalkan Verifikasi Akun & Permohonan SKP</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php break;
                        case 'tidak_bisa_login': ?>

                          <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#aerifikasi_<?= $key['id_user']?>">Verifikasi Akun & Permohonan SKP</button>
                          <!-- Modal -->
                          <div class="modal fade" id="aerifikasi_<?= $key['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Verifikasi</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Apakah Anda yakin ingin memverifikasi akun & permohonan SKP peneliti ini?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                                  <a class="btn btn-success" href="<?= base_url('bakesbangpol/biodata_pemohon/verifikasi/'. $key['id_user']); ?>">Verifikasi Akun & Permohonan SKP</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#tolakVerifikasi_<?= $key['id_peneliti']?>">Tolak Verifikasi Akun & SKP</button>
                          <!-- Modal -->
                          <div class="modal fade" id="tolakVerifikasi_<?= $key['id_peneliti']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Alasan</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="<?= base_url('bakesbangpol/tolak_verifikasi/' . $key['id_user']); ?>" method="post" enctype="multipart/form-data">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <textarea name="alasan" id="" cols="30" rows="10" class="form-control"></textarea>
                                      <input type="hidden" name="email" value="<?= $key['email']; ?>">
                                      <input type="hidden" name="id_peneliti" value="<?= $key['id_peneliti']; ?>">
                                      <input type="hidden" name="scanktp" value="<?= $key['scanktp']; ?>">
                                      <input type="hidden" name="foto" value="<?= $key['foto']; ?>">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-success">Kirim</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <?php break;
                        
                        default:
                            break;
                      }
                    ?>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#kirimskp_<?= $key['id_peneliti']?>"><i class="far fa-file-alt"></i>  Kirim SKP</button>
                    <div class="modal fade" id="kirimskp_<?= $key['id_peneliti']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Kirim SKP pada <?= $key['namalengkap'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="<?= base_url('bakesbangpol/biodata_pemohon/kirim_skp/' . $key['id_peneliti']); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                              <div class="text-center">Menimbang</div>
                                <div class="form-group">
                                  <label>Surat Dari</label>
                                  <input type="text" class="form-control" name="surat_dari" required>
                                </div>
                                <div class="form-group">
                                  <label>Nomor</label>
                                  <input type="text" class="form-control" name="nomor" required>
                                </div>
                                <div class="form-group">
                                  <label>Tanggal</label>
                                  <input type="date" class="form-control" name="tanggal" required>
                                </div>
                                <div class="form-group">
                                  <label>Perihal</label>
                                  <input type="text" class="form-control" name="perihal" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                              <button type="submit" class="btn btn-primary" ><i class="far fa-file-alt"></i>  Kirim SKP</button>
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