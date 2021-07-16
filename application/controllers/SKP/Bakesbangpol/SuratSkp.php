<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratSkp extends CI_Controller {

	public function index()
	{
    $data = $this->db->get('surat_skp')->row_array();
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('bakesbangpol/suratSkp', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function edit()
  {
    $this->db->update('surat_skp', [
      'nomor'     => $this->input->post('nomor'),
      'dasar'     => $this->input->post('dasar'),
      'kabid'     => $this->input->post('kabid'),
      'nip_kabid' => $this->input->post('nip_kabid'),
    ]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          SKP berhasil diedit!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('bakesbangpol/surat_skp');
  }
}