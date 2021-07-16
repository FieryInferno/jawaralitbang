    <!-- Begin Page Content -->
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Kelola Galeri Foto</h1>

        <hr>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahfoto"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
            </div> 
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="not_mapped_style" style="text-align: center;">No</th>
                        <th class="not_mapped_style" style="text-align: center;">Judul Foto</th>
                        <th class="not_mapped_style" style="text-align: center;">Foto</th>
                        <th class="not_mapped_style" style="text-align: center;">Keterangan Foto</th>
                        <th class="not_mapped_style" style="text-align: center;">Tanggal Unggah Foto</th>
                        <th class="not_mapped_style" style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php 
                      $no = 1;
                      foreach ($foto as $key) { ?>
                        <tr>
                          <td align="center"><?php echo $no++ ?></td>
                          <td>
                              <?php echo $key ['judulfoto'] ?>
                          </td>
                          <td>
                            <img align="center" src="<?= base_url('assets/img/elitbang/dokumentasifoto/'.$key ['foto']) ?>" width="350px" height="200px">
                            <p class="text-center"><?php echo $key ['foto'] ?></p>
                          </td>
                          <td>
                              <?php echo $key ['keteranganfoto'] ?>
                          </td>
                          <td>
                              <?php echo $key ['tanggalunggahfoto'] ?>
                          </td>
                          <td class="text-center">
                            <a href="<?= base_url('ELitbang/Admin/Admin/hapusfoto/' .$key['id_foto']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                            <a href="<?= base_url('ELitbang/Admin/Admin/editfoto/' .$key['id_foto']); ?>" class="btn btn-sm btn-success"><i class="fas fa-wrench" ></i></a>
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('ELitbang/Admin/Admin/kelolafoto'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Judul Foto</label>
                                    <input type="text" name="judulfoto" class="form-control">
                                </div>

                                 <div class="form-group">
                                    <label>Foto</label><br>
                                    <input type="file" name="foto" class="form-control" value="">
                                  </div>

                                <div class="form-group">
                                    <label>Keterangan Foto</label>
                                    <input type="text" name="keteranganfoto" class="form-control">
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