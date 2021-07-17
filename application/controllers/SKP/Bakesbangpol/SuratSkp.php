<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratSkp extends CI_Controller {

	public function index()
	{
    $data = $this->db->get('surat_skp')->row_array();
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('bakesbangpol/suratSkp', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function edit()
  {
    if ($_FILES['tanda_tangan']['name'] == '') {
      $file = $this->input->post('tanda_tangan_lama');
    } else {
      $config ['upload_path']   = './assets';
      $config ['allowed_types'] = 'jpg|png|jpeg';
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('tanda_tangan')) {
        $this->session->set_flashdata([
          'pesan'	=> ' 
            <div class="alert alert-danger p-b-32 text-center alert-dismissible fade show">
              Tanda tangan gagal diupload!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>'
        ]);
        redirect('bakesbangpol/surat_skp');
      }else {
        $file = $this->upload->data('file_name');
      }

      if (file_exists('./assets/' . $this->input->post('tanda_tangan_lama'))) unlink('./assets/' . $this->input->post('tanda_tangan_lama'));
    }
    $this->db->update('surat_skp', [
      'nomor'         => $this->input->post('nomor'),
      'dasar'         => $this->input->post('dasar'),
      'kabid'         => $this->input->post('kabid'),
      'nip_kabid'     => $this->input->post('nip_kabid'),
      'tanda_tangan'  => $file
    ]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          SKP berhasil diedit!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('bakesbangpol/surat_skp');
  }
}