<div class="container mt-5">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="not_mapped_style" style="text-align: center;">No</th>
            <th class="not_mapped_style" style="text-align: center;">Tanggal</th>
            <th class="not_mapped_style" style="text-align: center;">Nama Agenda</th>
            <th class="not_mapped_style" style="text-align: center;">Tentang Agenda</th>
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
            $no = 1;
            foreach ($agenda as $key) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= tgl_indo($key ['tanggalkegiatan']) ?></td>
                <td><?php echo $key ['namakegiatan'] ?></td>
                <td><?php echo $key ['keterangankegiatan'] ?></td>
              </tr>
          <?php } ?>
        </tbody>
      </table>
      <hr>
      <br>
    </div>
  </div>
</div>