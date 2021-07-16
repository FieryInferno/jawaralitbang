<div class="container mt-5">
  <div class="card-body">
    <a href="<?= base_url(); ?>Dashboard/lacakpenelitian" class="btn btn-primary"><i class="far fa-arrow-alt-circle-left"></i> Kembali</a>
    <hr>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="not_mapped_style" style="text-align: center;" width="5%">Tanggal</th>
            <th class="not_mapped_style" style="text-align: center;" width="17%">Progres</th>
            <th>Tahapan Penelitian</th>
            <th>Lokasi Terkait</th>
            <th>Pihak Terkait</th>
            <th>Peran Pihak Terkait</th>
            <th>Persentase Penlitian</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            function tgl_indo($tanggal){
              $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
              );
              $pecahkan = explode('-', $tanggal);
              return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
            }
            foreach ($rincian as $key) { ?>
              <tr>
                <td><?= tgl_indo($key['tanggal']) ?></td>
                <td><?= $key['progress'] ?></td>
                <td><?= $key['tahapan_penelitian']; ?></td>
                <td><?= $key['lokasi_terkait']; ?></td>
                <td><?= $key['pihak_terkait']; ?></td>
                <td><?= $key['peran_pihak_terkait']; ?></td>
                <td><?= $key['persentase_penelitian']; ?> %</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <hr>
      <br>
    </div>
  </div>
</div>