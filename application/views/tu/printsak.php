<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "important/assets.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Print Surat Aktif Mahasiswa</title>
	<style>
@page { size: auto;  margin: 0mm; }
	p
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

	<body onload="window.print()" style="font-family: Times New Roman; font-size: 12pt;">

<?php
foreach ($surat_aktif_kuliah as $sak)
{
?>
<div class="box-body col-md-7">
	<div align="left">
<table>
	<tr>
		<td align="center" width="135"><img src="<?php echo base_url('assets/file/logo_fasilkom_ti.png');?>" width="120px"></td>
		<td align="center">
			<p><font size="4">KEMENTERIAN RISET, TEKNOLOGI DAN PERGURUAN TINGGI</font></p>

			<p><font size="4"><b>UNIVERSITAS SUMATERA UTARA</b></font></p>
			<p><font size="4"><b><?php echo strtoupper($sak->Fakultas); ?></b></font></p>

			<p><?php echo $sak->Alamat_Fakultas; ?></p>

			<p>Telepon/Fax : <?php  echo $sak->Telp ?></p>

			<p>Laman: <?php echo $sak->Laman; ?>, email: <?php echo $sak->Email_Fakultas; ?></p>
		</td>
	</tr>
</table>

<hr>
<br>
<center><u><p><font size="5">SURAT KETERANGAN</font></p></u>
Nomor: <?php echo $sak->nomorsurat; ?></center>
<br>
<div style="margin:0 80px 0 50px;text-align:justify;line-height:28px">

Dekan Fakultas <?php echo $sak->Fakultas; ?> Universitas Sumatera Utara dengan ini menerangkan bahwa:

<table>
	<tr>
		<td>Nama/NIM </td>
		<td style="text-transform:capitalize;">: <?php echo strtolower($sak->Nama); ?> / <?php echo $sak->NIM; ?></td>
	</tr>
	<tr>
		<?php
		$tempat = $sak->TempatLahir;
		$tempat_str = explode(" ", $tempat);
		$tanggal = $sak->TanggalLahir;
		$tanggal_str = explode("-",$tanggal);
		$bln["01"]	 = "Januari";
		$bln["02"] = "Februari";
		$bln["03"] = "Maret";
		$bln["04"] = "April";
		$bln["05"]	= "Mei";
		$bln["06"] 	= "Juni";
		$bln["07"] 	= "Juli";
		$bln["08"] = "Agustus";
		$bln["09"] = "September";
		$bln["10"] = "Oktober";
		$bln["11"] = "November";
		$bln["12"] = "Desember";
		?>
		<td>Tempat / Tanggal Lahir &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
		<td style="text-transform:capitalize;">:  <?php for($i = 2; $i < count($tempat_str); $i++){echo strtolower($tempat_str[$i]).' ';}
		echo ', '.$tanggal_str[2].' '.$bln[$tanggal_str[1]].' '.$tanggal_str[0]; ?></td>
	</tr>
	<tr>
		<td>Jenjang Studi / Prodi</td>
		<td>: <?php echo $sak->JenjangStudi." / ".$sak->Prodi; ?></td>
	</tr>
	<tr>
		<td>Semester </td>
		<td>: <?php echo $sak->Semester; ?></td>
	</tr>
	<tr>
		<td>Alamat/No.HP/Email </td>
		<td>: <?php echo $sak->Alamat?></td>
	</tr>
	<tr>
		<td></td>
		<td>&nbsp; <?php echo $sak->Email; ?></td>
	</tr>
	<tr>
		<td> Nama Orang Tua </td>
		<td style="text-transform:capitalize;">: <?php echo strtolower($sak->NamaAyah); ?></td>
	</tr>
	<tr>
		<td>Alamat Orang Tua </td>
		<td>: <?php echo $sak->AlamatOrtu; ?></td>
	</tr>
	<tr>
		<td>Tahun Masuk/Sem/Renc.Tamat</td>
		<td>: <?php echo $sak->TahunMasuk.' / '. $sak->Semester. ' / '. $sak->RencanaTamat; ?></td>
	</tr>
	<tr>
		<td>IPS / IPK</td>
		<td>: <?php echo $sak->IPS.' / '. $sak->IPK; ?></td>
	</tr>
</table>
<br>
Adalah benar mahasiswa Fakultas <?php echo $sak->Fakultas; ?> Universitas Sumatera Utara
pada tahun Akademik dan saat ini tidak menerima beasiswa dari pihak lain. Surat keterangan ini
dipergunakan untuk keperluan <?php echo $sak->Keperluan; ?>

<br><br><br>

<div class="pull-right">

	<!-- Medan, <?php echo $sak->TanggalVerifikasi; ?> -->
	<br>
	A.n. Dekan,
	<br>
	
	/////////////
	
	<?php echo $sak->jabatan; ?>
	<br><br><br><br><div style='line-height:0px'>
	<?php echo $sak->atas_nama;?>
	<br><hr><br>
	NIP. <?php echo $sak->NIP; ?>
	</div>
	/////////////
	

</div>

<?php } ?>

	</div>
</div>
</body>
</html>
