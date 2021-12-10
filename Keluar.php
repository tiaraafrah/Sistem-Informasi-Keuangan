<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("keluar_model");
		$this->load->library('form_validation');
		$this->load->model("user_model");
	if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index()
	{
		$data["pengeluaran"] = $this->keluar_model->getAll(); //ambil data dari model
		$this->load->view("admin/keluar/list", $data); //kirim data ke view
	}

	public function add()
	{
		$keluar =  $this->keluar_model; //objek model
		$validation = $this->form_validation; //objek form validation
		$validation->set_rules($keluar->rules()); //terapkan rules

		if ($validation->run()) { //melakukan validasi
			$keluar->save(); //simpan data ke database
			$this->session->set_flashdata('success', 'Data Berhasil di Simpan'); 
			//tampilkan pesan berhasil
			redirect('admin/keluar'); 
		}
		$this->load->view("admin/keluar/new_form"); //tampilkan form add

	}
	public function edit($id = null) //berikan null agar mudah dicek
	{
		if (!isset($id)) redirect('admin/keluar'); //redirect jika tidak ada $id
		$keluar = $this->keluar_model; 
		$validation = $this->form_validation; 
		$validation->set_rules($keluar->rules()); 

		if ($validation->run()) { 
			$keluar->update(); 
			$this->session->set_flashdata('success', 'Data Berhasil di Update'); 
			redirect('admin/keluar'); 
		}
		$data["keluar"] = $keluar->getById($id); //menampilkan data untuk ditampilkan pada form
		if (!$data["keluar"]) show_404(); //jika tidak ada data
		$this->load->view("admin/keluar/edit_form", $data); //menampilkan form edit
	}
	public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->keluar_model->delete($id)) {
			$this->session->set_flashdata('success', 'Data Berhasil di Hapus');
			redirect(site_url('admin/keluar'));
		}
	}
}
