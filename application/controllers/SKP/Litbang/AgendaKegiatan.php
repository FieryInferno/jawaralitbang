<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgendaKegiatan extends CI_Controller {

	public function index()
	{
    if ($this->input->post()) {
      $this->ModelLitbang->insertAgendaKegiatan();
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Agenda berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('litbang/agenda_kegiatan');
    }
		$data['agendaKegiatan'] = $this->ModelLitbang->getAgendaKegiatan();
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/agendaKegiatan', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function edit($id_agenda)
  {
    if ($this->input->post()) {
      $this->ModelLitbang->updateAgendaKegiatan($id_agenda);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Agenda berhasil diedit!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('litbang/agenda_kegiatan');
    }
		$data = $this->db->getAgendaKegiatanById($id_agenda);
		$this->load->view('templates/litbang/header');
		$this->load->view('templates/litbang/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('litbang/editAgendaKegiatan', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function hapus($id_agenda)
  {
    $this->ModelLitbang->hapusAgendaKegiatan($id_agenda);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Agenda berhasil dihapus!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('litbang/agenda_kegiatan');
  }
}
