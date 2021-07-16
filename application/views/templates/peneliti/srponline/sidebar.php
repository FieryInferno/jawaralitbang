<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/SKP/Peneliti/Peneliti');  ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">e<sup>-Litbang</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDashboard"
                    aria-expanded="true" aria-controls="collapseDashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="mx-3">Dashboard</span>
                </a>
                <div id="collapseDashboard" class="collapse" aria-labelledby="headingDashboard"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('SKP/Peneliti/Peneliti'); ?>">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="mx-3">Dashboard Peneliti</span>
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

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Fitur Tersedia
            </div>

            <!-- Nav Item - Data Pribadi Menu -->
            <li class="nav-item">
              <?php 
                $data = $this->db->get_where('datapemohonskp', ['id_peneliti' => $this->session->id_peneliti])->row_array();
                switch ($data['status']) {
                  case 'belum_terverifikasi': ?>
                  <a class="nav-link" href="<?= base_url('SKP/Peneliti/Peneliti/verifikasi'); ?>">
                      <i class="fas fa-clipboard"></i>
                      <span class="mx-3">Verifikasi</span>
                  </a>
                      <?php break;

                  case 'terverifikasi': ?>
                  <a class="nav-link">
                      <i class="fas fa-check"></i>
                      <span class="mx-3">Terverifikasi</span>
                  </a>
                      <?php break;
                  
                  default:
                      # code...
                      break;
                } 
              ?>
            </li>

            <!-- Nav Item - Data Pribadi Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('SKP/Peneliti/Peneliti/datapribadi'); ?>">
                    <i class="far fa-user"></i>
                    <span class="mx-3">Data Pribadi</span>
                </a>
            </li>

            <!-- Nav Item - Terima SKP Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('peneliti/skp'); ?>">
                    <i class="fas fa-file-alt"></i>
                    <span class="mx-3">Terima SKP</span>
                </a>
            </li>

            <!-- Nav Item - Update Progres Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>peneliti/update_progress">
                    <i class="far fa-folder"></i>
                    <span class="mx-3">Update Progres</span>
                </a>
            </li>

            <!-- Nav Item - Dokumen Hasil Penelitian Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('SKP/Peneliti/Peneliti/unggahdokumen'); ?>">
                    <i class="far fa-file-alt"></i>
                    <span class="mx-3">Unggah Dokumen</span>
                </a>
            </li>

           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->