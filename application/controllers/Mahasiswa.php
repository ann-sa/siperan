<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_Mahasiswa');
		$this->load->model('M_TU');

		if($this->session->userdata('status') != "mahasiswa_is_login"){
			redirect(base_url("index.php/keluar"));
		}

		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$p1 = $this->M_Mahasiswa->mhs_by_nip($username);
		foreach($p1 AS $p2)
		{
			$ac_status = $p2->Ac_Status;
		}
		// if($ac_status != "verified")
		// {
		// 	redirect(base_url("index.php/email"));
		// }
	}

	public function index()
	{
		$data['judul'] = "utama";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$this->load->view('mahasiswa/utama', $data);
	}



	public function buat_surat_aktif_kuliah()
	{
		$nim = $this->session->userdata('username');
		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($nim);
		foreach($see_f1 AS $see_f2)
		{
			$id_fakultas = $see_f2->id_fakultas;
		}

		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Ymd");
		$waktu = date("his");

		$kode0 = rand(10000,99999);
		$kode1 = $nim.$tgl.$waktu.$kode0;
		$identifier = md5($kode1);

		$this->create_sak($nim, $id_fakultas, $identifier);

		$p3 = $this->M_Mahasiswa->sak_by_identifier($identifier);
		foreach($p3 AS $p4)
		{
			$id_surat = $p4->id_surat_aktif;
		}

		redirect(base_url("index.php/Mahasiswa/editorsak/page1?id_surat=$id_surat"));
	}

	public function create_sak($nim, $id_fakultas, $identifier)
	{
		date_default_timezone_set("Asia/Jakarta");
		$arr_nim = str_split($nim);
		$tahun_now = date('Y');
		$arr_thn = str_split($tahun_now);
		$tahun_msk = $arr_thn[0].$arr_thn[1].$arr_nim[0].$arr_nim[1];
		$tahun = $tahun_now - $tahun_msk;
		$month = date('m');
		$semester = 1;
		for ($i=$tahun; $i >= 1; $i--) {
		  if ($i > 1) {
			$semester +=2;
		  }
		  else if ($i == 1 && $month > 6) {
			$semester +=2;
		  }
		  else {
			$semester ++;
		  }
		}

		$this->M_Mahasiswa->masukkan("surat_aktif_kuliah",[
			'id_fakultas'	=>	$id_fakultas,
			'NIM'			=>	$nim,
			'identifier'	=>	$identifier,
			'Status_Surat'	=>	"draft",
			'Semester'		=>	$semester
			]);
	}

	public function editorsak($page)
	{
		$data['judul'] = "suratsaya";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$id_surat = $_GET['id_surat'];
		$data['surat_aktif_kuliah'] =  $this->M_Mahasiswa->ambilsurat("surat_aktif_kuliah",$id_surat);

		if($page == "page1")
		{
			$data['page'] = $page;
			$this->load->view('mahasiswa/editorsak', $data);
		}

		else if($page == "page2")
		{
			$data['page'] = $page;
			$this->load->view('mahasiswa/editorsak', $data);
		}

		else if($page == "page3")
		{
			$aksi			= $_POST['aksi'];

			$rencanatamat	= $_POST['rencanatamat'];
			$ips 			= $_POST['ips'];
			$ipk 			= $_POST['ipk'];
			$keperluan 		= $_POST['keperluan'];

			$this->M_Mahasiswa->save_sak_by_id([
				'RencanaTamat'	=>	$rencanatamat,
				'IPS'			=>	$ips,
				'IPK'			=>	$ipk,
				'Keperluan'		=>	$keperluan
				],"surat_aktif_kuliah",$id_surat);

			if($aksi=="Selanjutnya")
			{
				$data['page'] = $page;
				$this->load->view('mahasiswa/editorsak', $data);
			}
			else
			{
				redirect(base_url("index.php/Mahasiswa/editorsak/page1?id_surat=$id_surat"));
			}
		}

		else if($page == "page_final")
		{
			$uploadktm = $this->M_Mahasiswa->upload("ktm");
			$uploadbs = $this->M_Mahasiswa->upload("bs");

			//START upload KTM

			if($uploadktm['result'] == "success"){
				$simpanktm = $uploadktm['file']['file_name'];
			}
			else{
				$data['message'] = $uploadktm['error'];
				echo $data['message'];
				exit;
			}
			//END upload KTM

			//START upload BS

			if($uploadbs['result'] == "success"){
				$simpanbs = $uploadbs['file']['file_name'];
			}
			else{
				$data['message'] = $uploadbs['error'];
				echo $data['message']; exit;
			}
			//END upload BS

			$this->M_Mahasiswa->save_sak_by_id([
				'Scan_KTM'		=>	$simpanktm,
				'Scan_BS'		=>	$simpanbs
				],"surat_aktif_kuliah",$id_surat);

			if($aksi=="Selanjutnya")
			{
				//$data['page'] = $page;
				//$this->load->view('mahasiswa/editorsak', $data);
				redirect(base_url("index.php/Mahasiswa/suratsaya/draft"));
			}
			else
			{
				redirect(base_url("index.php/Mahasiswa/editorsak/page2?id_surat=$id_surat"));
			}
		}

	}

	public function sak2($mode)
	{
		$i_nim				= $_POST['nim'];
		$i_semester			= $_POST['semester'];
		$i_alamat			= $_POST['alamat'];
		$i_alamatortu		= $_POST['alamatortu'];
		$i_keperluan		= $_POST['keperluan'];
		$i_rencanatamat 	= $_POST['rencanatamat'];
		$i_ips				= $_POST['ips'];
		$i_ipk 				= $_POST['ipk'];

		$i_statussurat		= "draft";

		date_default_timezone_set("Asia/Jakarta");
		$tanggal2= date("Y-m-d");

		$uploadktm = $this->M_Mahasiswa->upload("ktm");
		$uploadbs = $this->M_Mahasiswa->upload("bs");

		if($mode=="simpan")
		{
			//START upload KTM

			if($uploadktm['result'] == "success"){
				$simpanktm = $uploadktm['file']['file_name'];
			}
			else{
				$data['message'] = $uploadktm['error'];
				echo $data['message'];
				exit;
			}
			//END upload KTM

			//START upload BS

			if($uploadbs['result'] == "success"){
				$simpanbs = $uploadbs['file']['file_name'];
			}
			else{
				$data['message'] = $uploadbs['error'];
				echo $data['message']; exit;
			}
			//END upload BS
			$this->M_Mahasiswa->masukkan("surat_aktif_kuliah",[
			'NIM'			=>	$i_nim,
			'Keperluan'			=>	$i_keperluan,
			'RencanaTamat'			=>	$i_rencanatamat,
			'Semester'		=>	$i_semester,
			'ips'		=>	$i_ips,
			'ipk'		=>	$i_ipk,
			'Keperluan'		=>	$i_keperluan,
			'Status_Surat'		=>	$i_statussurat,
			'Scan_KTM'		=>	$simpanktm,
			'Scan_BS'		=>	$simpanbs,
			'TanggalKirim' => $tanggal2,
			]);

			// redirect(base_url("index.php/mahasiswa/suratsaya/all?info=Surat%20berhasil%20disimpan."));
		}

		else
		{
			$dataa = $this->M_Mahasiswa->ambilsurat("surat_aktif_kuliah",$mode);
			foreach ($dataa as $isi => $row) {
				$ktm1 = $row->Scan_KTM;
				$bs1 = $row ->Scan_BS;
			}
			$path = './assets/file/mahasiswa/scan/';
			$data = [
			'NIM'			=>	$i_nim,
			'Keperluan'			=>	$i_keperluan,
			'RencanaTamat'			=>	$i_rencanatamat,
			'Semester'		=>	$i_semester,
			'ips'		=>	$i_ips,
			'ipk'		=>	$i_ipk,
			'Keperluan'		=>	$i_keperluan,
			'Status_Surat'		=>	$i_statussurat,
			'TanggalKirim' => $tanggal2
		  ];
			$ktm=$_FILES['ktm']['name'];
			$bs=$_FILES['bs']['name'];

			if (empty($ktm) && empty($bs)) {
					$this->M_Mahasiswa->editsurat($data,"surat_aktif_kuliah",$mode);
			}

			else if(empty($bs)){
				if($uploadktm['result'] == "success"){
					$simpanktm = $uploadktm['file']['file_name'];
				}
				else{
					$data['message'] = $uploadktm['error'];
					echo $data['message'];
					exit;
				}
				@unlink($path.$ktm1);
				$data += ['scan_KTM' => $simpanktm ];
				$this->M_Mahasiswa->editsurat($data,"surat_aktif_kuliah",$mode);
			}

			else if(empty($ktm)) {
				if($uploadbs['result'] == "success"){
					$simpanbs = $uploadbs['file']['file_name'];
				}
				else{
					$data['message'] = $uploadbs['error'];
					echo $data['message']; exit;
				}
				@unlink($path.$bs1);
				$data += ['scan_BS' => $simpanbs ];
				$this->M_Mahasiswa->editsurat($data,"surat_aktif_kuliah",$mode);
			}
			else {
					if($uploadktm['result'] == "success" && $uploadbs['result'] == "success"){
						$simpanktm = $uploadktm['file']['file_name'];
						$simpanbs = $uploadbs['file']['file_name'];
					}
					else if($uploadbs != "success"){
						$data['message'] = $uploadktm['error'];
						echo $data['message'];
						exit;
					}
					else{
						$data['message'] = $uploadbs['error'];
						echo $data['message']; exit;
					}
					@unlink($path.$ktm1);
					@unlink($path.$bs1);
					$data += ['scan_KTM' => $simpanktm,
									 'scan_BS' => $simpanbs ];
					$this->M_Mahasiswa->editsurat($data,"surat_aktif_kuliah",$mode);
				}
			}
			$data_mahasiswa = ['Alamat' => $i_alamat,
							 					 'AlamatOrtu' => $i_alamatortu ];
			$this->db->where(['NIM'=>$i_nim]);
		 	$this->db->update('mahasiswa',$data_mahasiswa);
			redirect(base_url("index.php/mahasiswa/suratsaya/all?info=Surat%20berhasil%20disimpan."));
		}

	public function suratsaya($statussurat)
	{
		$data['judul'] = "suratsaya";
		$data['statussurat'] = $statussurat;

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		if($statussurat=="all")
		{
			$data['surat_aktif_kuliah_saya'] =  $this->M_Mahasiswa->suratsaya("surat_aktif_kuliah",$username);
		}

		else
		{
			$data['surat_aktif_kuliah_saya'] =  $this->M_Mahasiswa->suratsayakategori("surat_aktif_kuliah",$username,$statussurat);
		}

		$this->load->view('mahasiswa/suratsaya', $data);
	}

	public function lihatsak($idsurat)
	{
		$data['judul'] = "suratsaya";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['surat_aktif_kuliah'] =  $this->M_Mahasiswa->ambilsurat("surat_aktif_kuliah",$idsurat);
		$this->load->view('mahasiswa/lihatsak', $data);
	}



	public function hapussak($idsurat)
	{
		$data = $this->M_Mahasiswa->ambilsurat("surat_aktif_kuliah",$idsurat);
		foreach ($data as $isi => $row) {
			$ktm = $row->Scan_KTM;
			$bs = $row ->Scan_BS;
		}
		$path = './assets/file/mahasiswa/scan/';
		@unlink($path.$ktm);
		@unlink($path.$bs);
		$this->M_Mahasiswa->hapussurat("surat_aktif_kuliah",$idsurat);
		redirect(base_url("index.php/mahasiswa/suratsaya/all?info=Surat%20berhasil%20dihapus."));
	}

	public function kirimsak($idsurat)
	{
		$this->M_Mahasiswa->editsurat([
		'status_surat'		=>	"pending",
		'id_notifikasi' => "2"
	],"surat_aktif_kuliah",$idsurat);
		redirect(base_url("index.php/mahasiswa/suratsaya/all?info=Permintaan%20surat%20berhasil%20dikirim."));
	}

	public function profil()
	{
		$data['judul'] = "lihatprofil";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$this->load->view('mahasiswa/profil', $data);
	}

	public function editprofil()
	{
		$data['judul'] = "editprofil";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$this->load->view('mahasiswa/edit_profil', $data);
	}

	// public function gantiemail()
	// {
	// 	$data['judul'] = "gantiemail";
	// 	/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
	// 	$username = $this->session->userdata('username');
	// 	$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);
	//
	// 	$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
	// 	foreach($see_f1 AS $see_f2)
	// 	{
	// 		$utama_id_fakultas = $see_f2->id_fakultas;
	// 	}
	//
	// 	$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
	// 	foreach($see_f4 AS $see_f5)
	// 	{
	// 		$see_f6 = $see_f5->Fakultas;
	// 	}
	// 	$data['nama_fakultas'] = $see_f6;
	// 	$data['utama_id_fakultas'] = $utama_id_fakultas;
	// 	/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
	//
	// 	$this->load->view('mahasiswa/ganti_email', $data);
	// }

	public function simpanemail()
	{
		$username = $this->session->userdata('username');
		$p1 =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		foreach($p1 AS $p2)
		{
			$id = $p2->NIM;
			$old_email = $p2->Email;
		}

		$new_email = $this->input->post('new_email');

		if($old_email != $new_email)
		{
			$dimana = array(
				'Email' => $new_email
				);
			$cek_mhs = $this->M_Mahasiswa->cek_x("Mahasiswa",$dimana)->num_rows();
			$cek_tu = $this->M_Mahasiswa->cek_x("Staff_TU",$dimana)->num_rows();

			if($cek_mhs>0 OR $cek_tu>0)
			{
				redirect('mahasiswa/gantiemail?error=Email sudah ada! Coba email lain!');
			}
			else
			{
				$data = array('Email' => $new_email, 'Ac_Status' => 'email_changed');

				$where = array('NIM' => $id);

				$this->M_Mahasiswa->editprofil($where,$data,'mahasiswa');
				redirect('mahasiswa/profil?info=Email%20Anda%20berhasil%20diubah.');
			}
		}
		else
		{
			redirect('mahasiswa/gantiemail?error=Tidak ada perubahan!');
		}


	}

	public function gantipassword()
	{
		$data['judul'] = "gantipassword";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$this->load->view('mahasiswa/ganti_password', $data);
	}

	public function simpanedit()
	{
		$id = $this->session->userdata('username');
		$alamatortu = $this->input->post('alamatortu');
		$alamat = $this->input->post('alamat');
		$JenjangStudi = $this->input->post('JenjangStudi');
		$email = $this->input->post('email');
		$hp = $this->input->post('hp');
		// $rencanatamat = $this->input->post('rencanatamat');

		$data = array(
			'AlamatOrtu'	=> $alamatortu,
			'Alamat'		=> $alamat,
			'JenjangStudi'	=> $JenjangStudi,
			'hp'			=> $hp,
			'Email'  => $email,
			
			// 'RencanaTamat'	=> $rencanatamat
		);

		$where = array('NIM' => $id);

		$this->M_Mahasiswa->editprofil($where,$data,'mahasiswa');
		redirect('mahasiswa/profil?info=Profil%20Anda%20berhasil%20diedit.');

	}

	public function simpanpassword()
	{
		$id = $this->input->post('nim');
		$password_lama = $this->input->post('password_lama');
		$password_baru = $this->input->post('password_baru');
		$konfirmasi_password = $this->input->post('konfirmasi_password');
		// $lenght=strlen($password_baru);
		if($password_baru=="")
		{
			redirect('mahasiswa/gantipassword?error=Password%20tidak%20boleh%20kosong.');
		}
		// if($lenght<8){
		// 	redirect('mahasiswa/gantipassword?info=Password%20minimal%208%20karakter.');
		// }
		else if($konfirmasi_password=="" OR $konfirmasi_password!=$password_baru)
		{
			redirect('mahasiswa/gantipassword?error=Konfirmasi%20Password%20tidak%20cocok.');
		}

		$this->db->select('*');
	    $this->db->from('mahasiswa');
	    $this->db->where('NIM',$this->session->userdata('username'));
	    $this->db->where('Password',md5($password_lama));
	    $query = $this->db->get();

		if($query->num_rows()==1){
			$data = array('Password' => md5($password_baru));
		$this->db->where('NIM', $this->session->userdata('username'));
		$this->db->update('mahasiswa', $data);
		session_destroy();
		redirect(base_url("index.php/utama?info=Password%20Anda%20berhasil%20diganti.%20%20Silahkan%20Login%20Kembali."));
		}
		else{
			redirect('mahasiswa/gantipassword?info=Password%20lama%20Anda%20tidak%20cocok.');
		}

	}













	///////////////////////CODE REVOLUSIONER 25 DESEMBER 2018/////////////////////////////////////////////////////////


	public function buat()
	{
		$data['judul'] = "buat";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['layout_mhs_data'] = $this->M_Mahasiswa->layout_mhs_by_fakultas($utama_id_fakultas);

		$this->load->view('mahasiswa/buat_surat', $data);
	}

	public function buat_go($id_layout_mhs)
	{
		$data['judul'] = "buat";
		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
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

		$this->create_new_surat_mhs($id_layout_mhs, $utama_id_fakultas, $username, $identifier);

		$p3 = $this->M_Mahasiswa->surat_flex_mhs_by_identifier($identifier);
		foreach($p3 AS $p4)
		{
			$id_surat_mhs = $p4->id_surat_mhs;
		}

		redirect(base_url("index.php/mahasiswa/editor_surat_mhs/$id_surat_mhs"));
	}


	public function create_new_surat_mhs($id_layout_mhs, $id_f, $nim, $identifier)
	{
		$this->M_Mahasiswa->masukkan("surat_flex_mhs",[
			'id_layout_mhs'		=>	$id_layout_mhs,
			'id_fakultas'		=>	$id_f,
			'NIM_mhs'			=>	$nim,
			'identifier'		=>	$identifier
			]);
	}

	public function editor_surat_mhs($id_surat_mhs)
	{
		$data['judul'] = "mysurat";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['surat_flex_mhs'] = $this->M_Mahasiswa->surat_flex_mhs_by_id($id_surat_mhs);

		$this->load->view('mahasiswa/edit_surat_mhs', $data);

	}

	public function simpan_surat_mhs($id_surat_mhs)
	{
		$s1 = $this->M_Mahasiswa->surat_flex_mhs_by_id($id_surat_mhs);

		foreach($s1 AS $s2)
		{
			$borang1 = $s2->borang1;
			$borang2 = $s2->borang2;
			$borang3 = $s2->borang3;
			$borang4 = $s2->borang4;
			$borang5 = $s2->borang5;

			$borang6 = $s2->borang6;
			$borang7 = $s2->borang7;
			$borang8 = $s2->borang8;
			$borang9 = $s2->borang9;
			$borang10 = $s2->borang10;

			$borang1status = $s2->borang1status;
			$borang2status = $s2->borang2status;
			$borang3status = $s2->borang3status;
			$borang4status = $s2->borang4status;
			$borang5status = $s2->borang5status;

			$borang6status = $s2->borang6status;
			$borang7status = $s2->borang7status;
			$borang8status = $s2->borang8status;
			$borang9status = $s2->borang9status;
			$borang10status = $s2->borang10status;
		}


		$bahasa = $_POST['bahasa'];


		if($borang1status=="text"){ // CEK KONFIG 'borang1'
			$borang1 = $_POST['borang1'];
		}else if($borang1status=="file" AND $borang1==""){
			$uploadborang1 = $this->M_Mahasiswa->upload_file_flex("borang1");

			if($uploadborang1['result'] == "success"){
				$borang1 = $uploadborang1['file']['file_name'];
			}else{
				$data['message'] = $uploadborang1['error'];
				echo $data['message'];
				exit;
			}
		}

		if($borang2status=="text"){ // CEK KONFIG 'borang2'
			$borang2 = $_POST['borang2'];
		}else if($borang2status=="file" AND $borang2==""){
			$uploadborang2 = $this->M_Mahasiswa->upload_file_flex("borang2");

			if($uploadborang2['result'] == "success"){
				$borang2 = $uploadborang2['file']['file_name'];
			}else{
				$data['message'] = $uploadborang2['error'];
				echo $data['message'];
				exit;
			}
		}

		if($borang3status=="text"){ // CEK KONFIG 'borang3'
			$borang3 = $_POST['borang3'];
		}else if($borang3status=="file" AND $borang3==""){
			$uploadborang3 = $this->M_Mahasiswa->upload_file_flex("borang3");

			if($uploadborang3['result'] == "success"){
				$borang3 = $uploadborang3['file']['file_name'];
			}else{
				$data['message'] = $uploadborang3['error'];
				echo $data['message'];
				exit;
			}
		}

		if($borang4status=="text"){ // CEK KONFIG 'borang4'
			$borang4 = $_POST['borang4'];
		}else if($borang4status=="file" AND $borang4==""){
			$uploadborang4 = $this->M_Mahasiswa->upload_file_flex("borang4");

			if($uploadborang4['result'] == "success"){
				$borang4 = $uploadborang4['file']['file_name'];
			}else{
				$data['message'] = $uploadborang4['error'];
				echo $data['message'];
				exit;
			}
		}

		if($borang5status=="text"){ // CEK KONFIG 'borang5'
			$borang5 = $_POST['borang5'];
		}else if($borang5status=="file" AND $borang5==""){
			$uploadborang5 = $this->M_Mahasiswa->upload_file_flex("borang5");

			if($uploadborang5['result'] == "success"){
				$borang5 = $uploadborang5['file']['file_name'];
			}else{
				$data['message'] = $uploadborang5['error'];
				echo $data['message'];
				exit;
			}
		}

		if($borang6status=="text"){ // CEK KONFIG 'borang6'
			$borang6 = $_POST['borang6'];
		}else if($borang6status=="file" AND $borang6==""){
			$uploadborang6 = $this->M_Mahasiswa->upload_file_flex("borang6");

			if($uploadborang6['result'] == "success"){
				$borang6 = $uploadborang6['file']['file_name'];
			}else{
				$data['message'] = $uploadborang6['error'];
				echo $data['message'];
				exit;
			}
		}

		if($borang7status=="text"){ // CEK KONFIG 'borang7'
			$borang7 = $_POST['borang7'];
		}else if($borang7status=="file" AND $borang7==""){
			$uploadborang7 = $this->M_Mahasiswa->upload_file_flex("borang7");

			if($uploadborang7['result'] == "success"){
				$borang7 = $uploadborang7['file']['file_name'];
			}else{
				$data['message'] = $uploadborang7['error'];
				echo $data['message'];
				exit;
			}
		}

		if($borang8status=="text"){ // CEK KONFIG 'borang8'
			$borang8 = $_POST['borang8'];
		}else if($borang8status=="file" AND $borang8==""){
			$uploadborang8 = $this->M_Mahasiswa->upload_file_flex("borang8");

			if($uploadborang8['result'] == "success"){
				$borang8 = $uploadborang8['file']['file_name'];
			}else{
				$data['message'] = $uploadborang8['error'];
				echo $data['message'];
				exit;
			}
		}

		if($borang9status=="text"){ // CEK KONFIG 'borang9'
			$borang9 = $_POST['borang9'];
		}else if($borang9status=="file" AND $borang9==""){
			$uploadborang9 = $this->M_Mahasiswa->upload_file_flex("borang9");

			if($uploadborang9['result'] == "success"){
				$borang9 = $uploadborang9['file']['file_name'];
			}else{
				$data['message'] = $uploadborang9['error'];
				echo $data['message'];
				exit;
			}
		}

		if($borang10status=="text"){ // CEK KONFIG 'borang10'
			$borang10 = $_POST['borang10'];
		}else if($borang10status=="file" AND $borang10==""){
			$uploadborang10 = $this->M_Mahasiswa->upload_file_flex("borang10");

			if($uploadborang10['result'] == "success"){
				$borang10 = $uploadborang10['file']['file_name'];
			}else{
				$data['message'] = $uploadborang10['error'];
				echo $data['message'];
				exit;
			}
		}

		$this->M_Mahasiswa->save_surat_mhs([

			'bahasa'	=>	$bahasa,

			'borang1'	=>	$borang1,
			'borang2'	=>	$borang2,
			'borang3'	=>	$borang3,
			'borang4'	=>	$borang4,
			'borang5'	=>	$borang5,

			'borang6'	=>	$borang6,
			'borang7'	=>	$borang7,
			'borang8'	=>	$borang8,
			'borang9'	=>	$borang9,
			'borang10'	=>	$borang10

			],"surat_flex_mhs",$id_surat_mhs);

		$aksi = $_POST['aksi'];

		if($aksi=="Simpan")redirect(base_url("index.php/mahasiswa/editor_surat_mhs/$id_surat_mhs"));
		else if($aksi=="Simpan dan Lanjutkan")redirect(base_url("index.php/mahasiswa/review_surat_mhs/$id_surat_mhs"));
	}

	public function review_surat_mhs($id_surat_mhs)
	{
		$data['judul'] = "mysurat";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['surat_flex_mhs'] = $this->M_Mahasiswa->surat_flex_mhs_by_id($id_surat_mhs);

		$this->load->view('mahasiswa/review_surat_mhs', $data);

	}

	public function mysurat()
	{
		$data['judul'] = "mysurat";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['surat_flex_mhs'] = $this->M_Mahasiswa->surat_flex_mhs_by_nim($username);

		$this->load->view('mahasiswa/mysurat', $data);

	}

	public function pemberitahuan()
	{
		$data['judul'] = "pemberitahuan";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['pemberitahuan_si_mhs'] = $this->M_Mahasiswa->pemberitahuan_si_mhs($username);

		$this->load->view('mahasiswa/pemberitahuan', $data);

	}

	public function lihat_pmb($id)
	{
		$data['judul'] = "pemberitahuan";

		/////////////START CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}

		$see_f4 = $this->M_Mahasiswa->fak_by_id($utama_id_fakultas);
		foreach($see_f4 AS $see_f5)
		{
			$see_f6 = $see_f5->Fakultas;
		}
		$data['nama_fakultas'] = $see_f6;
		$data['utama_id_fakultas'] = $utama_id_fakultas;
		/////////////END CODE WAJIB BAGI FUNCTION DENGAN VIEW/////////////

		$data['pemberitahuan_pilih'] = $this->M_Mahasiswa->pemberitahuan_pilih($id);
		
		$seen_pmb = array('seen' => "seen");
		$dimana = array('id' => $id);
		$this->M_Mahasiswa->just_save($dimana,$seen_pmb,'pemberitahuan');

		$this->load->view('mahasiswa/lihat_pmb', $data);

	}

	public function hapusmysurat($id_surat_mhs)
	{
		$this->M_Mahasiswa->hapusmysurat("surat_flex_mhs",$id_surat_mhs);
		redirect(base_url("index.php/mahasiswa/mysurat?info=Surat%20berhasil%20dihapus."));
	}

	public function kirimmysurat($id_surat_mhs)
	{
		date_default_timezone_set("Asia/Jakarta");
		$tgl = date("Y-m-d");
		$username = $this->session->userdata('username');
		$see_f1 = $this->M_Mahasiswa->ambil_mahasiswa($username);
		foreach($see_f1 AS $see_f2)
		{
			$utama_id_fakultas = $see_f2->id_fakultas;
		}
		$this->M_Mahasiswa->save_surat_mhs([
			'status_surat'	=>	"pending",
			'tgl_kirim'		=>	$tgl
			],"surat_flex_mhs",$id_surat_mhs);
		$this->M_TU->masuk_log
		   ([
		   'id_fakultas' => $utama_id_fakultas,
		   'isi_log' => 'Mahasiswa dengan NIM '.$username.' mnengirim permintaan surat'
		   ]);

		redirect(base_url("index.php/mahasiswa/mysurat?info=Permintaan surat berhasil dikirim ke TU"));
	}












}
