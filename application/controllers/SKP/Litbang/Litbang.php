<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Litbang extends CI_Controller {
  
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
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/dashboard', $data);
		$this->load->view('templates/admin/srponline/footer');
	}
}
