<br>
  <div class="container mt-4">
    <h1 class="mt-4 mb-3">Alamat & Kontak</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
      <li class="breadcrumb-item active">Alamat & Kontak</li>
    </ol>
    <div class="row">
      <div class="col-lg-8 mb-4">
        <iframe style="width: 100%; height: 400px; border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63418.19342927515!2d107.66690495278887!3d-6.567406142826989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x464b6a0fb29f728b!2sBadan%20Perencanaan%20Pembangunan%20Penelitian%20Dan%20Pengembangan%20Daerah%20-%20BP4D%20Kabupaten%20Subang!5e0!3m2!1sen!2sus!4v1604381706822!5m2!1sen!2sus"></iframe>
      </div>
      <div class="col-lg-4 mb-4">
        <h3>Detail Kontak & Alamat</h3>
        <p>
          <?= $alamatkantor; ?>
        </p>
        <p>
          <abbr title="Kontak">P</abbr>: <?= $nomorkantor; ?>
        </p>
        <p>
          <abbr title="Email">E</abbr>:
          <a href="mailto:name@example.com"><?= $emailkantor; ?>
          </a>
        </p>
        <p>
          <abbr title="Hours">H</abbr>: <?= $jamkerja; ?>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Kirim Kami Pesan/Pertanyaan</h3>
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <form name="sentMessage" id="contactForm" novalidate action="<?= base_url(); ?>Dashboard/alamatkontak" method="post">
          <div class="control-group form-group">
            <div class="controls">
              <label>Nama Lengkap:</label>
              <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name." name="nama">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Nomor HP:</label>
              <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number." name="no_hape">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Alamat E-Mail:</label>
              <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." name="email">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Pesan:</label>
              <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none" name="pesan"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Kirim Pesan</button>
        </form>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->