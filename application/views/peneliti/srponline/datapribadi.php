<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Data Pribadi</h1>
  <hr>
    <!-- DataTables Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?= base_url('SKP/Peneliti/Peneliti/editdatapribadi/' .$pemohon[0]['id_peneliti']) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit Data Pribadi</a>
    </div>
    <div class="card-body">
      <?= $this->session->alert ? $this->session->alert : '' ; ?>
      <div class="table-responsive">
        <?php
          if ($this->session->flashdata('pesan')) { ?>
            <div class="alert alert-success alert-dismissible fade show">
              <?= $this->session->flashdata('pesan'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php }
          if ($this->session->flashdata(('error'))) { ?>
            <div class="alert alert-danger">
              <?= $this->session->flashdata('error'); ?>
            </div>
          <?php } ?>
          <table class="table table-bordered table-hover" id="" width="auto" height="auto" cellspacing="0">
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
                      <!-- <th>Proposal Penelitian</th> -->
                      <th>Scan KTP</th>
                      <th>Foto</th>
                  </tr>
              </thead>
              <!--  <tfoot>
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
                      <th>Bidang Penelitian</th>
                      <th>Tujuan Penelitian</th>
                      <th>Lokasi Penelitian</th>
                      <th>Tanggal Mulai Penelitian</th>
                      <th>Tanggal Selesai Penelitian</th>
                      <th>Penanggung Jawab/Koordinator/Ketua Penelitian</th>
                      <th>Anggota Penelitian</th>
                      <th>Proposal Penelitian</th>
                      <th>Scan KTP</th>
                      <th>Foto</th>
                  </tr>
              </tfoot> -->
              <tbody>
                  <?php 
                  $no = 1;
                  foreach ($pemohon as $key) { ?>
                      <tr>
                          <td align="center"><?php echo $no++ ?></td>
                          <td>
                              <?php echo $key ['namalengkap'] ?>
                          </td>
                          <td><?php echo $key ['alamatpeneliti'] ?>
                          </td>
                          <td>
                              <?php echo $key ['tempatlahir'] ?>
                          </td>
                          <td>
                              <?php echo $key ['tanggallahir'] ?>
                          </td>
                          <td>
                              <?php echo $key ['nomorhp'] ?>
                          </td>
                          <td>
                              <?php echo $key ['email'] ?>
                          </td>
                          <td>
                              <?php echo $key ['instansipeneliti'] ?>
                          </td>
                          <td>
                              <?php echo $key ['judulpenelitian'] ?>
                          </td>
                          <td>
                            <?php
                              foreach ($key['proposalpenelitian'] as $value) { ?>
                                <a href="<?= base_url('./assets/documents/skp/proposalpenelitian/' . $value['file']); ?>" class="btn btn-primary mb-2">Lihat File</a>
                                <br>
                              <?php }
                            ?>
                          </td>
                          <td>
                              <?php echo $key ['bidang_penelitian'] ?>
                          </td>
                          <td>
                              <?php echo $key ['tujuanpenelitian'] ?>
                          </td>
                          <td>
                              <?php echo $key ['lokasipenelitian'] ?>
                          </td>
                          <td>
                              <?php echo $key ['tanggalmulaipenelitian'] ?>
                          </td>
                          <td>
                              <?php echo $key ['tanggalselesaipenelitian'] ?>
                          </td>
                          <td>
                              <?php echo $key ['pjpenelitian'] ?>
                          </td>
                          <td>
                              <?php echo $key ['anggotapenelitian'] ?>
                          </td>
                          <!-- <td width="auto" height="auto">
                              <a href="<?= base_url('assets/documents/skp/proposalpenelitian/'.$key ['proposalpenelitian']) ?>" width="150px" height="100px">Lihat File</a>
                          </td> -->
                          <td>
                              <img src="<?= base_url('assets/img/skp/scanktp/'.$key ['scanktp']) ?>" width="150px" height="100px">
                          </td>
                          <td>
                              <img src="<?= base_url('assets/img/skp/foto/'.$key ['foto']) ?>" width="150px" height="100px">
                          </td>
                      </tr>
                  <?php } ?>
              </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content