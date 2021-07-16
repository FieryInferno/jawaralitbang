<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_artikel extends CI_Controller {
  
	public function index()
	{
    $data['beritaartikel']  = $this->ModelGuest->getBeritaArtikel();
    $this->load->view('templates/guest/e-litbang/navbar');
    $this->load->view('guest/e-litbang/publikasi/berita-artikel', $data);
    $this->load->view('templates/guest/e-litbang/footer');
	}
}
