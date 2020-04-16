<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	function __construct()
	{
	 	parent::__construct();
	 	$this->load->helper('url');
	 	$this->load->model('anggota_model');
	 	$this->load->library(array('session', 'form_validation'));
	 }

	public function index()
	{
		// ambil data anggota
		$data_anggota = $this->anggota_model->ambil_semua_anggota();

		// echo var_dumb($data_anggota);

		// masukkan data ke array yang akan dipassing ke view

		$data['anggota'] = $data_anggota;
		
		// echo '<p>Anda berada di Beranda. </p>';
		// echo '<a href="'.base_url('index.php/autentikasi/Logout').'"> Logout </a>';

		$this->load->view('header_view');
		$this->load->view('menu_view');
		$this->load->view('content/Anggota/data_anggota.php', $data); //content
		$this->load->view('footer_view');
	}

	public function create()
	{
		$this->load->view('header_view');
		$this->load->view('menu_view');
		$this->load->view('content/Anggota/tambah_anggota.php'); //content
		$this->load->view('footer_view');
	}

	public function store()
	{
		$validasi = $this->form_validation;

		//set aturan validasi (field, label, rules, message(opsional))
		$validasi->set_rules('nama', 'Nama', 'required', array('required' => 'Kolom %s harus diisi.'));
		// $validasi->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		// $validasi->set_rules([
		// 	['field' => 'nama', 'label' => 'Nama', 'rules' => 'required', 'errors' => array('required' => 'Kolom %s harus diisi.')]
		// ]);

		if ($validasi->run()) {
			$nama = $this->input->post('nama');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$kelas = $this->input->post('kelas');
			$foto = $this->uploadFile();

			$this->anggota_model->tambah_anggota($nama, $jenis_kelamin, $kelas, $foto);

			$this->session->set_flashdata('success', 'Tambah anggota berhasil');

			redirect('anggota');
		}
		else {
			return $this->create();
		}
	}

	public function show($id = null)
	{
		if (!isset($id)) redirect('anggota');

		$data['anggota'] = $this->anggota_model->ambil_anggota($id);

		$this->load->view('header_view');
		$this->load->view('menu_view');
		$this->load->view('content/Anggota/tampil_anggota.php', $data);
		$this->load->view('footer_view');
	}

	public function edit($id = null) //handling error tanpa id
	{
		//handling error tanpa id
		if (!isset($id)) redirect('anggota');

		$data['anggota'] = $this->anggota_model->ambil_anggota($id);

		$this->load->view('header_view');
		$this->load->view('menu_view');
		$this->load->view('content/Anggota/edit_anggota.php', $data);
		$this->load->view('footer_view');
	}

	public function update($id = null)
	{
		if (!isset($id)) redirect('anggota');

		$this->anggota_model->update_anggota($id);

		$this->session->set_flashdata('success',"Edit anggota berhasil");

		redirect('anggota');
	}

	public function delete($id)
	{
		$this->anggota_model->hapus_anggota($id);

		$this->session->set_flashdata('success', 'Hapus anggota berhasil');

		redirect('anggota');
	}

	public function uploadFile()
	{
		$config['upload_path']          = './uploads/gambar_anggota/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['file_name']            = 'anggota_'.time();
	    $config['overwrite']			= true;
	    $config['max_size']             = 1024; // 1MB

	    $this->load->library('upload', $config);

	    if ($this->upload->do_upload('foto')) {
	        return '/uploads/gambar_anggota/'.$this->upload->data("file_name");
	    }
	    
	    return ''; //jika tidak ada foto yang terupload
	}
}