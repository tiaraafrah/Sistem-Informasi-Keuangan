<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lapmasuk_model extends CI_Model {
	public function view_by_date($date){
		$this->db->where('DATE(tgl_pendapatan)', $date);

		return $this->db->get('pendapatan')->result();
	}

	public function view_by_month($month, $year){
		$this->db->where('MONTH(tgl_pendapatan)', $month);
		$this->db->where('YEAR(tgl_pendapatan)', $year);

		return $this->db->get('pendapatan')->result();
	}

	public function view_by_year($year){
		$this->db->where('YEAR(tgl_pendapatan)', $year);

		return $this->db->get('pendapatan')->result();
	}

	public function view_all(){
		$this->db->select('YEAR(tgl_pendapatan) AS tahun');
		$this->db->from('pendapatan');
		$this->db->order_by('YEAR(tgl_pendapatan)');

		return $this->db->get()->result();
	}
}