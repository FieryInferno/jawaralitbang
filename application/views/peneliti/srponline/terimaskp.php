<!-- Page Content -->
<br>
<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Terima SKP</h1>
  <hr>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <p class="mb-0" style="font-size: 12px;"><strong>Catatan:</strong><ol class="mb-0" style="font-size: 12px;">
        <li >
          Silakan cetak SKP dan serahkan kepada pihak terkait dari tempat penelitian yang didatangi.
        </li>
         <li >
          Lakukan verifikasi datang ke tempat penelitian, dapat diakses di sidebar, menu teratas.
        </li>
        <li>
          Selamat melaksanakan penelitian dan semoga lancar!
        </li>
      </ol>
    </p>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Surat Keterangan Penelitian</th>
          </tr>
        </thead>
        </div>
      <tbody>
        <tr>
          <td>
            <?php
              if ($skp) { ?>
                <a href="<?= base_url('peneliti/skp/lihat/' . $skp); ?>" class="btn btn-success" target="_blank"><i class="fas fa-file-alt"></i> SKP</a>
              <?php } else { ?>
                <div class="alert alert-danger">SKP belum dikirimkan!</div>
              <?php }
            ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
</div>
  </div>
</div>