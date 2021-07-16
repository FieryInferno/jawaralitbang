<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Berita & Artikel</h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn btn-sm btn-primary" href="<?= base_url(); ?>litbang/berita_artikel/tambah"><i class="fas fa-plus fa-sm"></i> Tambah Berita/Artikel</a>
    </div>
    <div class="card-body">
      <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="not_mapped_style" style="text-align: center;">No</th>
              <th class="not_mapped_style" style="text-align: center;">Judul Berita</th>
              <th class="not_mapped_style" style="text-align: center;">Thumbnail Berita</th>
              <th class="not_mapped_style" style="text-align: center;">Headline Berita</th>
              <th class="not_mapped_style" style="text-align: center;">Isi Berita</th>
              <th class="not_mapped_style" style="text-align: center;">Tanggal Unggah Berita</th>
              <th class="not_mapped_style" style="text-align: center;">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php 
            $no = 1;
            foreach ($beritaartikel as $key) { ?>
              <tr>
                <td align="center"><?php echo $no++ ?></td>
                <td>
                    <?php echo $key ['judulberita'] ?>
                </td>
                <td>
                    <?php echo $key ['thumbnailberita'] ?>
                </td>
                <td>
                    <?php echo $key ['headlineberita'] ?>
                </td>
                <td>
                    <?php echo $key ['isiberita'] ?>
                </td>
                <td>
                    <?php echo $key ['tanggalberita'] ?>
                </td>
                <td class="text-center">

                  <!-- Button trigger modal -->
                   <a class="btn btn-sm btn-success" href="<?= base_url('litbang/berita_artikel/edit/' .$key['id_berita']); ?>"><i class="fas fa-edit"></i> Edit</a>

                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusBerita<?= $key['id_berita']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>

                  <!-- Modal -->
                  <div class="modal fade" id="hapusBerita<?= $key['id_berita']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Hapus Berita</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda yakin ingin menghapus berita/artikel ini?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a class="btn btn-danger" href="<?= base_url('litbang/berita_artikel/hapus/' .$key['id_berita']); ?>"><i class="fas fa-times"></i></a>
                        </div>
                      </div>
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
</div>