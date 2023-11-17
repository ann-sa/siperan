<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_TU extends CI_Model
{
	public function semua_tu()
	{
		$query = $this->db->get('staff_tu');
		return $query->result();
	}


	public function ambil_tu($username)
	{
		$this->db->where([
		'NIP'	=> $username
		]);
		$query = $this->db->get('staff_tu');
		return $query->result();
	}

	public function tu_by_nip($nip)
	{
		$data = "SELECT * FROM staff_tu WHERE NIP = '$nip'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function cek_x($tabel,$where)
	{

		return $this->db->get_where($tabel,$where);
	}

	public function atasnama_by_id_fak($id)
	{
		$data = "SELECT * FROM atasnama WHERE id_fakultas = '$id'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function atasnama_by_id($id)
	{
		$data = "SELECT * FROM atasnama WHERE id = '$id'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function atasnama_by_identifier($identifier)
	{
		$data = "SELECT * FROM atasnama WHERE identifier = '$identifier'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function fak_by_id_tu($nip)
	{
		$data = "SELECT * FROM fakultas WHERE id_fakultas = '$nip'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function carisurat($tabel,$where)
	{
		return $this->db->get_where($tabel,$where);
	}

	public function sak_by_id($id)
	{
		$data = "SELECT * FROM surat_aktif_kuliah WHERE id_surat_aktif = $id";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function plain_by_id($id)
	{
		$data = "SELECT * FROM surat_tu_plain WHERE id_surattu = '$id'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function tpl_by_id($id)
	{
		$data = "SELECT * FROM surat_tu_plain WHERE id_surattu = '$id'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function etr_by_id($id)
	{
		$data = "SELECT * FROM surat_eksternal WHERE id = '$id'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function nomorsurat_by_id_surat($id_surat)
	{
		$data = "SELECT * FROM nomorsurat WHERE id_surat = '$id_surat'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function lampiran_by_id_fakultas_n_id_surat($id_fakultas, $id_surat)
	{
		$data = "SELECT * FROM lampiran WHERE id_fakultas = '$id_fakultas' AND id_surat = '$id_surat'";
		$query = $this->db->query($data);
		return $query->result();
	}
	public function lampiran_by_id_fakultas_n_id_suratt($id_fakultas, $id_surat)
	{
		$data = "SELECT * FROM lampiran_eksternal WHERE id_fakultas = '$id_fakultas' AND id_surat = '$id_surat'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function lampiran_by_id_surat($id_surat)
	{
		$data = "SELECT * FROM lampiran WHERE id_surat = '$id_surat'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function hapuslampiran($tabel, $id_lampiran)
	{
		$this->db->where([
		'id_lampiran'	=> $id_lampiran
		]);
		$this->db->delete($tabel);
	}
	public function hapuslampiranetr($tabel, $id_lampiran)
	{
		$this->db->where([
		'id_lampiraneksternal'	=> $id_lampiran
		]);
		$this->db->delete($tabel);
	}
	public function hapus_suratmasuk($tabel, $id_surat)
	{
		$this->db->where([
		'id'	=> $id_surat
		]);
		$this->db->delete($tabel);
	}

	public function hapusdraft($tabel,$id){
		$this->db->where([
		'id_surattu'	=> $id
		]);
		$this->db->delete($tabel);
	}

	public function plain_by_status($status)
	{
		$data = "SELECT * FROM surat_tu_plain WHERE status = '$status'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function plain_by_fakultas_status($id_f, $status)
	{
		$data = "SELECT * FROM surat_tu_plain WHERE id_fakultas='$id_f' AND status = '$status'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function plain_by_fakultas_n_status_n_sebagai($id_f, $status, $sebagai)
	{
		$data = "SELECT * FROM surat_tu_plain WHERE id_fakultas = '$id_f' AND status = '$status' AND sebagai = '$sebagai'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function etr_by_fakultas_n_sebagai($id_f, $sebagai)
	{
		$data = "SELECT * FROM surat_eksternal WHERE id_fakultas = '$id_f' AND sebagai = '$sebagai'	AND tindakan!='arsip'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function plain_n_nomorsurat_by_id($id)
	{
		$data = "
				SELECT surat_tu_plain.*, nomorsurat.*, atasnama.*
				FROM surat_tu_plain
				LEFT JOIN nomorsurat
				ON nomorsurat.id_surat=surat_tu_plain.id_surattu
				LEFT JOIN atasnama
				ON atasnama.id = surat_tu_plain.id_atasnama
				WHERE surat_tu_plain.id_surattu = '$id'
				";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function plain_n_nomorsurat_by_fakultas_n_status_n_sebagai($id_f, $status, $sebagai)
	{
		$data = "
				SELECT surat_tu_plain.*, nomorsurat.*
				FROM surat_tu_plain
				LEFT JOIN nomorsurat
				ON nomorsurat.id_surat=surat_tu_plain.id_surattu
				WHERE surat_tu_plain.id_fakultas = '$id_f' AND surat_tu_plain.status = '$status' AND surat_tu_plain.sebagai = '$sebagai'
				;";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function plain_by_identifier($identifier)
	{
		$data = "SELECT * FROM surat_tu_plain WHERE identifier = '$identifier'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function etr_by_identifier($identifier)
	{
		$data = "SELECT * FROM surat_eksternal WHERE identifier = '$identifier'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function sak_by_fakultas_n_status($id_f,$status)
	{
		$data = "SELECT * FROM surat_aktif_kuliah JOIN mahasiswa ON surat_aktif_kuliah.NIM=mahasiswa.NIM And surat_aktif_kuliah.id_fakultas='$id_f' AND surat_aktif_kuliah.Status_Surat = '$status'";

		$query = $this->db->query($data);
		return $query->result();
	}

	public function sak_n_nomorsurat_by_fakultas_n_status_n_atasnama($id_f,$status)
	{
		$data = "SELECT * FROM
							surat_aktif_kuliah JOIN nomorsurat ON surat_aktif_kuliah.id_surat_aktif = nomorsurat.id_surat
							JOIN fakultas ON surat_aktif_kuliah.id_fakultas = fakultas.id_fakultas
							JOIN mahasiswa ON surat_aktif_kuliah.NIM = mahasiswa.NIM
							JOIN atasnama ON surat_aktif_kuliah.id_atasnama = atasnama.id AND surat_aktif_kuliah.Status_Surat = '$status'
							";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function save_by_id($data,$tabel,$id)
	{
		$this->db->where(['id_surattu'=>$id]);
		$this->db->update($tabel,$data);
	}
	public function save_by_idtu($data,$tabel,$id)
	{
		$this->db->where(['id'=>$id]);
		$this->db->update($tabel,$data);
	}
	public function save_by_idetr($data,$tabel,$id)
	{
		$this->db->where(['id'=>$id]);
		$this->db->update($tabel,$data);
	}

	public function save_by_nip($data,$tabel,$nip)
	{
		$this->db->where(['NIP'=>$nip]);
		$this->db->update($tabel,$data);
	}

	public function ambilsurat($tabel,$idsurat)
	{
		$data = "SELECT * FROM surat_aktif_kuliah JOIN mahasiswa ON surat_aktif_kuliah.NIM=mahasiswa.NIM JOIN fakultas ON mahasiswa.id_fakultas=fakultas.id_fakultas
							JOIN prodi ON mahasiswa.id_prodi=prodi.id_prodi And surat_aktif_kuliah.id_surat_aktif = $idsurat";
		$query = $this->db->query($data);
		return $query->result();
	}
	public function ambilsuratek($tabel,$idsurat)
	{
		$data = "SELECT * FROM surat_eksternal where id_surat_eksternal = $idsurat";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function carisurat_by_status($tabel,$status)
	{
		$data = "SELECT * FROM surat_aktif_kuliah JOIN mahasiswa ON surat_aktif_kuliah.NIM=mahasiswa.NIM And surat_aktif_kuliah.Status_Surat = '$status'";

		$query = $this->db->query($data);
		return $query->result();
	}
	public function carisuratdisposisi_by_id($tabel,$idsurat)
	{
		$data = "SELECT * FROM
		$tabel JOIN fakultas on surat_disposisi.id_fakultas=fakultas.id_fakultas
		JOIN surat_eksternal on surat_disposisi.id_surat=surat_eksternal.id
		And surat_disposisi.id_suratdisposisi = $idsurat";
		$query = $this->db->query($data);
		return $query->result();
	}
	public function carisuratek_by_status($tabel,$status)
	{
		$data = "SELECT * FROM surat_eksternal Where Status_Surat = '$status'";

		$query = $this->db->query($data);
		return $query->result();
	}
	public function carisuratplain_by_id($tabel,$idsurat)
	{
		$data = "SELECT * FROM
		surat_tu_plain JOIN atasnama ON surat_tu_plain.id_atasnama = atasnama.id
		JOIN fakultas ON surat_tu_plain.id_fakultas = fakultas.id_fakultas
		JOIN nomorsurat ON nomorsurat.id_surat = surat_tu_plain.id_surattu
		And surat_tu_plain.id_surattu = $idsurat";
		$query = $this->db->query($data);
		return $query->result();
	}
	public function carisuratak_by_id($tabel,$idsurat)
	{
		$data = "SELECT * FROM
		surat_aktif_kuliah JOIN mahasiswa ON surat_aktif_kuliah.NIM=mahasiswa.NIM
		JOIN fakultas ON mahasiswa.id_fakultas=fakultas.id_fakultas
		JOIN prodi ON mahasiswa.id_prodi=prodi.id_prodi
		JOIN atasnama ON surat_aktif_kuliah.id_atasnama = atasnama.id
		JOIN nomorsurat ON surat_aktif_kuliah.id_surat_aktif = nomorsurat.id_surat
		And surat_aktif_kuliah.id_surat_aktif = $idsurat";
		$query = $this->db->query($data);
		return $query->result();
	}
	public function editsuratdisposisi($data,$tabel,$idsurat)
	{
		$this->db->where(['id_suratdisposisi'=>$idsurat]);
		$this->db->update($tabel,$data);
	}

		public function editsuratflexmhs($data,$tabel,$idsurat)
	{
		$this->db->where(['id_surat_mhs'=>$idsurat]);
		$this->db->update($tabel,$data);
	}
	public function editsuratek($data,$tabel,$idsurat)
	{
		$this->db->where(['id'=>$idsurat]);
		$this->db->update($tabel,$data);
	}
	public function editsuratflex($data,$tabel,$idsurat)
	{
		$this->db->where(['id_surat'=>$idsurat]);
		$this->db->update($tabel,$data);
	}

	public function upload_lampiran($apanya, $id_fakultas, $id_layout, $id_surat)
	{
		//
		$upload_config = array(
        //    'upload_path'   =>  './assets/file/tu/lampiran/'.$id_fakultas.$id_layout.$id_surat,
			'upload_path'   =>  './assets/file/tu/lampiran/',
            'allowed_types' =>  'jpg|jpeg|gif|png|pdf|doc|docx|ppt|pptx|txt|cdr|ai|psd',
            'max_size'      =>  '100000',
            'remove_space'  =>  TRUE,
        );

        $this->load->library('upload', $upload_config);
		//

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

	public function upload_surat_unggahan($apanya)
	{
		$upload_config = array(
			'upload_path'   =>  './assets/file/tu/surat/',
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

	public function upload_logo_fakultas($apanya)
	{
		$upload_config = array(
			'upload_path'   =>  './assets/file/logo_fakultas/',
            'allowed_types' =>  'jpg|jpeg|gif|png',
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

	public function upload_foto_profil($apanya)
	{
		$upload_config = array(
			'upload_path'   =>  './assets/file/tu/foto_profil/',
            'allowed_types' =>  'jpg|jpeg|gif|png',
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

	public function masukkan($tabel,$data)
    {
		$this->db->insert($tabel,$data);
    }

	public function hapussurat($tabel,$idsurat){
		$this->db->where([
		'id_surat_eksternal'	=> $idsurat
		]);
		$this->db->delete($tabel);
	}






	//CODE REVOLUSIONER 22 DESEMBER 2018===============================================================================================//



	public function masuk_log($data)
    {
		$this->db->insert("log",$data);
    }

	public function surat_flex_by_id($id_surat)
	{
		$data = "
					SELECT *
					FROM surat_flex, layout, atasnama
					WHERE
						layout.id_layout=surat_flex.id_layout
						AND atasnama.id=surat_flex.atasnama_surat
						AND surat_flex.id_surat='$id_surat'

				;";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function surat_flex_by_identifier($identifier)
	{
		$data = "SELECT * FROM surat_flex WHERE identifier='$identifier'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function surat_flex_by_id_layout($id_layout)
	{
		$data = "SELECT * FROM surat_flex WHERE id_layout='$id_layout'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function surat_flex_by_id_f($id_f)
	{
		$data = "SELECT * FROM surat_flex WHERE id_fakultas='$id_f'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function surat_flex_n_layout_by_id_f($id_f)
	{
		$data = "
					SELECT *
					FROM surat_flex, layout
					WHERE
						layout.id_layout=surat_flex.id_layout
						AND surat_flex.status_surat = 'non-arsip'
						AND surat_flex.id_fakultas='$id_f'
				";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function arsip_surat_flex_n_layout_by_id_f($id_f)
	{
		$data = "
					SELECT *
					FROM surat_flex, layout
					WHERE
						layout.id_layout=surat_flex.id_layout
						AND surat_flex.status_surat = 'arsip'
						AND surat_flex.id_fakultas='$id_f'
				";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function arsip_surat_msk_n_layout_by_id_f($id_f)
	{
		$data = "
					SELECT *
					FROM surat_eksternal
					WHERE
						surat_eksternal.tindakan = 'arsip'
						AND surat_eksternal.id_fakultas='$id_f'
				";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function arsip_surat_dis_n_by_id_f($id_f)
	{
		$data = "SELECT * FROM surat_disposisi join surat_eksternal on surat_disposisi.id_surat = surat_eksternal.id
						AND surat_disposisi.tindakan = 'arsip'
						AND surat_disposisi.id_fakultas='$id_f'
				";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function save_surat($data,$tabel,$id)
	{
		$this->db->where(['id_surat'=>$id]);
		$this->db->update($tabel,$data);
	}

	public function preview_surat($id_surat)
	{
		$data = "
			SELECT *
			FROM surat_flex, layout, fakultas, atasnama
			WHERE
				layout.id_layout=surat_flex.id_layout
				AND fakultas.id_fakultas=surat_flex.id_fakultas
				AND atasnama.id=surat_flex.atasnama_surat
				AND surat_flex.id_surat='$id_surat'
				;";
		$query = $this->db->query($data);
		return $query->result();
	}


	public function layout_by_fakultas($id_f)
	{
		$data = "SELECT * FROM layout WHERE id_fakultas='$id_f'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function layout_by_id($id)
	{
		$data = "SELECT * FROM layout WHERE id_layout='$id'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function layout_by_identifier($identifier)
	{
		$data = "SELECT * FROM layout WHERE identifier='$identifier'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function save_layout($data,$tabel,$id)
	{
		$this->db->where(['id_layout'=>$id]);
		$this->db->update($tabel,$data);
	}

	public function preview_layout($id_layout, $id_f)
	{
		$data = "
			SELECT *
			FROM layout, fakultas, atasnama
			WHERE
				fakultas.id_fakultas=layout.id_fakultas
				AND layout.id_layout='$id_layout'
				AND atasnama.id=
								(SELECT id FROM atasnama WHERE id_fakultas='$id_f' LIMIT 1)
				;";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function pilih_satu_atasnama($id_f)
	{
		$data = "SELECT id FROM atasnama WHERE id_fakultas='$id_f' LIMIT 1;";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function f_by_id_f($id_f)
	{
		$data = "SELECT * FROM fakultas WHERE id_fakultas = '$id_f'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function save_f($data,$tabel,$id)
	{
		$this->db->where(['id_fakultas'=>$id]);
		$this->db->update($tabel,$data);
	}

	public function save_an($data,$tabel,$id)
	{
		$this->db->where(['id'=>$id]);
		$this->db->update($tabel,$data);
	}

	public function log_by_id_f($id_f)
	{
		$data = "SELECT * FROM log WHERE id_fakultas = '$id_f'";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function hapus_atasnama($tabel, $id)
	{
		$this->db->where([
		'id'	=> $id
		]);
		$this->db->delete($tabel);
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
			FROM layout_mhs, fakultas, atasnama, mahasiswa, prodi
			WHERE
				fakultas.id_fakultas=layout_mhs.id_fakultas
				AND layout_mhs.id_layout_mhs='$id_layout_mhs'
				AND atasnama.id=
								(SELECT id FROM atasnama WHERE id_fakultas='$id_f' LIMIT 1)
				AND mahasiswa.NIM=
								(SELECT NIM FROM mahasiswa WHERE Id_fakultas='$id_f' LIMIT 1)
				AND prodi.id_prodi=mahasiswa.Id_prodi
				;";
		$query = $this->db->query($data);
		return $query->result();
	}


	//END LAYOUT MAHASISWA

	//START SELARAS DENGAN MODEL MAHASISWA
	public function surat_flex_mhs_by_id($id_surat_mhs)
	{
		$data = "
					SELECT *
					FROM surat_flex_mhs, layout_mhs, atasnama
					WHERE
						layout_mhs.id_layout_mhs=surat_flex_mhs.id_layout_mhs
						AND atasnama.id=surat_flex_mhs.atasnama_surat
						AND surat_flex_mhs.id_surat_mhs='$id_surat'

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
						AND surat_flex_mhs.status_surat != 'arsip'
						AND surat_flex_mhs.id_fakultas='$id_f'
				";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function surat_flex_mhs_n_layout_by_id_f_pending($id_f)
	{
		$data = "
					SELECT *
					FROM surat_flex_mhs, layout_mhs
					WHERE
						layout_mhs.id_layout_mhs=surat_flex_mhs.id_layout_mhs
						AND surat_flex_mhs.status_surat != 'rejected'
						AND surat_flex_mhs.status_surat != 'draft'
						AND surat_flex_mhs.tindakan != 'arsip'
						AND surat_flex_mhs.id_fakultas='$id_f'
				";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function pilih_surat_flex_mhs($id_surat_mhs)
	{
		$data = "
					SELECT *
					FROM surat_flex_mhs, layout_mhs, mahasiswa, prodi, fakultas
					WHERE
						layout_mhs.id_layout_mhs=surat_flex_mhs.id_layout_mhs
						AND mahasiswa.NIM=surat_flex_mhs.NIM_mhs
						AND prodi.id_prodi=mahasiswa.Id_prodi
						AND fakultas.id_fakultas=mahasiswa.Id_fakultas
						AND surat_flex_mhs.id_surat_mhs='$id_surat_mhs'
				";
		$query = $this->db->query($data);
		return $query->result();
	}

	public function pilih_surat_flex_mhs_atasnama($id_surat_mhs)
	{
		$data = "
					SELECT *
					FROM surat_flex_mhs, layout_mhs, mahasiswa, prodi, fakultas, atasnama
					WHERE
						layout_mhs.id_layout_mhs=surat_flex_mhs.id_layout_mhs
						AND mahasiswa.NIM=surat_flex_mhs.NIM_mhs
						AND prodi.id_prodi=mahasiswa.Id_prodi
						AND fakultas.id_fakultas=mahasiswa.Id_fakultas
						AND atasnama.id=surat_flex_mhs.atasnama_surat
						AND surat_flex_mhs.id_surat_mhs='$id_surat_mhs'
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
						AND surat_flex_mhs.tindakan = 'arsip'
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
	public function save_surat_msk($data,$tabel,$id)
	{
		$this->db->where(['id'=>$id]);
		$this->db->update($tabel,$data);
	}

	public function save_surat_dis($data,$tabel,$id)
	{
		$this->db->where(['id_suratdisposisi'=>$id]);
		$this->db->update($tabel,$data);
	}
	//END SELARAS DENGAN MODEL MAHASISWA


	public function perlakukan_surat_mhs($data,$tabel,$id_surat_mhs)
	{
		$this->db->where(['id_surat_mhs'=>$id_surat_mhs]);
		$this->db->update($tabel,$data);
	}
	public function upload($apanya)
	{
		ini_set('upload_max_filesize','100M');
		$config['upload_path'] = './assets/file/tu/lampiran/';
		$config['allowed_types'] = 'jpg|jpeg|gif|png|pdf|doc|docx|ppt|pptx|txt|cdr|ai|psd';
		$config['max_size']	= '100000';
		$config['remove_space'] = TRUE;

		$this->load->library('upload', $config);
		if($this->upload->do_upload($apanya)){
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	public function inputdisposisi($tabel,$data)
	{
		$this->db->insert($tabel,$data);
	}
	public function ambildisposisi($idfakultas){
		$sql = "SELECT * FROM surat_disposisi join surat_eksternal on surat_disposisi.id_surat = surat_eksternal.id
		AND surat_disposisi.tindakan!='arsip'
						And surat_disposisi.id_fakultas = $idfakultas";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function disposisi_by_id($idsurat){
		$sql = "SELECT * FROM surat_disposisi join surat_eksternal on surat_disposisi.id_surat = surat_eksternal.id
						And surat_disposisi.id_suratdisposisi = $idsurat";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function tu_by_level($id)
	{
		$data = "SELECT * FROM staff_tu WHERE id_fakultas = '$id' AND level = 'biasa'";
		$query = $this->db->query($data);
		return $query->result();
	}
	public function hapusTU($tabel,$nip){

		$this->db->where([
		'NIP'	=> $nip
		]);
		$this->db->delete($tabel);
	}


	// ------------------cari surat berdasarkan tgl----------------
	public function cari_surat_bds_tgleks($id_f, $sebagai,$awal,$akhir)
	{
		$data = "SELECT * FROM surat_eksternal WHERE id_fakultas = '$id_f' AND sebagai = '$sebagai'
						AND tanggal_surat between '$awal' and '$akhir' ";
		$query = $this->db->query($data);
		return $query->result();
	}
	public function cari_surat_bds_tglmhs($id_f,$awal,$akhir)
	{
		$data = "		SELECT *
							FROM surat_flex_mhs, layout_mhs
							WHERE
								layout_mhs.id_layout_mhs=surat_flex_mhs.id_layout_mhs
								AND surat_flex_mhs.id_fakultas='$id_f' AND surat_flex_mhs.tgl_kirim between
								'$awal' and '$akhir'";
		$query = $this->db->query($data);
		return $query->result();
	}
	public function cari_surat_bds_tglkeluar($id_f,$awal,$akhir)
	{
		$data ="	SELECT *
					FROM surat_flex, layout
					WHERE
						layout.id_layout=surat_flex.id_layout
						AND surat_flex.status_surat = 'non-arsip'
						AND surat_flex.id_fakultas='$id_f'AND surat_flex.tanggal_surat between '$awal' and '$akhir' ";

		$query = $this->db->query($data);
		return $query->result();
	}
	public function cari_surat_bds_tgldisposisi($id_f,$awal,$akhir)
	{
		$data ="	SELECT *
					FROM surat_eksternal
					WHERE
						surat_eksternal.tindakan = 'non-arsip'
						AND surat_eksternal.id_fakultas='$id_f'AND surat_eksternal.Tanggal_Surat between '$awal' and '$akhir' ";

		$query = $this->db->query($data);
		return $query->result();
	}


}
?>
