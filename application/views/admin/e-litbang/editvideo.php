  <!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Data Video</h1>

    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form action="<?php echo base_url('ELitbang/Admin/Admin/editvideo/' .$id_video); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Judul Foto</label>
                                <input type="text" name="judulvideo" class="form-control" value="<?= $judulvideo ?>">
                            </div>

                             <div class="form-group">
                                <label>Foto</label><br>
                                <input type="hidden" name="videolama" value="<?= $video ?>">
                                <input type="file" name="video" class="form-control" value="">
                              </div>

                            <div class="form-group">
                                <label>Keterangan Foto</label>
                                <input type="text" name="keteranganvideo" class="form-control" value="<?= $keteranganvideo ?> ">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <a href="<?= base_url('ELitbang/Admin/Admin/kelolavideo'); ?>" type="button" class="btn btn-danger">Batalkan</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>