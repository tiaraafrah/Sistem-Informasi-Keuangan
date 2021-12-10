<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar_model extends CI_Model
{
	private $_table = "pengeluaran"; //nama tabel
// nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
	public $pengeluaran_id;
	public $no_pengeluaran;
	public $tgl_pengeluaran;
	public $keterangan;
	public $jumlah_pengeluaran;

	public function rules() //Pada Rules, kita memberikan aturan untuk wajib mengisi (required)
	{
		return[
			['field' => 'no_pengeluaran',
			'label' => 'No Pengeluaran',
			'rules' => 'numeric'],
			
			['field' => 'jumlah_pengeluaran',
			'label' => 'Jumlah Pengeluaran',
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
		return $this->db->get_where($this->_table,["pengeluaran_id" => $id])-> row();
		//ini sama artinya seperti: //SELECT * FROM surat_masuk WHERE masuk_id=$id
	}

	public function save()
	{
		$post = $this->input->post(); //ambil data dari form
		$this->pengeluaran_id = $post["pengeluaran_id"]; //isi field otomatis
		$this->no_pengeluaran= $post["no_pengeluaran"]; //isi field
		$this->tgl_pengeluaran = $post["tgl_pengeluaran"]; //isi field
		$this->keterangan = $post["keterangan"]; //isi field
		$this->jumlah_pengeluaran = $post["jumlah_pengeluaran"]; //isi field
		return $this->db->insert($this->_table, $this); //simpan ke database
	}

	public function update()
	{
		$post = $this->input->post(); 
		$this->pengeluaran_id = $post["id"]; //isi field otomatis
		$this->no_pengeluaran= $post["no_pengeluaran"]; //isi field
		$this->tgl_pengeluaran = $post["tgl_pengeluaran"]; //isi field
		$this->keterangan = $post["keterangan"]; //isi field
		$this->jumlah_pengeluaran = $post["jumlah_pengeluaran"];
		return $this->db->update($this->_table, $this, array('pengeluaran_id'
		=> $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("pengeluaran_id" => $id));
	}
}