<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BiodataPemohon extends CI_Controller {
  
	public function index()
	{
		$data['pemohon'] = $this->ModelLitbang->getBiodataPemohon();
    for ($i=0; $i < count($data['pemohon']); $i++) {
      $key                                        = $data['pemohon'][$i];
      $data['pemohon'][$i]['proposalpenelitian']  = $this->db->get_where('proposalpenelitian', ['id_peneliti' => $key['id_peneliti']])->result_array();
    }
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/biodataPemohon', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function cetak()
  {
		$this->db->join('user', 'datapemohonskp.id_user = user.id_user');
		$this->db->join('verifikasi', 'datapemohonskp.id_peneliti = verifikasi.id_peneliti', 'left');
		$data['pemohon'] = $this->db->get('datapemohonskp')->result_array();
    for ($i=0; $i < count($data['pemohon']); $i++) {
      $key                                        = $data['pemohon'][$i];
      $data['pemohon'][$i]['proposalpenelitian']  = $this->db->get_where('proposalpenelitian', ['id_peneliti' => $key['id_peneliti']])->result_array();
    }
    $this->load->view('litbang/biodataPemohonPDF', $data);
  }
}
