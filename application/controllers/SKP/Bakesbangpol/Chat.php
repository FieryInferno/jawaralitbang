<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
  
	public function index()
	{
		if ($this->input->post()) {
      $this->ModelBakesbangpol->tambahChat();
      $this->session->set_flashdata([
        'pesan'	=> ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Pesan berhasil dikirimkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('bakesbangpol/chat');
    }
    
    $data['chat'] = $this->ModelBakesbangpol->getChat();

    $data['penerima'] = $this->ModelBakesbangpol->penerimaChat();
    
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('bakesbangpol/chat', $data);
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
		$this->load->view('templates/bakesbangpol/srponline/header');
		$this->load->view('templates/bakesbangpol/srponline/sidebar');
		$this->load->view('templates/peneliti/srponline/navbar');
		$this->load->view('bakesbangpol/isiChat', $data);
		$this->load->view('templates/peneliti/srponline/footer');
  }

  public function kirimChat()
  {
    $this->ModelBakesbangpol->kirimChat();
    redirect('bakesbangpol/isi_chat/' . $this->input->post('id_chat'));
  }
}
