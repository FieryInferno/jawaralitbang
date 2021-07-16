<!-- Begin Page Content -->
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Berita/Artikel</h1>

<hr>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-sm btn-primary" href="<?= base_url('ELitbang/Admin/Admin/kelolaberitaartikel'); ?>"><i class="fas fa-plus fa-sm"></i>Tambah Data</a>
    </div>
             <?php
                if ($this->session->flashdata('alert')) { ?>
                  <div class="alert alert-success alert-dismissible fade show">
                    <?= $this->session->flashdata('alert'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php } ?>

    <div class="card-body">
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
                    <a class="btn btn-sm btn-danger" href="<?= base_url('ELitbang/Admin/Admin/hapusberitaartikel/' .$key['id_berita']); ?>"><i class="fas fa-times"></i></a>
                    <a class="btn btn-sm btn-success" href="<?= base_url('ELitbang/Admin/Admin/editberitaartikel/' .$key['id_berita']); ?>"><i class="fas fa-wrench"></i></a>
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
</div>