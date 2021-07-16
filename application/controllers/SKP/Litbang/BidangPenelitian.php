<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BidangPenelitian extends CI_Controller {
  
	public function index()
	{
    if ($this->input->post()) {
      $this->ModelLitbang->insertBidangPenelitian();
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Bidang penelitian berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('litbang/bidang_penelitian');
    }
		$data['bidang_penelitian'] = $this->db->get('bidang_penelitian')->result_array();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/bidangPenelitian', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function hapus($id_bidang_penelitian)
  {
    $this->ModelLitbang->hapusBidangPenelitian($id_bidang_penelitian);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Bidang penelitian berhasil dihapus!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('litbang/bidang_penelitian');
  }

  public function edit($id_bidang_penelitian)
  {
    $this->ModelLitbang->updateBidangPenelitian($id_bidang_penelitian);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Bidang penelitian berhasil diedit!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('litbang/bidang_penelitian');
  }
}
