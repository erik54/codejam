<?php
/* <> with love by Default */
defined('BASEPATH') OR exit('Hayoo mau buka apaaaa??');

class Compete extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('compete_model');
		$this->load->model('home_model');
		
		if ((!isset($_SESSION['level']) || $_SESSION['level']!=2) || (date('Y-m-d') != '2017-12-07')) {
			$date_compete = $this->compete_model->change_datetoview('2017-11-21');
			$_SESSION['jadwal_err'] = true;
			$_SESSION['deletex'] = 'Anda tidak dapat mengakses perlombaan sebelum tanggal '. $date_compete;
		
			redirect(base_url());
		}elseif ((date('h')+6) >= 15 && date('i') >= 0) {
			$_SESSION['info'] = 'Maaf, Perlombaan babak penyisihan telah berakhir :)';
			
			redirect(base_url());
		}
	}
	
	public function Index()
	{
		$soal = $this->compete_model->get_soal_tingkat('Mahasiswa');
		$peserta = $this->compete_model->get_participants_tingkat('Mahasiswa');
		$data = array(
			'title' => 'CodeJam | Competition',
			'isi' => 'pages/competition',
			'nav' => 'nav.php',
			'nav_active' => 'competition',
			'soal' => $soal,
			'peserta' => $peserta
		);
		//echo json_encode($data);
		$this->load->view('layout/wrapper',$data);
	}
	
	public function upload_solusi($idsoal)
	{
		$config['upload_path']          = 'assets/solusi/'.$_SESSION['username'];
		$config['allowed_types']        = 'py|txt';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;

		$this->load->library('upload', $config);
		
		for ($i=1; $i <3 ; $i++) { 
			if ( ! $this->upload->do_upload('jawaban'.$i)) { /*jawaban$i diambil dari nama input (jawaban1 dan jawaban2)*/
				$error = array('error' => $this->upload->display_errors());
				
				$_SESSION['jadwal_err'] = true;
				$_SESSION['deletex'] = $error['error'];
			}else{
				if ($i == 1) {
					$data = array(
						'IDsoal' => $idsoal,
						'IDparticipants' => $this->compete_model->get_participants($_SESSION['username'])['IDparticipants'],
						'waktu' => (date('h')+6).date(':i:s'),
						'fileJawaban' => $this->upload->data('file_name')
					);
					$this->compete_model->insert_jawaban($data);
				} else {
					$this->db->set('fileAlgoritma', $this->upload->data('file_name'));
					$this->db->where(array('IDsoal' => $idsoal, 'IDparticipants' => $this->compete_model->get_participants($_SESSION['username'])['IDparticipants']));
					$this->db->update('jawaban');
				}
				
				$_SESSION['jadwal_err'] = false;
				$_SESSION['deletef'] = 'Solusi berhasil di-upload :)';
			}	
		}
		redirect(base_url('compete'));
	}
	
	public function date(){
		
	}
}