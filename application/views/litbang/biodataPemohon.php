<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Data Pemohon SKP</h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-header">
      <!-- <a href="<?= base_url(); ?>litbang/biodata_pemohon/cetak" class="btn btn-primary" target="_blank">Cetak</a> -->
    </div>
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
              <th>Nama Pihak Terkait</th>
              <th>Email Pihak Terkait</th>
              <th>Jabatan Pihak Terkait</th>
              <th>Foto Verifikasi</th>
              <th>Verifikasi Akun</th>
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
              <!-- <th>Proposal Penelitian</th> -->
              <th>Scan KTP</th>
              <th>Foto</th>
              <th>Nama Pihak Terkait</th>
              <th>Email Pihak Terkait</th>
              <th>Jabatan Pihak Terkait</th>
              <th>Foto Verifikasi</th>
              <th>Verifikasi Akun</th>
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
                          <button class="btn btn-sm btn-success">Terverifikasi</button>
                          <?php break;
                        case 'tidak_bisa_login': ?>
                          <button class="btn btn-sm btn-danger">Belum Diverifikasi</button>
                          <?php break;
                        
                        default:
                          break;
                      }
                    ?>
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