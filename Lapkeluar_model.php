<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lapkeluar_model extends CI_Model {
	public function view_by_date($date){
		$this->db->where('DATE(tgl_pengeluaran)', $date);

		return $this->db->get('pengeluaran')->result();
	}

	public function view_by_month($month, $year){
		$this->db->where('MONTH(tgl_pengeluaran)', $month);
		$this->db->where('YEAR(tgl_pengeluaran)', $year);

		return $this->db->get('pengeluaran')->result();
	}

	public function view_by_year($year){
		$this->db->where('YEAR(tgl_pengeluaran)', $year);

		return $this->db->get('pengeluaran')->result();
	}

	public function view_all(){
		$this->db->select('YEAR(tgl_pengeluaran) AS tahun');
		$this->db->from('pengeluaran');
		$this->db->order_by('YEAR(tgl_pengeluaran)');

		return $this->db->get()->result();
	}
}