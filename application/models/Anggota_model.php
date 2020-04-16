<?php

/**
* kelas ini digunakan untuk model autentikasi
*/
class Anggota_model extends CI_Model
{
	function __conctruct()
	{
		parent::__conctruct();
		$this->load->database();
	}

	public function ambil_semua_anggota()
	{
		// $this->db->select('*');
		// $this->db->from('anggota');

		return $this->db->get('anggota')->result();
	}

	public function ambil_anggota($id)
	{
		return $this->db->get_where('anggota', ['id_anggota' => $id])->row();
		//select * from anggota where id_anggota=$id
	}

	public function tambah_anggota($nama, $jenis_kelamin, $kelas, $foto)
	{
		$this->nama_anggota = $nama;
		$this->jenis_kelamin = $jenis_kelamin;
		$this->kelas = $kelas;
		$this->foto_profil = $foto;

		$this->db->insert('anggota', $this);

		return $this->db->insert_id();
	}

	public function update_anggota($id)
	{
		//ambil inputan
		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$kelas = $this->input->post('kelas');
		// foto kita skip dulu^^

		$this->nama_anggota = $nama;
		$this->jenis_kelamin = $jenis_kelamin;
		$this->kelas = $kelas;
		$this->foto_profil = '';

		$this->db->update('anggota', $this, ['id_anggota' => $id]);
	}

	public function hapus_anggota($id)
	{
		$this->db->delete('anggota', array('id_anggota' => $id));
	}
}