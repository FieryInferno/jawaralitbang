<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Pesan</h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-header py-3"><?= $penerima; ?></div>
    <div class="card-body">
      <?php
        foreach ($chat as $key) {
          if ($key['pengirim'] == $this->session->id_user) { ?>
            <div class="row">
              <div class="col-md-6"></div>
              <div class="col-md-6">
                  <div class="alert alert-secondary" role="alert"><?= $key['chat']; ?></div>
                </div>
            </div>
          <?php } else { ?>
            <div class="row">
              <div class="col-md-6">
                <div class="alert alert-success" role="alert"><?= $key['chat']; ?></div>
              </div>
              <div class="col-md-6"></div>
            </div>
          <?php }
          }
        ?>
    </div>
    <div class="card-footer">
      <form action="<?= base_url(); ?>peneliti/chat/kirim" method="post" id="form_kirim_chat">
        <div class="row">
          <div class="col-lg-11">
            <input type="hidden" name="id_chat" value="<?= $chat[0]['id_chat']; ?>">
            <input type="hidden" name="pengirim" value="<?= $this->session->id_user; ?>">
            <?php
              if ($this->session->id_user == $chat[0]['pengirim']) {
                $penerima = $chat[0]['penerima'];
              } else {
                $penerima = $chat[0]['pengirim'];
              }
            ?>
            <input type="hidden" name="penerima" value="<?= $penerima; ?>">
            <input type="text" name="isi" placeholder="Type Message ..." class="form-control">
          </div>
          <div class="col-lg-1">
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>