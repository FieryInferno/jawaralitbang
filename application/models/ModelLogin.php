<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLogin extends CI_Model {

	public function login()
	{
    $data	= $this->db->get_where('user', [
      'username'	=> $this->input->post('username')
    ])->row_array();
    if ($data) {
      $data	= $this->db->get_where('user', [
        'username'	=> $this->input->post('username'),
        'password'	=> $this->input->post('password')
      ])->row_array();
      if ($data) {
        switch ($data['status']) {
          case 'bisa_login':
            return $data;
            break;
          case 'tidak_bisa_login':
            return 'Akun belum diverifikasi';
            break;
          
          default:
            # code...
            break;
        }
      } else {
        return 'Password salah';
      }
    } else {
      return 'Username tidak ditemukan';
    }
  }

  public function lupaPassword()
  {
    $data = $this->db->get_where('datapemohonskp', [
      'email' => $this->input->post('email')
    ])->row_array();
    if ($data) {
      $token  = uniqid();
      $this->db->update('datapemohonskp', ['token_lupa_password'  => $token], ['email'  => $this->input->post('email')]);
      $config = [
        'mailtype'  	=> 'html',
        'charset'   	=> 'utf-8',
        'protocol'  	=> 'smtp',
        'smtp_host' 	=> 'smtp.gmail.com',
        'smtp_user'		=> 'fieryinferno33@gmail.com',  // Email gmail
        'smtp_pass'   => 'NaonWeAh00',  // Password gmail
        'smtp_crypto'	=> 'ssl',
        'smtp_port'   => 465,
        'crlf'    		=> "\r\n", 
        'newline' 		=> "\r\n"
      ];
      $this->load->library('email', $config);
      $this->email->initialize($config);
      $this->email->from('fieryinferno33@gmail.com', 'JAWARALITBANG');
      $this->email->to($this->input->post('email'));
      $this->email->subject('Link Lupa Password');
      $this->email->message(base_url() . 'ubah_password/' . $token);
      $this->email->send();
      return TRUE;
    } else {
      return FALSE;
    }
  }
}