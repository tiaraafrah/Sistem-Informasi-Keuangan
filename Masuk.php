<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("masuk_model");
		$this->load->library('form_validation');
		$this->load->model("user_model");
	if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index()
	{
		$data["pendapatan"] = $this->masuk_model->getAll(); //ambil data dari model
		$this->load->view("admin/masuk/list", $data); //kirim data ke view
	}

	public function add()
	{
		$masuk =  $this->masuk_model; //objek model
		$validation = $this->form_validation; //objek form validation
		$validation->set_rules($masuk->rules()); //terapkan rules

		if ($validation->run()) { //melakukan validasi
			$masuk->save(); //simpan data ke database
			$this->session->set_flashdata('success', 'Data Berhasil di Simpan'); 
			//tampilkan pesan berhasil
			redirect('admin/masuk'); 
		}
		$this->load->view("admin/masuk/new_form"); //tampilkan form add

	}
	public function edit($id = null) //berikan null agar mudah dicek
	{
		if (!isset($id)) redirect('admin/masuk'); //redirect jika tidak ada $id
		$masuk = $this->masuk_model; 
		$validation = $this->form_validation; 
		$validation->set_rules($masuk->rules()); 

		if ($validation->run()) { 
			$masuk->update(); 
			$this->session->set_flashdata('success', 'Data Berhasil di Update'); 
			redirect('admin/masuk'); 
		}
		$data["masuk"] = $masuk->getById($id); //menampilkan data untuk ditampilkan pada form
		if (!$data["masuk"]) show_404(); //jika tidak ada data
		$this->load->view("admin/masuk/edit_form", $data); //menampilkan form edit
	}
	public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->masuk_model->delete($id)) {
			$this->session->set_flashdata('success', 'Data Berhasil di Hapus');
			redirect(site_url('admin/masuk'));
		}
	}
}
