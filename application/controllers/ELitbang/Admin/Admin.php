<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role') !='1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			 Anda belum login!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('login');
		}
	}

	// OPD
	public function opd()
	{
		if ($this->input->post()) {
			$this->db->insert('opd', [
			'namapenelitiopd'			=> $this->input->post('namapenelitiopd'),
			'asalopd'					=> $this->input->post('asalopd'),
			'judulpenelitianopd'		=> $this->input->post('judulpenelitianopd')
			]);

			$this->session->set_flashdata([
				'alert'	=> 'Berhasil memasukkan penelitian oleh OPD'
			]);
			redirect('ELitbang/Admin/Admin/opd');
		}

		$data['opd'] = $this->db->get('opd')->result_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/opd', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

	public function editOpd($id_peneliti_opd)
	{
    $this->db->update('opd', [
    'namapenelitiopd'     => $this->input->post('namapenelitiopd'),
    'asalopd'					    => $this->input->post('asalopd'),
    'judulpenelitianopd'	=> $this->input->post('judulpenelitianopd')
    ], ['id_penelitiopd' => $id_peneliti_opd]);
    $this->session->set_flashdata('pesan','
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Berhasil Edit OPD
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect('admin/opd');
	}

	public function hapusopd ($id){

		$where = array('id_penelitiopd' => $id);
		$this->ModelLitbang->hapusOPD($where, 'opd');
		redirect('ELitbang/Admin/Admin/opd');
	}
	// / OPD

	public function beritaartikel()
	{
		$data['beritaartikel'] = $this->db->get('beritaartikel')->result_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/beritaartikel', $data);
		$this->load->view('templates/admin/srponline/footer');	
	}

	public function editberitaartikel($id_berita)
	{
		if ($this->input->post()) {
			$foto	= $_FILES['thumbnailberita']['name'];
			if ($foto = ''){} else{
				$config ['upload_path']	= './assets/img/elitbang/thumbnailberita';
				$config ['allowed_types'] = 'jpg|jpeg|png|gif';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('thumbnailberita')) {
					echo $this->upload->display_errors();
					die();
					echo "Gambar gagal diunggah!";	
				}else {
					$foto = $this->upload->data('file_name');
				}
			}
			$this->db->where('id_berita', $id_berita);
			$this->db->update('beritaartikel', [
				'judulberita'		=> $this->input->post('judulberita'),
				'thumbnailberita'	=> $foto,
				'headlineberita'	=> $this->input->post('headlineberita'),
        'isiberita'			=> $this->input->post('isiberita')
      ]);

			$this->session->set_flashdata([
				'alert'	=> 'Berhasil Edit Berita'
			]);
			redirect('ELitbang/Admin/Admin/beritaartikel');
		}
		$data = $this->db->get_where('beritaartikel', [
			'id_berita'		=> $id_berita
		])->row_array();

		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/editberitaartikel', $data);
		$this->load->view('templates/admin/srponline/footer');	
	}

	public function kelolaberitaartikel()
	{
		if ($this->input->post()) {
			$this->ModelBeritaArtikel->tambahberita();
			redirect('ELitbang/Admin/Admin/beritaartikel');
		}
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/kelolaberitaartikel');
		$this->load->view('templates/admin/srponline/footer');	
	}

	public function hapusberitaartikel ($id){

		$where = array('id_berita' => $id);
		$this->GeneralModel->hapusdata($where, 'beritaartikel');
		redirect('ELitbang/Admin/Admin/beritaartikel');
	}

	public function kelolafoto()
	{
		if ($this->input->post()) {
			$foto	= $_FILES['foto']['name'];
			if ($foto = ''){} else{
				$config ['upload_path']	= './assets/img/elitbang/dokumentasifoto';
				$config ['allowed_types'] = 'jpg|jpeg|png|gif';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$this->session->set_flashdata([
						'alert'	=> 'Foto belum diunggah'
					]);
					redirect('ELitbang/Admin/Admin/kelolafoto');
				}else {
					$foto = $this->upload->data('file_name');
				}
			}
			$this->db->insert('dokumentasifoto', [
				'judulfoto'				=> $this->input->post('judulfoto'),
		        'foto'					=> $foto,
		        'keteranganfoto'		=> $this->input->post('keteranganfoto')
	      ]);

			$this->session->set_flashdata([
				'alert'	=> 'Gambar berhasil diunggah.'
			]);
		}

		$data['foto'] = $this->db->get('dokumentasifoto')->result_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/kelolafoto', $data);
		$this->load->view('templates/admin/srponline/footer');	
	}

	public function hapusfoto ($id){
		$where = array('id_foto' => $id);
		$this->GeneralModel->hapusdata($where, 'dokumentasifoto');
		redirect('ELitbang/Admin/Admin/kelolafoto');
	}

	public function editfoto($id_foto)
	{
		if ($this->input->post()) {
			$foto	= $_FILES['foto']['name'];
			if ($foto == ''){
				$foto = $this->input->post('fotolama');
			} else{
				$config ['upload_path']	= './assets/img/elitbang/dokumentasifoto';
				$config ['allowed_types'] = 'jpg|jpeg|png|gif';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					echo $this->upload->display_errors();
					die();
					echo "Gambar gagal diunggah!";	
				}else {
					$foto = $this->upload->data('file_name');
				}
			}
			$this->db->where('id_foto', $id_foto);
			$this->db->update('dokumentasifoto', [
				'judulfoto'				=> $this->input->post('judulfoto'),
		        'foto'					=> $foto,
		        'keteranganfoto'		=> $this->input->post('keteranganfoto')
	      ]);

			$this->session->set_flashdata([
				'alert'	=> 'Gambar berhasil diunggah.'
			]);
			redirect('ELitbang/Admin/Admin/kelolafoto');
		}
		$data = $this->db->get_where('dokumentasifoto', [
			'id_foto'		=> $id_foto
		])->row_array();

		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/editfoto', $data);
		$this->load->view('templates/admin/srponline/footer');
	}

  public function agendaKegiatan()
  {
    if ($this->input->post()) {
      $this->db->insert('agendakegiatan', [
        'tanggalkegiatan'     => $this->input->post('tanggal_kegiatan'),
        'namakegiatan'        => $this->input->post('nama_kegiatan'),
        'keterangankegiatan'  => $this->input->post('keterangan_kegiatan')
      ]);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Berhasil tambah agenda
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('admin/agenda_kegiatan');
    }
		$data['agendaKegiatan'] = $this->db->get('agendaKegiatan')->result_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/agendaKegiatan', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function editAgendaKegiatan($id_agenda)
  {
    if ($this->input->post()) {
      $this->db->update('agendakegiatan', [
        'tanggalkegiatan'     => $this->input->post('tanggal_kegiatan'),
        'namakegiatan'        => $this->input->post('nama_kegiatan'),
        'keterangankegiatan'  => $this->input->post('keterangan_kegiatan')
      ], ['id_agenda' => $id_agenda]);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Berhasil edit agenda
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('admin/agenda_kegiatan');
    }
		$data = $this->db->get_where('agendaKegiatan', [
      'id_agenda' => $id_agenda
    ])->row_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/editAgendaKegiatan', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function hapusAgendaKegiatan($id_agenda)
  {
    $this->db->delete('agendakegiatan', ['id_agenda'  => $id_agenda]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Berhasil hapus agenda
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('admin/agenda_kegiatan');
  }

  public function sopLitbang()
  {
    if ($this->input->post()) {
      $config ['upload_path']   = './assets';
      $config ['allowed_types'] = 'pdf';
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
            Berhasil tambah data
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('admin/sop_litbang');
    }
		$data['sop']  = $this->db->get('sop_litbang')->result_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/sopLitbang', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function editSopLitbang($id_sop)
  {
    if ($this->input->post()) {
      $data = $this->db->get_where('sop_litbang', ['id_sop' => $id_sop])->row_array();
      if ($_FILES['file']['name'] == '') {
        $file = $data['file'];
      } else {
        $config ['upload_path']   = './assets';
        $config ['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
          echo $this->upload->display_errors();
          die();
        }else {
          $file = $this->upload->data('file_name');
        }
        if (file_exists('assets/' . $data['file'])) unlink('assets/' . $data['file']);
        
      }
      $this->db->update('sop_litbang', [
        'jenis' => $this->input->post('jenis'),
        'judul' => $this->input->post('judul'),
        'file'  => $file
      ], ['id_sop' => $id_sop]);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Berhasil edit SOP Litbang
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('admin/sop_litbang');
    }
		$data = $this->db->get_where('sop_litbang', [
      'id_sop' => $id_sop
    ])->row_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/editSopLitbang', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function hapusSopLitbang($id_sop)
  {
    $data = $this->db->get_where('sop_litbang', ['id_sop' => $id_sop])->row_array();
    if (file_exists('assets/' . $data['file'])) unlink('assets/' . $data['file']);
    $this->db->delete('sop_litbang', ['id_sop'  => $id_sop]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Berhasil hapus SOP Litbang
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('admin/sop_litbang');
  }

  public function pertanyaan()
  {
		$data['pertanyaan'] = $this->db->get('pertanyaan')->result_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/pertanyaan', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function hapusPertanyaan($id_pertanyaan)
  {
    $this->db->delete('pertanyaan', ['id_pertanyaan'  => $id_pertanyaan]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Berhasil hapus pertanyaan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('admin/pertanyaan');
  }

  public function jawabPertanyaan()
  {
    $data = $this->db->get_where('pertanyaan', ['id_pertanyaan' => $this->input->post('id_pertanyaan')])->row_array();
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
    $this->email->to($data['email']);
    $this->email->subject('Jawaban Pertanyaan');
    $this->email->message($this->input->post('jawaban'));
    $this->email->send();
    $this->db->update('pertanyaan', ['status'  => '1'], ['id_pertanyaan'  => $this->input->post('id_pertanyaan')]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Berhasil jawab pertanyaan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('admin/pertanyaan');
  }

  public function verifikasiDokumenPenelitian($id_dokumen)
  {
    $this->db->update('dokumenhasilpenelitian', ['status_dokumen' => 'terverifikasi'], ['id_dokumen'  => $id_dokumen]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Dokumen Berhasil Diverifikasi
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('SKP/Admin/Admin/keloladokpenelitian');
  }

  public function batalVerifikasiDokumenPenelitian($id_dokumen)
  {
    $this->db->update('dokumenhasilpenelitian', ['status_dokumen' => 'belum_diverifikasi'], ['id_dokumen'  => $id_dokumen]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Verifikasi Dokumen Berhasil Dibatalkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('SKP/Admin/Admin/keloladokpenelitian');
  }

  public function hapusVerifikasiDokumenPenelitian($id_dokumen)
  {
   
    $this->db->update('dokumenhasilpenelitian', [
      'status_dokumen'  => 'ditolak',
      'komentar'        => $this->input->post('komentar')
    ], ['id_dokumen'  => $id_dokumen]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Dokumen Berhasil Ditolak
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('SKP/Admin/Admin/keloladokpenelitian');
  }

  public function apaItu()
  {
    if ($this->input->post()) {
      $this->db->update('informasi_skp', ['isi' => $this->input->post('isi')], ['jenis' => 'apa_itu']);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Informasi Berhasil Diedit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('admin/skp/apa_itu');
    }
		$data = $this->db->get_where('informasi_skp', ['jenis'  => 'apa_itu'])->row_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/apaItu', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function untukApa()
  {
    if ($this->input->post()) {
      $this->db->update('informasi_skp', ['isi' => $this->input->post('isi')], ['jenis' => 'untuk_apa']);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Informasi Berhasil Diedit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('admin/skp/untuk_apa');
    }
		$data = $this->db->get_where('informasi_skp', ['jenis'  => 'untuk_apa'])->row_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/untukApa', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function alurPermohonan()
  {
    if ($this->input->post()) {
      if ($_FILES['isi']['name'] == '') {
        $file = $this->input->post('isi_lama');
      } else {
        $config ['upload_path']   = './assets';
        $config ['allowed_types'] = 'jpg|png|jpeg';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('isi')) {
          $this->session->set_flashdata([
            'pesan'	=> ' 
              <div class="alert alert-danger p-b-32 text-center alert-dismissible fade show">
                Gagal upload foto
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>'
          ]);
          redirect('admin/skp/alur_permohonan');
        }else {
          $file = $this->upload->data('file_name');
        }

        if (file_exists('assets/' . $this->input->post('isi_lama'))) unlink('assets/' . $this->input->post('isi_lama'));
      }

      $this->db->update('informasi_skp', ['isi' => $file], ['jenis' => 'alur_permohonan']);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Informasi Berhasil Diedit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('admin/skp/alur_permohonan');
    }
		$data = $this->db->get_where('informasi_skp', ['jenis'  => 'alur_permohonan'])->row_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/alurPermohonan', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function akunOperator()
  {
    if ($this->input->post()) {
      $id_user  = uniqid();
      $this->db->insert('user', [
        'id_user'   => $id_user,
        'username'  => $this->input->post('username'),
        'password'  => $this->input->post('password'),
        'role'      => $this->input->post('role'),
        'status'    => 'bisa_login'
      ]);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Berhasil Tambah Akun Operator
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('admin/akun_operator');
    }
    $this->db->where('role', '2');
    $this->db->or_where('role', '3');
    $this->db->or_where('role', '1');
		$data['akun'] = $this->db->get('user')->result_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/akunOperator', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function editAkunOperator($id_user)
  {
    if ($this->input->post()) {
      $this->db->update('user', [
        'username'  => $this->input->post('username'),
        'password'  => $this->input->post('password'),
        'role'      => $this->input->post('role')
      ], ['id_user' => $id_user]);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Berhasil Edit Akun Operator
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('admin/akun_operator');
    }
		$data = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/editAkunOperator', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function hapusAkunOperator($id_user)
  {
    $this->db->delete('user', ['id_user'  => $id_user]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Berhasil hapus user
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('admin/akun_operator');
  }

  public function profile()
  {
		$data = $this->db->get_where('profil')->row_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/profile', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function alamatKontak()
  {
    if ($this->input->post()) {
      $this->db->update('alamatkontak', [
        'alamatkantor'  => $this->input->post('alamatkantor'),
        'nomorkantor'   => $this->input->post('nomorkantor'),
        'emailkantor'   => $this->input->post('emailkantor'),
        'jamkerja'      => $this->input->post('jamkerja'),
      ]);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Alamat kontak Berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('admin/alamat_kontak');
    }
		$data = $this->db->get_where('alamatkontak')->row_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/alamatKontak', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function editProfile()
  {
    if ($this->input->post()) {
      if ($_FILES['fotoheader']['name'] == '') {
        $file = $this->input->post('fotoheader_lama');
      } else {
        $config ['upload_path']   = './assets';
        $config ['allowed_types'] = 'jpg|png|jpeg';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('fotoheader')) {
          echo $this->upload->display_errors();
          die();
        }else {
          $file = $this->upload->data('file_name');
        }
        if (file_exists('assets/' . $this->input->post('fotoheader_lama'))) unlink('assets/' . $this->input->post('fotoheader_lama'));
      }
      
      $this->db->update('profil', [
        'fotoheader'  => $file,
        'judul'       => $this->input->post('judul'),
        'isi'         => $this->input->post('isi')
      ]);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Profile Berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('admin/profile');
    }
		$data = $this->db->get('profil')->row_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/editProfile', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function bidangPenelitian()
  {
    if ($this->input->post()) {
      $this->db->insert('bidang_penelitian', ['bidang_penelitian' => $this->input->post('bidang_penelitian')]);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Berhasi tambah bidang peneltian
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('admin/bidang_penelitian');
    }
		$data['bidang_penelitian'] = $this->db->get('bidang_penelitian')->result_array();
		$this->load->view('templates/admin/srponline/header');
		$this->load->view('templates/admin/srponline/sidebar');
		$this->load->view('templates/admin/srponline/navbar');
		$this->load->view('admin/e-litbang/bidangPenelitian', $data);
		$this->load->view('templates/admin/srponline/footer');
  }

  public function editBidangPenelitian($id_bidang_penelitian)
  {
    $this->db->update('bidang_penelitian', ['bidang_penelitian' => $this->input->post('bidang_penelitian')], ['id_bidang_penelitian'  => $id_bidang_penelitian]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Berhasi edit bidang peneltian
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('admin/bidang_penelitian');
  }

  public function hapusBidangPenelitian($id_bidang_penelitian)
  {
    $this->db->delete('bidang_penelitian', ['id_bidang_penelitian' => $id_bidang_penelitian]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Berhasi hapus bidang penelitian
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('admin/bidang_penelitian');
  }
}