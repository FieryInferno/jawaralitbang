<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('litbang');  ?>">
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
            <a class="collapse-item" href="<?= base_url('SKP/Litbang/litbang'); ?>">
              <i class="fas fa-tachometer-alt"></i>
              <span class="mx-3">Dashboard Litbang</span>
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
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="far fa-newspaper"></i>
          <span class="mx-3">E-Litbang</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tentang Kami:</h6>
            <a class="collapse-item" href="<?= base_url(); ?>litbang/profile">
              <i class="far fa-user"></i>
              <span class="mx-3">Profil</span>
            </a>
            <a class="collapse-item" href="<?= base_url(); ?>litbang/alamat_kontak">
              <i class="far fa-address-book"></i>
              <span class="mx-3">Alamat & Kontak</span>
            </a>
            <hr>
            <h6 class="collapse-header">Hasil Litbang:</h6>
            <a class="collapse-item" href="<?= base_url(); ?>litbang/opd">
              <i class="fas fa-users"></i>
              <span class="mx-3">OPD</span>
            </a>
            <hr>
            <h6 class="collapse-header">Publikasi:</h6>
            <a class="collapse-item" href="<?= base_url(); ?>litbang/agenda_kegiatan">
              <i class="far fa-calendar-alt"></i>
              <span class="mx-3">Agenda Kegiatan</span>
            </a>
            <a class="collapse-item" href="<?= base_url(); ?>litbang/berita_artikel">
              <i class="far fa-copy"></i>
              <span class="mx-3">Berita & Artikel</span>
            </a>
            <a class="collapse-item" href="<?= base_url(); ?>litbang/foto_kegiatan">
              <i class="far fa-file-image"></i>
              <span class="mx-3">Foto Kegiatan</span>
            </a>
            <a class="collapse-item" href="<?= base_url(); ?>litbang/sop_litbang">
              <i class="fas fa-book"></i>
              <span class="mx-3">SOP & Dasar Hukum</span>
            </a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pelayanan SKP Online Menu -->
      <?php $jumlahPemohon  = $this->db->get_where('user', ['status'  => 'tidak_bisa_login'])->num_rows(); ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSKPOnline" aria-expanded="true" aria-controls="collapseSKPOnline">
          <i class="far fa-address-card"></i>
          <span class="mx-3">SKP Online 
            <?php
              if ($jumlahPemohon > 0) { ?>
                <span class="badge badge-primary"><?= $jumlahPemohon; ?></span>
              <?php }
            ?>
          </span>
        </a>
        <div id="collapseSKPOnline" class="collapse" aria-labelledby="headingSKPOnline" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Pemohon SKP : </h6>
            <a class="collapse-item" href="<?= base_url('litbang/biodata_pemohon'); ?>">
              <i class="far fa-id-card"></i>
              <span class="mx-3">Biodata Pemohon 
                <?php
                  if ($jumlahPemohon > 0) { ?>
                    <span class="badge badge-primary"><?= $jumlahPemohon; ?></span>
                  <?php }
                ?>
              </span>
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('litbang/hasil_penelitian'); ?>">
          <i class="far fa-folder"></i>
          <?php $jumlahDokumen  = $this->db->get_where('dokumenhasilpenelitian', ['status_dokumen'  => 'terverifikasi'])->num_rows(); ?>
          <span class="mx-3">Hasil Penelitian <span class="badge badge-primary"><?= $jumlahDokumen; ?></span></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('litbang/lacak_penelitian'); ?>">
          <i class="fas fa-search"></i>
          <span class="mx-3">Lacak Penelitian</span>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('litbang/bidang_penelitian'); ?>">
          <i class="far fa-folder"></i>
          <span class="mx-3">Bidang Penelitian</span>
        </a>
      </li> -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Lainnya</div>
            <!-- <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInformasiSKP" aria-expanded="true" aria-controls="collapseInformasiSKP">
                <i class="fas fa-info-circle"></i>
                <span class="mx-3">Informasi SKP</span>
              </a>
              <div id="collapseInformasiSKP" class="collapse" aria-labelledby="headingInformasiSKP" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Penjelasan SKP</h6>
                  <a class="collapse-item" href="<?= base_url(); ?>litbang/skp/apa_itu">Apa itu SKP?</a>
                  <a class="collapse-item" href="<?= base_url(); ?>litbang/skp/untuk_apa">Untuk apa SKP?</a>
                  <a class="collapse-item" href="<?= base_url(); ?>litbang/skp/alur_permohonan">Alur Permohonan SKP</a>
                  <div class="collapse-divider"></div>
                </div>
              </div>
            </li> -->
            <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>litbang/pertanyaan">
        <i class="fas fa-question-circle"></i>
        <?php $jumlahPertanyaan = $this->db->get_where('pertanyaan', ['status'  => '0'])->num_rows(); ?>
        <span class="mx-3">Pertanyaan <span class="badge badge-primary"><?= $jumlahPertanyaan; ?></span></span></a>
      </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->