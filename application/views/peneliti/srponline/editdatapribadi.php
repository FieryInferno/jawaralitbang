<!-- Page Content -->
<br>
<div class="container">
  <!-- Formulir -->
  <div class="row" data-aos="fade-up">
    <div class="container-fluid">
      <div class="card h-100">
        <h4 class="card-header" align="center">Edit Data Pribadi</h4>
          <form method="post" action="<?= base_url('peneliti/data_pribadi/edit/' . $id_peneliti); ?>" enctype="multipart/form-data">
            <div class="card-body">
                <!-- Biodata Tables -->
              <div class="form-group">
                <label>Nama Lengkap:</label>
                <input type="text" name="namalengkap" class="form-control" value="<?php echo set_value('namalengkap', $namalengkap); ?>">
              </div>

              <div class="form-group">
                <label>Alamat Rumah:</label>
                <input type="text" name="alamatpeneliti" class="form-control" value="<?php echo set_value('alamatpeneliti', $alamatpeneliti); ?>">
              </div>

              <div class="form-group">
                <label>Tempat Lahir:</label>
                <input type="text" name="tempatlahir" class="form-control" value="<?php echo set_value('tempatlahir', $tempatlahir); ?>">
              </div>

              <div class="form-group">
                <label>Tanggal Lahir:</label>
                <input type="date" name="tanggallahir" id="tanggallahir" class="form-control" value="<?php echo set_value('tanggallahir', $tanggallahir); ?>">
              </div>

              <div class="form-group">
                <label>Nomor HP:</label>
                <input type="text" name="nomorhp" class="form-control" value="<?php echo set_value('nomorhp', $nomorhp); ?>">
              </div>

              <div class="form-group">
                <label>Alamat Email:</label>
                <input type="text" name="email" class="form-control" value="<?php echo set_value('email', $email); ?>">
              </div>

              <div class="form-group">
                <label>Asal Instansi Peneliti:</label>
                <input type="text" name="instansipeneliti" class="form-control" value="<?php echo set_value('instansipeneliti', $instansipeneliti); ?>">
              </div>

              <div class="form-group">
                <label>Judul Penelitian:</label>
                <input type="text" name="judulpenelitian" class="form-control" value="<?php echo set_value('judulpenelitian', $judulpenelitian); ?>">
              </div>

              <div class="form-group">
                <label>Bidang Penelitian:</label>
                <select name="bidangpenelitian" id="bidangpenelitian" class="form-control">
                  <option>Pilih Bidang Penelitian</option>
                  <?php
                    foreach ($bidang_penelitian as $key) { ?>
                      <option value="<?= $key['id_bidang_penelitian']; ?>" <?= $key['id_bidang_penelitian'] == $bidangpenelitian ? 'selected' : '' ; ?>><?= $key['bidang_penelitian']; ?></option>
                    <?php }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label>Tujuan Penelitian:</label>
                <input type="text" name="tujuanpenelitian" class="form-control" value="<?php echo set_value('tujuanpenelitian', $tujuanpenelitian); ?>">
              </div>

              <div class="form-group">
                <label>Lokasi Penelitian:</label>
                <input type="text" name="lokasipenelitian" class="form-control" value="<?php echo set_value('lokasipenelitian', $lokasipenelitian); ?>">
              </div>

              <div class="form-group">
                <label>Tanggal Mulai Penelitian:</label>
                <input type="date" name="tanggalmulaipenelitian" id="tanggalmulaipenelitian" class="form-control" value="<?php echo set_value('tanggalmulaipenelitian', $tanggalmulaipenelitian); ?>">
              </div>

              <div class="form-group">
                <label>Tanggal Selesai Penelitian:</label>
                <input type="date" name="tanggalselesaipenelitian" id="tanggalselesaipenelitian" class="form-control" value="<?php echo set_value('tanggalselesaipenelitian', $tanggalselesaipenelitian); ?>">
              </div>

              <div class="form-group">
                <label>Penanggung Jawab/Ketua/Koordinator Penelitian:</label>
                <input type="text" name="pjpenelitian" class="form-control" value="<?php echo set_value('pjpenelitian', $pjpenelitian); ?>">
              </div>

              <div class="form-group">
                <label>Anggota Penelitian:</label>
                <input type="text" name="anggotapenelitian" class="form-control" value="<?php echo set_value('anggotapenelitian', $anggotapenelitian); ?>">
              </div>

              <div class="form-group">
                <label>Proposal Penelitian:</label><br>
                <input type="file" name="proposalpenelitian[]" class="form-control" multiple>
              </div>

              <div class="form-group">
                <label>Scan KTP</label><br>
                <input type="file" name="scanktp" class="form-control">
                <input type="hidden" name="scanktp_lama" value="<?= $scanktp; ?>">
              </div>

              <div class="form-group">
                <label>Foto</label><br>
                <input type="file" name="foto" class="form-control">
                <input type="hidden" name="foto_lama" value="<?= $foto; ?>">
              </div>
              <div class="card-footer text-left">
                <a class="btn btn-primary" href="<?= base_url('SKP/Peneliti/Peneliti/datapribadi'); ?>">Batalkan</a>
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            <div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <hr>
  <br><br><br>
  <!-- /.row -->

  </div>
  <!-- /.row -->

  <hr>
  <br>

  </div>
  <!-- /.container -->