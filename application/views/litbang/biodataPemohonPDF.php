<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style type="text/css" media="print">
    @page { size: landscape; }
  </style>
</head>
<body>
  <table width="100%" border="1">
    <thead>
      <tr align="center">
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Alamat Rumah</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Nomor HP</th>
        <th>Alamat Email</th>
        <th>Asal Instansi Peneliti</th>                        
        <th>Judul Penelitian</th> 
        <th>Bidang Penelitian</th>
        <th>Tujuan Penelitian</th>
        <th>Lokasi Penelitian</th>
        <th>Tanggal Mulai Penelitian</th>
        <th>Tanggal Selesai Penelitian</th>
        <th>Penanggung Jawab/Koordinator/Ketua Penelitian</th>
        <th>Anggota Penelitian</th>
        <th>Scan KTP</th>
        <th>Foto</th>
        <th>Nama Pihak Berwajib</th>
        <th>Email Pihak Berwajib</th>
        <th>Jabatan Pihak Berwajib</th>
        <th>Foto Verifikasi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $no = 1;
        foreach ($pemohon as $key) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $key ['namalengkap'] ?></td>
            <td><?php echo $key ['alamatpeneliti'] ?></td>
            <td><?php echo $key ['tempatlahir'] ?></td>
            <td><?php echo $key ['tanggallahir'] ?></td>
            <td><?php echo $key ['nomorhp'] ?></td>
            <td><?php echo $key ['email'] ?></td>
            <td><?php echo $key ['instansipeneliti'] ?></td>
            <td><?php echo $key ['judulpenelitian'] ?></td>
            <td><?php echo $key ['bidangpenelitian'] ?></td>
            <td><?php echo $key ['tujuanpenelitian'] ?></td>
            <td><?php echo $key ['lokasipenelitian'] ?></td>
            <td><?php echo $key ['tanggalmulaipenelitian'] ?></td>
            <td><?php echo $key ['tanggalselesaipenelitian'] ?></td>
            <td><?php echo $key ['pjpenelitian'] ?></td>
            <td><?php echo $key ['anggotapenelitian'] ?></td>
            <td>
              <img src="<?= base_url('assets/img/skp/scanktp/'.$key ['scanktp']) ?>" width="150px" height="100px">
            </td>
            <td>
              <img src="<?= base_url('assets/img/skp/foto/'.$key ['foto']) ?>" width="150px" height="100px">
            </td>
            <td><?= $key['namapihakberwajib'] ? $key['namapihakberwajib'] : '' ; ?></td>
            <td><?= $key['emailpihakberwajib'] ? $key['emailpihakberwajib'] : '' ; ?></td>
            <td><?= $key['jabatanpihakberwajib'] ? $key['jabatanpihakberwajib'] : '' ; ?></td>
            <td><img src="<?= base_url('assets/img/'.$key['foto_verifikasi']) ?>" width="150px" height="100px"></td>
          </tr>
        <?php } 
      ?>
    </tbody>
  </table>
  <script>
    window.print();
  </script>
</body>
</html>