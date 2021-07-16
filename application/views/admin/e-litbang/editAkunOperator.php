<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Akun Operator</h1>
  <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3"></div> 
      <div class="card-body">
        <form action="<?= base_url('admin/akun_operator/edit/' . $id_user); ?>" method="post">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required value="<?= $username; ?>">
          </div>
          <div class="form-group">
            <label>Password</label><br>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Role</label>
            <select name="role" id="role" class="form-control">
              <option value="2" <?= $role == '2' ? 'selected' : '' ; ?>>Litbang</option>
              <option value="3" <?= $role == '3' ? 'selected' : '' ; ?>>Bakesbangpol</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>