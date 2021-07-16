<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

  public function index()
  {
		$data['pertanyaan'] = $this->ModelLitbang->getPertanyaan();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/pertanyaan', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function hapus($id_pertanyaan)
  {
    $this->ModelLitbang->hapusPertanyaan($id_pertanyaan);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Pertanyaan berhasil dihapus!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('litbang/pertanyaan');
  }

  public function jawab()
  {
    $this->ModelLitbang->jawabPertanyaan();
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Pertanyaan berhasil dijawab!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('litbang/pertanyaan');
  }
}
