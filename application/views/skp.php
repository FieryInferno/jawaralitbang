<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Terima SKP</title>
  <link rel="icon" type="text/css" href="<?php echo base_url('assets/img/icon/logosubangkecil.png'); ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
</body>
  <?php
    function tgl_indo($tanggal){
      $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
      $pecahkan = explode('-', $tanggal);
      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
  ?>
  <img src="<?= base_url(); ?>assets/kop_bakesbangpol.PNG" alt="" width="100%">
  <font size="2" face="Times New Roman">
  <div class="text-center"><strong><u>SURAT KETERANGAN PENELITIAN</u></strong></div>
  <div class="text-center">Nomor: <?= $surat['nomor']; ?></div>
  <table width="100%">
    <tr>
      <td width="30%" style="vertical-align: baseline;">Dasar</td>
      <td style="vertical-align: baseline;">:</td>
      <td align="justify">
        <?= $surat['dasar']; ?></td>
    </tr>
  </table>
  <table width="100%" style="border-top: 1px solid #000000">
    <tr>
      <td width="30%" style="vertical-align: baseline;">Menimbang</td>
      <td style="vertical-align: baseline;">:</td>
      <td>
        <table width="100%">
          <tr>
            <td width="30%">Surat Dari</td>
            <td>:</td>
            <td><?= $skp['surat_dari']; ?></td>
          </tr>
          <tr>
            <td width="30%">Nomor</td>
            <td>:</td>
            <td><?= $skp['nomor']; ?></td>
          </tr>
          <tr>
            <td width="30%">Tanggal</td>
            <td>:</td>
            <td><?= tgl_indo($skp['tanggal']); ?></td>
          </tr>
          <tr>
            <td width="30%">Perihal</td>
            <td>:</td>
            <td><strong><?= $skp['perihal']; ?></strong></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000">
    <tr>
      <td width="30%">Nama</td>
      <td>:</td>
      <td><?= $data_pemohon['namalengkap']; ?></td>
    </tr>
    <tr>
      <td width="30%">Alamat</td>
      <td>:</td>
      <td><?= $data_pemohon['alamatpeneliti']; ?></td>
    </tr>
    <tr>
      <td width="30%">No. HP</td>
      <td>:</td>
      <td><?= $data_pemohon['nomorhp']; ?></td>
    </tr>
    <tr>
      <td width="30%">Judul Penelitian</td>
      <td>:</td>
      <td><?= $data_pemohon['judulpenelitian']; ?></td>
    </tr>
    <tr>
      <td width="30%">Bidang Penelitian</td>
      <td>:</td>
      <td><?= $data_pemohon['bidang_penelitian']; ?></td>
    </tr>
    <tr>
      <td width="30%">Lokasi Penelitian</td>
      <td>:</td>
      <td><?= $data_pemohon['lokasipenelitian']; ?></td>
    </tr>
    <tr>
      <td width="30%">Lembaga/Instansi yang Dituju</td>
      <td>:</td>
      <td><?= $data_pemohon['instansipeneliti']; ?></td>
    </tr>
    <tr>
      <td width="30%">Waktu Penelitian</td>
      <td>:</td>
      <td><?= tgl_indo($data_pemohon['tanggalmulaipenelitian']); ?> s/d <?= tgl_indo($data_pemohon['tanggalselesaipenelitian']); ?></td>
    </tr>
    <tr>
      <td width="30%">Anggota Tim Penelitian</td>
      <td>:</td>
      <td>
        <?php
          $anggota  = explode(',', $data_pemohon['anggotapenelitian']); 
          echo count($anggota) . ' orang';
        ?>
      </td>
    </tr>
  </table>
  
  <table width="100%">
    <tr>
      <td width="65%"></td>
      <td>Dikeluarkan di : Subang</td>
    </tr>
    <tr>
      <td></td>
      <td>Pada tanggal : <?= tgl_indo($skp['tanggal']); ?></td>
    </tr>
  </table>
  
  <table width="100%">
    <tr>
      <td width="50%"></td>
      <td class="text-center">An. KEPALA BADAN KESATUAN BANGSA DAN POLITIK</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">KABUPATEN SUBANG</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">KABID KEWASPADAAN NASIONAL DAN PENANGANAN KONFLIK</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center"><img src="<?= base_url(); ?>assets/tanda_tangan.jpeg" alt="" width="50%"></td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center"><strong><u><?= $surat['kabid']; ?></u></strong></td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center"><strong>NIP. <?= $surat['nip_kabid']; ?></strong></td>
    </tr>
  </table>
  <p>
    Tembusan disampaikan kepada Yth. 
    <ol>
      <li>Bupati Subang (Sebagai laporan)</li>
      <li>Kepala BP4D</li>
      <li><?= $skp['surat_dari']; ?></li>
    </ol>
  </p></font>

  <script type="text/javascript">
    window.print();
  </script>
</body>

</html>