<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Dokumen Hasil Penelitian</h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Lengkap</th>
                <th>Asal Instansi</th>                                          
                <th>Judul Penelitian</th>
                <th>Tanggal Unggah Dokumen</th>
                <th>Dokumen Penelitian</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($dokumenhasilpenelitian as $key) { ?>
                  <tr>
                    <td><?= $key['namalengkap']; ?></td>
                    <td><?= $key['instansipeneliti']; ?></td>
                    <td><?= $key['judulpenelitian']; ?></td>
                    <td><?= $key['tanggalunggahdokumen']; ?></td>
                    <td>
                      <a href="<?= base_url('assets/documents/skp/dokumenhasilpenelitian/' .$key['dokumen']) ?>">Unduh File</a>    
                    </td>
                  </tr>
                <?php }
              ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Asal Instansi</th>                                          
                    <th>Judul Penelitian</th>
                    <th>Tanggal Unggah Dokumen</th>
                    <th>Dokumen Penelitian</th>
                </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>