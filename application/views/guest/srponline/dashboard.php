<div class="container">
  <h2 class="my-4" align="center">Pelayanan Surat Keterangan Penelitian Online Kabupaten Subang</h2>
  <hr>
  <br><br><br>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <div class="row" data-aos="fade-up">
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header" align="center">Informasi Seputar SKP</h4>
        <div class="card-body">
          <p class="card-text">Untuk mempelajari SKP dan mengetahui alur dari permohonan SKP, silakan klik Tombol "Pelajari Lebih Lanjut"</p>
        </div>
        <div class="card-footer text-center">
          <a href="<?= base_url(); ?>pelayanan_skp_online" class="btn btn-primary">Pelajari Lebih Lanjut</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header" align="center">Log In</h4>
        <div class="card-body">
          <p class="card-text">Sudah memiliki akun penelitian? Log in ke sistem untuk menerima SKP dan meng-update progres penelitian!</p>
        </div>
        <div class="card-footer" align="center">
          <a href="<?= base_url('Login'); ?>" class="btn btn-primary">Log In</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header" align="center">Lacak Penelitian</h4>
        <div class="card-body">
          <p class="card-text">Cari dan lihat detail progres penelitian yang sedang berjalan atau sudah selesai di Kabupaten Subang.</p>
        </div>
        <div class="card-footer" align="center">
          <a href="<?= base_url('Dashboard/lacakpenelitian'); ?>" class="btn btn-primary">Lacak Penelitian</a>
        </div>
      </div>
    </div>
  </div>

    <hr>
    <br><br><br>
    <!-- /.row -->

    <!-- Penelitian Teraktual -->
    <h3 align="center" data-aos="fade-up">Lacak Progres Permohonan SKP</h3>

    <div class="card-body" data-aos="fade-up">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
                  <tr style="text-align: center;">
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>Asal Instansi</th>               
                      <th>Judul Penelitian</th>
                      <th>Status Verifikasi Akun</th>
                      <th>Status SKP</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr style="text-align: center;">
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>Asal Instansi</th>               
                      <th>Judul Penelitian</th>
                      <th>Status Verifikasi Akun</th>
                      <th>Status SKP</th>
                  </tr>
              </tfoot>
              <tbody>
                  <?php 
                  $no = 1;
                  foreach ($pemohon as $key) { ?>
                      <tr>
                          <td style="text-align: center;"><?php echo $no++ ?></td>
                          <td>
                              <?php echo $key ['namalengkap'] ?>
                          </td>
                          <td>
                              <?php echo $key ['instansipeneliti'] ?>
                          </td>
                          <td>
                              <?php echo $key ['judulpenelitian'] ?>
                          </td>
                          <td align="center">
                            <?php switch ($key ['status_login']) {
                              case 'tidak_bisa_login': ?>
                              <a> Belum diverifikasi: Belum bisa login</a>
                              <?php break;

                              case 'bisa_login': ?>
                              <a> Sudah diverifikasi: Bisa login</a>
                              <?php break;
                              
                              default:
                                # code...
                                break;
                            } ?>
                          </td>
                          <td align="center">
                            <?php if ($key ['skp'] == NULL) { ?>
                              <a>Belum Dikirim</a>
                            <?php } else{
                              echo "Sudah Dikirim";
                            } ?>
                          </td>
                      </tr>
                 <?php } ?>
              </tbody>
          </table>
      </div>
  </div>
  </div>
<!-- /.row -->

<hr>
<br>

</div>
<!-- /.container -->