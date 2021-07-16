<!-- Page Content -->
<div class="container mt-5">

  <!-- Penelitian OPD -->
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="not_mapped_style" style="text-align: center;">No</th>
            <th class="not_mapped_style" style="text-align: center;">Nama Peneliti</th>
            <th class="not_mapped_style" style="text-align: center;">Asal OPD</th>
            <th class="not_mapped_style" style="text-align: center;">Judul Penelitian</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          $no = 1;
          foreach ($opd as $key) { ?>
            <tr>
              <td align="center"><?php echo $no++ ?></td>
              <td>
                  <?php echo $key ['namapenelitiopd'] ?>
              </td>
              <td>
                  <?php echo $key ['asalopd'] ?>
              </td>
              <td>
                  <?php echo $key ['judulpenelitianopd'] ?>
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
<!-- /.container -->