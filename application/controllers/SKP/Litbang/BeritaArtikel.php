<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BeritaArtikel extends CI_Controller {
  
	public function index()
	{
		$data['beritaartikel'] = $this->ModelLitbang->getBeritaArtikel();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/beritaArtikel', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

	public function tambah()
	{
		if ($this->input->post()) {
      $this->ModelLitbang->tambahBeritaArtikel();
			$this->session->set_flashdata('pesan','
        <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
          Berita/artikel berhasil ditambahkan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('litbang/berita_artikel');
    }
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/tambahBeritaArtikel');
		$this->load->view('templates/admin/srponline/footer');
	}
  
	public function edit($id_berita)
	{
		if ($this->input->post()) {
      $this->ModelLitbang->updateBeritaArtikel($id_berita);
			$this->session->set_flashdata('pesan','
        <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
         Berita/artikel berhasil diedit!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
			redirect('litbang/berita_artikel');
		}
		$data = $this->db->get_where('beritaartikel', [
			'id_berita'		=> $id_berita
		])->row_array();

		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/editBeritaArtikel', $data);
		$this->load->view('templates/admin/srponline/footer');	
	}

  public function hapus($id_berita)
  {
    $this->ModelLitbang->hapusBeritaArtikel($id_berita);
    $this->session->set_flashdata('pesan','
      <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        Berita/artikel berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('litbang/berita_artikel');
  }
}
