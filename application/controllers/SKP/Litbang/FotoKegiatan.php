<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FotoKegiatan extends CI_Controller {
  
	public function index()
	{
		if ($this->input->post()) {
			$this->ModelLitbang->insertDokumentasiFoto();

			$this->session->set_flashdata('pesan','
        <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
          Foto kegiatan berhasil ditambahkan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('litbang/foto_kegiatan');
		}

		$data['foto'] = $this->db->get('dokumentasifoto')->result_array();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/fotoKegiatan', $data);
		$this->load->view('templates/admin/srponline/footer');	
	}

	public function hapus($id){
    $this->ModelLitbang->hapusDokumentasiFoto($id);
    $this->session->set_flashdata('pesan','
      <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        Foto kegiatan berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('litbang/foto_kegiatan');
	}

	public function edit($id_foto)
	{
		if ($this->input->post()) {
      $this->ModelLitbang->editDokumentasiFoto($id_foto);
      $this->session->set_flashdata('pesan','
        <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
          Foto Kegiatan berhasil diedit!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('litbang/foto_kegiatan');
		}
		$data = $this->db->get_where('dokumentasifoto', [
			'id_foto'		=> $id_foto
		])->row_array();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/editFoto', $data);
		$this->load->view('templates/admin/srponline/footer');
	}
}
