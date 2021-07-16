<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilPenelitian extends CI_Controller {
  
	public function index()
	{
		$data['dokumenhasilpenelitian'] = $this->ModelLitbang->getDokumenHasilPenelitian();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/hasilPenelitian', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function lacak()
  {
		$data['peneliti'] = $this->ModelLitbang->getPenelitiTerverifikasi();
    for ($i=0; $i < count($data['peneliti']); $i++) {
      $key      = $data['peneliti'][$i];
      $this->db->select_max('tanggal');
      $progress = $this->db->get_where('progress', ['id_peneliti' => $key['id_peneliti']])->row_array();
      $progress ? $data['peneliti'][$i]['tanggal_progress'] = $progress['tanggal'] : $data['peneliti'][$i]['tanggal_progress'] = '' ;
    }
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/lacakPenelitian', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function rincianProgresPenelitian($id_peneliti)
  {
    $data['rincian']  = $this->ModelLitbang->rincianProgresPenelitian($id_peneliti);
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/rincianPenelitian', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function kirimNotifikasi($id_peneliti)
  {
    $this->ModelLitbang->kirimNotifikasi($id_peneliti);

    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Notifikasi berhasil dikirimkan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('litbang/lacak_penelitian');
  }
}
