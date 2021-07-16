<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	// E-Litbang
	public function index()
	{
		$this->db->order_by('id_berita', 'desc');
		$this->db->limit(3);
		$data['beritaartikel'] = $this->db->get('beritaartikel')->result_array();

		$this->db->order_by('id_foto', 'desc');
		$this->db->limit(6);
		$data['foto'] = $this->db->get('dokumentasifoto')->result_array();

		$this->load->view('templates/guest/e-litbang/navbar');
		$this->load->view('templates/guest/e-litbang/header');
		$this->load->view('guest/e-litbang/dashboard', $data);
		$this->load->view('templates/guest/e-litbang/footer');
	}

  // Tentang Kami
  public function profil()
  {
		$data = $this->ModelGuest->getProfile();
    $this->load->view('templates/guest/e-litbang/navbar');
    $this->load->view('guest/e-litbang/tentangkami/profil', $data);
    $this->load->view('templates/guest/e-litbang/footer');
  }

  public function alamatkontak()
  {
    if ($this->input->post()) {
      $this->ModelGuest->insertPertanyaan();
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Pesan sudah dikirim!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('Dashboard/alamatkontak');
    }
		$data = $this->ModelGuest->getAlamatKontak();
    $this->load->view('templates/guest/e-litbang/navbar');
    $this->load->view('guest/e-litbang/tentangkami/alamatkontak', $data);
    $this->load->view('templates/guest/e-litbang/footer');
  }
		// /Tentang Kami

		// Hasil Litbang
		public function opd()
		{
			$data['opd'] = $this->ModelGuest->getOPD();
			$this->load->view('templates/guest/e-litbang/navbar');
			$this->load->view('guest/e-litbang/hasillitbang/opd', $data);
			$this->load->view('templates/guest/e-litbang/footer');
		}
		// /Hasil Litbang

		public function bacaberita($id_berita)
		{
			$data = $this->db->get_where('beritaartikel', [
				'id_berita'		=> $id_berita
			])->row_array();
			$this->load->view('templates/guest/e-litbang/navbar');
			$this->load->view('guest/e-litbang/publikasi/bacaberita', $data);
			$this->load->view('templates/guest/e-litbang/footer');
		}

		public function beritadashboard($id_berita)
		{
			$data = $this->db->get_where('beritaartikel', [
				'id_berita'		=> $id_berita
			])->row_array();
			$this->load->view('templates/guest/e-litbang/navbar');
			$this->load->view('guest/e-litbang/publikasi/beritadashboard', $data);
			$this->load->view('templates/guest/e-litbang/footer');
		}

		// Dokumentasi Foto
		public function dokumentasifoto()
		{
			$data['foto'] = $this->ModelGuest->getDokumentasiFoto();
			$this->load->view('templates/guest/e-litbang/navbar');
			$this->load->view('guest/e-litbang/publikasi/dokumentasifoto', $data);
			$this->load->view('templates/guest/e-litbang/footer');
		}
		// /Dokumeentasi Foto

		// Dokumentasi Video
		public function dokumentasivideo()
		{
			$this->load->view('templates/guest/e-litbang/navbar');
			$this->load->view('guest/e-litbang/publikasi/dokumentasivideo');
			$this->load->view('templates/guest/e-litbang/footer');
		}
		// /Dokumentasi Video

	// /E-Litbang

	// SKP Online
	public function dashboardsrponline()
	{
		$this->db->select('datapemohonskp.*,user.status as status_login');
		$this->db->join('user', 'datapemohonskp.id_user = user.id_user');
		$data['pemohon'] = $this->db->get('datapemohonskp')->result_array();
		$this->load->view('templates/guest/srponline/navbar');
		$this->load->view('templates/guest/srponline/header');
		$this->load->view('guest/srponline/dashboard', $data);
		$this->load->view('templates/guest/srponline/footer');
	}

	public function pelayananSkpOnline()
	{
		$data['informasi']  = $this->db->get('informasi_skp')->result_array();
		$this->load->view('templates/guest/srponline/navbar');
		$this->load->view('templates/guest/srponline/header');
		$this->load->view('guest/srponline/pelayananSkpOnline', $data);
		$this->load->view('templates/guest/srponline/footer');
	}

	public function lacakpenelitian()
	{
		$this->db->order_by('id_peneliti', 'desc');
		$this->db->join('user', 'datapemohonskp.id_user = user.id_user');
		$this->db->where('user.status', 'bisa_login');
		$this->db->where('datapemohonskp.status', 'terverifikasi');
		$data['pemohon'] = $this->db->get('datapemohonskp')->result_array();
		$this->load->view('templates/guest/srponline/navbar');
		$this->load->view('guest/srponline/lacakpenelitian', $data);
		$this->load->view('templates/guest/srponline/footer');
	}

  public function rincianProgresPenelitian($id_peneliti)
  {
    $data['rincian']  =$this->db->get_where('progress', [
      'id_peneliti' => $id_peneliti
    ])->result_array();
		$this->load->view('templates/guest/srponline/navbar');
		$this->load->view('guest/srponline/rincianProgres', $data);
		$this->load->view('templates/guest/srponline/footer');
  }

  public function agendaKegiatan()
  {
    $data['agenda'] = $this->db->get('agendakegiatan')->result_array();
		$this->load->view('templates/guest/e-litbang/navbar');
		$this->load->view('guest/srponline/agendaKegiatan', $data);
		$this->load->view('templates/guest/e-litbang/footer');
  }

  public function sopLitbang()
  {
    $data['sop_litbang']  = $this->db->get('sop_litbang')->result_array();
		$this->load->view('templates/guest/e-litbang/navbar');
		$this->load->view('guest/e-litbang/publikasi/sopLitbang', $data);
		$this->load->view('templates/guest/e-litbang/footer');
  }
}

?>