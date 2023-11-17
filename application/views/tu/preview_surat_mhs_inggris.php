<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "important/assets.php";

$print="no";
if(isset($_GET['print']))$print=$_GET['print'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Preview Surat Mahasiswa (Bahasa Inggris)</title>
	<style>
@page { size: auto;  margin: 0mm; }
	.kopsurat
	{
	   line-height:0.68;
	}

	hr
	{
		border-color: gray;
		border-width: 3px;
	}
	</style>
</head>

	<body style="font-family: Times New Roman; font-size: 12pt;" <?php if($print=="yes")echo"onload=window.print()";?>>

<?php
foreach ($preview_surat_mhs as $layout)
{
	$isinya = $layout->setting_inggris;
	
	date_default_timezone_set("Asia/Jakarta");
	$tgll = date("Y-m-d");
	$tahun = date("Y");
	
			$tgl_d = date('d', strtotime($tgll));
			$tgl_m = date('m', strtotime($tgll));
			$tgl_Y = date('Y', strtotime($tgll));

			if($tgl_m=='01')$bulan="Januari";
			else if($tgl_m=='02')$bulan="Februari";
			else if($tgl_m=='03')$bulan="Maret";
			else if($tgl_m=='04')$bulan="April";
			else if($tgl_m=='05')$bulan="Mei";
			else if($tgl_m=='06')$bulan="Juni";
			else if($tgl_m=='07')$bulan="Juli";
			else if($tgl_m=='08')$bulan="Agustus";
			else if($tgl_m=='09')$bulan="September";
			else if($tgl_m=='10')$bulan="Oktober";
			else if($tgl_m=='11')$bulan="November";
			else if($tgl_m=='12')$bulan="Desember";
			
	$tgl = $tgl_d.' '.$bulan.' '.$tgl_Y;
	
	$tempatsurat="Medan";
	
	$an_jabatan = $layout->jabatan;
	$an_nama = $layout->atas_nama;
	$an_nip = $layout->NIP;
	
	$judul = $layout->judul_inggris;
	$format_nosur = $layout->format_nosur;
	$id_f = $layout->id_fakultas;
	$nomorsurat = '123/UN5.2.1.'.$id_f.'/'.$format_nosur.'/'.$tahun;
	
	//START PENGATURAN SURAT MAHASISWA
	
	$nim_mhs = $layout->NIM;
	$nama_mhs = $layout->Nama;
	$email_mhs = $layout->Email;
	$hp_mhs = $layout->hp;
	
	$tempatlahir_mhs = $layout->TempatLahir;
	$tanggallahir_mhs = $layout->TanggalLahir;
	$jeniskelamin_mhs = $layout->JenisKelamin;
	$agama_mhs = $layout->Agama;
	$kewarganegaraan_mhs = $layout->Kewarganegaraan;
	
	$jstudi_mhs = $layout->JenjangStudi;
	$tahunterdaftar_mhs = $layout->TahunMasuk;
	$prodi = $layout->Prodi;
	$fakultas = $layout->Fakultas;
	
	$alamat_mhs = $layout->Alamat;
	$alamatortu_mhs = $layout->AlamatOrtu;
	$namaayah_mhs = $layout->NamaAyah;
	$namaibu_mhs = $layout->NamaIbu;
	
	
	$tgll = $tanggallahir_mhs;
	  $tgl_d = date('d', strtotime($tgll));
	  $tgl_m = date('m', strtotime($tgll));
	  $tgl_Y = date('Y', strtotime($tgll));

	  if($tgl_m=='01')$bulan_lahir="Januari";
	  else if($tgl_m=='02')$bulan_lahir="Februari";
	  else if($tgl_m=='03')$bulan_lahir="Maret";
	  else if($tgl_m=='04')$bulan_lahir="April";
	  else if($tgl_m=='05')$bulan_lahir="Mei";
	  else if($tgl_m=='06')$bulan_lahir="Juni";
	  else if($tgl_m=='07')$bulan_lahir="Juli";
	  else if($tgl_m=='08')$bulan_lahir="Agustus";
	  else if($tgl_m=='09')$bulan_lahir="September";
	  else if($tgl_m=='10')$bulan_lahir="Oktober";
	  else if($tgl_m=='11')$bulan_lahir="November";
	  else if($tgl_m=='12')$bulan_lahir="Desember";
	  
	$tanggallahir_mhs = $tgl_d.' '.$bulan_lahir.' '.$tgl_Y;
	
	
	
	if($layout->borang1status == "text")
	{
		$borang1judul = $layout->borang1judul;
		$borang1desc = $layout->borang1desc;
		
		$kotak_borang1 = '[Form_'.$borang1judul.']';
		$value_borang1 = $layout->borang1;
		
		$isinya = str_replace($kotak_borang1, $value_borang1, $isinya);
	}
	if($layout->borang2status == "text")
	{
		$borang2judul = $layout->borang2judul;
		$borang2desc = $layout->borang2desc;
		
		$kotak_borang2 = '[Form_'.$borang2judul.']';
		$value_borang2 = $layout->borang2;
		
		$isinya = str_replace($kotak_borang2, $value_borang2, $isinya);
	}
	if($layout->borang3status == "text")
	{
		$borang3judul = $layout->borang3judul;
		$borang3desc = $layout->borang3desc;
		
		$kotak_borang3 = '[Form_'.$borang3judul.']';
		$value_borang3 = $layout->borang3;
		
		$isinya = str_replace($kotak_borang3, $value_borang3, $isinya);
	}
	if($layout->borang4status == "text")
	{
		$borang4judul = $layout->borang4judul;
		$borang4desc = $layout->borang4desc;
		
		$kotak_borang4 = '[Form_'.$borang4judul.']';
		$value_borang4 = $layout->borang4;
		
		$isinya = str_replace($kotak_borang4, $value_borang4, $isinya);
	}
	if($layout->borang5status == "text")
	{
		$borang5judul = $layout->borang5judul;
		$borang5desc = $layout->borang5desc;
		
		$kotak_borang5 = '[Form_'.$borang5judul.']';
		$value_borang5 = $layout->borang5;
		
		$isinya = str_replace($kotak_borang5, $value_borang5, $isinya);
	}
	
	if($layout->borang6status == "text")
	{
		$borang6judul = $layout->borang6judul;
		$borang6desc = $layout->borang6desc;
		
		$kotak_borang6 = '[Form_'.$borang6judul.']';
		$value_borang6 = $layout->borang6;
		
		$isinya = str_replace($kotak_borang6, $value_borang6, $isinya);
	}
	if($layout->borang7status == "text")
	{
		$borang7judul = $layout->borang7judul;
		$borang7desc = $layout->borang7desc;
		
		$kotak_borang7 = '[Form_'.$borang7judul.']';
		$value_borang7 = $layout->borang7;
		
		$isinya = str_replace($kotak_borang7, $value_borang7, $isinya);
	}
	if($layout->borang8status == "text")
	{
		$borang8judul = $layout->borang8judul;
		$borang8desc = $layout->borang8desc;
		
		$kotak_borang8 = '[Form_'.$borang8judul.']';
		$value_borang8 = $layout->borang8;
		
		$isinya = str_replace($kotak_borang8, $value_borang8, $isinya);
	}
	if($layout->borang9status == "text")
	{
		$borang9judul = $layout->borang9judul;
		$borang9desc = $layout->borang9desc;
		
		$kotak_borang9 = '[Form_'.$borang9judul.']';
		$value_borang9 = $layout->borang9;
		
		$isinya = str_replace($kotak_borang9, $value_borang9, $isinya);
	}
	if($layout->borang10status == "text")
	{
		$borang10judul = $layout->borang10judul;
		$borang10desc = $layout->borang10desc;
		
		$kotak_borang10 = '[Form_'.$borang10judul.']';
		$value_borang10 = $layout->borang10;
		
		$isinya = str_replace($kotak_borang10, $value_borang10, $isinya);
	}
	
	
	
	
	//END PENGATURAN SURAT MAHASISWA 
	
	
?>
<div class="box-body col-md-7">
<div align="left">
<table>
	<tr>
		<td align="center" width="135"><img src="<?php echo base_url();?>assets/file/logo_fakultas/<?php echo $layout->logo_fakultas; ?>" width="120px"></td>
		<td align="center">
			<p class="kopsurat"><font size="4">KEMENTERIAN RISET, TEKNOLOGI DAN PERGURUAN TINGGI</font></p>

			<p class="kopsurat"><font size="4"><b>UNIVERSITAS SUMATERA UTARA</b></font></p>
			<p class="kopsurat"><font size="4"><b><?php echo strtoupper($layout->Fakultas); ?></b></font></p>

			<p class="kopsurat"><?php echo $layout->Alamat_Fakultas; ?></p>

			<p class="kopsurat">Telepon/Fax : <?php  echo $layout->Telp ?></p>

			<p class="kopsurat">Laman: <?php echo $layout->Laman; ?>, email: <?php echo $layout->Email_Fakultas; ?></p>
		</td>
	</tr>
</table>

<hr>
<br>
				<div style="margin:0 50px 0 50px;text-align:justify;line-height:28px;">

				
				<?php
					
					
					$isinya = str_replace('[JudulSurat]', $judul, $isinya);
					$isinya = str_replace('[NomorSurat]', $nomorsurat, $isinya);
					
					$isinya = str_replace('[TempatSurat]', $tempatsurat, $isinya);
					$isinya = str_replace('[TanggalSurat]', $tgl, $isinya);
					
					$isinya = str_replace('[Jabatan_AN]', $an_jabatan, $isinya);
					$isinya = str_replace('[Nama_AN]', $an_nama, $isinya);
					$isinya = str_replace('[NIP_AN]', $an_nip, $isinya);
					
					$isinya = str_replace('[NIM_Mahasiswa]', $nim_mhs, $isinya);
					$isinya = str_replace('[Nama_Mahasiswa]', $nama_mhs, $isinya);
					$isinya = str_replace('[Email_Mahasiswa]', $email_mhs, $isinya);
					$isinya = str_replace('[NoHP_Mahasiswa]', $hp_mhs, $isinya);
					
					$isinya = str_replace('[TempatLahir_Mahasiswa]', $tempatlahir_mhs, $isinya);
					$isinya = str_replace('[TanggalLahir_Mahasiswa]', $tanggallahir_mhs, $isinya);
					$isinya = str_replace('[JenisKelamin_Mahasiswa]', $jeniskelamin_mhs, $isinya);
					$isinya = str_replace('[Agama_Mahasiswa]', $agama_mhs, $isinya);
					$isinya = str_replace('[Kewarganegaraan_Mahasiswa]', $kewarganegaraan_mhs, $isinya);
					
					$isinya = str_replace('[JenjangStudi_Mahasiswa]', $jstudi_mhs, $isinya);
					$isinya = str_replace('[TahunTerdaftar_Mahasiswa]', $tahunterdaftar_mhs, $isinya);
					$isinya = str_replace('[Prodi_Mahasiswa]', $prodi, $isinya);
					$isinya = str_replace('[Fakultas_Mahasiswa]', $fakultas, $isinya);
					
					$isinya = str_replace('[Alamat_Mahasiswa]', $alamat_mhs, $isinya);
					$isinya = str_replace('[AlamatOrtu_Mahasiswa]', $alamatortu_mhs, $isinya);
					$isinya = str_replace('[NamaAyah_Mahasiswa]', $namaayah_mhs, $isinya);
					$isinya = str_replace('[NamaIbu_Mahasiswa]', $namaibu_mhs, $isinya);
					
					
					
					echo $isinya;
					
				?>

				
				</div>
</div>
</div>
<?php
}
?>
</body>
</html>
