<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlamatKontak extends CI_Controller {
  
	public function index()
	{
    if ($this->input->post()) {
      $this->ModelLitbang->updateAlamatKontak();
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Alamat & kontak berhasil diedit!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('litbang/alamat_kontak');
    }
		$data = $this->db->get_where('alamatkontak')->row_array();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/alamatKontak', $data);
		$this->load->view('templates/admin/srponline/footer');
	}
}
