<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SopLitbang extends CI_Controller {
  
	public function index()
	{
    if ($this->input->post()) {
      $config ['upload_path']   = './assets/documents/elitbang/soplitbang';
      $config ['allowed_types'] = 'pdf|doc|docx';
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('file')) {
        echo $this->upload->display_errors();
        die();
      }else {
        $file = $this->upload->data('file_name');
      }
      $this->db->insert('sop_litbang', [
        'jenis' => $this->input->post('jenis'),
        'judul' => $this->input->post('judul'),
        'file'  => $file
      ]);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            SOP/dasar hukum berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('litbang/sop_litbang');
    }
		$data['sop']  = $this->db->get('sop_litbang')->result_array();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/sopLitbang', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function edit($id_sop)
  {
    if ($this->input->post()) {
      $data = $this->db->get_where('sop_litbang', ['id_sop' => $id_sop])->row_array();
      if ($_FILES['file']['name'] == '') {
        $file = $this->input->post('file_lama');
      } else {
        $config ['upload_path']   = './assets/documents/elitbang/soplitbang';
        $config ['allowed_types'] = 'pdf|doc|docx';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
          echo $this->upload->display_errors();
          die();
        }else {
          $file = $this->upload->data('file_name');
        }
        file_exists('./assets/documents/elitbang/soplitbang/' . $this->input->post('file_lama')) ? unlink('./assets/documents/elitbang/soplitbang/' . $this->input->post('file_lama')) : '' ;
      }
      $this->db->update('sop_litbang', [
        'jenis' => $this->input->post('jenis'),
        'judul' => $this->input->post('judul'),
        'file'  => $file
      ], ['id_sop' => $id_sop]);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            SOP/dasar hukum berhasil diedit!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('litbang/sop_litbang');
    }
		$data = $this->db->get_where('sop_litbang', [
      'id_sop' => $id_sop
    ])->row_array();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/editSopLitbang', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function hapus($id_sop)
  {
    $data = $this->db->get_where('sop_litbang', ['id_sop' => $id_sop])->row_array();
    unlink('./assets/documents/elitbang/soplitbang/' . $data['file']);
    $this->db->delete('sop_litbang', ['id_sop'  => $id_sop]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          SOP/dasar hukum berhasil dihapus!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('litbang/sop_litbang');
  }
}
