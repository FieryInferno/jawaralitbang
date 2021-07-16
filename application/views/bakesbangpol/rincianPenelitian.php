<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Data Pemohon SKP</h1>
  <hr>
  <div class="card shadow mb-4">
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
      </div>
    </div>
  </div>
</div>