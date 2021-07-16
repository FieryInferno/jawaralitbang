<!-- Page Content -->
<br>
<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Unggah Dokumen Hasil Penelitian</h1>
  <hr>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <p class="mb-0" style="font-size: 12px;"><strong>Catatan:</strong><ol class="mb-0" style="font-size: 12px;">
        <ol>
          <li >
            Format Dokumen: PDF
          </li>
          <li>
            Dapat unggah lebih dari 1 dokumen dengan menekan Ctrl + pilih dokumen
          </li>
          <li>
            Silakan periksa apakah Anda mengirimkan dokumen yang benar atau tidak. Jika dokumen salah, Anda bisa menariknya kembali
          </li>
          <li>
            Anda juga dapat menerima komentar dari Bakesbangpol yang menginformasikan jika Anda salah mengirimkan dokumen. Segera klik "Batal Kirim" bila Anda mendapatkan komentar tersebut
          </li>
        </ol>
      </p>
    </div>

    <div class="card-body">
      <?= $this->session->alert ? $this->session->alert : '' ; ?>

      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
          <form method="post" action="<?= base_url('SKP/Peneliti/Peneliti/unggahdokumen'); ?>" enctype="multipart/form-data">
            <div class="form-group">
              <input type="file" name="dokumen[]" multiple class="form-control" value="">
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-share"></i> Kirim</button>
          </form>
        </table>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>Dokumen</th>
              <th>Komentar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($dokumen as $key) { ?>
                <tr>
                  <td class="text-center">
                    <a href="<?= base_url('./assets/documents/skp/dokumenhasilpenelitian/' . $key['dokumen']); ?>" class="btn btn-primary tex"><i class="fas fa-eye"></i> Lihat Dokumen</a>
                  </td>
                  <td><?= $key['komentar']; ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('peneliti/dokumen_penelitian/batal_kirim/' . $key['id_dokumen']); ?>" class="btn btn-danger"><i class="fas fa-times"></i> Batal Kirim</a>
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