<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
    $data['total_penelitian']     = $this->db->get('datapemohonskp')->num_rows();
    $data['penelitian_berjalan']  = $this->db->get_where('datapemohonskp', ['status_penelitian' => 'belum_selesai'])->num_rows();
    $data['penelitian_selesai']   = $this->db->get_where('datapemohonskp', ['status_penelitian' => 'selesai'])->num_rows();
    $data['penelitian']           = [];
    $j                            = 0;
    for ($i=1; $i <= 12; $i++) { 
      $data['penelitian'][$j] = $this->db->get_where('datapemohonskp', [
        'month(tanggalmulaipenelitian)' => $i,
        'year(tanggalmulaipenelitian)'  => '2021'      
      ])->num_rows();
      $j++;
    }
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/srponline/dashboard', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

	public function keloladatapemohon()
	{
		$this->db->join('user', 'datapemohonskp.id_user = user.id_user');
		$this->db->join('verifikasi', 'datapemohonskp.id_peneliti = verifikasi.id_peneliti', 'left');
		$this->db->join('bidang_penelitian', 'datapemohonskp.bidangpenelitian = bidang_penelitian.id_bidang_penelitian');
		$data['pemohon'] = $this->db->get('datapemohonskp')->result_array();
    for ($i=0; $i < count($data['pemohon']); $i++) {
      $key                                        = $data['pemohon'][$i];
      $data['pemohon'][$i]['proposalpenelitian']  = $this->db->get_where('proposalpenelitian', ['id_peneliti' => $key['id_peneliti']])->result_array();
    }
    
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/srponline/keloladatapemohon', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

	public function keloladokpenelitian()
	{
		$this->db->join('datapemohonskp', 'dokumenhasilpenelitian.id_peneliti = datapemohonskp.id_peneliti', 'left');
		$data['dokumenhasilpenelitian'] = $this->db->get('dokumenhasilpenelitian')->result_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/srponline/keloladokpenelitian', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function verifikasi($idUser)
  {
    $this->db->where('id_user', $idUser);
    $this->db->update('user', [
      'status'  => 'bisa_login'
    ]);
    $this->session->set_flashdata('pesan', 'Verifikasi akun berhasil');
    redirect('SKP/Admin/Admin/keloladatapemohon');
  }

  public function batalverifikasi($idUser)
  {
    $this->db->where('id_user', $idUser);
    $this->db->update('user', [
      'status'  => 'tidak_bisa_login'
    ]);
    $this->session->set_flashdata('error', 'Akun telah batal diverifikasi');
    redirect('SKP/Admin/Admin/keloladatapemohon');
  }

  public function tolakVerifikasi($idUser)
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
    $this->db->delete('user', ['id_user'  => $idUser]);
    $this->db->delete('datapemohonskp', ['id_user'  => $idUser]);
    if (file_exists('./assets/img/skp/foto/' . $this->input->post('foto'))) unlink('./assets/img/skp/foto' . $this->input->post('foto'));
    if (file_exists('./assets/img/skp/scanktp/' . $this->input->post('scanktp'))) unlink('./assets/img/skp/scanktp' . $this->input->post('scanktp'));
    $this->session->set_flashdata('error', 'Akun telah batal diverifikasi');
    redirect('SKP/Admin/Admin/keloladatapemohon');
  }

  public function kirimskp($id_peneliti)
  {
  	$file = upload('skp');
  	$this->db->where('id_peneliti', $id_peneliti);
  	$this->db->update('datapemohonskp', [
  		'skp'	=>	$file
  	]);
  	$this->session->set_flashdata('pesan', 'SKP berhasil dikirimkan');
  	redirect('SKP/Admin/Admin/keloladatapemohon');
  }
}