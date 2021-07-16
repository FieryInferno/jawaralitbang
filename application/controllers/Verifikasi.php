<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {
  
	public function index($token)
	{
    if ($this->input->post()) {
      $config ['upload_path']	  = './assets/img/';
      $config ['allowed_types'] = 'jpg|jpeg|png|gif';
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('foto')) {
        echo $this->upload->display_errors();
        die();	
      }else {
        $foto = $this->upload->data('file_name');
      }
      $this->db->update('datapemohonskp', [
        'status'          => 'terverifikasi',
        'foto_verifikasi' => $foto
      ], ['token' => $this->input->post('token')]);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Akun sudah diverifikasi.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('verifikasi/' . $token);
    }
    $data['token']  = $token;
		$this->load->view('templates/guest/srponline/verifikasi');
		$this->load->view('verifikasi', $data);
	}
}
