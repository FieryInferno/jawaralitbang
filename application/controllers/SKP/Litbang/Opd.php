<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opd extends CI_Controller {
  
	public function index()
	{
		if ($this->input->post()) {
      $this->ModelLitbang->insertOPD();
			$this->session->set_flashdata('pesan','
        <div class="text-center alert alert-success alert-dismissible fade show" role="alert ">
          Data berhasil ditambah!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
			redirect('litbang/opd');
		}

		$data['opd'] = $this->ModelLitbang->getOPD();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/opd', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function hapus($id_peneliti)
  {
    $this->ModelLitbang->hapusOPD($id_peneliti);
    $this->session->set_flashdata('pesan','
      <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('litbang/opd');
  }

	public function edit($id_peneliti_opd)
	{
    $this->ModelLitbang->editOPD($id_peneliti_opd);
    $this->session->set_flashdata('pesan','
    <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
      Data berhasil diedit!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect('litbang/opd');
	}
}
