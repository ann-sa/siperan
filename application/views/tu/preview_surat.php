<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "important/assets.php";

$print="no";
if(isset($_GET['print']))$print=$_GET['print'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Preview Surat (Bahasa Indonesia)</title>
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
foreach ($surat_flex_pilih as $surat)
{
	$tgll = $surat->tanggal_surat;
	
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
	
	
	
	$an_jabatan = $surat->jabatan;
	$an_nama = $surat->atas_nama;
	$an_nip = $surat->NIP;
	
	$judul = $surat->judul;
	$nomorsurat = $surat->nomorsurat;
	$tempatsurat = $surat->tempat_surat;
	
	
?>
<div class="box-body col-md-7">
<div align="left">
<table>
	<tr>
		<td align="center" width="135"><img src="<?php echo base_url();?>assets/file/logo_fakultas/<?php echo $surat->logo_fakultas; ?>" width="120px"></td>
		<td align="center">
			<p class="kopsurat"><font size="4">KEMENTERIAN RISET, TEKNOLOGI DAN PERGURUAN TINGGI</font></p>

			<p class="kopsurat"><font size="4"><b>UNIVERSITAS SUMATERA UTARA</b></font></p>
			<p class="kopsurat"><font size="4"><b><?php echo strtoupper($surat->Fakultas); ?></b></font></p>

			<p class="kopsurat"><?php echo $surat->Alamat_Fakultas; ?></p>

			<p class="kopsurat">Telepon/Fax : <?php  echo $surat->Telp ?></p>

			<p class="kopsurat">Laman: <?php echo $surat->Laman; ?>, email: <?php echo $surat->Email_Fakultas; ?></p>
		</td>
	</tr>
</table>

<hr>
<br>
				<div style="margin:0 50px 0 50px;text-align:justify;line-height:28px">

				
				<?php
					$isinya = $surat->isi_surat;
					
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
