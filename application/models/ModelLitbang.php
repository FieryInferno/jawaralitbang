<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLitbang extends CI_Model {
  
  public function insertAgendaKegiatan()
  {
    $this->db->insert('agendakegiatan', [
      'tanggalkegiatan'     => $this->input->post('tanggal_kegiatan'),
      'namakegiatan'        => $this->input->post('nama_kegiatan'),
      'keterangankegiatan'  => $this->input->post('keterangan_kegiatan')
    ]);
  }

  public function getAgendaKegiatan()
  {
    return $this->db->get('agendaKegiatan')->result_array();
  }

  public function updateAgendaKegiatan($id_agenda)
  {
    $this->db->update('agendakegiatan', [
      'tanggalkegiatan'     => $this->input->post('tanggal_kegiatan'),
      'namakegiatan'        => $this->input->post('nama_kegiatan'),
      'keterangankegiatan'  => $this->input->post('keterangan_kegiatan')
    ], ['id_agenda' => $id_agenda]);
  }

  public function getAgendaKegiatanById($id_agenda)
  {
    return $this->db->get_where('agendaKegiatan', [
      'id_agenda' => $id_agenda
    ])->row_array();
  }

  public function hapusAgendaKegiata($id_agenda)
  {
    $this->db->delete('agendakegiatan', ['id_agenda'  => $id_agenda]);
  }

  public function updateAlamatKontak()
  {
    $this->db->update('alamatkontak', [
      'alamatkantor'  => $this->input->post('alamatkantor'),
      'nomorkantor'   => $this->input->post('nomorkantor'),
      'emailkantor'   => $this->input->post('emailkantor'),
      'jamkerja'      => $this->input->post('jamkerja'),
    ]);
  }

  public function getBeritaArtikel()
  {
    return $this->db->get('beritaartikel')->result_array();
  }

  function tambahBeritaArtikel()
  {
    $foto = $_FILES['thumbnailberita']['name'];
      if ($foto = ''){} else{
        $config ['upload_path'] = './assets/img/elitbang/thumbnailberita';
        $config ['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('thumbnailberita')) {
          echo $this->upload->display_errors();
          die();
          echo "Gambar gagal diunggah!";  
        }else {
          $foto = $this->upload->data('file_name');
        }
      }
    $this->db->insert('beritaartikel', [
      'isiberita'     => $this->input->post('isiberita'),
      'thumbnailberita' => $foto,
      'headlineberita'  => $this->input->post('headlineberita'),
      'judulberita'   => $this->input->post('judulberita')
    ]);
  }

  public function updateBeritaArtikel()
  {
    $foto	= $_FILES['thumbnailberita']['name'];
    if ($foto == ''){
      $foto = $this->input->post('thumbnailberita_lama');
    } else{
      $config ['upload_path']   = './assets/img/elitbang/thumbnailberita';
      $config ['allowed_types'] = 'jpg|jpeg|png|gif';
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('thumbnailberita')) {
        $this->session->set_flashdata('pesan','
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Gagal upload foto
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('litbang/berita_artikel/edit/' . $id_berita);
      }else {
        $foto = $this->upload->data('file_name');

        file_exists('./assets/img/elitbang/thumbnailberita/' . $this->input->post('thumbnailberita_lama')) ? './assets/img/elitbang/thumbnailberita/' . $this->input->post('thumbnailberita_lama') : '' ; 
      }
    }

    $this->db->update('beritaartikel', [
      'judulberita'		=> $this->input->post('judulberita'),
      'thumbnailberita'	=> $foto,
      'headlineberita'	=> $this->input->post('headlineberita'),
      'isiberita'			=> $this->input->post('isiberita')
    ], ['id_berita' => $id_berita]);
  }

  public function hapusBeritaArtikel($id_berita)
  {
    $this->db->delete('beritaartikel', ['id_berita' => $id_berita]);
  }

  public function insertBidangPenelitian()
  {
    $this->db->insert('bidang_penelitian', ['bidang_penelitian' => $this->input->post('bidang_penelitian')]);
  }

  public function hapusBidangPenelitian($id_bidang_penelitian)
  {
    $this->db->delete('bidang_penelitian', ['id_bidang_penelitian' => $id_bidang_penelitian]);
  }

  public function updateBidangPenelitian($id_bidang_penelitian)
  {
    $this->db->update('bidang_penelitian', ['bidang_penelitian' => $this->input->post('bidang_penelitian')], ['id_bidang_penelitian'  => $id_bidang_penelitian]);
  }

  public function getBiodataPemohon()
  {
    $this->db->join('user', 'datapemohonskp.id_user = user.id_user');
		$this->db->join('verifikasi', 'datapemohonskp.id_peneliti = verifikasi.id_peneliti', 'left');
		$this->db->join('bidang_penelitian', 'datapemohonskp.bidangpenelitian = bidang_penelitian.id_bidang_penelitian');
    $this->db->select('datapemohonskp.*, user.*, verifikasi.namapihakberwajib, verifikasi.emailpihakberwajib, verifikasi.jabatanpihakberwajib, bidang_penelitian.bidang_penelitian');
    return $this->db->get('datapemohonskp')->result_array();
  }

  public function tambahChat()
  {
    $id_chat  = uniqid();
    $this->db->insert('chat', [
      'id_chat' => $id_chat,
      'user'    => $this->session->id_user,
      'user1'   => $this->input->post('penerima') 
    ]);
    $this->db->insert('isi_chat', [
      'id_chat'   => $id_chat,
      'pengirim'  => $this->session->id_user,
      'penerima'  => $this->input->post('penerima'), 
      'chat'      => $this->input->post('chat')
    ]);
  }

  public function getChat()
  {
    $this->db->where('user', $this->session->id_user);
    $this->db->or_where('user1', $this->session->id_user);
    $this->db->join('datapemohonskp as pengirim', 'chat.user = pengirim.id_user', 'left');
    $this->db->join('datapemohonskp as penerima', 'chat.user1 = penerima.id_user', 'left');
    $this->db->join('user as pengirimUser', 'chat.user = pengirimUser.id_user', 'left');
    $this->db->join('user as penerimaUser', 'chat.user1 = penerimaUser.id_user', 'left');
    $this->db->select('chat.*, pengirim.namalengkap as nama_pengirim, penerima.namalengkap as nama_penerima, pengirimUser.username as usernamePengirim, penerimaUser.username as usernamePenerima');
    return $this->db->get('chat')->result_array();
  }

  public function penerimaChat()
  {
    $this->db->join('datapemohonskp', 'user.id_user=datapemohonskp.id_user', 'left');
    $this->db->select('user.*, datapemohonskp.namalengkap');
    return $this->db->get('user')->result_array();
  }

  public function kirimChat()
  {
    $this->db->insert('isi_chat', [
      'id_chat'   => $this->input->post('id_chat'),
      'pengirim'  => $this->input->post('pengirim'),
      'penerima'  => $this->input->post('penerima'), 
      'chat'      => $this->input->post('isi')
    ]);
  }

  public function insertDokumentasiFoto()
  {
    $foto	= $_FILES['foto']['name'];
    if ($foto = ''){} else{
      $config ['upload_path']	= './assets/img/elitbang/dokumentasifoto';
      $config ['allowed_types'] = 'jpg|jpeg|png|gif';
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('foto')) {
        $this->session->set_flashdata('pesan','
          <div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
            Foto gagal diunggah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('litbang/foto_kegiatan');
      }else {
        $foto = $this->upload->data('file_name');
      }
    }
    $this->db->insert('dokumentasifoto', [
      'judulfoto'				=> $this->input->post('judulfoto'),
      'foto'					  => $foto,
      'keteranganfoto'  => $this->input->post('keteranganfoto')
    ]);
  }

  public function hapusDokumentasiFoto($id)
  {
    $this->db->delete('dokumentasifoto', ['id_foto' => $id]);
  }

  public function editDokumentasiFoto($id_foto)
  {
    $foto	= $_FILES['foto']['name'];
    if ($foto == ''){
      $foto = $this->input->post('fotolama');
    } else{
      $config ['upload_path']	= './assets/img/elitbang/dokumentasifoto';
      $config ['allowed_types'] = 'jpg|jpeg|png|gif';
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('foto')) {
        echo $this->upload->display_errors();
        die();
        echo "Gambar gagal diunggah!";	
      }else {
        $foto = $this->upload->data('file_name');
      }
      file_exists('./assets/img/elitbang/dokumentasifoto/' . $this->input->post('fotolama')) ? unlink('./assets/img/elitbang/dokumentasifoto/' . $this->input->post('fotolama')) : '';
    }
    $this->db->where('id_foto', $id_foto);
    $this->db->update('dokumentasifoto', [
      'judulfoto'				=> $this->input->post('judulfoto'),
      'foto'					=> $foto,
      'keteranganfoto'		=> $this->input->post('keteranganfoto')
    ]);
  }

  public function getDokumenHasilPenelitian()
  {
		$this->db->join('datapemohonskp', 'dokumenhasilpenelitian.id_peneliti = datapemohonskp.id_peneliti', 'left');
    return $this->db->get_where('dokumenhasilpenelitian', ['status_dokumen'  => 'terverifikasi'])->result_array();
  }

  public function getPenelitiTerverifikasi()
  {
    return $this->db->get_where('datapemohonskp', ['status'  => 'terverifikasi'])->result_array();
  }

  public function rincianProgresPenelitian($id_peneliti)
  {
    return $this->db->get_where('progress', [
      'id_peneliti' => $id_peneliti
    ])->result_array();
  }

  public function kirimNotifikasi($id_peneliti)
  {
    $peneliti = $this->db->get_where('datapemohonskp', ['id_peneliti' => $id_peneliti])->row_array();
    $config = [
      'mailtype'  	=> 'html',
      'charset'   	=> 'utf-8',
      'protocol'  	=> 'smtp',
      'smtp_host' 	=> 'smtp.gmail.com',
      'smtp_user'		=> 'fieryinferno33@gmail.com',  // Email gmail
      'smtp_pass'   => 'NaonWeAh00',  // Password gmail
      'smtp_crypto'	=> 'ssl',
      'smtp_port'   => 465,
      'crlf'    		=> "\r\n", 
      'newline' 		=> "\r\n"
    ];
    $this->load->library('email', $config);
    $this->email->initialize($config);
    $this->email->from('fieryinferno33@gmail.com', 'JAWARALITBANG');
    $this->email->to($peneliti['email']);
    $this->email->subject('Notifikasi Update Progres Penelitian');
    $this->email->message($this->input->post('komentar'));
    $this->email->send();
  }

  public function insertOPD()
  {
    $this->db->insert('opd', [
    'namapenelitiopd'			=> $this->input->post('namapenelitiopd'),
    'asalopd'					    => $this->input->post('asalopd'),
    'judulpenelitianopd'  => $this->input->post('judulpenelitianopd')
    ]);
  }

  public function getOPD()
  {
    return $this->db->get('opd')->result_array();
  }

  public function hapusOPD()
  {
    $this->db->delete('opd', ['id_penelitiopd'  => $id_peneliti]);
  }

  public function editOPD($id_peneliti_opd)
  {
    $this->db->update('opd', [
    'namapenelitiopd'     => $this->input->post('namapenelitiopd'),
    'asalopd'					    => $this->input->post('asalopd'),
    'judulpenelitianopd'	=> $this->input->post('judulpenelitianopd')
    ], ['id_penelitiopd' => $id_peneliti_opd]);
  }

  public function getPertanyaan()
  {
    return $this->db->get('pertanyaan')->result_array();
  }

  public function hapusPertanyaan($id_pertanyaan)
  {
    $this->db->delete('pertanyaan', ['id_pertanyaan'  => $id_pertanyaan]);
  }

  public function jawabPertanyaan()
  {
    $data = $this->db->get_where('pertanyaan', ['id_pertanyaan' => $this->input->post('id_pertanyaan')])->row_array();
    $config = [
      'mailtype'  	=> 'html',
      'charset'   	=> 'utf-8',
      'protocol'  	=> 'smtp',
      'smtp_host' 	=> 'smtp.gmail.com',
      'smtp_user'		=> 'fieryinferno33@gmail.com',  // Email gmail
      'smtp_pass'   => 'NaonWeAh00',  // Password gmail
      'smtp_crypto'	=> 'ssl',
      'smtp_port'   => 465,
      'crlf'    		=> "\r\n", 
      'newline' 		=> "\r\n"
    ];
    $this->load->library('email', $config);
    $this->email->initialize($config);
    $this->email->from('fieryinferno33@gmail.com', 'JAWARALITBANG');
    $this->email->to($data['email']);
    $this->email->subject('Jawaban Pertanyaan');
    $this->email->message($this->input->post('jawaban'));
    $this->email->send();
    $this->db->update('pertanyaan', ['status'  => '1'], ['id_pertanyaan'  => $this->input->post('id_pertanyaan')]);
  }

  public function getProfile()
  {
    return $this->db->get('profil')->row_array();
  }

  public function editProfile()
  {
    if ($_FILES['fotoheader']['name'] == '') {
      $file = $this->input->post('fotoheader_lama');
    } else {
      $config ['upload_path']   = './assets';
      $config ['allowed_types'] = 'jpg|png|jpeg';
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('fotoheader')) {
        echo $this->upload->display_errors();
        die();
      }else {
        $file = $this->upload->data('file_name');
      }
      if (file_exists('assets/' . $this->input->post('fotoheader_lama'))) unlink('assets/' . $this->input->post('fotoheader_lama'));
    }
    
    $this->db->update('profil', [
      'fotoheader'  => $file,
      'judul'       => $this->input->post('judul'),
      'isi'         => $this->input->post('isi')
    ]);
  }
}