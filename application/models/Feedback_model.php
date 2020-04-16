<?php

/**
* kelas ini digunakan untuk model autentikasi
*/
class Feedback_model extends CI_Model
{
	function __conctruct()
	{
		parent::__conctruct();
		$this->load->database();
	}

	public function ambil_semua_data()
	{
		// $this->db->select('*');
		// $this->db->from('anggota');

		return $this->db->get('feedback')->result();
	}

	public function tambah_data($nrp, $nama, $penilaian, $kesan)
	{
		$this->nrp = $nrp;
		$this->nama = $nama;
		$this->penilaian = $penilaian;
		$this->kesan = $kesan;

		$this->db->insert('feedback', $this);
	}

	public function hapus_data($id)
	{
		$this->db->delete('feedback', array('id' => $id));
	}
}