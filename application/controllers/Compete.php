<?php
/* <> with love by Default */
defined('BASEPATH') OR exit('Hayoo mau buka apaaaa??');

class Compete extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('compete_model');
		$this->load->model('home_model');
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
	
	public function table_competition()
	{
		$soal = $this->compete_model->get_soal_tingkat('Mahasiswa');
		$peserta = $this->compete_model->get_participants_tingkat('Mahasiswa');
		$data = array(
			'soal' => $soal,
			'peserta' => $peserta
		);
		$this->load->view('pages/competition',$data);
	}
}