<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BidangPenelitian extends CI_Controller {
  
	public function index()
	{
    if ($this->input->post()) {
      $this->ModelBakesbangpol->insertBidangPenelitian();
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Berhasi tambah bidang peneltian
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('bakesbangpol/bidang_penelitian');
    }
		$data['bidang_penelitian'] = $this->ModelBakesbangpol->getBidangPenelitian();
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/bakesbangpol/srponline/navbar');
		$this->load->view('bakesbangpol/bidangPenelitian', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function hapus($id_bidang_penelitian)
  {
    $this->ModellBakesbangpol->hapusBidangPenelitian($id_bidang_penelitian);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Berhasi hapus bidang penelitian
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('bakesbangpol/bidang_penelitian');
  }

  public function edit($id_bidang_penelitian)
  {
    $this->ModelBakesbangpol->updateBidangPenelitian($id_bidang_penelitian);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Berhasi edit bidang peneltian
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('bakesbangpol/bidang_penelitian');
  }
}
