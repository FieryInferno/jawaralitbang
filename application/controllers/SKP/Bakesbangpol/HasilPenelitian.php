<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilPenelitian extends CI_Controller {
  
	public function index()
	{
		$data['dokumenhasilpenelitian'] = $this->ModelBakesbangpol->getHasilPenelitian();
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('bakesbangpol/hasilPenelitian', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function verifikasiDokumenPenelitian($id_dokumen)
  {
    $this->ModelBakesbangpol->verifikasiDokumenPenelitian($id_dokumen);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Dokumen berhasil diverifikasi!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('bakesbangpol/hasil_penelitian');
  }

  public function batalVerifikasiDokumenPenelitian($id_dokumen)
  {
    $this->ModelBakesbangpol->batalVerifikasiDokumenPenelitian($id_dokumen);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Verifikasi dokumen berhasil dibatalkan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('bakesbangpol/hasil_penelitian');
  }

  public function hapus($id_dokumen)
  {
    $this->ModelBakesbangpol->hapusDokumenPenelitian($id_dokumen);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Dokumen berhasil ditolak!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('bakesbangpol/hasil_penelitian');
  }

  public function lacak()
  {
		$data['peneliti'] = $this->ModelBakesbangpol->getPenelitiTerverifikasi();
    for ($i=0; $i < count($data['peneliti']); $i++) {
      $key      = $data['peneliti'][$i];
      $this->db->select_max('tanggal');
      $progress = $this->db->get_where('progress', ['id_peneliti' => $key['id_peneliti']])->row_array();
      $progress ? $data['peneliti'][$i]['tanggal_progress'] = $progress['tanggal'] : $data['peneliti'][$i]['tanggal_progress'] = '' ;
    }
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('bakesbangpol/lacakPenelitian', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function kirimNotifikasi($id_peneliti)
  {
    $this->ModelBakesbangpol->kirimNotifikasi($id_peneliti);

    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Notifikasi berhasil dikirimkan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('bakesbangpol/lacak_penelitian');
  }

  public function rincianProgresPenelitian($id_peneliti)
  {
    $data['rincian']  = $this->ModelBakesbangpol->rincianProgresPenelitian($id_peneliti);
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('bakesbangpol/rincianPenelitian', $data);
		$this->load->view('templates/admin/srponline/footer');
  }
}
