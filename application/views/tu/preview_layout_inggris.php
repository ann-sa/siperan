<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "important/assets.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Preview Layout (Bahasa Inggris)</title>
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

	<body style="font-family: Times New Roman; font-size: 12pt;">

<?php
foreach ($layout_pilih as $layout)
{
	date_default_timezone_set("Asia/Jakarta");
	$tgll = date("Y-m-d");
	$tahun = date("Y");
	
			$tgl_d = date('d', strtotime($tgll));
			$tgl_m = date('m', strtotime($tgll));
			$tgl_Y = date('Y', strtotime($tgll));

			if($tgl_m=='01')$bulan="January";
			else if($tgl_m=='02')$bulan="February";
			else if($tgl_m=='03')$bulan="March";
			else if($tgl_m=='04')$bulan="April";
			else if($tgl_m=='05')$bulan="May";
			else if($tgl_m=='06')$bulan="June";
			else if($tgl_m=='07')$bulan="July";
			else if($tgl_m=='08')$bulan="August";
			else if($tgl_m=='09')$bulan="September";
			else if($tgl_m=='10')$bulan="October";
			else if($tgl_m=='11')$bulan="November";
			else if($tgl_m=='12')$bulan="December";
			
	$tgl = $bulan.' '.$tgl_d.' '.$tgl_Y;
	
	$tempatsurat="Medan";
	
	$an_jabatan = $layout->jabatan;
	$an_nama = $layout->atas_nama;
	$an_nip = $layout->NIP;
	
	$judul = $layout->judul_inggris;
	$format_nosur = $layout->format_nosur;
	$id_f = $layout->id_fakultas;
	$nomorsurat = '123/UN5.2.1.'.$id_f.'/'.$format_nosur.'/'.$tahun;
	
	
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
				<div style="margin:0 50px 0 50px;text-align:justify;line-height:28px">

				
				<?php
					$isinya = $layout->setting_inggris;
					
					$isinya = str_replace('[JudulSurat]', $judul, $isinya);
					$isinya = str_replace('[NomorSurat]', $nomorsurat, $isinya);
					
					$isinya = str_replace('[TempatSurat]', $tempatsurat, $isinya);
					$isinya = str_replace('[TanggalSurat]', $tgl, $isinya);
					
					$isinya = str_replace('[Jabatan_AN]', $an_jabatan, $isinya);
					$isinya = str_replace('[Nama_AN]', $an_nama, $isinya);
					$isinya = str_replace('[NIP_AN]', $an_nip, $isinya);
					
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
