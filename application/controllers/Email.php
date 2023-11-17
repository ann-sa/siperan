<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('email');
		$this->load->model('M_Mahasiswa');

		if($this->session->userdata('status') != "mahasiswa_is_login"){
			redirect(base_url("index.php/keluar"));
		}

		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$p1 = $this->M_Mahasiswa->mhs_by_nip($username);
		foreach($p1 AS $p2)
		{
			$p2_email = $p2->Email;
		}

		if($p2_email == "")
		{
			$data['ngapain'] = "input";
			$this->load->view('email', $data);
		}

		else
		{
			$this->verif();
		}
	}

	public function input2()
	{
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$email = $_POST['email'];

		$dimana = array(
			'Email' 		=> $email
			);
		$cek_mhs = $this->M_Mahasiswa->cek_x("mahasiswa",$dimana)->num_rows();
		$cek_tu = $this->M_Mahasiswa->cek_x("staff_tu",$dimana)->num_rows();

		if ($cek_mhs<1 OR $cek_tu<1)
		{
			$data = array('Email' => $email);
			$where = array('NIM' => $username);
			$this->M_Mahasiswa->editprofil($where,$data,'mahasiswa');

			redirect(base_url("index.php/email/verif"));

		}

		else
		{
			$data['ngapain'] = "input";
			$data['pesan'] = "Email sudah ada. Masukkan email lainnya.";
			$this->load->view('email', $data);
		}

	}

	public function generate_kode()
	{
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$angkarandom=rand(10000,99999);
		$kode = 'MHS'.$angkarandom;

		$data = array('Ac_Status' => $kode);
		$where = array('NIM' => $username);
		$this->M_Mahasiswa->editprofil($where,$data,'mahasiswa');
	}

	public function verif()
	{
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		if(isset($_GET['aksi']))
		{
			$aksi = $_GET['aksi'];

			if($aksi == "generate")$this->generate_kode();
		}

		$data['ngapain'] = "verif";
		$this->load->view('email', $data);

	}

	public function verif2()
	{
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$verif = $_POST['verif'];
		$p1 = $this->M_Mahasiswa->mhs_by_nip($username);
		foreach($p1 AS $p2)
		{
			$ac_status = $p2->Ac_Status;
		}

		if($verif == $ac_status)
		{
			$data = array('Ac_Status' => "verified");
			$where = array('NIM' => $username);
			$this->M_Mahasiswa->editprofil($where,$data,'mahasiswa');

			$data['ngapain'] = "berhasil";
			$this->load->view('email', $data);
		}

		else
		{
			$data['ngapain'] = "verif";
			$data['pesan'] = "Kode yang Anda masukkan salah!";
			$this->load->view('email', $data);
		}

	}

	public function kirim_kode()
	{
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$p1 = $this->M_Mahasiswa->mhs_by_nip($username);
		foreach($p1 AS $p2)
		{
			$p2_email 	= $p2->Email;
			$p2_kode	= $p2->Ac_Status;
		}

		$subjek = "Kode verifikasi";
		$isi = "Kode verifikasi email Anda adalah" . $p2_kode;

		$this->kirim_email($p2_email,$subjek,$isi);

	}

	public function kirim_email($email,$subjek,$isi)
	{
		$from_email = "siperan@usu.ac.id";
		$to_email = $email;

		$this->email->from($from_email, 'Siperan USU');
		$this->email->to($to_email);
		$this->email->subject($subjek);
		$this->email->message($isi);

		//Send mail
		if($this->email->send())
		{
			$this->verif2();
		}
		else
		{
			echo "Error saat mengirim email!"; exit;
		}
	}

	public function ganti_email()
	{
		$username = $this->session->userdata('username');
		$data['data_user'] =  $this->M_Mahasiswa->ambil_mahasiswa($username);

		$data['ngapain'] = "input";
		$this->load->view('ganti', $data);
	}

	public function ganti_email_2()
	{
		$username = $this->session->userdata('username');
		$data['data_user'] = $this->M_Mahasiswa->ambil_mahasiswa($username);


		$new_email = $_POST['email'];

		$p1 = $this->M_Mahasiswa->mhs_by_nip($username);
		foreach($p1 AS $p2)
		{
			$p2_email 	= $p2->Email;
		}

		if($p2_email==$new_email)
		{
			$data['ngapain'] = "input";
			$data['pesan'] = "Tidak ada perubahan";
			$this->load->view('ganti', $data);
		}
		else
		{
			$dimana = array(
				'Email' => $new_email
				);
			$cek_mhs = $this->M_Mahasiswa->cek_x("Mahasiswa",$dimana)->num_rows();
			$cek_tu = $this->M_Mahasiswa->cek_x("Staff_TU",$dimana)->num_rows();

			if($cek_mhs>0 OR $cek_tu>0)
			{
				$data['ngapain'] = "input";
				$data['pesan'] = "Email sudah ada! Coba email lain!";
				$this->load->view('ganti', $data);
			}
			else
			{
				$data = array('Email' => $new_email);
				$where = array('NIM' => $username);
				$this->M_Mahasiswa->editprofil($where,$data,'mahasiswa');

				redirect(base_url("index.php/email/ganti_email_3"));
			}
		}
	}

	public function ganti_email_3()
	{
		$username = $this->session->userdata('username');
		$data['data_user'] = $this->M_Mahasiswa->ambil_mahasiswa($username);



		$data['ngapain'] = "berhasil";
		$this->load->view('ganti', $data);
	}

}
