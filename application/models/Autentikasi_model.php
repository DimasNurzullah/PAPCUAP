<?php

/**
* kelas ini digunakan untuk model autentikasi
*/
class Autentikasi_model extends CI_Model
{
	function __conctruct()
	{
		parent::__conctruct();
		$this->load->database();
	}

	public function cek_autentikasi($username, $password)
	{
		$result = array();

		// siapkan querry builder
		$this->db->select('
			anggota.id_anggota,
			anggota.nama_anggota,
			anggota.foto_profil,
			anggota.jenis_kelamin,
			autentikasi.id_autentikasi,
			autentikasi.username');
		$this->db->from('autentikasi');
		$this->db->join('anggota', 'anggota.id_anggota = autentikasi.id_anggota');
		$this->db->where('autentikasi.username', $username);
		$this->db->where('autentikasi.password', $password);

		// eksekusi query
		$query = $this->db->get();

		// cek hasil query
		if ($query->num_rows() > 0) {
			$result["data_user"] = $query->row();
			$result["valid_user"] = true;
		}
		else {
			$result["data_user"] = array();
			$result["valid_user"] = false;
		}
		return $result;
	}

	public function daftar_akun($id_anggota, $username, $password)
	{
		$this->id_anggota = $id_anggota;
		$this->username = $username;
		$this->password = $password;

		$this->db->insert('autentikasi', $this);
	}
}