<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Agenda Kegiatan</h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahfoto"><i class="fas fa-plus fa-sm"></i> Tambah Agenda</button>
      </div> 
      <div class="card-body">
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="not_mapped_style" style="text-align: center;">Tanggal</th>
                <th class="not_mapped_style" style="text-align: center;">Nama Agenda</th>
                <th class="not_mapped_style" style="text-align: center;">Tentang Agenda</th>
                <th class="not_mapped_style" style="text-align: center;">Aksi</th>
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
                foreach ($agendaKegiatan as $key) { ?>
                  <tr>
                    <td><?= tgl_indo($key ['tanggalkegiatan']) ?></td>
                    <td><?php echo $key ['namakegiatan'] ?></td>
                    <td><?php echo $key ['keterangankegiatan'] ?></td>
                    <td>
                      <a href="<?= base_url('admin/agenda_kegiatan/edit/' . $key['id_agenda']); ?>" class="btn btn-success">Edit</a>
                      <a href="<?= base_url('admin/agenda_kegiatan/hapus/' . $key['id_agenda']); ?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
              <?php } ?>
            </tbody>
          </table>
          <hr>
          <br>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="tambahfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Agenda Kegiatan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('admin/agenda_kegiatan'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Tanggal Kegiatan</label>
                  <input type="date" name="tanggal_kegiatan" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Nama Kegiatan</label><br>
                  <input type="text" name="nama_kegiatan" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Keterangan Kegiatan</label>
                  <input type="text" name="keterangan_kegiatan" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>