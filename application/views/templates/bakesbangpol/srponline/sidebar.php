<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-laptop-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">e<sup>-Litbang</sup></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDashboard" aria-expanded="true" aria-controls="collapseDashboard">
          <i class="fas fa-tachometer-alt"></i>
          <span class="mx-3">Dashboard</span>
        </a>
        <div id="collapseDashboard" class="collapse" aria-labelledby="headingDashboard" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url(); ?>bakesbangpol">
              <i class="fas fa-tachometer-alt"></i>
              <span class="mx-3">Dashboard</span>
            </a>
            <a class="collapse-item" href="<?= base_url(''); ?>">
              <i class="far fa-newspaper"></i>
              <span class="mx-3">E-Litbang</span>
            </a>
            <a class="collapse-item" href="<?= base_url('Dashboard/dashboardsrponline'); ?>">
              <i class="far fa-address-card"></i>
              <span class="mx-3">SKP Online</span>
            </a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Fitur Pengelolaan
      </div>
      <?php $jumlahPemohon  = $this->db->get_where('user', ['status'  => 'tidak_bisa_login'])->num_rows(); ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>SKP Online <span class="badge badge-primary"><?= $jumlahPemohon; ?></span></span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Pemohon SKP:</h6>
            <a class="collapse-item" href="<?= base_url(); ?>bakesbangpol/biodata_pemohon"><i class="far fa-id-card"></i> Biodata Pemohon <span class="badge badge-primary"><?= $jumlahPemohon; ?></span></a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>bakesbangpol/hasil_penelitian">
          <i class="fas fa-fw fa-folder"></i>
          <?php $jumlahDokumen  = $this->db->get_where('dokumenhasilpenelitian', ['status_dokumen'  => 'belum_diverifikasi'])->num_rows(); ?>
          <span>Hasil Penelitian <span class="badge badge-primary"><?= $jumlahDokumen; ?></span></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('bakesbangpol/bidang_penelitian'); ?>">
          <i class="fas fa-bars"></i>
          <span>Bidang Penelitian</span>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>bakesbangpol/lacak_penelitian">
          <i class="fas fa-fw fa-folder"></i>
          <span>Lacak Penelitian</span>
        </a>
      </li> -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Lainnya
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-info-circle"></i>
          <span>Informasi SKP</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Penjelasan SKP</h6>
            <a class="collapse-item" href="<?= base_url(); ?>bakesbangpol/skp/apa_itu"><i class="fas fa-question"></i> Apa itu SKP?</a>
            <a class="collapse-item" href="<?= base_url(); ?>bakesbangpol/skp/untuk_apa"><i class="fas fa-question"></i> Untuk apa SKP?</a>
            <a class="collapse-item" href="<?= base_url(); ?>bakesbangpol/skp/alur_permohonan"><i class="fas fa-road"></i> Alur Permohonan SKP</a>
            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>bakesbangpol/surat_skp">
          <i class="fas fa-question-circle"></i>
          <span>Surat SKP</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>bakesbangpol/pertanyaan">
          <i class="fas fa-question-circle"></i>
        <?php $jumlahPertanyaan = $this->db->get_where('pertanyaan', ['status'  => '0'])->num_rows(); ?>
          <span>Pertanyaan <span class="badge badge-primary"><?= $jumlahPertanyaan; ?></span></span>
        </a>
      </li>

      
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        

    </ul>