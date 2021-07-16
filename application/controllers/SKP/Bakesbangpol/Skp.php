<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skp extends CI_Controller {

  public function apaItu()
  {
    if ($this->input->post()) {
      $this->db->update('informasi_skp', ['isi' => $this->input->post('isi')], ['jenis' => 'apa_itu']);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Informasi SKP berhasil diedit!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('bakesbangpol/skp/apa_itu');
    }
		$data = $this->db->get_where('informasi_skp', ['jenis'  => 'apa_itu'])->row_array();
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('bakesbangpol/apaItu', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function untukApa()
  {
    if ($this->input->post()) {
      $this->db->update('informasi_skp', ['isi' => $this->input->post('isi')], ['jenis' => 'untuk_apa']);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Informasi SKP berhasil diedit!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('bakesbangpol/skp/untuk_apa');
    }
		$data = $this->db->get_where('informasi_skp', ['jenis'  => 'untuk_apa'])->row_array();
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('bakesbangpol/untukApa', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function alurPermohonan()
  {
    if ($this->input->post()) {
      if ($_FILES['isi']['name'] == '') {
        $file = $this->input->post('isi_lama');
      } else {
        $config ['upload_path']   = './assets/documents/skp/skp';
        $config ['allowed_types'] = 'jpg|png|jpeg';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('isi')) {
          $this->session->set_flashdata([
            'pesan'	=> ' 
              <div class="alert alert-danger p-b-32 text-center alert-dismissible fade show">
                Foto gagal diunggah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>'
          ]);
          redirect('bakesbangpol/skp/alur_permohonan');
        }else {
          $file = $this->upload->data('file_name');
        }

        if (file_exists('./assets/documents/skp/skp/' . $this->input->post('isi_lama'))) unlink('./assets/documents/skp/skp/' . $this->input->post('isi_lama'));
      }

      $this->db->update('informasi_skp', ['isi' => $file], ['jenis' => 'alur_permohonan']);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Informasi berhasil diedit!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('bakesbangpol/skp/alur_permohonan');
    }
		$data = $this->db->get_where('informasi_skp', ['jenis'  => 'alur_permohonan'])->row_array();
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('bakesbangpol/alurPermohonan', $data);
		$this->load->view('templates/admin/srponline/footer');
  }
}
