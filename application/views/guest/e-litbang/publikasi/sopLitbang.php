<div class="container mt-5">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="not_mapped_style" style="text-align: center;">No</th>
            <th class="not_mapped_style" style="text-align: center;">Jenis</th>
            <th class="not_mapped_style" style="text-align: center;">Judul</th>
            <th class="not_mapped_style" style="text-align: center;">File</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            foreach ($sop_litbang as $key) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $key['jenis'] ?></td>
                <td><?= $key['judul'] ?></td>
                <td><a href="<?= base_url('./assets/documents/elitbang/soplitbang/' . $key['file']); ?>" class="btn btn-primary">Lihat File</a></td>
              </tr>
          <?php } ?>
        </tbody>
      </table>
      <hr>
      <br>
    </div>
  </div>
</div>