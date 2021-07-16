<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BiodataPemohon extends CI_Controller {
  
	public function index()
	{
		$data['pemohon'] = $this->ModelBakesbangpol->getBiodataPemohon();
    for ($i=0; $i < count($data['pemohon']); $i++) {
      $key                                        = $data['pemohon'][$i];
      $data['pemohon'][$i]['proposalpenelitian']  = $this->db->get_where('proposalpenelitian', ['id_peneliti' => $key['id_peneliti']])->result_array();
    }
    // print_r($data['pemohon']);
    // die();
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('bakesbangpol/biodataPemohon', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function batal($id_user)
  {
    $this->ModelBakesbangpol->batalVerifikasiPermohonan($id_user);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Verifikasi akun & permohonan SKP peneliti berhasil dibatalkan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('bakesbangpol/biodata_pemohon');
  }

  public function verifikasi($id_user)
  {
    $this->ModelBakesbangpol->verifikasiPermohonan($id_user);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Verifikasi akun & permohonan SKP peneliti berhasil!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('bakesbangpol/biodata_pemohon');
  }

  public function kirimSkp($id_peneliti)
  {
    $this->ModelBakesbangpol->kirimSKP($id_peneliti);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          SKP berhasil dikirimkan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('bakesbangpol/biodata_pemohon');
  }

   public function tolakVerifikasi($idUser)
  {
    $this->ModelBakesbangpol->tolakVerifikasiPermohonan($idUser);
    $this->session->set_flashdata([
    'pesan' => ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Verifikasi Akun dan Permohonan SKP berhasil ditolak!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      ]);
    redirect('bakesbangpol/biodata_pemohon');
  }

  public function cetak()
  {
		$this->db->join('user', 'datapemohonskp.id_user = user.id_user');
		$this->db->join('verifikasi', 'datapemohonskp.id_peneliti = verifikasi.id_peneliti', 'left');
		$data['pemohon'] = $this->db->get('datapemohonskp')->result_array();
    for ($i=0; $i < count($data['pemohon']); $i++) {
      $key                                        = $data['pemohon'][$i];
      $data['pemohon'][$i]['proposalpenelitian']  = $this->db->get_where('proposalpenelitian', ['id_peneliti' => $key['id_peneliti']])->result_array();
    }
    $this->load->view('litbang/biodataPemohonPDF', $data);
  }
}
