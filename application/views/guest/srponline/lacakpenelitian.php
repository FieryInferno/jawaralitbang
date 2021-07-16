<div class="container mt-5">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="not_mapped_style" style="text-align: center;" width="5%">No</th>
            <th class="not_mapped_style" style="text-align: center;" width="17%">Nama Peneliti</th>
            <th class="not_mapped_style" style="text-align: center;" width="17%">Asal Instansi</th>
            <th class="not_mapped_style" style="text-align: center;" width="17%">Judul Penelitian</th>
            <th class="not_mapped_style" style="text-align: center;" width="17%">Lokasi Penelitian</th>
            <th class="not_mapped_style" style="text-align: center;" width="27%">Status Penelitian</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $no = 1;
            foreach ($pemohon as $key) { ?>
              <tr>
                <td align="center"><?php echo $no++ ?></td>
                <td><?php echo $key ['namalengkap'] ?></td>
                <td><?php echo $key ['instansipeneliti'] ?></td>
                <td><?php echo $key ['judulpenelitian'] ?></td>
                <td><?php echo $key ['lokasipenelitian'] ?></td>
                <td>
                  <div class="row">
                    <div class="col-12 text-center">
                      <?php
                        switch ($key['status_penelitian']) {
                          case 'belum_selesai': ?>
                            <button class="btn btn-secondary"><i class="fas fa-times"></i> <?= str_replace('_', ' ', $key['status_penelitian']); ?></button>
                            <?php break;
                          case 'selesai': ?>
                            <button class="btn btn-success"><i class="fas fa-check"></i> <?= str_replace('_', ' ', $key['status_penelitian']); ?></button>
                            <?php break;
                          
                          default:
                            # code...
                            break;
                        }
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 text-center">
                      <a href="<?= base_url('dashboard/rincian_progres_penelitian/' . $key['id_peneliti']); ?>">Rincian Progres Penelitian</a>
                    </div>
                  </div>
                </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <hr>
      <br>
    </div>
  </div>
</div>
<!-- /.container -->