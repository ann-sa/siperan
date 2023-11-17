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
;
foreach ($surat_tu_plain as $stp)
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
			<p><font size="4"><b><?php echo strtoupper($stp->Fakultas); ?></b></font></p>

			<p><?php echo $stp->Alamat_Fakultas; ?></p>

			<p>Telepon/Fax : <?php  echo $stp->Telp ?></p>

			<p>Laman: <?php echo $stp->Laman; ?>, email: <?php echo $stp->Email_Fakultas; ?></p>
		</td>
	</tr>
</table>
 <?php
 $penerima = $stp->PenerimaSurat;
 $pecah = explode(",", $penerima);
 $jumlahpenerima =  count($pecah);
 ?>
<hr>
<div style="margin:0 80px 0 50px;text-align:justify;">
<table>
  <tr>
      <td>Nomor </td>
      <td>: <?php echo $stp->nomorsurat; ?></td>
  </tr>
  <tr>
    <td>Lampiran &nbsp; &nbsp;</td>
    <td>: <?php echo "1"; ?></td>
  </tr>
  <tr>
    <td>Hal </td>
    <td>: <?php echo $stp->Judul; ?></td>
  </tr>
</table><br>
Yth.<br>
<?php
for($i=1;$i<=$jumlahpenerima;$i++) {
  echo $i.'. '.$pecah[$i-1].'<br>';
}
?>
Universitas Sumatera Utara <br>
Medan
<br><br>
<?php echo $stp->isi; ?>

Demikian surat ini kami sampaikan, atas perhatian dan kehadirannya diucapkan terima kasih.
<div class="pull-right">

	<!-- Medan, <?php echo $sak->TanggalVerifikasi; ?> -->
	<br>
	A.n. Dekan,
	<br>
	<?php echo $stp->jabatan; ?>
	<br><br><br><br>
	<div style="line-height:0px">
	<?php echo $stp->atas_nama;?><br>
	<hr>
	<br>
	NIP. <?php echo $stp->NIP; ?>
	</div>

</div>
</div>



<?php } ?>

	</div>
</div>
</body>
</html>
