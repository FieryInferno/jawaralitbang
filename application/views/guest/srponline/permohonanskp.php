<!-- Page Content -->
<br>
<div class="container mt-5">
  <h2 class="my-4" align="center">Pengisian Formulir Permohonan Surat Keterangan Penelitian</h2>
  <hr>
  <br><br><br>
  <!----------------Fade-Up Animation---------------->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- Formulir -->
  <div class="row" data-aos="fade-up">
    <div class="container-fluid">
      <div class="card h-100">
        <h4 class="card-header" align="center">Isi Biodata di Bawah</h4>
        <div class="card-body">
          <?= $this->session->flashdata('alert') ? $this->session->flashdata('alert') : '';?>
          <form method="post" action="<?= base_url('permohonan_skp'); ?>" enctype="multipart/form-data">

            <!-- Biodata Tables -->
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="namalengkap" class="form-control" value="<?php echo set_value('namalengkap'); ?>">
            </div>

            <div class="form-group">
              <label>Alamat Rumah</label>
              <input type="text" name="alamatpeneliti" class="form-control" value="<?php echo set_value('alamatpeneliti'); ?>">
            </div>

            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="tempatlahir" class="form-control" value="<?php echo set_value('tempatlahir'); ?>">
            </div>

            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="tanggallahir" id="tanggallahir" class="form-control" value="<?php echo set_value('tanggallahir'); ?>">
            </div>

            <div class="form-group">
              <label>Nomor HP</label>
              <input type="text" name="nomorhp" class="form-control" value="<?php echo set_value('nomorhp'); ?>">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
            </div>

            <div class="form-group">
              <label>Asal Instansi Peneliti</label>
              <input type="text" name="instansipeneliti" class="form-control" value="<?php echo set_value('instansipeneliti'); ?>">
            </div>

            <div class="form-group">
              <label>Judul Penelitian</label>
              <input type="text" name="judulpenelitian" class="form-control" value="<?php echo set_value('judulpenelitian'); ?>">
            </div>

            <div class="form-group">
              <label>Bidang Penelitian:</label>
              <select name="bidangpenelitian" id="bidangpenelitian" class="form-control" required>
                <option disabled selected>Pilih Bidang Penelitian</option>
                <?php
                  foreach ($bidang_penelitian as $key) { ?>
                    <option value="<?= $key['id_bidang_penelitian']; ?>"><?= $key['bidang_penelitian']; ?></option>
                  <?php }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Tujuan Penelitian</label>
              <input type="text" name="tujuanpenelitian" class="form-control" value="<?php echo set_value('tujuanpenelitian'); ?>">
            </div>

            <div class="form-group">
              <label>Lokasi Penelitian</label>
              <input type="text" name="lokasipenelitian" class="form-control" value="<?php echo set_value('lokasipenelitian'); ?>">
            </div>

            <div class="form-group">
              <label>Tanggal Mulai Penelitian</label>
              <input type="date" name="tanggalmulaipenelitian" id="tanggalmulaipenelitian" class="form-control" value="<?php echo set_value('tanggalmulaipenelitian'); ?>">
            </div>

            <div class="form-group">
              <label>Tanggal Selesai Penelitian</label>
              <input type="date" name="tanggalselesaipenelitian" id="tanggalselesaipenelitian" class="form-control" value="<?php echo set_value('tanggalselesaipenelitian'); ?>">
            </div>

            <div class="form-group">
              <label>Penanggung Jawab/Ketua/Koordinator Penelitian</label> <abbr title="Tulis nama Anda bila sendirian
            ">?</abbr>
              <input type="text" name="pjpenelitian" class="form-control" value="<?php echo set_value('pjpenelitian'); ?>">
            </div>

            <div class="form-group">
              <label>Anggota Penelitian</label> <abbr title="Tulis nama Anda bila sendirian
            ">?</abbr>
              <input type="text" name="anggotapenelitian" class="form-control" value="<?php echo set_value('anggotapenelitian'); ?>">
            </div>

            <div class="form-group">
              <label>Proposal Penelitian</label>
          <abbr title="Proposal berisi:
            1.  latar belakang, 
            2.  maksud dan tujuan, 
            3.  ruang lingkup, 
            4.  jangka waktu penelitian, 
            5.  nama peneliti, 
            6.  sasaran/target penelitian, 
            7.  metode penelitian, 
            8.  lokasi penelitian,  dan
            9.  hasil yang diharapkan dari penelitian.
Sertakan juga surat pengantar dari instansi
Format Proposal: PDF
            ">?</abbr>
              <input type="file" name="proposalpenelitian[]" class="form-control" value="<?php echo set_value('proposalpenelitian'); ?>" multiple>
              <br>

              <div class="form-group">
                <label>KTP </label> <abbr title="Format KTP: JPG/JPEG/PNG">?</abbr><br>
                <input type="file" name="scanktp" class="form-control" value="<?php echo set_value('scanktp'); ?>">
              </div>

              <div class="form-group">
                <label>Foto 3x4 </label> <abbr title="Latar berwarna bebas
Format Foto: JPG/JPEG/PNG">?</abbr><br>
                <input type="file" name="foto" class="form-control" value="<?php echo set_value('foto'); ?>">
              </div>

              <div class="form-group">
                <label>Username yang Diinginkan</label>
                <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>">
              </div>

              <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" value="">
              </div>

              <div class="form-group">
                <label>Verifikasi Password</label>
                <input type="password" name="passconf" class="form-control" value="">
              </div>

          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-success"><i class="fas fa-share"></i> Kirim</button>
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