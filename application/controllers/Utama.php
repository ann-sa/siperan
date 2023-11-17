<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

	function __construct(){
        parent::__construct();
		// deklarasi model default untuk class ini
        $this->load->model('M_Utama');

		if($this->session->userdata('status') == "mahasiswa_is_login")
		{
			redirect(base_url("index.php/mahasiswa"));
		}

		if($this->session->userdata('status') == "tu_is_login")
		{
			redirect(base_url("index.php/TU"));
		}
    }

	public function index()
	{
		$data['ngapain']="login";
		$this->load->view('awal',$data);
	}

    public function indexmahasiswa()
	{
		$data['ngapain']="loginmahasiswa";
		$this->load->view('awal',$data);
	}

	public function indexTU()
	{
		$data['ngapain']="loginTU";
		$this->load->view('awal',$data);
	}


	public function tentang($siapa)
	{
		$data['siapa']=$siapa;
		$data['ngapain']="tentang";
		$this->load->view('awal',$data);
	}
	
	public function pembuat()
	{
		$this->load->view('pembuat');
	}

	public function carakerja($siapa)
	{
		$data['siapa']=$siapa;
		$data['ngapain']="carakerja";
		$this->load->view('awal',$data);
	}


	public function loginmahasiswa()
	{
		$l_nim		= $this->input->post('nim');
		$l_password 	= $this->input->post('password');
		$passcrypt 		= md5($l_password);

		// $where_email = array(
		// 	'Email' 	=> $l_email,
		// 	'Password'	=> $passcrypt
		// 	);
		$where_id_mhs = array(
			'NIM' 	=> $l_nim,
			'Password'	=> $passcrypt
			);

		// $cek_mhs_email = $this->M_Utama->cek_login("mahasiswa",$where_email)->num_rows();
		$cek_mhs_id = $this->M_Utama->cek_login("mahasiswa",$where_id_mhs)->num_rows();

		// if($cek_mhs_email > 0)
		// {
		// 	$p1 = $this->M_Utama->mhs_by_email($l_email);
		// 	foreach($p1 AS $p2)
		// 	{
		// 		$nim = $p2->NIM;
		// 	}
		//
		// 	$data_session = array(
		// 		'username' => $nim,
		// 		'status' => "mahasiswa_is_login"
		// 		);
		// 	$this->session->set_userdata($data_session);
		// 	redirect(base_url("index.php/mahasiswa"));
		// }

		if($cek_mhs_id > 0)
		{
			$p1 = $this->M_Utama->mhs_by_idnumber($l_nim);
			foreach($p1 AS $p2)
			{
				$nim = $p2->NIM;
			}

			$data_session = array(
				'username' => $nim,
				'status' => "mahasiswa_is_login"
				);
			$this->session->set_userdata($data_session);
			redirect(base_url("index.php/mahasiswa"));
		}
		// MULAI
		else if($cek_mhs_id <1){
		$curl = curl_init();
		$url["login"] = "https://portal.usu.ac.id/login/proses_login.php";
		$url["profil"] = "https://portal.usu.ac.id/profil/tampil.php";
		$url["email"] = "https://portal.usu.ac.id/email/ubah.php";

		$cookie = base_url().'assets/cookiess.txt';
		$data1 = [
			 'username' => $l_nim,
			 'password' => $l_password
		];

		$data1 = http_build_query($data1);

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data1);
		curl_setopt($curl, CURLOPT_URL, $url["login"] );
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_COOKIEJAR, realpath($cookie));

		$html = curl_exec($curl);
		$pattern = '/<div.+?id="member-info">.+<h3>([\S\s]+)<\/h3>.+<h4>([\d]+)<\/h4>.+<h4>([\S\s]+)<\/h4>.+/s';
		preg_match($pattern, $html, $login);


		if(count($login)<=0)
		{
			$data['ngapain'] = "loginmahasiswa";
			$data['pesan'] = "NIM dan password salah!";
			$this->load->view('awal', $data);
		}
		else
		{
			curl_setopt($curl, CURLOPT_URL, $url['profil']);
			$html = curl_exec($curl);
			preg_match_all('/\<td>.?(.+)?<\/td>/', $html, $profil);


			curl_setopt($curl, CURLOPT_URL, $url['email']);
			$html = curl_exec($curl);
			preg_match_all('/<strong.+?id="myemail">(.+)<\/strong>/', $html, $email);

			$login[0] = $login[1];
			$login[1] = $login[2];
			$login[2] = $login[3];

			$profil = $profil[1];
			$alamat = $profil[0];
			$ttl = explode(", ", $profil[2]);
			$nama = explode(' ', $login[0]);
			for($i=1;$i<count($nama);$i++)
				@$nama_belakang .= ' '.$nama[$i];

			if($nama_belakang == NULL)
				@$nama_belakang .= '';

			$bln["Januari"]	 = 1;
			$bln["Februari"] = 2;
			$bln["Maret"] = 3;
			$bln["April"] = 4;
			$bln["Mei"]	= 5;
			$bln["Juni"] 	= 6;
			$bln["Juli"] 	= 7;
			$bln["Agustus"] = 8;
			$bln["September"] = 9;
			$bln["Oktober"] = 10;
			$bln["November"] = 11;
			$bln["Desember"] = 12;

			$date = explode(" ", $ttl[1]);
			$tgl_lahir = $date[2].'-'.$bln[$date[1]].'-'.$date[0];
			$email = $email[1][0];
			$link_foto = 'https://portal.usu.ac.id/photos/'.$login[1].'.jpg';

			$nim = $login[1];
			$arr_nim = str_split($nim);
			$fakultas = $arr_nim[2].$arr_nim[3];
			if ($arr_nim[2] >=1 && $arr_nim[3]>=5) {
				$jenjangstudi ='D-3';
			}
			else {
				$jenjangstudi = 'S-1';
			}
			$tahun_now = date('Y');
			$arr_thn = str_split($tahun_now);
			$tahun_msk = $arr_thn[0].$arr_thn[1].$arr_nim[0].$arr_nim[1];

			$prodi = $login[2];


			$this->M_Utama->daftar_mahasiswa("mahasiswa",[
			'NIM'				=> $nim,
			'Nama'				=> $nama[0].''.$nama_belakang,
			'Password'			=> $passcrypt,
			'JenisKelamin'		=> $profil[4],
			'AsalSekolah'		=> $profil[5],
			'Kewarganegaraan'	=> $profil[10],
			'Agama'				=> $profil[3],
			'Alamat'			=> $alamat,
			'AlamatOrtu'		=> $alamat,
			'TempatLahir'		=> $ttl[0],
			'TanggalLahir'		=> $tgl_lahir,
			'Id_Fakultas'		=> $fakultas,
			'NamaAyah'    		=> $profil[7],
			'NamaIbu'			=> $profil[8],
			'TahunMasuk'		=> $tahun_msk,
			'LinkFoto'			=> $link_foto,
			'Ac_Status'			=> "verified",
			'JenjangStudi' => $jenjangstudi,
			],$prodi);

			$data_session = array(
				'username' => $l_nim,
				'status' => "mahasiswa_is_login",
				);

				$this->session->set_userdata($data_session);
				redirect(base_url("index.php/mahasiswa"));
			}
		}

	}

	public function loginTU()
	{
		$l_email		= $this->input->post('email');
		$l_password 	= $this->input->post('password');
		$passcrypt 		= md5($l_password);

		$where_id_tu = array(
			'NIP' 	=> $l_email,
			'Password'	=> $passcrypt
			);
			// $cek_tu_email = $this->M_Utama->cek_login("staff_tu",$where_email)->num_rows();
			$cek_tu_id = $this->M_Utama->cek_login("staff_tu",$where_id_tu)->num_rows();


		// 	if($cek_tu_email > 0)
		// {
		// 	$p1 = $this->M_Utama->tu_by_email($l_email);
		// 	foreach($p1 AS $p2)
		// 	{
		// 		$nip = $p2->NIP;
		// 		$level =$p2->level;
		// 	}

		// 	$data_session = array(
		// 		'username' => $nip,
		// 		'status' => "tu_is_login",
		// 		'level' => $level
		// 		);

		// 	$this->session->set_userdata($data_session);
		// 	// redirect(base_url("index.php/TU"));
		// }

			if($cek_tu_id > 0)
		{
			$p1 = $this->M_Utama->tu_by_idnumber($l_email);
			foreach($p1 AS $p2)
			{
				$nip = $p2->NIP;
				$level =$p2->level;
			}

			$data_session = array(
				'username' => $nip,
				'status' => "tu_is_login",
				'Level' => $level
				);
			$this->session->set_userdata($data_session);
			redirect(base_url("index.php/TU"));
		}

		else
		{
			$data['ngapain']="loginTU";
			$data['pesan'] = "Email/NIM/NIP atau Password salah!";
			$this->load->view('awal', $data);
		}

	}

	public function daftar()
	{
		$data['ngapain']="signup";
		$this->load->view('awal',$data);
	}

	public function daftar2()
	{
		$l_nim		= $this->input->post('nim');
		$l_password = $this->input->post('password');
		$passcrypt 	= md5($l_password);

		$dimana = array(
			'NIM' 		=> $l_nim
			);
		$cek = $this->M_Utama->cek_login("mahasiswa",$dimana)->num_rows();

		if ($cek<1)
		{
			// MULAI

			$curl = curl_init();
			$url["login"] = "https://portal.usu.ac.id/login/proses_login.php";
			$url["profil"] = "https://portal.usu.ac.id/profil/tampil.php";
			$url["email"] = "https://portal.usu.ac.id/email/ubah.php";

			$cookie = base_url().'assets/cookiess.txt';
			$data1 = [
				 'username' => $l_nim,
				 'password' => $l_password
			];

			$data1 = http_build_query($data1);

			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data1);
			curl_setopt($curl, CURLOPT_URL, $url["login"] );
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_COOKIEJAR, realpath($cookie));

			$html = curl_exec($curl);
			$pattern = '/<div.+?id="member-info">.+<h3>([\S\s]+)<\/h3>.+<h4>([\d]+)<\/h4>.+<h4>([\S\s]+)<\/h4>.+/s';
			preg_match($pattern, $html, $login);


			if(count($login)<=0)
			{
				$data['ngapain'] = "signup";
				$data['pesan'] = "NIM dan password salah!";
				$this->load->view('awal', $data);
			}
			else
			{
				curl_setopt($curl, CURLOPT_URL, $url['profil']);
				$html = curl_exec($curl);
				preg_match_all('/\<td>.?(.+)?<\/td>/', $html, $profil);


				curl_setopt($curl, CURLOPT_URL, $url['email']);
				$html = curl_exec($curl);
				preg_match_all('/<strong.+?id="myemail">(.+)<\/strong>/', $html, $email);

				$login[0] = $login[1];
				$login[1] = $login[2];
				$login[2] = $login[3];

				$profil = $profil[1];
				$alamat = $profil[0];
				$ttl = explode(", ", $profil[2]);
				$nama = explode(' ', $login[0]);
				for($i=1;$i<count($nama);$i++)
					@$nama_belakang .= ' '.$nama[$i];

				if($nama_belakang == NULL)
					@$nama_belakang .= '';

				$bln["Januari"]	 = 1;
				$bln["Februari"] = 2;
				$bln["Maret"] = 3;
				$bln["April"] = 4;
				$bln["Mei"]	= 5;
				$bln["Juni"] 	= 6;
				$bln["Juli"] 	= 7;
				$bln["Agustus"] = 8;
				$bln["September"] = 9;
				$bln["Oktober"] = 10;
				$bln["November"] = 11;
				$bln["Desember"] = 12;

				$date = explode(" ", $ttl[1]);
				$tgl_lahir = $date[2].'-'.$bln[$date[1]].'-'.$date[0];
				$email = $email[1][0];
				$link_foto = 'https://portal.usu.ac.id/photos/'.$login[1].'.jpg';

				$nim = $login[1];
				$arr_nim = str_split($nim);
				$fakultas = $arr_nim[2].$arr_nim[3];
				if ($arr_nim[2] >=1 && $arr_nim[3]>=5) {
					$jenjangstudi ='D-3';
				}
				else {
					$jenjangstudi = 'S-1';
				}
				$tahun_now = date('Y');
				$arr_thn = str_split($tahun_now);
				$tahun_msk = $arr_thn[0].$arr_thn[1].$arr_nim[0].$arr_nim[1];

				$prodi = $login[2];


				$this->M_Utama->daftar_mahasiswa("mahasiswa",[
				'NIM'				=> $nim,
				'Nama'				=> $nama[0].''.$nama_belakang,
				'Password'			=> $passcrypt,
				'JenisKelamin'		=> $profil[4],
				'AsalSekolah'		=> $profil[5],
				'Kewarganegaraan'	=> $profil[10],
				'Agama'				=> $profil[3],
				'Alamat'			=> $alamat,
				'AlamatOrtu'		=> $alamat,
				'TempatLahir'		=> $ttl[0],
				'TanggalLahir'		=> $tgl_lahir,
				'Id_Fakultas'		=> $fakultas,
				'NamaAyah'    		=> $profil[7],
				'NamaIbu'			=> $profil[8],
				'TahunMasuk'		=> $tahun_msk,
				'LinkFoto'			=> $link_foto,
				'Ac_Status'			=> "verified",
				'JenjangStudi' => $jenjangstudi,
				],$prodi);

				// $data_session = array(
				// 	'username' => $l_nim,
				// 	'status' => "mahasiswa_is_login",
				// 	);
				//
				// $this->session->set_userdata($data_session);

				redirect(base_url("index.php/utama/loginmahasiswa"));

			}

			//SELESAI
		}
		else
		{
			$data['ngapain'] = "signup";
			$data['pesan'] = "Akun sudah ada!";
			$this->load->view('awal', $data);
		}


	}

	//
	// public function lupa()
	// {
	// 	$data['ngapain']="input";
	// 	$this->load->view('lupa',$data);
	// }
	//
	// public function lupa2()
	// {
	// 	$username = $this->input->post('username');
	//
	// 	$where_email = array(
	// 		'Email' 	=> $username
	// 		);
	// 	$where_id_mhs = array(
	// 		'NIM' 	=> $username
	// 		);
	// 	$where_id_tu = array(
	// 		'NIP' 	=> $username
	// 		);
	//
	// 	$cek_email_mhs	= $this->M_Utama->cek_login("mahasiswa",$where_email)->num_rows();
	// 	$cek_email_tu	= $this->M_Utama->cek_login("staff_tu",$where_email)->num_rows();
	// 	$cek_id_mhs		= $this->M_Utama->cek_login("mahasiswa",$where_id_mhs)->num_rows();
	// 	$cek_id_tu		= $this->M_Utama->cek_login("staff_tu",$where_id_tu)->num_rows();
	//
	// 	$ada=0;
	//
	// 	if($cek_email_mhs > 0)
	// 	{
	// 		$p1 = $this->M_Utama->mhs_by_email($username);
	// 		foreach($p1 AS $p2)
	// 		{
	// 			$ada = 1;
	// 			$idnumber = $p2->NIM;
	// 			$email = $p2->Email;
	// 			$tabel = "MHS";
	// 		}
	// 	}
	// 	else if($cek_email_tu > 0)
	// 	{
	// 		$p1 = $this->M_Utama->tu_by_email($username);
	// 		foreach($p1 AS $p2)
	// 		{
	// 			$ada = 1;
	// 			$idnumber = $p2->NIP;
	// 			$email = $p2->Email;
	// 			$tabel = "TU";
	// 		}
	// 	}
	// 	else if($cek_id_mhs > 0)
	// 	{
	// 		$p1 = $this->M_Utama->mhs_by_idnumber($username);
	// 		foreach($p1 AS $p2)
	// 		{
	// 			$ada = 1;
	// 			$idnumber = $p2->NIM;
	// 			$email = $p2->Email;
	// 			$tabel = "MHS";
	// 		}
	// 	}
	// 	else if($cek_id_tu > 0)
	// 	{
	// 		$p1 = $this->M_Utama->tu_by_idnumber($username);
	// 		foreach($p1 AS $p2)
	// 		{
	// 			$ada = 1;
	// 			$idnumber = $p2->NIP;
	// 			$email = $p2->Email;
	// 			$tabel = "TU";
	// 		}
	// 	}
	//
	// 	if($ada==1)
	// 	{
	// 		$tipe_akun = $tabel;
	// 		$kode1 = rand(10000,99999);
	// 		$kode2 = $tipe_akun.$idnumber.$kode1;
	// 		$kode_pulih = md5($kode2);
	//
	// 		if($tipe_akun=="MHS")
	// 		{
	// 			$data = array('kode_pulih' => $kode_pulih);
	// 			$where = array('NIM' => $idnumber);
	// 			$this->M_Utama->editprofil($where,$data,'mahasiswa');
	// 		}
	//
	// 		else if($tipe_akun=="TU")
	// 		{
	// 			$data = array('kode_pulih' => $kode_pulih);
	// 			$where = array('NIP' => $idnumber);
	// 			$this->M_Utama->editprofil($where,$data,'staff_TU');
	// 		}
	//
	// 		$data['email']=$email;
	// 		$data['ngapain']="keterangan";
	// 		$this->load->view('lupa',$data);
	//
	// 	}
	// 	else
	// 	{
	// 		$data['pesan']="Email/NIM/NIP tidak ditemukan!";
	// 		$data['ngapain']="input";
	// 		$this->load->view('lupa',$data);
	// 	}
	// }
	//
	// public function lupa3()
	// {
	// 	$kode_pulih = $_POST['kode_pulih'];
	//
	// 	$where = array(
	// 		'kode_pulih' => $kode_pulih
	// 		);
	//
	// 	$cek_kode_mhs	= $this->M_Utama->cek_login("mahasiswa",$where)->num_rows();
	// 	$cek_kode_tu	= $this->M_Utama->cek_login("staff_tu",$where)->num_rows();
	//
	// 	if($cek_kode_mhs>0 OR $cek_kode_tu>0)
	// 	{
	// 		$data['ngapain']="ganti";
	// 		$data['kode_pulih']=$kode_pulih;
	// 		$this->load->view('lupa',$data);
	// 	}
	// 	else
	// 	{
	// 		echo"Link tidak berlaku!"; exit;
	// 	}
	//
	// }
	//
	// public function lupa4()
	// {
	// 	$kode_pulih = $_POST['kode_pulih'];
	//
	// 	$new_password = $_POST['password'];
	// 	$new_password_md5 = md5($new_password);
	//
	// 	$where = array(
	// 		'kode_pulih' => $kode_pulih
	// 		);
	//
	// 	$cek_kode_mhs	= $this->M_Utama->cek_login("mahasiswa",$where)->num_rows();
	// 	$cek_kode_tu	= $this->M_Utama->cek_login("staff_tu",$where)->num_rows();
	//
	// 	if($cek_kode_mhs>0)
	// 	{
	// 		$data = array('kode_pulih' => "Normal", 'Password' => $new_password_md5);
	// 		$where = array('kode_pulih' => $kode_pulih);
	// 		$this->M_Utama->editprofil($where,$data,'mahasiswa');
	//
	// 		$data['ngapain']="berhasil";
	// 		$this->load->view('lupa',$data);
	// 	}
	// 	else if($cek_kode_tu>0)
	// 	{
	// 		$data = array('kode_pulih' => "Normal", 'Password' => $new_password_md5);
	// 		$where = array('kode_pulih' => $kode_pulih);
	// 		$this->M_Utama->editprofil($where,$data,'staff_tu');
	//
	// 		$data['ngapain']="berhasil";
	// 		$this->load->view('lupa',$data);
	// 	}
	// 	else
	// 	{
	// 		echo"Link tidak berlaku!"; exit;
	// 	}
	//
	// }

}
