<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
  
	public function index()
	{
		$data = $this->ModelLitbang->getProfile();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/profile', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function edit()
  {
    if ($this->input->post()) {
      $this->ModelLitbang->editProfile();
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Profil berhasil diedit!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('litbang/profile');
    }
		$data = $this->db->get('profil')->row_array();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/editProfile', $data);
		$this->load->view('templates/admin/srponline/footer');
  }
}
