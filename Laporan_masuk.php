<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_masuk extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->model('Lapmasuk_model');
	}

	public function index(){

		if(isset($_GET['filter']) && ! empty($_GET['filter'])){
			$filter = $_GET['filter'];

			if($filter == '1'){
				$tgl_pendapatan = $_GET('tanggal');

				$ket = 'Laporan Keuangan Tanggal' .date('d-m-y', strtotime($tgl_pendapatan));
				$url_cetak ='laporan/cetak?filter=1&tanggal=' .$tgl_pendapatan;
				$pendapatan = $this->Lapmasuk_model->view_by_date($tgl_pendapatan);
			
			}else if($filter == '2'){
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
				$ket = 'Laporan Keuangan Bulan'.$nama_bulan[$bulan].' '.$tahun;
				$url_cetak = 'laporan/cetak?filter=2&bulan=' .$bulan.'&tahun'.$tahun;
				$pendapatan = $this->Lapmasuk_model->view_by_month($bulan, $tahun);
			
			}else if($filter == '3'){
				$tahun = $_GET['tahun'];
				$ket = 'Laporan Keuangan Tahun'.$tahun;
				$url_cetak = 'laporan/cetak?filter=3&tahun=' .$tahun;
				$pendapatan = $this->Lapmasuk_model->view_by_year($tahun);
			
			}else{
				$ket = 'Semua Data Laporan';
				$url_cetak = 'laporan/cetak';
				$pendapatan = $this->Lapmasuk_model->view_all();
			}
		$data['ket'] = $ket;
		$data['url_cetak'] = base_url('index.php/'.$url_cetak);
		$data['pendapatan'] = $this->Lapmasuk_model->option_tahun();
		$this->load->view('view', $data);
		}
	}
	public function cetak(){
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){
			$filter = $_GET['filter'];

			if($filter == '1'){
				$tgl_pendapatan = _GET['tanggal'];
				$ket = 'Laporan Keuangan Tanggal'.date('d-m-y', strtotime($tgl_pendapatan));
				$pendapatan = $this->Lapmasuk_model->view_by_date($tgl_pendapatan);
				
			}else if($filter == '2'){
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$nama_bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
				$ket = 'Laporan Keuangan Bulan'.$nama_bulan[$bulan].' '.$tahun;
				$pendapatan = $this->Lapmasuk_model->view_by_month($bulan, $tahun);
			
			}else if ($filter == '3'){
				$tahun = $_GET['tahun'];
				$ket = 'Laporan Keuangan Tahun'.$tahun;
				$pendapatan = $this->Lapmasuk_model->view_by_year($tahun);
			
			}else{
				$ket = 'Semua Data Laporan';
				$pendapatan = $this->Lapmasuk_model->view_all();}

			$data['ket'] = $ket;
			$data['pendapatan'] = $pendapatan;

		ob_start();
		$this->load->view('print', $data);
		$html = ob_get_contents();
			ob_end_clean();
	}
		require './assests/html2pdf.autoload.php';
		$pdf = new $spipu\html2pdf\doc\res\examples\src\Html2pdf('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('Laporan Keuangan.pdf', 'I');
	}
}