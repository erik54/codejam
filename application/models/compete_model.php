<?php
class Compete_model extends CI_Model{
	
	function get_users($username)
	{
		$query = $this->db->get_where('users', array('username' => $username))->row_array();
		return $query;
	}
	
	function get_all_soal()
	{
		return $this->db->get('soal')->result();
	}
	
	function get_all_participants()
	{
		return $this->db->get('participants')->result();
	}
	
	function get_participants($username)
	{
		return $this->db->get_where('participants', array('username' => $username))->row_array();
	}
	
	public function get_participants_byID($IDparticipants)
	{
		return $this->db->get_where('participants', array('IDparticipants' => $IDparticipants))->row_array();
	}
	
	function get_participants_tingkat($tingkat)
	{
		return $this->db->get_where('participants', array('tingkat' => $tingkat))->result();
	}
	
	function get_soal_tingkat($tingkat)
	{
		return $this->db->get_where('soal', array('tingkat' => $tingkat))->result();
	}
	
	function get_soal_tingkat_when($tingkat,$date)
	{
		return $this->db->get_where('soal', array('tingkat' => $tingkat, 'tanggal' => $date))->result();
	}
	
	public function get_soal_byID($IDsoal)
	{
		return $this->db->get_where('soal', array('IDsoal' => $IDsoal))->row_array();
	}
	
	public function get_jawaban_tingkat($tingkat)
	{
		$soal = $this->get_soal_tingkat($tingkat);
		foreach ($soal as $s) {
			$this->db->or_where('IDsoal',$s->IDsoal);
		}
		return $this->db->get('jawaban')->result();
	}
	
	public function get_jawaban_byID($IDjawaban)
	{
		return $this->db->get_where('jawaban', array('IDjawaban' => $IDjawaban))->row_array();
	}
	
	public function get_jawaban_soal($IDsoal)
	{
		return $this->db->get_where('jawaban', array('IDsoal' => $IDsoal))->result();
	}
	
	public function get_jawaban_si($IDparticipants, $IDsoal)
	{
		return $this->db->get_where('jawaban', array('IDparticipants' => $IDparticipants, 'IDsoal' => $IDsoal))->row_array();
	}
	
	public function check_jawaban_si($IDparticipants,$IDsoal)
	{
		return $this->db->get_where('jawaban', array('IDparticipants' => $IDparticipants, 'IDsoal' => $IDsoal))->num_rows();
	}
	
	public function check_fastest($IDsoal)
	{
		$jawaban = $this->get_jawaban_soal($IDsoal);
		
		$f = 0;
		foreach($jawaban as $j) {
			if ($f == 0) {
				$f = $j->IDjawaban;
			} else {
				$tf = (strtotime($this->get_jawaban_byID($f)['waktu']) - strtotime($this->get_soal_byID($IDsoal)['waktu']))/60;
				$tj = (strtotime($this->get_jawaban_byID($j->IDjawaban)['waktu']) - strtotime($this->get_soal_byID($IDsoal)['waktu']))/60;
				if ($tf < $tj) {
					$f = $f;
				} else {
					$f = $j->IDjawaban;
				}
			}
		}
		
		return $f;
	}
	
	public function insert_jawaban($data)
	{
		return $this->db->insert('jawaban',$data);
	}
	
	public function change_datetoview($tanggal){
		$arrTgl = explode("-", $tanggal);
		$th = $arrTgl[0];
		$tbln = $arrTgl[1];
		$tgl = $arrTgl[2];

		switch($tbln){
			case"01":
				$bulan="Januari";
				break;
			case"02":
				$bulan="Februari";
				break;
			case"03":
				$bulan="Maret";
				break;
			case"04":
				$bulan="April";
				break;
			case"05":
				$bulan="Mei";
				break;
			case"06":
				$bulan="Juni";
				break;
			case"07":
				$bulan="Juli";
				break;
			case"08":
				$bulan="Agustus";
				break;
			case"09":
				$bulan="September";
				break;
			case"10":
				$bulan="Oktober";
				break;
			case"11":
				$bulan="November";
				break;
			case"12":
				$bulan="Desember";
				break;
		}
		return $db_tgl =+ $tgl." ".$bulan.", ".$th;
	}
}