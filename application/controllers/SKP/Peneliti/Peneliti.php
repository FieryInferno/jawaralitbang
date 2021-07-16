<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peneliti extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/peneliti/srponline/header');
		$this->load->view('templates/peneliti/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('peneliti/srponline/dashboard');
		$this->load->view('templates/peneliti/srponline/footer');
	}

	public function unggahdokumen()
	{
			if ($_FILES) {
				// print"<pre>";
				// print_r($_FILES);
				$this->ModelPeneliti->unggahDokumen();
				$this->session->set_flashdata([
	        'alert'	=> ' <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
	              Dokumen berhasil dikirimkan!
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	              </button>
	                </div>'
				]);
			
			redirect('SKP/Peneliti/Peneliti/unggahdokumen');
		}
    $data['dokumen']  = $this->db->get_where('dokumenhasilpenelitian', ['id_peneliti' => $this->session->id_peneliti])->result_array();
		$this->load->view('templates/peneliti/srponline/header');
		$this->load->view('templates/peneliti/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('peneliti/srponline/unggahdokumen', $data);
		$this->load->view('templates/peneliti/srponline/footer');
	}

	public function verifikasi()
	{
    $token  = uniqid();
		if ($this->input->post()) {
			$this->db->insert('verifikasi', [
				'id_peneliti'			      => $this->session->id_peneliti,
				'namapihakberwajib'		  => $this->input->post('namapihakberwajib'),
				'jabatanpihakberwajib'  => $this->input->post('jabatanpihakberwajib'),
				'emailpihakberwajib'	  => $this->input->post('emailpihakberwajib'),
        'token'                 => $token
			]);
			$this->db->update('datapemohonskp', ['token'  => $token], ['id_peneliti'  => $this->session->id_peneliti]);

			$config = [
				'mailtype'  	=> 'html',
				'charset'   	=> 'utf-8',
				'protocol'  	=> 'smtp',
				'smtp_host' 	=> 'smtp.gmail.com',
				'smtp_user'		=> 'fieryinferno33@gmail.com',  // Email gmail
				'smtp_pass'   	=> 'NaonWeAh00',  // Password gmail
				'smtp_crypto'	=> 'ssl',
				'smtp_port'   	=> 465,
				'crlf'    		=> "\r\n", 
				'newline' 		=> "\r\n"
			];

			$this->load->library('email', $config);
			$this->email->initialize($config);
			$this->email->from('fieryinferno33@gmail.com', 'JAWARALITBANG');
			$this->email->to($this->input->post('emailpihakberwajib'));
			$this->email->subject('Kode Verifikasi Penelitian');
			$this->email->message(base_url() . 'verifikasi/' . $token);
			$this->email->send();
			$this->session->set_flashdata([
        'alert'	=> ' <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
              Link verifikasi berhasil dikirimkan!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
                </div>'
			]);
			redirect('SKP/Peneliti/Peneliti/verifikasi');
		}
		$this->load->view('templates/peneliti/srponline/header');
		$this->load->view('templates/peneliti/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('peneliti/srponline/verifikasi');
		$this->load->view('templates/peneliti/srponline/footer');
	}

	public function verifikasi2()
	{
		$data= $this->db->get_where('datapemohonskp', [
			'id_peneliti'		=> $this->session->id_peneliti,
		])->row_array();

		if ($data ['token'] == $this->input->post('token')) {
			$this->db->where('id_peneliti', $this->session->id_peneliti);
			$this->db->update('datapemohonskp', [
				'status'	=> 'terverifikasi'
			]);
			$this->session->set_flashdata([
				'alert'	=> ' <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
							Penelitian telah terverifikasi!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
							 </div>'
			]);
			redirect('SKP/Peneliti/Peneliti');
		}
	}

	public function datapribadi()
	{
		$this->db->join('user', 'datapemohonskp.id_user = user.id_user');
		$this->db->join('bidang_penelitian', 'datapemohonskp.bidangpenelitian = bidang_penelitian.id_bidang_penelitian');
    $this->db->select('datapemohonskp.*, user.*, bidang_penelitian.bidang_penelitian');
		$data['pemohon'] = $this->db->get_where('datapemohonskp', [
			'id_peneliti'	=> $this->session->id_peneliti
		])->result_array();
    for ($i=0; $i < count($data['pemohon']); $i++) {
      $key                                        = $data['pemohon'][$i];
      $data['pemohon'][$i]['proposalpenelitian']  = $this->db->get_where('proposalpenelitian', ['id_peneliti' => $key['id_peneliti']])->result_array();
    }
		$this->load->view('templates/peneliti/srponline/header');
		$this->load->view('templates/peneliti/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('peneliti/srponline/datapribadi', $data);
		$this->load->view('templates/peneliti/srponline/footer');
	}

	public function editdatapribadi($id_peneliti)
	{
    if ($this->input->post()) {
      if ($_FILES['proposalpenelitian']['name'][0] !== '') {
        $proposalpenelitian = $this->db->get_where('proposalpenelitian', ['id_peneliti' => $id_peneliti])->result_array();
        if ($proposalpenelitian) {
          foreach ($proposalpenelitian as $key) {
            file_exists('./assets/documents/skp/proposalpenelitian/' . $key['file']) ? unlink('./assets/documents/skp/proposalpenelitian/' . $key['file']) : '' ;
          }
        }

        $this->db->delete('proposalpenelitian', ['id_peneliti'  => $id_peneliti]);

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
      }
      
      if ($_FILES['scanktp']['name'] !== '') {
        $scanktp = upload('scanktp');
        file_exists('./assets/img/skp/scanktp/' . $this->input->post('scanktp_lama')) ? unlink('./assets/img/skp/scanktp/' . $this->input->post('scanktp_lama')) : '' ;
      } else {
        $scanktp = $this->input->post('scanktp_lama');
      }
      
      if ($_FILES['foto']['name'] !== '') {
        $foto = upload('foto');
        file_exists('./assets/img/skp/foto/' . $this->input->post('foto_lama')) ? unlink('./assets/img/skp/foto/' . $this->input->post('foto_lama')) : '' ;
      } else {
        $foto = $this->input->post('foto_lama');
      }

      $data = $this->db->update('datapemohonskp', [
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
        'scanktp'						        => $scanktp,
        'foto'							        => $foto
      ], ['id_peneliti' => $id_peneliti]);
      
			$this->session->set_flashdata([
				'alert'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Data pribadi berhasil diedit!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
			]);
			redirect('peneliti/data_pribadi');
    }
		$this->db->join('user', 'datapemohonskp.id_user = user.id_user');
		$data = $this->db->get_where('datapemohonskp', ['datapemohonskp.id_peneliti'	=> $this->session->id_peneliti])->row_array();
    $data['bidang_penelitian'] = $this->db->get('bidang_penelitian')->result_array();
		$this->load->view('templates/peneliti/srponline/header');
		$this->load->view('templates/peneliti/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('peneliti/srponline/editdatapribadi', $data);
		$this->load->view('templates/peneliti/srponline/footer');
	}

	public function terimaskp()
	{
    $data = $this->ModelPeneliti->getSKP();
		$this->load->view('templates/peneliti/srponline/header');
		$this->load->view('templates/peneliti/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('peneliti/srponline/terimaskp', $data);
		$this->load->view('templates/peneliti/srponline/footer');
	}

  public function lihatSkp($id_skp)
  {
    $data['skp']  = $this->db->get_where('skp', ['id_skp' => $id_skp])->row_array();

    $this->db->join('bidang_penelitian', 'datapemohonskp.bidangpenelitian = bidang_penelitian.id_bidang_penelitian');
    $data['data_pemohon'] = $this->db->get_where('datapemohonskp', ['skp' => $id_skp])->row_array();

    $data['surat']  = $this->db->get('surat_skp')->row_array();
    $this->load->view('skp', $data);
  }

  public function updateProgress()
  {
    $this->ModelPeneliti->updateProgress();

    $data               = $this->db->get_where('datapemohonskp', ['id_peneliti' => $this->session->id_peneliti])->row_array();  
    $data['progres']    = $this->db->get_where('progress', ['id_peneliti' => $this->session->id_peneliti])->result_array();

    $this->db->select_max('persentase_penelitian');
    $persentase         = $this->db->get_where('progress', ['id_peneliti' => $this->session->id_peneliti])->row_array();
    $data['persentase'] = $persentase['persentase_penelitian'];
		$this->load->view('templates/peneliti/srponline/header');
		$this->load->view('templates/peneliti/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('peneliti/srponline/updateProgress', $data);
		$this->load->view('templates/peneliti/srponline/footer');
  }

  public function editUpdateProgress($id_progress)
  {
  	$this->ModelPeneliti->editupdateProgress($id_progress);
    $data = $this->db->get_where('progress', [
      'id_progress' => $id_progress
    ])->row_array();
		$this->load->view('templates/peneliti/srponline/header');
		$this->load->view('templates/peneliti/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('peneliti/srponline/editUpdateProgress', $data);
		$this->load->view('templates/peneliti/srponline/footer');
  }

  public function hapusUpdateProgress($id_progress)
  {
  	$this->ModelPeneliti->hapusProgress($id_progress);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Progres berhasil dihapus!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('peneliti/update_progress');
  }

  public function selesaiUpdateProgress()
  {
    $this->db->update('datapemohonskp', ['status_penelitian'  => 'selesai'], ['id_peneliti' => $this->session->id_peneliti]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Status penelitian berhasil diubah! Selamat atas selesainya penelitian Anda!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('peneliti/update_progress');
  }

  public function batalUpdateProgress()
  {
    $this->db->update('datapemohonskp', ['status_penelitian'  => 'belum_selesai'], ['id_peneliti' => $this->session->id_peneliti]);
    $this->session->set_flashdata([
      'pesan'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Status penelitian selesai berhasil dibatalkan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('peneliti/update_progress');
  }

  public function chat()
  {
    if ($this->input->post()) {
      $id_chat  = uniqid();
      $this->db->insert('chat', [
        'id_chat' => $id_chat,
        'user'    => $this->session->id_user,
        'user1'   => $this->input->post('penerima') 
      ]);
      $this->db->insert('isi_chat', [
        'id_chat'   => $id_chat,
        'pengirim'  => $this->session->id_user,
        'penerima'  => $this->input->post('penerima'), 
        'chat'      => $this->input->post('chat')
      ]);
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Pesan berhasil dikirimkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('peneliti/chat');
    }

    $this->db->where('user', $this->session->id_user);
    $this->db->or_where('user1', $this->session->id_user);
    $this->db->join('datapemohonskp as pengirim', 'chat.user = pengirim.id_user', 'left');
    $this->db->join('datapemohonskp as penerima', 'chat.user1 = penerima.id_user', 'left');
    $this->db->join('user as pengirimUser', 'chat.user = pengirimUser.id_user', 'left');
    $this->db->join('user as penerimaUser', 'chat.user1 = penerimaUser.id_user', 'left');
    $this->db->select('chat.*, pengirim.namalengkap as nama_pengirim, penerima.namalengkap as nama_penerima, pengirimUser.username as usernamePengirim, penerimaUser.username as usernamePenerima');
    $data['chat'] = $this->db->get('chat')->result_array();

    $this->db->join('datapemohonskp', 'user.id_user=datapemohonskp.id_user', 'left');
    $this->db->select('user.*, datapemohonskp.namalengkap');
    $data['penerima'] = $this->db->get('user')->result_array();

		$this->load->view('templates/peneliti/srponline/header');
		$this->load->view('templates/peneliti/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('peneliti/srponline/chat', $data);
		$this->load->view('templates/peneliti/srponline/footer');
  }

  public function isiChat($id_chat)
  {
    $this->db->update('isi_chat', ['status' => '1'], ['id_chat'  => $id_chat]);
    $data['chat'] = $this->db->get_where('isi_chat', [
      'id_chat' => $id_chat
    ])->result_array();
    if ($this->session->id_user == $data['chat'][0]['pengirim']) {
      $where  = $data['chat'][0]['penerima'];
    } else {
      $where  = $data['chat'][0]['pengirim'];
    }
    $user = $this->db->get_where('user', ['id_user' => $where])->row_array();
    switch ($user['role']) {
      case '2':
        $data['penerima'] = 'LITBANG';
        break;
      case '3':
        $data['penerima'] = 'BAKESBANGPOL';
        break;
      case '4':
        $pemohonskp = $this->db->get_where('datapemohonskp', ['id_user' => $user['id_user']])->row_array();
        $data['penerima'] = $pemohonskp['namalengkap'];
        break;
      
      default:
        # code...
        break;
    }
		$this->load->view('templates/peneliti/srponline/header');
		$this->load->view('templates/peneliti/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('peneliti/srponline/isiChat', $data);
		$this->load->view('templates/peneliti/srponline/footer');
  }

  public function kirimChat()
  {
    $this->db->insert('isi_chat', [
      'id_chat'   => $this->input->post('id_chat'),
      'pengirim'  => $this->input->post('pengirim'),
      'penerima'  => $this->input->post('penerima'), 
      'chat'      => $this->input->post('isi')
    ]);
    redirect('peneliti/isi_chat/' . $this->input->post('id_chat'));
  }

  public function batalKirimDokumen($id_dokumen)
  {
    $dokumen  = $this->db->get_where('dokumenhasilpenelitian', ['id_dokumen'  => $id_dokumen])->row_array();
    file_exists('./assets/documents/skp/dokumenhasilpenelitian/' . $dokumen['dokumen']) ? unlink('./assets/documents/skp/dokumenhasilpenelitian/' . $dokumen['dokumen']) : '';
    $this->db->delete('dokumenhasilpenelitian', ['id_dokumen'  => $id_dokumen]);
    $this->session->set_flashdata([
      'alert'	=> ' 
        <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
          Pengumpulan dokumen berhasil dibatalkan!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    ]);
    redirect('peneliti/dokumen_penelitian');
  }
}