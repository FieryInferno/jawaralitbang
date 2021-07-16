<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermohonanSKP extends CI_Controller {

	public function index()
	{
		if ($this->input->post()) {
      $this->ModelGuest->permohonanSKP();
    }
    $data['bidang_penelitian'] = $this->db->get('bidang_penelitian')->result_array();
    $this->load->view('templates/guest/srponline/navbar');
    $this->load->view('templates/guest/srponline/header');
    $this->load->view('guest/srponline/permohonanskp', $data);
    $this->load->view('templates/guest/srponline/footer');
  }
}
