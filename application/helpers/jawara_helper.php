<?php
	function upload($jenis)
	{
		switch ($jenis) {
			case 'proposalpenelitian':
				$_FILES['file']['name'] = $_FILES['proposalpenelitian']['name'];
        $_FILES['file']['type'] = $_FILES['proposalpenelitian']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['proposalpenelitian']['tmp_name'];
        $_FILES['file']['error'] = $_FILES['proposalpenelitian']['error'];
        $_FILES['file']['size'] = $_FILES['proposalpenelitian']['size'];
				$config ['upload_path']   = './assets/documents/skp/proposalpenelitian';
				$config ['allowed_types'] = 'pdf';
				break;
			case 'skp':
				$_FILES['file']['name'] = $_FILES['skp']['name'];
        $_FILES['file']['type'] = $_FILES['skp']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['skp']['tmp_name'];
        $_FILES['file']['error'] = $_FILES['skp']['error'];
        $_FILES['file']['size'] = $_FILES['skp']['size'];
				$config ['upload_path']	= './assets/documents/skp/skp';
				$config ['allowed_types'] = 'pdf';
				break;
			case 'scanktp':
				$_FILES['file']['name'] = $_FILES['scanktp']['name'];
        $_FILES['file']['type'] = $_FILES['scanktp']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['scanktp']['tmp_name'];
        $_FILES['file']['error'] = $_FILES['scanktp']['error'];
        $_FILES['file']['size'] = $_FILES['scanktp']['size'];
				$config ['upload_path']	= './assets/img/skp/scanktp';
				$config ['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
				break;
			case 'foto':
				$_FILES['file']['name']     = $_FILES['foto']['name'];
        $_FILES['file']['type']     = $_FILES['foto']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'];
        $_FILES['file']['error']    = $_FILES['foto']['error'];
        $_FILES['file']['size']     = $_FILES['foto']['size'];
				$config ['upload_path']	    = './assets/img/skp/foto';
				$config ['allowed_types']   = 'jpg|jpeg|png|gif';
				break;
			
			default:
				# code...
				break;
		}
		
		// if ($scanktp !== ''){
		$ci = get_instance();
		$ci->load->library('upload');
		$ci->upload->initialize($config);
		if (!$ci->upload->do_upload('file')) {
			echo $ci->upload->display_errors();
			die();
		}else {
			return $ci->upload->data('file_name');
		}
		// }
	}
?>