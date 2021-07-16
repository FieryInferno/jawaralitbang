<style>
  p {
    text-align: justify;
    text-justify: inter-word;
  }
  ul {
    text-align: justify;
    text-justify: inter-word;
  }
  ol {
    text-align: justify;
    text-justify: inter-word;
  }
</style>
<body>
  <!-- Page Content -->
  <!-- Page Content -->
  <div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-5 mb-4">Profil</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo base_url(); ?>">Beranda</a>
      </li>
      <li class="breadcrumb-item active">Profil</li>
    </ol>
    <!-- Image Header -->
    <img class="img-fluid rounded mb-4" src="<?= base_url('assets/' . $fotoheader); ?>" alt="" width="100%">
    <hr>
    <!-- Date/Time -->
    <h4 align="center"><?= $judul; ?></h4>
    <?= $isi; ?>
  </div>
  <!-- /.container -->
</body>

</html>
