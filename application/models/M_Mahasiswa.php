<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Mahasiswa extends CI_Model
{
	
	public function cek_x($tabel,$where)
	{

		return $this->db->get_where($tabel,$where);
	}
	
	public function save_sak_by_id($data,$tabel,$id)
	{
		$this->db->where(['id_surat_aktif'=>$id]);
		$this->db->update($tabel,$data);
	}
	
	public function semua_mahasiswa()
	{
		// "SELECT * FROM mahasiswa JOIN prodi ON mahasiswa.id_prodi=prodi.id_prodi JOIN fakultas ON prodi.id_fakultas=fakultas.id_fakultas  ";
		$data = "SELECT * FROM mahasiswa JOIN prodi ON mahasiswa.id_prodi=prodi.id_prodi";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function ambil_mahasiswa($username)
	{
		$data = "SELECT * FROM mahasiswa JOIN prodi ON mahasiswa.id_prodi=prodi.id_prodi JOIN fakultas ON prodi.id_fakultas=fakultas.id_fakultas And
		mahasiswa.NIM =  '$username'";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function mhs_by_nip($username)
	{
		$data = "SELECT * FROM mahasiswa WHERE NIM = '$username'";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function sak_by_identifier($identifier)
	{
		$data = "SELECT * FROM surat_aktif_kuliah WHERE identifier = '$identifier'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function masukkan($tabel,$data)
    {
		$this->db->insert($tabel,$data);
    }

	// upload file gambar
	public function upload($apanya)
	{
		ini_set('upload_max_filesize','20M');
		$config['upload_path'] = './assets/file/mahasiswa/scan/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '8192';
		$config['remove_space'] = TRUE;
		$config['file_name'] = base64_encode("" . mt_rand());

		$this->load->library('upload', $config);
		if($this->upload->do_upload($apanya)){
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function suratsaya($tabel,$nim)
	{
		$this->db->where([
		'NIM'		=> $nim
		]);
		$query = $this->db->get($tabel);
		return $query->result();
	}

	public function suratsayakategori($tabel,$nim,$status)
	{
		$this->db->where([
		'NIM'		=> $nim,
		'Status_Surat'	=> $status
		]);
		$query = $this->db->get($tabel);
		return $query->result();
	}

	public function ambilsurat($tabel,$idsurat)
	{
		$data = "SELECT * FROM surat_aktif_kuliah JOIN mahasiswa ON surat_aktif_kuliah.NIM=mahasiswa.NIM JOIN fakultas ON mahasiswa.id_fakultas=fakultas.id_fakultas
							JOIN prodi ON mahasiswa.id_prodi=prodi.id_prodi And surat_aktif_kuliah.id_surat_aktif = '$idsurat'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function editsurat($data,$tabel,$idsurat)
	{
		$this->db->where(['id_surat_aktif'=>$idsurat]);
		$this->db->update($tabel,$data);
	}

	public function hapussurat($tabel,$idsurat){

		$this->db->where([
		'id_surat_aktif'	=> $idsurat
		]);
		$this->db->delete($tabel);
	}

	public function editprofil($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	public function fak_by_id($id)
	{
		$data = "SELECT * FROM fakultas WHERE id_fakultas = '$id'";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	
	//START LAYOUT MAHASISWA
	
	
	public function layout_mhs_by_fakultas($id_f)
	{
		$data = "SELECT * FROM layout_mhs WHERE id_fakultas='$id_f'";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function layout_mhs_by_id($id)
	{
		$data = "SELECT * FROM layout_mhs WHERE id_layout_mhs='$id'";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function layout_mhs_by_identifier($identifier)
	{
		$data = "SELECT * FROM layout_mhs WHERE identifier='$identifier'";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function save_layout_mhs($data,$tabel,$id)
	{
		$this->db->where(['id_layout_mhs'=>$id]);
		$this->db->update($tabel,$data);
	}
	
	public function preview_layout_mhs($id_layout_mhs, $id_f)
	{
		$data = "
			SELECT *
			FROM layout_mhs, fakultas, atasnama, mahasiswa
			WHERE
				fakultas.id_fakultas=layout_mhs.id_fakultas
				AND layout_mhs.id_layout_mhs='$id_layout_mhs'
				AND atasnama.id=
								(SELECT id FROM atasnama WHERE id_fakultas='$id_f' LIMIT 1)
				AND mahasiswa.NIM=
								(SELECT NIM FROM mahasiswa WHERE Id_fakultas='$id_f' LIMIT 1)
				;";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	
	//END LAYOUT MAHASISWA
	
	//START SELARAS DENGAN MODEL TU
	public function surat_flex_mhs_by_nim($nim)
	{
		$data = "
					SELECT *
					FROM surat_flex_mhs, layout_mhs
					WHERE
						layout_mhs.id_layout_mhs=surat_flex_mhs.id_layout_mhs
						AND surat_flex_mhs.NIM_mhs='$nim'
					
				;";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function surat_flex_mhs_by_id($id_surat_mhs)
	{
		$data = "
					SELECT *
					FROM surat_flex_mhs, layout_mhs
					WHERE
						layout_mhs.id_layout_mhs=surat_flex_mhs.id_layout_mhs
						AND surat_flex_mhs.id_surat_mhs='$id_surat_mhs'
					
				;";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function surat_flex_mhs_by_identifier($identifier)
	{
		$data = "SELECT * FROM surat_flex_mhs WHERE identifier='$identifier'";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function surat_flex_mhs_by_id_layout($id_layout_mhs)
	{
		$data = "SELECT * FROM surat_flex_mhs WHERE id_layout_mhs='$id_layout_mhs'";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function surat_flex_mhs_by_id_f($id_f)
	{
		$data = "SELECT * FROM surat_flex_mhs WHERE id_fakultas='$id_f'";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function surat_flex_mhs_n_layout_by_id_f($id_f)
	{
		$data = "
					SELECT *
					FROM surat_flex_mhs, layout_mhs
					WHERE
						layout_mhs.id_layout_mhs=surat_flex_mhs.id_layout_mhs
						AND surat_flex_mhs.status_surat = 'non-arsip'
						AND surat_flex_mhs.id_fakultas='$id_f'
				";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function arsip_surat_flex_mhs_n_layout_by_id_f($id_f)
	{
		$data = "
					SELECT *
					FROM surat_flex_mhs, layout_mhs
					WHERE
						layout_mhs.id_layout_mhs=surat_flex_mhs.id_layout_mhs
						AND surat_flex_mhs.status_surat = 'arsip'
						AND surat_flex_mhs.id_fakultas='$id_f'
				";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function save_surat_mhs($data,$tabel,$id)
	{
		$this->db->where(['id_surat_mhs'=>$id]);
		$this->db->update($tabel,$data);
	}
	//END SELARAS DENGAN MODEL TU
	
	public function upload_file_flex($apanya)
	{
		$upload_config = array(
			'upload_path'   =>  './assets/file/mahasiswa/flex/',
            'allowed_types' =>  'jpg|jpeg|gif|png|pdf|doc|docx|ppt|pptx|txt|cdr|ai|psd',
            'max_size'      =>  '100000',
            'remove_space'  =>  TRUE,
        );

        $this->load->library('upload', $upload_config);
		
		if($this->upload->do_upload($apanya))
		{
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}
		else
		{
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	public function hapusmysurat($tabel,$id_surat_mhs){

		$this->db->where([
		'id_surat_mhs'	=> $id_surat_mhs
		]);
		$this->db->delete($tabel);
	}
	
	public function pemberitahuan_si_mhs($nim)
	{
		$data = "SELECT * FROM pemberitahuan WHERE NIM = '$nim' ORDER BY id DESC";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function pemberitahuan_pilih($id)
	{
		$data = "SELECT * FROM pemberitahuan WHERE id = '$id'";
		$query = $this->db->query($data);
		return $query->result();
	}
	
	public function just_save($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
?>
