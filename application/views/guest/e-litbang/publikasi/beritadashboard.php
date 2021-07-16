<!-- Begin Page Content -->
<div class="container">

    <!-- DataTables Example -->
    <div class="card shadow mb-4 mt-5">
        <div class="card-header text-center">
            <div>
                <img src="<?= base_url('assets/img/elitbang/thumbnailberita/' .$thumbnailberita) ?>">
            </div>
        </div>
        <div class="card-body">
            <a href="<?= base_url(''); ?>">
                    <button class="btn btn-sm btn-primary">
                        <i class="far fa-arrow-alt-circle-left"></i>
                        Kembali
                    </button></a>
                    <hr>
            <div class="ml-5 mr-5">
                <h1><?php echo $judulberita; ?></h1>
                <p><?php echo $tanggalberita; ?></p>
                </div>
                <hr>
                <div class="ml-4 mr-4 mt-4 mb-4">
                <?php echo $isiberita; ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->