<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelGuest extends CI_Model
{
  
  public function permohonanSKP()
  {
    $this->form_validation->set_rules(
      'username', 'username',
      'required|is_unique[user.username]',
      array(
        'required'		=> 'Username harus diisi.',
        'is_unique'		=> 'Username telah dipakai.'
      )
    );
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]', [
      'matches'			=> 'Password tidak sesuai.'
    ]);
    if ($this->input->post('bidangpenelitian') == NULL) {
      $this->session->set_flashdata([
        'alert'	=> ' <div class="alert alert-danger p-b-32 text-center alert-dismissible fade show">
          Bidang penelitian tidak boleh kosong!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
          </div>'
      ]);
      redirect('SKP/Guest/PermohonanSKP');
    }
    $this->form_validation->set_rules('bidangpenelitian', 'Bidang Penelitian', 'required');
    if ($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata([
        'alert'	=> ' <div class="alert alert-danger p-b-32 text-center alert-dismissible fade show">
        '. validation_errors().'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>'
      ]);
    } else {
      $idUser = uniqid();

      $id_peneliti = uniqid();
      $data = $this->db->insert('datapemohonskp', [
        'id_peneliti'               => $id_peneliti,
        'id_user'                   => $idUser,
        'namalengkap'			          => $this->input->post('namalengkap'),
        'alamatpeneliti'          	=> $this->input->post('alamatpeneliti'),
        'tempatlahir'			          => $this->input->post('tempatlahir'),
        'tanggallahir'		          => $this->input->post('tanggallahir'),
        'nomorhp'					          => $this->input->post('nomorhp'),
        'email'						          => $this->input->post('email'),
        'instansipeneliti'				  => $this->input->post('instansipeneliti'),
        'judulpenelitian'				    => $this->input->post('judulpenelitian'),
        'bidangpenelitian'				  => $this->input->post('bidangpenelitian'),
        'tujuanpenelitian'				  => $this->input->post('tujuanpenelitian'),
        'lokasipenelitian'				  => $this->input->post('lokasipenelitian'),
        'tanggalmulaipenelitian'		=> $this->input->post('tanggalmulaipenelitian'),
        'tanggalselesaipenelitian'	=> $this->input->post('tanggalselesaipenelitian'),
        'pjpenelitian'					    => $this->input->post('pjpenelitian'),
        'anggotapenelitian'				  => $this->input->post('anggotapenelitian'),
        'scanktp'						        => upload('scanktp'),
        'foto'							        => upload('foto')
      ]);
      
      $this->db->insert('user', [
        'id_user'   => $idUser,
        'username'  => $this->input->post('username'),
        'password'  => $this->input->post('password'),
        'role'      => '4'
      ]);
      
      // print_r(count($_FILES['proposalpenelitian']));
      // die();
      $count = count($_FILES['proposalpenelitian']);
  
      for($i = 0; $i < $count; $i++){
        if(!empty($_FILES['proposalpenelitian']['name'][$i])){
          $_FILES['file']['name']     = $_FILES['proposalpenelitian']['name'][$i];
          $_FILES['file']['type']     = $_FILES['proposalpenelitian']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['proposalpenelitian']['tmp_name'][$i];
          $_FILES['file']['error']    = $_FILES['proposalpenelitian']['error'][$i];
          $_FILES['file']['size']     = $_FILES['proposalpenelitian']['size'][$i];
  
          $config['upload_path']    = './assets/documents/skp/proposalpenelitian'; 
          $config['allowed_types']  = 'pdf';
          $config['file_name']      = $_FILES['proposalpenelitian']['name'][$i];

          $this->upload->initialize($config);
    
          if($this->upload->do_upload('file')){
            $this->db->insert('proposalpenelitian', [
              'id_peneliti' => $id_peneliti,
              'file'        => $this->upload->data('file_name')
            ]);
          }
        }
      }

      $this->session->set_flashdata([
        'alert'	=> ' <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
        Terima kasih! Data Anda telah dikirimkan! Informasi verifikasi akun akan ditampilkan di beranda SKP Online.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
          </div>'
      ]);
      redirect('SKP/Guest/PermohonanSKP');
    }
  }

  public function getBeritaArtikel()
  {
    $config['base_url']         = base_url() . 'berita_artikel/index';
    $config['per_page']         = 3;
    $from                       = $this->uri->segment(3);
    $data                       = $this->ModelBeritaArtikel->getAll();
    $config['total_rows']       = count($data);
    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';
    $config['reuse_query_string'] = TRUE;
    $this->pagination->initialize($config);
    return array_slice($data, $from, $config['per_page']);	
  }

  public function getProfile()
  {
    return $this->db->get('profil')->row_array();
  }

  public function insertPertanyaan()
  {
    $this->db->insert('pertanyaan', [
      'nama'    => $this->input->post('nama'),
      'no_hape' => $this->input->post('no_hape'),
      'email'   => $this->input->post('email'),
      'pesan'   => $this->input->post('pesan'),
    ]);
  }

  public function getAlamatKontak()
  {
    return $this->db->get_where('alamatkontak')->row_array();
  }

  public function getOPD()
  {
    return $this->db->get('opd')->result_array();
  }

  public function getDokumentasiFoto()
  {
    return $this->db->get('dokumentasifoto')->result_array();
  }
}
