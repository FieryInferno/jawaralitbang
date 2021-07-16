<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peneliti extends CI_Controller {

	public function index()
	{
    $data['title']  = 'Dashboard Peneliti';
		$this->load->view('templates/peneliti/srponline/header', $data);
		$this->load->view('templates/peneliti/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('peneliti/srponline/dashboard');
		$this->load->view('templates/peneliti/srponline/footer');
	}
}