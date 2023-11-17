<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TU extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_TU');

		if($this->session->userdata('status') != "tu_is_login"){
			redirect(base_url("index.php/keluar"));
		}

	}

	public function cari_surat_bds_tgl($surat)
		{
			$awal = $_POST['tanggal_awal'];
			$akhir = $_POST['tanggal_akhir'];

			/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
			$username = $this->session->userdata('username');
			$data['data_user'] =  $this->M_TU->ambil_tu($username);

			$see_f1 = $this->M_TU->ambil_tu($username);
			foreach($see_f1 AS $see_f2)
			{
				$utama_id_fakultas = $see_f2->id_fakultas;
			}

			$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
			foreach($see_f4 AS $see_f5)
			{
				$see_f6 = $see_f5->Fakultas;
			}
			$data['nama_fakultas'] = $see_f6;
			$data['utama_id_fakultas'] = $utama_id_fakultas;
			/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
			$username = $this->session->userdata('username');
			$p1 =  $this->M_TU->ambil_tu($username);
			foreach($p1 AS $p2)
			{
				$id_f = $p2->id_fakultas;
				$nip = $p2->NIP;
			}

			if($surat =='suratmasuk'){
			$data['judul'] = "surat_masuk";
			$sebagai = "uploaded";
			$data['surat_eksternal'] = $this->M_TU->cari_surat_bds_tgleks($id_f, $sebagai, $awal,$akhir);
			$this->load->view('tu/suratetr', $data);
			}
			else if($surat == 'suratmahasiswa'){
			$data['judul'] = "surat_mahasiswa";
			$data['surat_flex_mhs'] = $this->M_TU->cari_surat_bds_tglmhs($utama_id_fakultas,$awal,$akhir);
			$this->load->view('tu/suratmahasiswa', $data);
			}
			else if($surat == 'suratkeluar'){
			$data['judul'] = "surat_keluar";
			$data['surat_keluar'] = $this->M_TU->cari_surat_bds_tglkeluar($utama_id_fakultas,$awal,$akhir);
			$this->load->view('tu/suratkeluar', $data);
			}
			if($surat =='suratdisposisi'){
			$data['judul'] = "surat_disposisi";
			$data['surat_disposisi'] = $this->M_TU->cari_surat_bds_tgldisposisi($id_f,$awal,$akhir);
			$this->load->view('tu/suratdisposisi', $data);
			}
}

	public function atasnama($page)
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "atasnama";

		$data['page'] = $page;// 'lihat', dan 'editor'

		if(isset($_GET['id']))
		{
			$id_atasnama = $_GET['id'];
			$data['atasnama_pilih'] = $this->M_TU->atasnama_by_id($id_atasnama);
		}


		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['atasnama'] = $this->M_TU->atasnama_by_id_fak($utama_id_fakultas);


		$this->load->view('tu/atasnama', $data);
	}

	public function new_atasnama()
	{

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Ymd");
		$waktu = date("his");
		$kode0 = rand(10000,99999);
		$kode1 = $utama_id_fakultas.$username.$tgl.$waktu.$kode0;
		$identifier = md5($kode1);

		$this->M_TU->masukkan("atasnama",[
		'id_fakultas'	=>	$utama_id_fakultas,
		'identifier'	=>	$identifier
		]);

		$an1=$this->M_TU->atasnama_by_identifier($identifier);
		foreach($an1 AS $an2)
		{
			$id=$an2->id;
		}

		redirect(base_url("index.php/TU/atasnama/editor?id=$id"));
	}

	public function simpan_atasnama($id)
	{
		$nip 			= $_POST['NIP'];
		$atas_nama 		= $_POST['atas_nama'];
		$jabatan 		= $_POST['jabatan'];

		$this->M_TU->save_an([
			'NIP'			=>	$nip,
			'atas_nama'		=>	$atas_nama,
			'jabatan'		=>	$jabatan
		],"atasnama",$id);

		redirect(base_url("index.php/TU/atasnama/lihat?info=Berhasil memperbarui atasnama."));
	}

	public function hapus_atasnama($id)
	{
		$this->M_TU->hapus_atasnama("atasnama", $id);
		redirect(base_url("index.php/TU/atasnama/lihat/?info=1 atas nama dihapus."));
	}

	public function surat($tipe)
	{
		$data['judul'] = "surat";
		$data['tipesurat'] = $tipe;

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$p1 =  $this->M_TU->ambil_tu($username);
		foreach($p1 AS $p2)
		{
			$id_f = $p2->id_fakultas;
			$nip = $p2->NIP;
		}

		if($tipe=="tu")
		{
			$status = "plain";
			$sebagai = "uploaded";
			$data['surat_tu_plain'] =  $this->M_TU->plain_n_nomorsurat_by_fakultas_n_status_n_sebagai($id_f, $status, $sebagai);

			$this->load->view('tu/surattu', $data);
		}

		else if($tipe=="mahasiswa")
		{
			$username = $this->session->userdata('username');
			$see_f1 = $this->M_TU->ambil_tu($username);
			foreach($see_f1 AS $see_f2)
			{
				$utama_id_fakultas = $see_f2->id_fakultas;
			}
			$data['atasnama'] = $this->M_TU->atasnama_by_id_fak($utama_id_fakultas);
			$data['surat_aktif_kuliah'] =  $this->M_TU->sak_n_nomorsurat_by_fakultas_n_status_n_atasnama($utama_id_fakultas,"approved");
			$this->load->view('tu/suratmhs', $data);
		}

		else if($tipe=="eksternal")
		{
			$sebagai = "uploaded";
			$data['surat_eksternal'] = $this->M_TU->etr_by_fakultas_n_sebagai($id_f, $sebagai);
			$this->load->view('tu/suratetr', $data);
		}

		else if($tipe=="draft")
		{
			$status = "plain";
			$sebagai = "draft";
			$data['surat_tu_plain'] =  $this->M_TU->plain_n_nomorsurat_by_fakultas_n_status_n_sebagai($id_f, $status, $sebagai);
			$data['surat_eksternal'] = $this->M_TU->etr_by_fakultas_n_sebagai($id_f, $sebagai);
			$this->load->view('tu/suratdraft', $data);
		}
	}

	public function permintaansurat()
	{
		$data['judul'] = "permintaan";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}
		$data['atasnama'] = $this->M_TU->atasnama_by_id_fak($utama_id_fakultas);

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;


		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['surat_aktif_kuliah'] =  $this->M_TU->sak_by_fakultas_n_status($utama_id_fakultas,"pending");

		$this->load->view('tu/permintaansurat', $data);
	}

	public function lihatsak($idsurat)
	{
		$data['judul'] = "surat";
		$data['tipesurat'] = "mahasiswa";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['surat_aktif_kuliah'] =  $this->M_TU->ambilsurat("surat_aktif_kuliah",$idsurat);
		$this->load->view('tu/lihatsak', $data);
	}

	public function printsak($idsurat)
	{

		$data['surat_aktif_kuliah'] =  $this->M_TU->carisuratak_by_id("surat_aktif_kuliah",$idsurat);
		$this->load->view('tu/printsak', $data);
	}

	public function printstu($idsurat)
	{
		$data['surat_tu_plain'] =  $this->M_TU->carisuratplain_by_id("surat_tu_plain",$idsurat);
		$this->load->view('tu/printstu', $data);
	}

	public function sak($aksi)
	{
		$idsurat = $_POST['id'];
		if(isset($_POST['keterangan']))
		{
			$keterangan = $_POST['keterangan'];
		}

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Y-m-d");
		$idatasnama = $this->input->post('atasnama');
		$this->M_TU->editsurat([
			'Status_Surat'		=>	$aksi,
			'nip_verificator'	=>	$username,
			'date'				 =>	$tgl,
			'id_atasnama' => $idatasnama,
			],"surat_aktif_kuliah",$idsurat);

		$p1 = $this->M_TU->sak_by_id($idsurat);
		foreach($p1 AS $p2)
		{
			$nim = $p2->NIM;
		}

		if($aksi=="approved")
		{
			$cek = $this->cek_nomorsurat($idsurat);
			if($cek<1)
			{
				date_default_timezone_set("Asia/Jakarta");
				$pla_tahun = date("Y");
							// $this->db->where(['id_surat_aktif'=>$idsurat]);
							// $this->db->update('surat_aktif_kuliah',['id_atasnama'=> $atasnama]);
				$nomorsuratnya = $this->generate_no_surat($utama_id_fakultas, $pla_tahun);
				$this->simpan_nomorsurat($utama_id_fakultas, "surat_aktif_kuliah", $idsurat, $nomorsuratnya, $pla_tahun);
			}

			$subjek = "Surat anda disetujui";
			$isi = "Permintaan surat aktif kuliah Anda telah disetujui oleh TU. Silahkan ambil surat Anda di TU Fakultas.";

			$this->notif_mhs($nim,$subjek,$isi);
			redirect(base_url("index.php/TU/permintaansurat?info=1%20surat%20disetujui."));
		}

		else if($aksi=="rejected")
		{
			$subjek = "Surat anda ditolak";
			$isi = "Permintaan surat aktif kuliah Anda ditolak oleh TU. Mohon cek kembali surat Anda. Keterangan: ".$keterangan;

			$this->notif_mhs($nim,$subjek,$isi);
			redirect(base_url("index.php/TU/permintaansurat?info=1%20surat%20ditolak."));
		}
	}

	public function notif_mhs($nim,$subjek,$isi)
	{
		$this->M_TU->masukkan("pemberitahuan",[
		'NIM'		=>	$nim,
		'subjek'	=>	$subjek,
		'isi'		=>	$isi
		]);
	}

	public function buat()
	{
		$data['judul'] = "buat";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['template_data'] = $this->M_TU->plain_by_fakultas_status($utama_id_fakultas,"template");

		$this->load->view('tu/buat_surat', $data);
	}

	public function buat_surat_plainx()
	{
		$data['judul'] = "buat";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$p1 =  $this->M_TU->ambil_tu($username);
		foreach($p1 AS $p2)
		{
			$id_f = $p2->id_fakultas;
			$nip = $p2->NIP;
		}

		$status = "plain";

		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Ymd");
		$waktu = date("his");


		$kode0 = rand(10000,99999);
		$kode1 = $id_f.$nip.$tgl.$waktu.$kode0;
		$identifier = md5($kode1);

		$this->create_plain($id_f, $nip, $status, $identifier);

		$p3 = $this->M_TU->plain_by_identifier($identifier);
		foreach($p3 AS $p4)
		{
			$id_surat = $p4->id_surattu;
		}

		redirect(base_url("index.php/TU/edit_surat_plain/$id_surat"));
	}

	public function create_plainx($id_f, $nip, $status, $identifier)
	{
		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Y-m-d");

		$this->M_TU->masukkan("surat_tu_plain",[
			'id_fakultas'	=>	$id_f,
			'nip_staff_tu'	=>	$nip,
			'status'		=>	$status,
			'identifier'	=>	$identifier,
			'date'			=>	$tgl
			]);
	}

	public function edit_surat_plainx($id_surat)
	{
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$p1 =  $this->M_TU->ambil_tu($username);
		foreach($p1 AS $p2)
		{
			$id_fakultas = $p2->id_fakultas;
			$nip = $p2->NIP;
		}

		$data['judul'] = "buat";
		$data['surat_pilih'] = $this->M_TU->plain_n_nomorsurat_by_id($id_surat);
		$data['lampiran_pilih'] = $this->M_TU->lampiran_by_id_fakultas_n_id_surat($id_fakultas, $id_surat);
		$data['atasnama'] = $this->M_TU->atasnama_by_id_fak($utama_id_fakultas);
		$this->load->view('tu/edit_surat_plain_draft', $data);

	}

	public function simpan_suratx($id)
	{
		$i_judul	= $_POST['judul'];
		$i_isi		= $_POST['isi'];
		$id_f		= $_POST['fakultas'];
		$id_atasnama = $_POST['atasnama'];
		$penerima = $_POST['penerima'];
		$status		= "plain";

		$aksi = $_POST['aksi'];
		if($aksi == "Simpan") $sebagai="draft";
		else if($aksi == "Simpan dan Upload") $sebagai="uploaded";

		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Y-m-d");

		if($aksi == "Simpan dan Upload") //CEK >> GENERATE >> SIMPAN NOMOR SURAT
		{
			$cek = $this->cek_nomorsurat($id);

			if($cek<1)
			{
				$pla1 = $this->M_TU->plain_by_id($id);
				foreach($pla1 AS $pla2)
				{
					$pla_f	 = $pla2->id_fakultas;
					$pla_date = $pla2->date;
				}

				$pla_tahun = date('Y', strtotime($pla_date));

				$nomorsuratnya = $this->generate_no_surat($pla_f, $pla_tahun);
				$this->simpan_nomorsurat($pla_f, "surat_tu_plain", $id, $nomorsuratnya, $pla_tahun);
			}
		}

		$this->M_TU->save_by_id([
			'tipe_surat'	=>	$i_tipe,
			'Judul'			=>	$i_judul,
			'isi'			=>	$i_isi,
			'date'			=>	$tgl,
			'status'		=>	$status,
			'sebagai'		=>	$sebagai,
			'id_atasnama' => $id_atasnama,
			'PenerimaSurat' => $penerima
			],"surat_tu_plain",$id);

		if($aksi == "Simpan") redirect(base_url("index.php/TU/edit_surat_plain/$id?info=Surat berhasil disimpan."));
		else if($aksi == "Simpan dan Upload") echo redirect(base_url("index.php/TU/lihatstu/$id?info=Surat berhasil disimpan dan diupload."));
	}

	public function buat_surat_etr()
	{
		$data['judul'] = "buat";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$p1 =  $this->M_TU->ambil_tu($username);
		foreach($p1 AS $p2)
		{
			$id_f = $p2->id_fakultas;
			$nip = $p2->NIP;
		}

		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Ymd");
		$waktu = date("his");


		$kode0 = rand(10000,99999);
		$kode1 = $id_f.$nip.$tgl.$waktu.$kode0;
		$identifier = md5($kode1);

		$this->create_etr($id_f, $nip, $identifier);

		$p3 = $this->M_TU->etr_by_identifier($identifier);
		foreach($p3 AS $p4)
		{
			$id_surat = $p4->id;
		}

		redirect(base_url("index.php/TU/edit_surat_etr/$id_surat"));
	}

	public function create_etr($id_f, $nip, $identifier)
	{
		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Y-m-d");

		$this->M_TU->masukkan("surat_eksternal",[
			'id_fakultas'	=>	$id_f,
			'nip_staff_tu'	=>	$nip,
			'identifier'	=>	$identifier,
			'tanggal_input'			=>	$tgl
			]);
	}

	public function edit_surat_etr($id_surat)
	{
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$p1 =  $this->M_TU->ambil_tu($username);
		foreach($p1 AS $p2)
		{
			$id_fakultas = $p2->id_fakultas;
			$nip = $p2->NIP;
		}

		$data['judul'] = "buat";
		$data['surat_pilih'] = $this->M_TU->etr_by_id($id_surat);
		$data['lampiran_pilih'] = $this->M_TU->lampiran_by_id_fakultas_n_id_suratt($id_fakultas, $id_surat);

		$this->load->view('tu/edit_surat_etr', $data);

	}


	public function simpan_surat_etr($id)
	{
		$i_nomorsurat	= $_POST['nomorsurat'];
		$i_perihal			= $_POST['perihal'];
		$i_tanggalinput			= $_POST['tglinput'];
		$i_tanggalditerima		= $_POST['tglditerima'];
		$i_tanggalsurat		= $_POST['tglsurat'];
		$i_asalsurat		= $_POST['asal'];
		$i_tingkatkeamanan = $_POST['tingkatkeamanan'];
		$i_kategorisurat = $_POST['kategorisurat'];
		$i_isisurat	= $_POST['isisurat'];

		$aksi = $_POST['aksi'];
		if($aksi == "Simpan") $sebagai="uploaded";
		else if($aksi == "Upload") $sebagai="uploaded";$status_disposisi="Belum ada disposisi";

		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Y-m-d");

		$this->M_TU->save_by_idetr([
			'nomorsurat'	=>	$i_nomorsurat,
			'perihal'			=>	$i_perihal,
			'asal'			=>	$i_asalsurat,
			'tanggal_input'			=>	$i_tanggalinput,
			'tanggal_surat'	=>	$i_tanggalsurat,
			'tanggal_diterima' => $i_tanggalditerima,
			'TingkatKeamanan' => $i_tingkatkeamanan,
			'KategoriSurat' => $i_kategorisurat,
			'isi_surat' => $i_isisurat,
			'sebagai'		=>	$sebagai,
			'status_disposisi' =>$status_disposisi,

			],"surat_eksternal",$id);

		if($aksi == "Simpan") redirect(base_url("index.php/TU/edit_surat_etr/$id?info=Surat berhasil disimpan."));
		else if($aksi == "Upload") echo redirect(base_url("index.php/TU/lihatetr/$id?info=Surat berhasil disimpan dan diupload."));
	}

	public function back_to_draft($tabel)
	{
		$id		= $_GET['id'];

		$this->M_TU->save_by_id([
			'sebagai'	=>	"draft"
			],$tabel,$id);

		if($tabel == "surat_tu_plain")
			redirect(base_url("index.php/TU/edit_surat_plain/$id?info=Surat kembali menjadi draft."));
		else if($tabel == "surat_eksternal")
			redirect(base_url("index.php/TU/edit_surat_etr/$id?info=Surat kembali menjadi draft."));

	}

	public function hapusdraft($tabel)
	{
		$id = $_GET['id'];
		$this->M_TU->hapusdraft($tabel,$id);
		redirect(base_url("index.php/TU/surat/draft?info=1 draft berhasil dihapus."));
	}

	//START CODE SEPAKET NOMOR SURAT

	public function cek_nomorsurat($id_surat) //CEK APAKAH SI SURAT UDAH PUNYA NOMOR SURAT APA BELUM
	{
		$where = array(
			'id_surat' 	=> $id_surat
			);
		$cek = $this->M_TU->cek_x("nomorsurat",$where)->num_rows();
		return $cek;
	}

	public function generate_no_surat($id_f, $tahun) //GENERATE NOMOR SURATNYA
	{
		$where = array(
			'id_fakultas' 	=> $id_f,
			'tahun'			=> $tahun,
			);

		$total_surat_yg_sudah_bernomor_by_fak_dan_tahun = $this->M_TU->cek_x("nomorsurat",$where)->num_rows();

		$nomor_surat_selanjutnya = $total_surat_yg_sudah_bernomor_by_fak_dan_tahun+1;

		$the_nomor = $nomor_surat_selanjutnya.'/UN5.2.1.'.$id_f.'/KMS/'.$tahun;

		return $the_nomor;
	}

	public function simpan_nomorsurat($id_fakultas, $tipe, $id_surat, $nomorsurat, $tahun) //SIMPAN NOMOR SURATNYA
	{
		$this->M_TU->masukkan("nomorsurat",[
			'id_fakultas'	=>	$id_fakultas,
			'tipe'			=>	$tipe,
			'id_surat'		=>	$id_surat,
			'nomorsurat'	=>	$nomorsurat,
			'tahun'			=>	$tahun,
			]);
	}

	//END CODE SEPAKET NOMOR SURAT


	public function lihatstu($id_surat)
	{
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$p1 =  $this->M_TU->ambil_tu($username);
		foreach($p1 AS $p2)
		{
			$id_fakultas = $p2->id_fakultas;
			$nip = $p2->NIP;
		}

		$data['judul'] = "surat";
		$data['tipesurat'] = "tu";
		$data['surat_pilih'] = $this->M_TU->plain_n_nomorsurat_by_id($id_surat);
		$data['lampiran_pilih'] = $this->M_TU->lampiran_by_id_fakultas_n_id_surat($id_fakultas, $id_surat);

		$this->load->view('tu/lihatstu', $data);
	}

	public function lihatetr($id_surat)
	{
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$p1 =  $this->M_TU->ambil_tu($username);
		foreach($p1 AS $p2)
		{
			$id_fakultas = $p2->id_fakultas;
			$nip = $p2->NIP;
		}

		$data['judul'] = "surat";
		$data['tipesurat'] = "eksternal";
		$data['surat_pilih'] = $this->M_TU->etr_by_id($id_surat);
		$data['lampiran_pilih'] = $this->M_TU->lampiran_by_id_fakultas_n_id_surat($id_fakultas, $id_surat);

		$this->load->view('tu/lihatetr', $data);
	}

	public function profil()
	{
			$data['judul'] = "lihatprofil";
			/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

			$this->load->view('tu/profil', $data);
		}

	public function editprofil()
	{
			$data['judul'] = "editprofil";
			/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

			$this->load->view('tu/edit_profil', $data);
		}

	public function gantipassword()
	{
			$data['judul'] = "gantipassword";
			/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

			$this->load->view('tu/ganti_password', $data);
		}

	public function simpanedit()
	{
			$id = $this->input->post('nip');
			$alamatortu = $this->input->post('alamatortu');
			$alamat = $this->input->post('alamat');

			$data = array('AlamatOrtu' => $alamatortu,'Alamat' => $alamat);

			$where = array('NIP' => $id);

			$this->M_Mahasiswa->editprofil($where,$data,'mahasiswa');
			redirect('mahasiswa/profil?info=Profil%20Anda%20berhasil%20diedit.');
		}

	public function simpanpassword()
	{
			$id = $this->input->post('id');
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');
			$lenght=strlen($password_baru);
			if($password_baru==""){
				redirect('tu/gantipassword?info=Password%20tidak%20boleh%20kosong.');
			}
			if($lenght<8){
				redirect('mahasiswa/gantipassword?info=Password%20minimal%208%20karakter.');
			}
			elseif($konfirmasi_password==""){
				redirect('tu/gantipassword?info=Konfirmasi%20Password%20tidak%20cocok.');
			}
			elseif ($konfirmasi_password!=$password_baru) {
				redirect('tu/gantipassword?info=Konfirmasi%20Password%20tidak%20cocok.');
			}

			$this->db->select('*');
		    $this->db->from('staff_tu');
		    $this->db->where('NIP',$this->session->userdata('username'));
		    $this->db->where('Password',$password_lama);
		    $query = $this->db->get();

		        if($query->num_rows()==1){
		            $data = array('Password' => $password_baru);
	            $this->db->where('NIP', $this->session->userdata('username'));
	            $this->db->update('staff_tu', $data);
	            session_destroy();
	            redirect(base_url("index.php/utama?info=Password%20Anda%20berhasil%20diganti.%20%20Silahkan%20Login%20Kembali."));
				}
				else{
					redirect('tu/gantipassword?info=Password%20lama%20Anda%20tidak%20cocok.');
				}

		}





	public function buat_tpl()
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "template";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$p1 =  $this->M_TU->ambil_tu($username);
		foreach($p1 AS $p2)
		{
			$id_f = $p2->id_fakultas;
			$nip = $p2->NIP;
		}

		$status = "template";

		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Ymd");
		$waktu = date("his");


		$kode0 = rand(10000,99999);
		$kode1 = $id_f.$nip.$tgl.$waktu.$kode0;
		$identifier = md5($kode1);

		$this->create_plain($id_f, $nip, $status, $identifier);

		$p3 = $this->M_TU->plain_by_identifier($identifier);
		foreach($p3 AS $p4)
		{
			$id_surat = $p4->id;
		}

		redirect(base_url("index.php/TU/edit_tpl/$id_surat"));
	}




	public function hapus_tpl($id)
	{
		$this->M_TU->hapusdraft("surat_tu_plain",$id);
		redirect(base_url("index.php/TU/template?info=1 template berhasil dihapus."));
	}

	public function buat_from_template($id_template)
	{
		$data['judul'] = "buat";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$p1 =  $this->M_TU->ambil_tu($username);
		foreach($p1 AS $p2)
		{
			$id_f = $p2->id_fakultas;
			$nip = $p2->NIP;
		}

		$status = "plain";

		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Ymd");
		$waktu = date("his");


		$kode0 = rand(10000,99999);
		$kode1 = $id_f.$nip.$tgl.$waktu.$kode0;
		$identifier = md5($kode1);

		$this->create_surat_from_template($id_template, $id_f, $nip, $status, $identifier);

		$p3 = $this->M_TU->plain_by_identifier($identifier);
		foreach($p3 AS $p4)
		{
			$id_surat = $p4->id_surattu;
		}

		redirect(base_url("index.php/TU/edit_surat_plain/$id_surat"));
	}

	public function create_surat_from_template($id_template, $id_f, $nip, $status, $identifier)
	{
		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Y-m-d");

		$p1 = $this->M_TU->tpl_by_id($id_template);
		foreach($p1 AS $p2)
		{
			$judul = $p2->Judul;
			$tipe_surat = $p2->tipe_surat;
			$isi = $p2->isi;
		}

		$this->M_TU->masukkan("surat_tu_plain",[
			'id_fakultas'	=>	$id_f,
			'nip_staff_tu'	=>	$nip,
			'status'		=>	$status,
			'identifier'	=>	$identifier,
			'date'			=>	$tgl,

			'Judul'			=>	$judul,
			'tipe_surat'	=>	$tipe_surat,
			'isi'			=>	$isi
			]);
	}


	public function akun()
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "akun";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$this->load->view('tu/akun', $data);
	}

	public function editakun($apaygdiedit)
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "akun";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		if($apaygdiedit == "profil")
		{
			$data['apaygdiedit'] = "profil";
		}
		else if($apaygdiedit == "email")
		{
			$data['apaygdiedit'] = "email";
		}
		else if($apaygdiedit == "password")
		{
			$data['apaygdiedit'] = "password";
		}

		$this->load->view('tu/editakun', $data);
	}

	public function editakun2($apaygdiedit)
	{
		$nip = $this->session->userdata('username');

		if($apaygdiedit == "profil")
		{
			$nama = $_POST['nama'];

			$this->M_TU->save_by_nip([
				'Nama'	=>	$nama
				],"staff_tu",$nip);

			redirect(base_url("index.php/TU/akun?info=Profil berhasil diedit."));
		}

		else if($apaygdiedit == "email")
		{
			$old_email = $_POST['old_email'];
			$new_email = $_POST['new_email'];

			if($old_email != $new_email)
			{
				$dimana = array(
					'Email' => $new_email
					);
				$cek_mhs = $this->M_TU->cek_x("Mahasiswa",$dimana)->num_rows();
				$cek_tu = $this->M_TU->cek_x("Staff_TU",$dimana)->num_rows();

				if($cek_mhs>0 OR $cek_tu>0)
				{
					redirect(base_url("index.php/TU/editakun/email?error=Email sudah ada! Coba email lain!"));
				}
				else
				{
					$this->M_TU->save_by_nip([
						'Email' 	=> $new_email,
						],"staff_tu",$nip);

					redirect(base_url("index.php/TU/akun?info=Email berhasil diubah."));
				}
			}
			else
			{
				redirect(base_url("index.php/TU/editakun/email?error=Tidak ada perubahan!"));
			}
		}

		else if($apaygdiedit == "password")
		{
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');

			if($password_baru=="")
			{
				redirect(base_url("index.php/TU/editakun/password?error=Password tidak boleh kosong!"));
			}

			else if($konfirmasi_password=="" OR $konfirmasi_password!=$password_baru)
			{
				redirect(base_url("index.php/TU/editakun/password?error=Konfirmasi password tidak cocok!"));
			}

			$this->db->select('*');
			$this->db->from('staff_tu');
			$this->db->where('NIP',$this->session->userdata('username'));
			$this->db->where('Password',md5($password_lama));
			$query = $this->db->get();

			if($query->num_rows()==1){
				$data = array('Password' => md5($password_baru));
			$this->db->where('NIP', $this->session->userdata('username'));
			$this->db->update('staff_tu', $data);
			session_destroy();
			redirect(base_url("index.php/utama?info=Password%20Anda%20berhasil%20diganti.%20%20Silahkan%20Login%20Kembali."));
			}
			else{
				redirect(base_url("index.php/TU/editakun/password?error=Password lama salah!"));
			}
		}
	}

	public function editatasnamasak($idsurat)
	{
			$atasnama = $this->input->post('atasnama');
			$surat_aktif_kuliah =  $this->M_TU->ambilsurat("surat_aktif_kuliah",$idsurat);
			foreach ($surat_aktif_kuliah as $sak) {
				$idatasnama = $sak->id_atasnama;
			}
						$this->db->where(['id_surat_aktif'=>$idsurat]);
						$this->db->update('surat_aktif_kuliah',['id_atasnama'=> $atasnama]);
						redirect(base_url("index.php/TU/surat/mahasiswa?info=Atas nama berhasil diubah."));
	}












	//CODE REVOLUSIONER 22 DESEMBER 2018===============================================================================================//









	public function index()
	{
		$data['judul'] = "awal";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['info_fakultas'] = $this->M_TU->f_by_id_f($utama_id_fakultas);

		$this->load->view('tu/utama', $data);
	}


	public function baru($page)
	{
		$data['judul'] = "baru";
		$data['page'] = $page;

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['layout_pilih'] = $this->M_TU->layout_by_fakultas($utama_id_fakultas);

		$this->load->view('tu/baru', $data);
	}

	public function buat_go()
	{
		$id_layout	= $_GET['id_layout'];
		$pembuatan	= $_GET['pembuatan'];
		$bahasa		= $_GET['bahasa'];

		if($pembuatan=="siperan")
		{
			redirect(base_url("index.php/TU/buat_dari_layout?id_layout=$id_layout&bahasa=$bahasa"));
		}
		else if($pembuatan=="unggahan")
		{
			redirect(base_url("index.php/TU/buat_surat_unggahan?id_layout=$id_layout&bahasa=$bahasa"));
		}
	}

	public function buat_dari_layout()
	{
		$id_layout = $_GET['id_layout'];
		$bahasa = $_GET['bahasa'];



		$data['judul'] = "buat";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		//pembuat identifier
		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Ymd");
		$waktu = date("his");
		$kode0 = rand(10000,99999);
		$kode1 = $utama_id_fakultas.$username.$tgl.$waktu.$kode0;
		$identifier = md5($kode1);

		$ly1 = $this->M_TU->layout_by_id($id_layout);
		foreach($ly1 AS $ly2)
		{
			$format_nosur = $ly2->format_nosur;

			if($bahasa=="indonesia")$judul = $ly2->judul;
			else if($bahasa=="inggris")$judul = $ly2->judul_inggris;

			if($bahasa=="indonesia")$isi = $ly2->setting;
			else if($bahasa=="inggris")$isi = $ly2->setting_inggris;
		}

		$nomorsurat = $this->generate_nosur_by_layout($id_layout, $utama_id_fakultas, $format_nosur);

		$ff0 = $this->M_TU->pilih_satu_atasnama($utama_id_fakultas);
		foreach($ff0 AS $ff1)
		{
			$id_atasnama = $ff1->id;
		}

		$pembuatan="siperan";

		$this->create_new($bahasa, $id_layout, $utama_id_fakultas, $pembuatan, $nomorsurat, $username, $isi, $id_atasnama, $identifier);

		$p3 = $this->M_TU->surat_flex_by_identifier($identifier);
		foreach($p3 AS $p4)
		{
			$id_surat = $p4->id_surat;
		}

		$this->M_TU->masuk_log
		([
		'id_fakultas'	=>	$utama_id_fakultas,
		'isi_log'		=>	'TU dengan NIP '.$username.' membuat surat baru dengan layout ber id_layout = '.$id_layout.' , bahasa: '.$bahasa.'.'
		]);

		redirect(base_url("index.php/TU/editor_surat/$id_surat"));
	}

	public function buat_surat_unggahan()
	{
		$id_layout = $_GET['id_layout'];
		$bahasa = $_GET['bahasa'];


		$data['judul'] = "buat";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		//pembuat identifier
		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Ymd");
		$waktu = date("his");
		$kode0 = rand(10000,99999);
		$kode1 = $utama_id_fakultas.$username.$tgl.$waktu.$kode0;
		$identifier = md5($kode1);

		$ly1 = $this->M_TU->layout_by_id($id_layout);
		foreach($ly1 AS $ly2)
		{
			$format_nosur = $ly2->format_nosur;
		}

		$nomorsurat = $this->generate_nosur_by_layout($id_layout, $utama_id_fakultas, $format_nosur);

		$ff0 = $this->M_TU->pilih_satu_atasnama($utama_id_fakultas);
		foreach($ff0 AS $ff1)
		{
			$id_atasnama = $ff1->id;
		}

		$isi="";
		$pembuatan="unggahan";

		$this->create_new($bahasa, $id_layout, $utama_id_fakultas, $pembuatan, $nomorsurat, $username, $isi, $id_atasnama, $identifier);

		$p3 = $this->M_TU->surat_flex_by_identifier($identifier);
		foreach($p3 AS $p4)
		{
			$id_surat = $p4->id_surat;
		}

		$this->M_TU->masuk_log
		([
		'id_fakultas'	=>	$utama_id_fakultas,
		'isi_log'		=>	'TU dengan NIP '.$username.' membuat surat baru dengan layout ber id_layout = '.$id_layout.' , bahasa: '.$bahasa.'.'
		]);

		redirect(base_url("index.php/TU/editor_surat/$id_surat"));
	}

	public function generate_nosur_by_layout($id_layout, $id_f, $format_nosur)
	{
		$where = array(
			'id_layout' 	=> $id_layout
			);

		date_default_timezone_set("Asia/Jakarta");
		$tahun = date("Y");

		$total_surat_yg_sudah_bernomor_by_layout = $this->M_TU->cek_x("surat_flex",$where)->num_rows();

		$nomor_surat_selanjutnya = $total_surat_yg_sudah_bernomor_by_layout+1;

		$the_nomor = $nomor_surat_selanjutnya.'/UN5.2.1.'.$id_f.'/'.$format_nosur.'/'.$tahun;

		return $the_nomor;
	}

	public function create_new($bahasa, $id_layout, $id_f, $pembuatan, $nomorsurat, $nip, $isi, $id_atasnama, $identifier)
	{
		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Y-m-d");

		$tempat_surat = "Medan";

		$this->M_TU->masukkan("surat_flex",[
			'bahasa'			=>	$bahasa,
			'id_layout'			=>	$id_layout,
			'id_fakultas'		=>	$id_f,
			'pembuatan'			=>	$pembuatan,
			'nomorsurat'		=>	$nomorsurat,
			'NIP_surat'			=>	$nip,
			'isi_surat'			=>	$isi,
			'tempat_surat'		=>	$tempat_surat,
			'tanggal_surat'		=>	$tgl,
			'atasnama_surat'	=>	$id_atasnama,
			'identifier'		=>	$identifier
			]);
	}

	public function editor_surat($id_surat)
	{
		$data['judul'] = "surat_keluar";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['atasnama_f'] = $this->M_TU->atasnama_by_id_fak($utama_id_fakultas);

		$data['lampiran_pilih'] = $this->M_TU->lampiran_by_id_surat($id_surat);

		$data['surat_flex'] = $this->M_TU->surat_flex_by_id($id_surat);

		$this->load->view('tu/edit_surat', $data);

	}

	public function simpan_surat($pembuatan)
	{
		$id_surat = $_POST['id_surat'];

		if(isset($_POST['hal_surat']))
		{
			$hal_surat = $_POST['hal_surat'];
		}
		else
		{
			$hal_surat = "";
		}

		if(isset($_POST['penerima_surat']))
		{
			$penerima_surat = $_POST['penerima_surat'];
		}
		else
		{
			$penerima_surat = "";
		}

		$isi_surat="";

		if($pembuatan=="siperan")
		{
			$isi_surat 			= $_POST['isi_surat'];
		}

		else if($pembuatan=="unggahan")
		{

			//START upload FILE

			$uploadlampiran = $this->M_TU->upload_surat_unggahan("isi_surat");

			if($uploadlampiran['result'] == "success")
			{
				$link_lampiran = $uploadlampiran['file']['file_name'];
			}
			else
			{
				$data['message'] = $uploadlampiran['error'];
				echo $data['message'];
				exit;
			}
			//END upload FILE
			$isi_surat = $link_lampiran;
		}

		$tempat_surat		= $_POST['tempat_surat'];
		$tanggal_surat 		= $_POST['tanggal_surat'];
		$atasnama_surat 	= $_POST['atasnama_surat'];



		$this->M_TU->save_surat([
			'hal_surat'			=>	$hal_surat,
			'penerima_surat'	=>	$penerima_surat,
			'tempat_surat'		=>	$tempat_surat,
			'tanggal_surat'		=>	$tanggal_surat,
			'atasnama_surat'	=>	$atasnama_surat,
			'isi_surat'			=>	$isi_surat

			],"surat_flex",$id_surat);


		$aksi = $_POST['aksi'];
		if($aksi=="Simpan")
		{
			redirect(base_url("index.php/TU/editor_surat/$id_surat?info=Surat berhasil disimpan."));
		}
		else if($aksi=="Simpan dan Selesai")
		{
			redirect(base_url("index.php/TU/surat_keluar?info=Surat berhasil disimpan."));
		}
	}

	public function simpan_lampiran($id_surat)
	{

		$i_fakultas	= $_POST['id_f'];
		$i_judul	= $_POST['judul'];

		////////////////////////////////////////////////////////////////////////////////////////////////////////
		//START upload FILE

			$uploadlampiran = $this->M_TU->upload("lampiran");

			if($uploadlampiran['result'] == "success"){
				$link_lampiran = $uploadlampiran['file']['file_name'];
			}
			else{
				$data['message'] = $uploadlampiran['error'];
				echo $data['message'];
				exit;
			}
		//END upload FILE
			$this->M_TU->masukkan("lampiran_eksternal",[
			'id_fakultas'		=>	$i_fakultas,
			'id_surat'			=>	$id_surat,
			'judul_lampiran'				=>	$i_judul,
			'link_lampiran'				=>	$link_lampiran
			]);

				redirect(base_url("index.php/TU/edit_surat_etr/$id_surat?info=1 file lampiran berhasil diupload."));

		////////////////////////////////////////////////////////////////////////////////////////////////////////
	}


	public function hapuslampiran()
	{
		$id_lampiran = $_GET['id_lampiran'];
		$id_surat = $_GET['id_surat'];
		$this->M_TU->hapuslampiran("lampiran", $id_lampiran);
		redirect(base_url("index.php/TU/editor_surat/$id_surat?info=1 file lampiran telah dihapus."));
	}
	public function hapuslampiranetr()
	{
		$id_lampiran = $_GET['id_lampiran'];
		$id_surat = $_GET['id_surat'];
		$this->M_TU->hapuslampiranetr("lampiran_eksternal", $id_lampiran);
		redirect(base_url("index.php/TU/edit_surat_etr/$id_surat?info=1 file lampiran telah dihapus."));
	}


	public function preview_surat($id_surat)
	{
		$data['surat_flex_pilih'] = $this->M_TU->preview_surat($id_surat);

		$this->load->view('tu/preview_surat', $data);

	}

	public function preview_surat_inggris($id_surat)
	{
		$data['surat_flex_pilih'] = $this->M_TU->preview_surat($id_surat);

		$this->load->view('tu/preview_surat_inggris', $data);

	}


	public function layout()
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "layout";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['layout_data'] = $this->M_TU->layout_by_fakultas($utama_id_fakultas);

		$this->load->view('tu/layout', $data);
	}

	public function new_layout()
	{
		$data['judul'] = "buat";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		//pembuat identifier
		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Ymd");
		$waktu = date("his");
		$kode0 = rand(10000,99999);
		$kode1 = $utama_id_fakultas.$username.$tgl.$waktu.$kode0;
		$identifier = md5($kode1);

		$this->create_layout($utama_id_fakultas, $identifier);

		$p3 = $this->M_TU->layout_by_identifier($identifier);
		foreach($p3 AS $p4)
		{
			$id_layout = $p4->id_layout;
		}

		redirect(base_url("index.php/TU/editor_layout/$id_layout"));
	}

	public function create_layout($id_f, $identifier)
	{
		$this->M_TU->masukkan("layout",[
			'id_fakultas'		=>	$id_f,
			'identifier'		=>	$identifier
			]);
	}

	public function editor_layout($id_layout)
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "layout";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['layout_pilih'] = $this->M_TU->layout_by_id($id_layout);

		$this->load->view('tu/edit_layout', $data);

	}

	public function simpan_layout($id_layout)
	{
		$i_format_nosur		= $_POST['format_nosur'];

		$i_judul			= $_POST['judul'];
		$i_judul_inggris	= $_POST['judul_inggris'];

		$i_setting			= $_POST['setting'];
		$i_setting_inggris	= $_POST['setting_inggris'];

		$show_form_hal 		= $_POST['show_form_hal'];
		$show_form_penerima = $_POST['show_form_penerima'];
		$show_lampiran 		= $_POST['show_lampiran'];


		$this->M_TU->save_layout([
			'format_nosur'			=>	$i_format_nosur,
			'judul'					=>	$i_judul,
			'setting'				=>	$i_setting,
			'judul_inggris'			=>	$i_judul_inggris,
			'setting_inggris'		=>	$i_setting_inggris,
			'show_form_hal'			=>	$show_form_hal,
			'show_form_penerima'	=>	$show_form_penerima,
			'show_lampiran'			=>	$show_lampiran

			],"layout",$id_layout);

		if(isset($_POST['aksi']))$aksi = $_POST['aksi'];
		else $aksi = "Simpan";

		if($aksi=="Simpan")
		{
			redirect(base_url("index.php/TU/editor_layout/$id_layout?info=Layout berhasil disimpan."));
		}
		else if($aksi=="Simpan dan Selesai")
		{
			redirect(base_url("index.php/TU/layout?info=Layout berhasil disimpan."));
		}
	}

	public function preview_layout($id_layout)
	{
		$id_f = $_GET['id_f'];

		$data['layout_pilih'] = $this->M_TU->preview_layout($id_layout, $id_f);

		$this->load->view('tu/preview_layout', $data);

	}

	public function preview_layout_inggris($id_layout)
	{
		$id_f = $_GET['id_f'];

		$data['layout_pilih'] = $this->M_TU->preview_layout($id_layout, $id_f);

		$this->load->view('tu/preview_layout_inggris', $data);

	}

	public function infofakultas()
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "infofakultas";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['info_fakultas'] = $this->M_TU->f_by_id_f($utama_id_fakultas);

		$this->load->view('tu/infofakultas', $data);
	}

	public function editfakultas()
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "infofakultas";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['info_fakultas'] = $this->M_TU->f_by_id_f($utama_id_fakultas);

		$this->load->view('tu/editfakultas', $data);
	}

	public function simpan_fakultas()
	{
		$id_fakultas	= $_POST['id_fakultas'];

		$alamatfakultas = $_POST['alamatfakultas'];
		$telp 			= $_POST['telp'];
		$laman 			= $_POST['laman'];
		$email 			= $_POST['email'];

		$this->M_TU->save_f([
			'id_fakultas'		=>	$id_fakultas,
			'Alamat_Fakultas'	=>	$alamatfakultas,
			'Telp'				=>	$telp,
			'Laman'				=>	$laman,
			'Email_Fakultas'	=>	$email
		],"fakultas",$id_fakultas);



		redirect(base_url("index.php/TU/infofakultas?info=Info fakultas berhasil di edit."));
	}

	public function logo_fakultas($mode)
	{
		$id_fakultas = $_GET['id_fakultas'];
		$p1 = $this->M_TU->f_by_id_f($id_fakultas);
		foreach($p1 AS $p2)
		{
			$logo_fakultas = $p2->logo_fakultas;
			$logo_fakultas_lama = $p2->logo_fakultas_lama;
		}

		if($mode=="baru")
		{
			//START upload FILE

			$uploadlogo = $this->M_TU->upload_logo_fakultas("logofakultas");

			if($uploadlogo['result'] == "success")
			{
				$link_logo_baru = $uploadlogo['file']['file_name'];
			}
			else
			{
				$data['message'] = $uploadlogo['error'];
				echo $data['message'];
				exit;
			}
			//END upload FILE

			$this->M_TU->save_f([
				'logo_fakultas'			=>	$link_logo_baru,
				'logo_fakultas_lama'	=>	$logo_fakultas
			],"fakultas",$id_fakultas);

			redirect(base_url("index.php/TU/editfakultas?warning_logo=menjadi_baru"));
		}

		if($mode=="lama")
		{
			$this->M_TU->save_f([
				'logo_fakultas'			=>	$logo_fakultas_lama
			],"fakultas",$id_fakultas);

			redirect(base_url("index.php/TU/editfakultas?warning_logo=kembali_lama"));
		}
	}

	public function lihat_log()
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "lihat_log";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['lihat_log'] = $this->M_TU->log_by_id_f($utama_id_fakultas);

		$this->load->view('tu/lihat_log', $data);
	}

	public function to_arsip($tipesuratnya)
	{
		//tipe surat: 'surat_keluar', 'surat_masuk', 'surat_mahasiswa'

		$id = $_GET['id'];

		if($tipesuratnya=="surat_keluar")
		{

			$this->M_TU->save_surat([
				'status_surat'	=>	"arsip"

				],"surat_flex",$id);

			redirect(base_url("index.php/TU/surat_keluar?info=1 surat berhasil diarsipkan."));
		}
		elseif($tipesuratnya=="surat_mahasiswa")
		{

			$this->M_TU->save_surat_mhs([
				'tindakan'	=>	"arsip"

				],"surat_flex_mhs",$id);

			redirect(base_url("index.php/TU/suratmahasiswa?info=1 surat berhasil diarsipkan."));
		}
		elseif($tipesuratnya=="surat_masuk")
		{

			$this->M_TU->save_surat_msk([
				'tindakan'	=>	"arsip"

			],"surat_eksternal",$id);

			redirect(base_url("index.php/TU/surat_masuk?info=1 surat berhasil diarsipkan."));
		}
		elseif($tipesuratnya=="surat_disposisi")
		{

			$this->M_TU->save_surat_dis([
				'tindakan'	=>	"arsip"

				],"surat_disposisi",$id);

			redirect(base_url("index.php/TU/surat_disposisi?info=1 surat berhasil diarsipkan."));
		}

	}



	public function surat_keluar()
	{
		$data['judul'] = "surat_keluar";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['surat_keluar'] = $this->M_TU->surat_flex_n_layout_by_id_f($utama_id_fakultas);


		$this->load->view('tu/suratkeluar', $data);
	}
	public function surat_masuk()
	{
		$data['judul'] = "surat_masuk";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$p1 =  $this->M_TU->ambil_tu($username);
		foreach($p1 AS $p2)
		{
			$id_f = $p2->id_fakultas;
			$nip = $p2->NIP;
		}
		$sebagai = "uploaded";
		$data['surat_eksternal'] = $this->M_TU->etr_by_fakultas_n_sebagai($id_f, $sebagai);
		$this->load->view('tu/suratetr', $data);

	}
	public function surat_disposisi()
	{
		$data['judul'] = "surat_disposisi";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$p1 =  $this->M_TU->ambil_tu($username);
		foreach($p1 AS $p2)
		{
			$id_f = $p2->id_fakultas;
			$nip = $p2->NIP;
		}
		$nip = $this->session->userdata('username');
		$data['surat_disposisi'] = $this->M_TU->ambildisposisi($id_f);
		$this->load->view('tu/suratdisposisi', $data);

	}


	public function lihat_arsip()
	{
		$data['judul'] = "lihat_arsip";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['arsip_surat_keluar'] = $this->M_TU->arsip_surat_flex_n_layout_by_id_f($utama_id_fakultas);
		$data['arsip_surat_mhs'] = $this->M_TU->arsip_surat_flex_mhs_n_layout_by_id_f($utama_id_fakultas);
		$data['arsip_surat_msk'] = $this->M_TU->arsip_surat_msk_n_layout_by_id_f($utama_id_fakultas);
		$data['arsip_surat_dis'] = $this->M_TU->arsip_surat_dis_n_by_id_f($utama_id_fakultas);

		$this->load->view('tu/arsip', $data);
	}

	public function lihat_suratkeluar($id_surat)
	{
		$data['judul'] = "lihat_arsip";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['lampiran_pilih'] = $this->M_TU->lampiran_by_id_surat($id_surat);

		$data['surat_keluar_pilih'] = $this->M_TU->surat_flex_by_id($id_surat);


		$this->load->view('tu/lihat_suratkeluar', $data);
	}

	public function new_foto_profil()
	{
		$username = $this->session->userdata('username');

		//START upload FILE

		$uploadfoto = $this->M_TU->upload_foto_profil("fotoprofil");

		if($uploadfoto['result'] == "success")
		{
			$link_fotonya = $uploadfoto['file']['file_name'];
		}
		else
		{
			$data['message'] = $uploadfoto['error'];
			echo $data['message'];
			exit;
		}
		//END upload FILE

		$this->M_TU->save_by_nip([
				'foto_profil'	=>	$link_fotonya
			],"staff_tu",$username);

		redirect(base_url("index.php/TU/akun?info=Foto profil diganti."));

	}





	//START LAYOUT MAHASISWA //////////////////////////////////////////////////////////////////////////////////////////////////////

	public function layout_mhs()
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "layout_mhs";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['layout_mhs_data'] = $this->M_TU->layout_mhs_by_fakultas($utama_id_fakultas);

		$this->load->view('tu/layout_mhs', $data);
	}

	public function new_layout_mhs()
	{
		$data['judul'] = "buat";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		//pembuat identifier
		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Ymd");
		$waktu = date("his");
		$kode0 = rand(10000,99999);
		$kode1 = $utama_id_fakultas.$username.$tgl.$waktu.$kode0;
		$identifier = md5($kode1);

		$this->create_layout_mhs($utama_id_fakultas, $identifier);

		$p3 = $this->M_TU->layout_mhs_by_identifier($identifier);
		foreach($p3 AS $p4)
		{
			$id_layout_mhs = $p4->id_layout_mhs;
		}

		redirect(base_url("index.php/TU/pre_editor_layout_mhs/$id_layout_mhs"));
	}

	public function create_layout_mhs($id_f, $identifier)
	{
		$this->M_TU->masukkan("layout_mhs",[
			'id_fakultas'		=>	$id_f,
			'identifier'		=>	$identifier
			]);
	}

	public function pre_editor_layout_mhs($id_layout_mhs)
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "layout_mhs";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['layout_mhs_pilih'] = $this->M_TU->layout_mhs_by_id($id_layout_mhs);

		$this->load->view('tu/pre_edit_layout_mhs', $data);

	}

	public function editor_layout_mhs($id_layout_mhs)
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "layout_mhs";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['layout_mhs_pilih'] = $this->M_TU->layout_mhs_by_id($id_layout_mhs);

		$this->load->view('tu/edit_layout_mhs', $data);

	}

	public function simpan_pre_layout_mhs($id_layout_mhs)
	{
		$borang1status		= $_POST['borang1status'];
		$borang1judul		= $_POST['borang1judul'];
		$borang1desc		= $_POST['borang1desc'];

		$borang2status		= $_POST['borang2status'];
		$borang2judul		= $_POST['borang2judul'];
		$borang2desc		= $_POST['borang2desc'];

		$borang3status		= $_POST['borang3status'];
		$borang3judul		= $_POST['borang3judul'];
		$borang3desc		= $_POST['borang3desc'];

		$borang4status		= $_POST['borang4status'];
		$borang4judul		= $_POST['borang4judul'];
		$borang4desc		= $_POST['borang4desc'];

		$borang5status		= $_POST['borang5status'];
		$borang5judul		= $_POST['borang5judul'];
		$borang5desc		= $_POST['borang5desc'];

		$borang6status		= $_POST['borang6status'];
		$borang6judul		= $_POST['borang6judul'];
		$borang6desc		= $_POST['borang6desc'];

		$borang7status		= $_POST['borang7status'];
		$borang7judul		= $_POST['borang7judul'];
		$borang7desc		= $_POST['borang7desc'];

		$borang8status		= $_POST['borang8status'];
		$borang8judul		= $_POST['borang8judul'];
		$borang8desc		= $_POST['borang8desc'];

		$borang9status		= $_POST['borang9status'];
		$borang9judul		= $_POST['borang9judul'];
		$borang9desc		= $_POST['borang9desc'];

		$borang10status		= $_POST['borang10status'];
		$borang10judul		= $_POST['borang10judul'];
		$borang10desc		= $_POST['borang10desc'];



		$this->M_TU->save_layout_mhs([
			'borang1status'		=>	$borang1status,
			'borang1judul'		=>	$borang1judul,
			'borang1desc'		=>	$borang1desc,

			'borang2status'		=>	$borang2status,
			'borang2judul'		=>	$borang2judul,
			'borang2desc'		=>	$borang2desc,

			'borang3status'		=>	$borang3status,
			'borang3judul'		=>	$borang3judul,
			'borang3desc'		=>	$borang3desc,

			'borang4status'		=>	$borang4status,
			'borang4judul'		=>	$borang4judul,
			'borang4desc'		=>	$borang4desc,

			'borang5status'		=>	$borang5status,
			'borang5judul'		=>	$borang5judul,
			'borang5desc'		=>	$borang5desc,

			'borang6status'		=>	$borang6status,
			'borang6judul'		=>	$borang6judul,
			'borang6desc'		=>	$borang6desc,

			'borang7status'		=>	$borang7status,
			'borang7judul'		=>	$borang7judul,
			'borang7desc'		=>	$borang7desc,

			'borang8status'		=>	$borang8status,
			'borang8judul'		=>	$borang8judul,
			'borang8desc'		=>	$borang8desc,

			'borang9status'		=>	$borang9status,
			'borang9judul'		=>	$borang9judul,
			'borang9desc'		=>	$borang9desc,

			'borang10status'	=>	$borang10status,
			'borang10judul'		=>	$borang10judul,
			'borang10desc'		=>	$borang10desc,




			],"layout_mhs",$id_layout_mhs);


		redirect(base_url("index.php/TU/editor_layout_mhs/$id_layout_mhs?info=Sub-from berhasil diperbarui."));

	}

	public function simpan_layout_mhs($id_layout_mhs)
	{
		$i_format_nosur		= $_POST['format_nosur'];

		$i_judul			= $_POST['judul'];
		$i_judul_inggris	= $_POST['judul_inggris'];

		$i_setting			= $_POST['setting'];
		$i_setting_inggris	= $_POST['setting_inggris'];

		$this->M_TU->save_layout_mhs([
			'format_nosur'			=>	$i_format_nosur,
			'judul'					=>	$i_judul,
			'setting'				=>	$i_setting,
			'judul_inggris'			=>	$i_judul_inggris,
			'setting_inggris'		=>	$i_setting_inggris

			],"layout_mhs",$id_layout_mhs);



		if(isset($_POST['aksi']))$aksi = $_POST['aksi'];
		else $aksi = "Simpan";

		if($aksi=="Simpan")
		{
			redirect(base_url("index.php/TU/editor_layout_mhs/$id_layout_mhs?info=Layout berhasil disimpan."));
		}
		else if($aksi=="Simpan dan Selesai")
		{
			redirect(base_url("index.php/TU/layout_mhs?info=Layout berhasil disimpan."));
		}
	}

	public function preview_layout_mhs($id_layout_mhs)
	{
		$id_f = $_GET['id_f'];

		$data['layout_mhs_pilih'] = $this->M_TU->preview_layout_mhs($id_layout_mhs, $id_f);

		$this->load->view('tu/preview_layout_mhs', $data);

	}

	public function preview_layout_mhs_inggris($id_layout_mhs)
	{
		$id_f = $_GET['id_f'];

		$data['layout_mhs_pilih'] = $this->M_TU->preview_layout_mhs($id_layout_mhs, $id_f);

		$this->load->view('tu/preview_layout_mhs_inggris', $data);

	}

	public function preview_surat_mhs($id_surat_mhs)
	{
		$data['preview_surat_mhs'] = $this->M_TU->pilih_surat_flex_mhs($id_surat_mhs);

		$this->load->view('tu/preview_surat_mhs', $data);

	}

	public function preview_suratmhs($id_surat_mhs)
	{
		$data['preview_surat_mhs'] = $this->M_TU->pilih_surat_flex_mhs_atasnama($id_surat_mhs);

		$this->load->view('tu/preview_surat_mhs', $data);

	}

	public function preview_suratmhs_inggris($id_surat_mhs)
	{
		$data['preview_surat_mhs'] = $this->M_TU->pilih_surat_flex_mhs_atasnama($id_surat_mhs);

		$this->load->view('tu/preview_surat_mhs_inggris', $data);

	}

	public function preview_surat_mhs_app($id_surat_mhs)
	{
		$data['preview_surat_mhs'] = $this->M_TU->pilih_surat_flex_mhs_app($id_surat_mhs);

		$this->load->view('tu/preview_surat_mhs', $data);

	}


	//END LAYOUT MAHASISWA

	public function suratmahasiswa()
	{
		$data['judul'] = "suratmahasiswa";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['surat_flex_mhs'] = $this->M_TU->surat_flex_mhs_n_layout_by_id_f_pending($utama_id_fakultas);

		$this->load->view('tu/suratmahasiswa', $data);

	}

	public function review_surat_mhs($id_surat_mhs)
	{
		$data['judul'] = "suratmahasiswa";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['pilih_surat_flex_mhs'] = $this->M_TU->pilih_surat_flex_mhs($id_surat_mhs);

		$this->load->view('tu/review_surat_mhs', $data);

	}

	public function perlakukan_surat_mhs($diapain_gan_hehe)
	{
		$id_surat_mhs = $_POST['id_surat_mhs'];
		if(isset($_POST['keterangan']))
		{
			$keterangan = $_POST['keterangan'];
		}

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Y-m-d");
		$tahun = date("Y");

		$this->M_TU->perlakukan_surat_mhs([
			'status_surat'		=>	$diapain_gan_hehe,
			'tgl_terima'		=>	$tgl,
			],"surat_flex_mhs",$id_surat_mhs);

		$flex1 = $this->M_TU->pilih_surat_flex_mhs($id_surat_mhs);
		foreach($flex1 AS $flex2)
		{
			$nim = $flex2->NIM;
			$id_layout_mhs = $flex2->id_layout_mhs;
			$format_nosur = $flex2->format_nosur;
		}

		if($diapain_gan_hehe=="approved")
		{
			//kasih nomorsurat
			$nomorsurat = $this->cari_nosur_mhs($id_layout_mhs, $utama_id_fakultas, $format_nosur, $tahun);

			//pilihin 1 atasnama
			$an1 = $this->M_TU->pilih_satu_atasnama($utama_id_fakultas);
			foreach($an1 AS $an2)
			{
				$atasnama_surat = $an2->id;
			}

			//ubah isinya
			$this->M_TU->perlakukan_surat_mhs([
				'nomorsurat'		=>	$nomorsurat,
				'atasnama_surat'	=>	$atasnama_surat,
				],"surat_flex_mhs",$id_surat_mhs);
			 $this->M_TU->masuk_log
			    ([
			    'id_fakultas' => $utama_id_fakultas,
			    'isi_log' => 'TU dengan NIP '.$username.' menerima permintaan surat dari mahasiswa dengan NIM '.$nim
			    ]);
			//kasih pemberitahuan ke mahasiswa ybs
			$subjek = "Surat anda disetujui";
			$isi = "Permintaan surat aktif kuliah Anda telah disetujui oleh TU. Silahkan ambil surat Anda di TU Fakultas.";

			$this->notif_mhs($nim,$subjek,$isi);
			redirect(base_url("index.php/TU/suratmahasiswa?info=1%20surat%20disetujui."));

		}

		else if($diapain_gan_hehe=="rejected")
		{
			$subjek = "Surat anda ditolak";
			$isi = "Permintaan surat aktif kuliah Anda ditolak oleh TU. Mohon cek kembali surat Anda. Keterangan: ".$keterangan;
			   $this->M_TU->masuk_log
			   ([
			   'id_fakultas' => $utama_id_fakultas,
			   'isi_log' => 'TU dengan NIP '.$username.' menolak permintaan surat dari mahasiswa dengan NIM '.$nim
			   ]);
			$this->notif_mhs($nim,$subjek,$isi);
			redirect(base_url("index.php/TU/suratmahasiswa?info=1%20surat%20ditolak."));
		}
	}

	public function cari_nosur_mhs($id_layout_mhs, $id_f, $format_nosur, $tahun) //GENERATE NOMOR SURAT MHS
	{
		$where = array(
			'id_layout_mhs' => $id_layout_mhs
			);

		$total_surat_yg_sudah_bernomor_by_fak = $this->M_TU->cek_x("surat_flex_mhs",$where)->num_rows();

		$nomor_surat_selanjutnya = $total_surat_yg_sudah_bernomor_by_fak+1;

		$the_nomor = $nomor_surat_selanjutnya.'/UN5.2.1.'.$id_f.'/'.$format_nosur.'/'.$tahun;

		return $the_nomor;
	}
	public function buatdisposisietr($idsurat){
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

	$username = $this->session->userdata('username');
	$data['data_user'] =  $this->M_TU->ambil_tu($username);
	$data['surat_pilih'] = $this->M_TU->etr_by_id($idsurat);
	$data['judul'] = "surat";
	$data['tipesurat'] = "eksternal";
	$data['surat_pilih'] = $this->M_TU->etr_by_id($idsurat);

	$this->load->view('tu/buat_disposisi', $data);
}
public function simpandisposisi($idsurat)
{
	$nip = $this->session->userdata('username');
	$kepada = $_POST['kepada'];
	$isidisposisi =  $_POST['isidisposisi'];
	$catatan = $_POST['catatan'];
	$kembalikanpada = $_POST['kembalikanpada'];
	$tanggalkembalian = $_POST['tanggalkembalian'];

	date_default_timezone_set("Asia/Jakarta");
	$tgl = date("Y-m-d");

	$data['data_user'] =  $this->M_TU->ambil_tu($nip);
	$see_f1 = $this->M_TU->ambil_tu($nip);

	foreach($see_f1 AS $see_f2)
	{
		$id_fakultas = $see_f2->id_fakultas;
		$jabatan = $see_f2->Jabatan;
	}
	$sql ="SELECT COUNT(id_fakultas) as nomoragenda FROM surat_disposisi WHERE id_fakultas=$id_fakultas";
	$nomor_agenda = $this->db->query($sql)->result();

	foreach($nomor_agenda AS $noagenda)
	{
		$nomoragenda = $noagenda->nomoragenda;
	}
	$this->db->where([
		'id' =>$idsurat,
	]);
	$this->db->update('surat_eksternal',['status_disposisi' => 'memiliki disposisi']);
	$this->M_TU->inputdisposisi("surat_disposisi",[
		'id_fakultas' => $id_fakultas,
		'id_surat' => $idsurat,
		'nip' => $nip,
		'no_agenda' => $nomoragenda+1,
		'pengirim' => $jabatan,
		'isidisposisi' => $isidisposisi,
		'DidisposisikanKepada' => $kepada,
		'Catatan' => $catatan,
		'Tanggal_Surat' => $tgl,
		'KembalikanKepada' => $kembalikanpada,
		'TanggalDikembalikan' => $tanggalkembalian,
	]);
	redirect('TU/surat_disposisi/');
}
public function lihatsdisposisi($idsurat){
	/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
	$username = $this->session->userdata('username');
	$data['data_user'] =  $this->M_TU->ambil_tu($username);

	$see_f1 = $this->M_TU->ambil_tu($username);
	foreach($see_f1 AS $see_f2)
	{
		$utama_id_fakultas = $see_f2->id_fakultas;
	}

	$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
	foreach($see_f4 AS $see_f5)
	{
		$see_f6 = $see_f5->Fakultas;
	}
	$data['nama_fakultas'] = $see_f6;
	$data['utama_id_fakultas'] = $utama_id_fakultas;
	/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

	$p1 =  $this->M_TU->ambil_tu($username);
	foreach($p1 AS $p2)
	{
		$id_fakultas = $p2->id_fakultas;
		$nip = $p2->NIP;
	}
	$see_f7 = $this->M_TU->disposisi_by_id($idsurat);
	foreach($see_f7 AS $see_f8)
	{
		$id_surat = $see_f8->id_surat;
	}
	$data['judul'] = "surat";
	$data['tipesurat'] = "eksternal";
	$data['surat_disposisi'] = $this->M_TU->disposisi_by_id($idsurat);
	$data['surat_pilih'] = $this->M_TU->etr_by_id($idsurat);
	$data['lampiran_pilih'] = $this->M_TU->lampiran_by_id_fakultas_n_id_surat($id_fakultas, $id_surat);

	$this->load->view('tu/lihatsdisposisi', $data);
}
public function printsdisposisi($idsurat)
{
	$data['surat_disposisi'] =  $this->M_TU->carisuratdisposisi_by_id("surat_disposisi",$idsurat);
	$this->load->view('tu/printsdisposisi', $data);
}
public function hapussuratmasuk($id)
{
	$this->M_TU->hapus_suratmasuk("surat_eksternal", $id);
	redirect(base_url("index.php/TU/surat_masuk"));
}

	public function pegawaiTU()
	{
		$data['judul'] = "pengaturan";
		$data['atur'] = "pegawaiTU";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_TU->ambil_tu($username);

		$see_f1 = $this->M_TU->ambil_tu($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_TU->fak_by_id_tu($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////


		$data['pegawai'] = $this->M_TU->tu_by_level($utama_id_fakultas);

		$this->load->view('tu/pegawai', $data);
	}

	public function hapusTU($nip) {
		$data = $this->M_TU->tu_by_nip("staff_tu",$nip);
		$this->M_TU->hapusTU("staff_tu",$nip);
		redirect(base_url("index.php/TU/pegawaiTU?info=Pegawai TU berhasil dihapus."));
	}

	public function simpan_pegawaiTU()
	{
		$id_fakultas	= $_POST['fakultas'];
		$nip 			= $_POST['NIP'];
		$nama 			= $_POST['nama'];
		$email 	= $_POST['email'];
		$password = md5($_POST['password']);

		$where_nip_tu = array(
			'NIP' 	=> $nip
			);

		$cek_tu = $this->M_TU->cek_x("staff_tu",$where_nip_tu)->num_rows();

		if($cek_tu == NULL)
		{
			$this->M_TU->masukkan("staff_tu",[
								'id_fakultas'	=>	$id_fakultas,
								'level'			=> 	"biasa",
								'NIP'			=>	$nip,
								'Nama'			=>	$nama,
								'Password'	=> $password,
								'Email' 	=> $email,
								'Jabatan' => 'Staff TU',
								]);
			redirect(base_url("index.php/TU/pegawaiTU?info=Pegawai TU berhasil ditambahkan."));
		}

		else
			redirect(base_url("index.php/TU/pegawaiTU?info=NIP Pegawai TU salah!."));

	}




}
