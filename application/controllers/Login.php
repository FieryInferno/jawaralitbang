<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if ($this->input->post()) {
			$this->validation();
			if ($this->form_validation->run()) {
				$data	= $this->ModelLogin->login();
				if ($data == 'Akun belum diverifikasi' || $data == 'Username tidak ditemukan' || $data == 'Password salah') {
					$this->session->set_flashdata('error', $data);
				} else {
					$this->session->set_flashdata([
						'username'	=> $data['username'],
						'role'		  => $data['role'],
						'error'		  => $this->session->flashdata('error'),
            'id_user'   => $data['id_user']
					]);
					if ($data ['role'] == '4') {
						$peneliti = $this->db->get_where('datapemohonskp', ['id_user' => $data ['id_user']])->row_array();
						$this->session->set_userdata(['id_peneliti'	=> $peneliti ['id_peneliti']]);
					}
					switch ($this->session->role) {
						case 1:
							redirect('SKP/Admin/admin');
							break;
						case 2:
							redirect('litbang');
							break;
						case 3:
							redirect('bakesbangpol');
							break;
						case 4:
							redirect('SKP/Peneliti/peneliti');
							break;
						
						default:
							# code...
							break;
					}
				}
			} 
		}
		$this->load->view('templates/guest/srponline/login/navbar');
		$this->load->view('login');
	}

	public function logout()
	{
		$this->session->set_flashdata('logout', 'Anda berhasil logout');
		$this->session->sess_destroy();
		redirect('Login');

	}

	private function validation()
	{
		$this->form_validation->set_rules('username','Username','required',['required' => 'Username tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('password','Password','required',['required' => 'Password tidak boleh kosong!'
		]);
	}

  public function lupaPassword()
  {
    if ($this->input->post()) {
      $data = $this->ModelLogin->lupaPassword();
      if ($data) {
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Silakan cek email anda.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ');
      } else {
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Gagal!</strong> Email tidak terdaftar.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ');
      }
      redirect('lupa_password');
    }
    $this->load->view('templates/guest/srponline/login/navbar');
    $this->load->view('lupaPassword');
  }

  public function ubahPassword($token)
  {
    if ($this->input->post()) {
      $data = $this->db->get_where('datapemohonskp', [
        'token_lupa_password' => $this->input->post('token')
      ])->row_array();
      $this->db->update('user', ['password' => $this->input->post('password_baru')], ['id_user' => $data['id_user']]);
      $this->db->update('datapemohonskp', ['token_lupa_password'  => NULL], ['id_peneliti'  => $data['id_peneliti']]);
      redirect('login');
    }
    $data['token']  = $token;
    $this->load->view('templates/guest/srponline/login/navbar');
    $this->load->view('ubahPassword', $data);
  }
}