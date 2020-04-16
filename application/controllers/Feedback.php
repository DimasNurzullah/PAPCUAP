<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	function __construct()
	{
	 	parent::__construct();
	 	$this->load->helper('url');
	 	$this->load->model('Feedback_model');
	 }

	public function index()
	{
		// ambil data feedback
		$data_feedback = $this->Feedback_model->ambil_semua_data();

		// echo var_dumb($data_feedback);

		// masukkan data ke array yang akan dipassing ke view

		$data['feedback'] = $data_feedback;
		
		// echo '<p>Anda berada di Beranda. </p>';
		// echo '<a href="'.base_url('index.php/autentikasi/Logout').'"> Logout </a>';

		$this->load->view('header_view');
		$this->load->view('menu_view');
		$this->load->view('content/feedback/data_feedback.php', $data); //content
		$this->load->view('footer_view');
	}

	public function create()
	{
		$this->load->view('header_view');
		$this->load->view('menu_view');
		$this->load->view('content/feedback/tambah_data.php'); //content
		$this->load->view('footer_view');
	}

	public function store()
	{
		$nrp = $this->input->post('nrp');
		$nama = $this->input->post('nama');
		$penilaian = $this->input->post('penilaian');
		$kesan = $this->input->post('kesan');
		// foto kita skip dulu^^

		$this->Feedback_model->tambah_data($nrp, $nama, $penilaian, $kesan, '');

		$data['message'] = 'Simpan data berhasil.';

		redirect(base_url('index.php/feedback'));
	}

	public function delete($id)
		{
			$this->Feedback_model->hapus_data($id);

			redirect(base_url('index.php/feedback'));
		}
}