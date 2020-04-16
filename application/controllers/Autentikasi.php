<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(['session', 'form_validation']);
		$this->load->helper('url');
		$this->load->model(['autentikasi_model', 'anggota_model']);
	}

	public function index()
	{
		$data = array();
		$error = empty($this->session->flashdata('error')) ? '' : $this->session->flashdata('error');
		$data['error'] = $error;
		
		$this->load->view('login_view', $data);
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// cek user di database melalui model;
		$result = $this->autentikasi_model->cek_autentikasi($username, md5($password));

		if($result["valid_user"]) {
			$user = $result["data_user"];

			$avatar = base_url('upload/profil/avatar-unsex.png');
			if (!empty($user->jenis_kelamin)) {
				if ($anggota->jenis_kelamin == "L")
					$avatar = base_url('upload/profil/avatar-man.png');
				else if ($anggota->jenis_kelamin == "P")
					$avatar = base_url('upload/profil/avatar-girl.png');
			}
			if (!empty($user->foto_profil)) {
				$avatar = base_url($user->foto_profil);
			}

			// buat array data user ke session
			$data_session = array (
				'id_anggota' => $user->id_anggota,
				'nama_anggota' => $user->nama_anggota,
				'foto_profil' => $user->foto_profil,
				'jenis_kelamin' => $user->jenis_kelamin,
				'avatar' => $avatar,
				'id_autentikasi' => $user->id_autentikasi,
				'username' => $user->username
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("index.php/beranda"));
		}
		else {
			$this->session->set_flashdata('error',"username dan password yang anda masukkan tidak ditemukan");
			redirect(base_url());
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function new()
	{
		$data = array();
		$error = empty($this->session->flashdata('error')) ? '' : $this->session->flashdata('error');
		$data['error'] = $error;
		
		$this->load->view('registrasi_view', $data);
	}

	public function registrasi()
	{
		$validasi = $this->form_validation;

		$validasi->set_rules('nama', 'Nama', 'required');
		$validasi->set_rules('username', 'Username', 'required');
		$validasi->set_rules('password', 'Password', 'required');

		if ($validasi->run()) {
			$nama = $this->input->post('nama');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$kelas = $this->input->post('kelas');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$foto = $this->uploadFile();

			//masukkan data ke anggota
			$inserted_id = $this->anggota_model->tambah_anggota($nama, $jenis_kelamin, $kelas, $foto);

			//masukkan data ke autentikasi
			$this->autentikasi_model->daftar_akun($inserted_id, $username, md5($password));

			$this->session->set_flashdata('success', 'Daftar akun berhasil');

			redirect('autentikasi');
		}
		else {
			// jika validasinya gagal
			return $this->new();
		}
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
