<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bakesbangpol extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/bakesbangpol/srponline/navbar');
		$this->load->view('bakesbangpol/srponline/dashboard');
		$this->load->view('templates/bakesbangpol/srponline/footer');
	}
}