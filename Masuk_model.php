<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk_model extends CI_Model
{
	private $_table = "pendapatan"; //nama tabel
// nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
	public $pendapatan_id;
	public $no_pendapatan;
	public $tgl_pendapatan;
	public $keterangan;
	public $jumlah_pendapatan;

	public function rules() //Pada Rules, kita memberikan aturan untuk wajib mengisi (required)
	{
		return[
			['field' => 'no_pendapatan',
			'label' => 'No Pendapatan',
			'rules' => 'numeric'],
			
			['field' => 'jumlah_pendapatan',
			'label' => 'Jumlah Pendapatan',
			'rules' => 'required']
		];
	}
//method get() dan getAll(). Kedua method ini akan kita gunakan untuk mengambil data dari database
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
		//ini sama artinya seperti: //SELECT * FROM surat_masuk	
	}
	public function getById($id)
	{
		return $this->db->get_where($this->_table,["pendapatan_id" => $id])-> row();
		//ini sama artinya seperti: //SELECT * FROM surat_masuk WHERE masuk_id=$id
	}

	public function save()
	{
		$post = $this->input->post(); //ambil data dari form
		$this->pendapatan_id = $post["pendapatan_id"]; //isi field otomatis
		$this->no_pendapatan= $post["no_pendapatan"]; //isi field
		$this->tgl_pendapatan = $post["tgl_pendapatan"]; //isi field
		$this->keterangan = $post["keterangan"]; //isi field
		$this->jumlah_pendapatan = $post["jumlah_pendapatan"]; //isi field
		return $this->db->insert($this->_table, $this); //simpan ke database
	}

	public function update()
	{
		$post = $this->input->post(); 
		$this->pendapatan_id = $post["id"]; 
		$this->no_pendapatan= $post["no_pendapatan"]; 
		$this->tgl_pendapatan = $post["tgl_pendapatan"]; 
		$this->keterangan = $post["keterangan"]; 
		$this->jumlah_pendapatan = $post["jumlah_pendapatan"]; 
		return $this->db->update($this->_table, $this, array('pendapatan_id'
		=> $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("pendapatan_id" => $id));
	}
}