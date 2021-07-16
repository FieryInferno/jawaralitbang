<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Pesan</h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Tambah Pesan
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pesan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url(); ?>peneliti/chat" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label>Pilih Penerima</label>
                  <select name="penerima" id="penerima" class="form-control">
                    <option>Pilih Penerima</option>
                    <?php
                      foreach ($penerima as $key) { ?>
                        <option value="<?= $key['id_user']; ?>"><?= $key['namalengkap'] ? $key['namalengkap'] : $key['username']; ?></option>
                      <?php }
                    ?>
                  </select> 
                </div>
                <div class="form-group">
                  <label>Pesan</label>
                  <textarea name="chat" id="chat" cols="30" rows="10" class="form-control"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      <div class="card-body">
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
            <tbody>
              <?php
                foreach ($chat as $key) { ?>
                  <tr>
                    <td>
                      <a href="<?= base_url('peneliti/isi_chat/' . $key['id_chat']); ?>">
                        <?php
                          if ($this->session->id_user == $key['user']) {
                            $where  = $key['user1'];
                            echo $key['nama_penerima'] !== NULL ? $key['nama_penerima'] : $key['usernamePenerima'] ;
                          } else {
                            $where  = $key['user'];
                            echo $key['nama_pengirim'] !== NULL ? $key['nama_pengirim'] : $key['usernamePengirim'] ;
                          }
                        ?>
                      </a>
                      <?php 
                        $jumlah = $this->db->get_where('isi_chat', [
                          'status'  => '0',
                          'id_chat' => $key['id_chat']
                        ])->num_rows();
                        if ($jumlah > 0) {
                          echo '<span class="badge badge-danger badge-counter">' . $jumlah . '</span>';
                        }
                      ?>
                    </td>
                  </tr>
                <?php }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>