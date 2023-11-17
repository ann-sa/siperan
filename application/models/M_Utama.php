<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Utama extends CI_Model
{
	public function cek_login($tabel,$where)
	{
		return $this->db->get_where($tabel,$where);
	}

	public function daftar_mahasiswa($tabel,$data,$prodi)
    {
		$this->db->where([
		'Prodi'	=> $prodi
		]);
		$query = $this->db->get('prodi');
		$data_prodi = $query->result();
		foreach ($data_prodi as $isi => $row) {
			$id_prodi = $row->id_prodi;
		}
		$data +=['Id_Prodi' => $id_prodi];
		// var_dump($data);

		$this->db->insert($tabel,$data);
    }

	public function editprofil($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function mhs_by_idnumber($idnumber)
	{
		$data = "SELECT * FROM mahasiswa WHERE NIM = '$idnumber'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function tu_by_idnumber($idnumber)
	{
		$data = "SELECT * FROM staff_tu WHERE NIP = '$idnumber'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function mhs_by_email($email)
	{
		$data = "SELECT * FROM mahasiswa WHERE Email = '$email'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function tu_by_email($email)
	{
		$data = "SELECT * FROM staff_tu WHERE Email = '$email'";
		$query = $this->db->query($data);
		return $query->result();
	}
}
?>
