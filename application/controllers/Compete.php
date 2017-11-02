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
		echo "<h1>Welcome to Competition</h1>";
		$soal = $this->compete_model->get_soal_tingkat('Mahasiswa');
		$peserta = $this->compete_model->get_participants_tingkat('Mahasiswa');
		$data = array(
			'soal' => $soal,
			'peserta' => $peserta
		);
		//echo json_encode($data);
		$this->load->view('pages/competition',$data);
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