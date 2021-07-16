<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Verifikasi Penelitian</h1>

    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <p class="mb-0" style="font-size: 12px;"><strong>Catatan:</strong><ol class="mb-0" style="font-size: 12px;">
            <li >
              Isi data di bawah ini untuk mengirimkan link verifikasi pada pihak terkait
            </li>
            <li>
              Pihak terkait akan membuka link tersebut dan mengunggah foto bersama
            </li>
            <li>
              Silakan refresh halaman ini setelah foto berhasil diunggah
            </li>
            <li>
              Akun telah berhasil diverifikasi dan halaman ini akan terkunci
            </li>
          </ol>
        </p>
      </div>
      <div class="card-body">
        <?php
          echo $this->session->alert ? $this->session->alert : '' ;
          $data = $this->db->get_where('datapemohonskp', ['id_peneliti' => $this->session->id_peneliti])->row_array();
          if ($data['status'] == 'belum_terverifikasi') { ?>
            <form method="post" action="<?= base_url('SKP/Peneliti/Peneliti/verifikasi'); ?>">
              <div class="form-group">
                  <label>Nama Pihak Terkait</label>
                  <input type="text" name="namapihakberwajib" class="form-control">
              </div>
              <div class="form-group">
                  <label>Jabatan Pihak Terkait</label>
                  <input type="text" name="jabatanpihakberwajib" class="form-control">
              </div>
              <div class="form-group">
                  <label>Email Pihak Terkait</label>
                  <input type="text" name="emailpihakberwajib" class="form-control">
              </div>
              <button type="submit" class="btn btn-success">Kirim</button>
            </form>
          <?php } else { ?>
            <div class="alert alert-success">Selamat! Akun telah berhail terverifikasi!</div>
          <?php }
        ?>
      </div>
    </div>
  </div>
</div>