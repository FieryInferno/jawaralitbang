<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelBakesbangpol extends CI_Model
{

  public function insertBidangPenelitian()
  {
    $this->db->insert('bidang_penelitian', ['bidang_penelitian' => $this->input->post('bidang_penelitian')]);
  }

  public function getBidangPenelitian()
  {
    return $this->db->get('bidang_penelitian')->result_array();
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

  public function batalVerifikasiPermohonan($id_user)
  {
    $this->db->update('user', ['status' => 'tidak_bisa_login'], ['id_user'  => $id_user]);
  }

  public function verifikasiPermohonan($id_user)
  {
    $this->db->update('user', ['status' => 'bisa_login'], ['id_user'  => $id_user]);
  }

  public function kirimSKP($id_peneliti)
  {
    $id_skp = uniqid();
    $this->db->insert('skp', [
      'id_skp'      => $id_skp,
      'surat_dari'  => $this->input->post('surat_dari'),
      'nomor'       => $this->input->post('nomor'),
      'perihal'     => $this->input->post('perihal'),
      'tanggal'     => $this->input->post('tanggal')
    ]);

    $this->db->update('datapemohonskp', ['skp' => $id_skp], ['id_peneliti' => $id_peneliti]);
  }

  public function tolakVerifikasiPermohonan($idUser)
  {
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
    $this->email->to($this->input->post('email'));
    $this->email->subject('Penolakan SKP');
    $this->email->message($this->input->post('alasan'));
    $this->email->send();

    $pemohon  = $this->db->get_where('datapemohonskp', ['id_user' => $idUser])->row_array();
    $proposal = $this->db->get_where('proposalpenelitian', ['id_peneliti' => $pemohon['id_peneliti']])->result_array();
    foreach ($proposal as $key) {
      if (file_exists('./assets/documents/skp/proposalpenelitian' . $key['file'])) unlink('./assets/documents/skp/proposalpenelitian' . $key['file']);
    }
    $this->db->delete('proposalpenelitian', ['id_peneliti'  => $pemohon['id_peneliti']]);
    $this->db->delete('user', ['id_user'  => $idUser]);
    $this->db->delete('datapemohonskp', ['id_user'  => $idUser]);
    
    if (file_exists('./assets/img/skp/foto/' .  $this->input->post('foto'))) unlink('./assets/img/skp/foto/' . $this->input->post('foto'));

    if (file_exists('./assets/img/skp/scanktp/' . $this->input->post('scanktp'))) unlink('./assets/img/skp/scanktp' . $this->input->post('scanktp'));
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

  public function getHasilPenelitian()
  {
		$this->db->join('datapemohonskp', 'dokumenhasilpenelitian.id_peneliti = datapemohonskp.id_peneliti', 'left');
    return $this->db->get_where('dokumenhasilpenelitian')->result_array();
  }

  public function verifikasiDokumenPenelitian($id_dokumen)
  {
    $this->db->update('dokumenhasilpenelitian', ['status_dokumen' => 'terverifikasi'], ['id_dokumen'  => $id_dokumen]);
  }

  public function batalVerifikasiDokumenPenelitian($id_dokumen)
  {
    $this->db->update('dokumenhasilpenelitian', ['status_dokumen' => 'belum_diverifikasi'], ['id_dokumen'  => $id_dokumen]);
  }

  public function hapusDokumenPenelitian($id_dokumen)
  {
    $this->db->update('dokumenhasilpenelitian', [
      'status_dokumen'  => 'ditolak',
      'komentar'        => $this->input->post('komentar')
    ], ['id_dokumen'  => $id_dokumen]);
  }

  public function getPenelitiTerverifikasi()
  {
    return $this->db->get_where('datapemohonskp', ['status'  => 'terverifikasi'])->result_array();
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

  public function rincianProgresPenelitian($id_peneliti)
  {
    $this->db->get_where('progress', [
      'id_peneliti' => $id_peneliti
    ])->result_array();
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
}