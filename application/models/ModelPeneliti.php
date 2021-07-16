<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPeneliti extends CI_Model
{
  public function getSKP()
  {
    return $this->db->get_where('datapemohonskp', ['id_peneliti' => $this->session->id_peneliti])->row_array();
  }

  public function unggahDokumen()
  {
    for ($i=0; $i < count($_FILES['dokumen']['name']); $i++) { 
      $_FILES['file']['name'] = $_FILES['dokumen']['name'][$i];
      $_FILES['file']['type'] = $_FILES['dokumen']['type'][$i];
      $_FILES['file']['tmp_name'] = $_FILES['dokumen']['tmp_name'][$i];
      $_FILES['file']['error'] = $_FILES['dokumen']['error'][$i];
      $_FILES['file']['size'] = $_FILES['dokumen']['size'][$i];
      $document = '';
      $config ['upload_path'] = './assets/documents/skp/dokumenhasilpenelitian';
      $config ['allowed_types'] = 'pdf';
      $this->load->library('upload');
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('file')) {
      // echo $this->upload->display_errors();
        die();
        echo "Dokumen gagal diunggah!"; 
      }else {
        // print_r($this->upload->data('file_name'));
        $document = $this->upload->data('file_name');
      }
      // print_r($document);
      // exit();
      $this->db->insert('dokumenhasilpenelitian', [
        'id_peneliti'   => $this->session->id_peneliti,
        'dokumen'   => $document
      ]);
    }
  }

  public function updateProgress()
  {
    if ($this->input->post()) {
      $config ['upload_path']   = './assets/documents/skp/dokumenhasilpenelitian';
      $config ['allowed_types'] = 'jpg|jpeg|png';
      
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('dokumentasi_pendukung')) {
        print_r($this->upload->display_errors());
        die();
      }else {
        $dokumentasi_pendukung  = $this->upload->data('file_name');
      }
      $this->db->insert('progress', [
        'id_peneliti'           => $this->session->id_peneliti,
        'tanggal'               => $this->input->post('tanggal'),
        'progress'              => $this->input->post('progress'),
        'tahapan_penelitian'    => $this->input->post('tahapan_penelitian'),
        'lokasi_terkait'        => $this->input->post('lokasi_terkait'),
        'pihak_terkait'         => $this->input->post('pihak_terkait'),
        'peran_pihak_terkait'   => $this->input->post('peran_pihak_terkait'),
        'dokumentasi_pendukung' => $dokumentasi_pendukung,
        'persentase_penelitian' => $this->input->post('persentase_penelitian'),
      ]);
      $this->session->set_flashdata([
        'pesan' => ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Progres berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('peneliti/update_progress');
    }
  }

  public function editUpdateProgress($id_progress)
  {
     if ($this->input->post()) {
      if ($_FILES['dokumentasi_pendukung']['name']  !== '') {
        $config ['upload_path']   = './assets/documents/skp/dokumenhasilpenelitian';
        $config ['allowed_types'] = 'jpg|jpeg|png';
        
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('dokumentasi_pendukung')) {
          print_r($this->upload->display_errors());
          die();
        }else {
          $dokumentasi_pendukung  = $this->upload->data('file_name');
        }
        if (file_exists('./assets/documents/skp/dokumenhasilpenelitian/' . $this->input->post('dokumentasi_pendukung_lama'))) unlink('./assets/documents/skp/dokumenhasilpenelitian/' . $this->input->post('dokumentasi_pendukung_lama'));
      } else {
        $dokumentasi_pendukung  = $this->input->post('dokumentasi_pendukung_lama');
      }
      
      $this->db->update('progress', [
        'id_peneliti'           => $this->session->id_peneliti,
        'tanggal'               => $this->input->post('tanggal'),
        'progress'              => $this->input->post('progress'),
        'tahapan_penelitian'    => $this->input->post('tahapan_penelitian'),
        'lokasi_terkait'        => $this->input->post('lokasi_terkait'),
        'pihak_terkait'         => $this->input->post('pihak_terkait'),
        'peran_pihak_terkait'   => $this->input->post('peran_pihak_terkait'),
        'dokumentasi_pendukung' => $dokumentasi_pendukung,
        'persentase_penelitian' => $this->input->post('persentase_penelitian'),
      ], ['id_progress' => $id_progress]);
      $this->session->set_flashdata([
        'pesan' => ' 
          <div class="alert alert-success p-b-32 text-center alert-dismissible fade show">
            Progres berhasil diedit!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      ]);
      redirect('peneliti/update_progress');
    }
  }

  public function hapusProgress($id_progress)
  {
    $this->db->delete('progress', ['id_progress'  => $id_progress]);
  }
}