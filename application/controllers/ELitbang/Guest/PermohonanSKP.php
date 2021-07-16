<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermohonanSKP extends CI_Controller {

	public function index()
	{
		if ($this->input->post()) {
			$this->ModelGuest->permohonanSKP();

			$this->session->set_flashdata([
				'alert'	=> 'Terima kasih! Data Anda telah dikirimkan dan akan diverifikasi.'
			]);
		}
		$this->load->view('templates/guest/srponline/navbar');
		$this->load->view('templates/guest/srponline/header');
		$this->load->view('guest/srponline/permohonanskp');
		$this->load->view('templates/guest/srponline/footer');
	}
}
