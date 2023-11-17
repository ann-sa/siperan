<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "important/assets.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Print Surat Disposisi</title>
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
  td{
    padding: 10px;
  }
  </style>
</head>

  <body onload="window.print()" style="font-family: Times New Roman; font-size: 12pt;">

<?php
foreach ($surat_disposisi as $disposisi)
{
  $tgll = $disposisi->tanggal_diterima;
  $tgl_surat = $disposisi->tanggal_surat;
  $tgl_dikembalikan = $disposisi->TanggalDikembalikan;
    $tgl_d = date('d', strtotime($tgll));
    $tgl_m = date('m', strtotime($tgll));
    $tgl_Y = date('Y', strtotime($tgll));

    $tgl_1 = date('d', strtotime($tgl_surat));
    $tgl_2 = date('m', strtotime($tgl_surat));
    $tgl_3 = date('Y', strtotime($tgl_surat));

    $tgl_4 = date('d', strtotime($tgl_dikembalikan));
    $tgl_5 = date('m', strtotime($tgl_dikembalikan));
    $tgl_6 = date('Y', strtotime($tgl_dikembalikan));


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
    if($tgl_2=='01')$month="Januari";
    else if($tgl_2=='02')$bulann="Februari";
    else if($tgl_2=='03')$bulann="Maret";
    else if($tgl_2=='04')$bulann="April";
    else if($tgl_2=='05')$bulann="Mei";
    else if($tgl_2=='06')$bulann="Juni";
    else if($tgl_2=='07')$bulann="Juli";
    else if($tgl_2=='08')$bulann="Agustus";
    else if($tgl_2=='09')$bulann="September";
    else if($tgl_2=='10')$bulann="Oktober";
    else if($tgl_2=='11')$bulann="November";
    else if($tgl_2=='12')$bulann="Desember";
    if($tgl_5=='01')$month="Januari";
    else if($tgl_5=='02')$month="Februari";
    else if($tgl_5=='03')$month="Maret";
    else if($tgl_5=='04')$month="April";
    else if($tgl_5=='05')$month="Mei";
    else if($tgl_5=='06')$month="Juni";
    else if($tgl_5=='07')$month="Juli";
    else if($tgl_5=='08')$month="Agustus";
    else if($tgl_5=='09')$month="September";
    else if($tgl_5=='10')$month="Oktober";
    else if($tgl_5=='11')$month="November";
    else if($tgl_5=='12')$month="Desember";

$tgl = $tgl_d.' '.$bulan.' '.$tgl_Y;
$tgl_surat = $tgl_1.' '.$bulann.' '.$tgl_3;
$tgl_dikembalikan = $tgl_4.' '.$month.' '.$tgl_6;
?>
<div class="box-body col-md-7">
  <div align="left">

<table border="1px solid black" >
  <tr >
    <td colspan=2 align="center" width="800px">
      <img style="margin-left:50px;float:left" src="<?php echo base_url('assets/file/logo_fakultas/logo_fasilkom_ti.png');?>" width="120px">
      <div style="margin-right:50px">
      <p><font size="4">KEMENTERIAN RISET, TEKNOLOGI DAN PERGURUAN TINGGI</font></p>

      <p><font size="4"><b>UNIVERSITAS SUMATERA UTARA</b></font></p>
      <p><font size="4"><b><?php echo strtoupper($disposisi->Fakultas); ?></b></font></p>

      <p><?php echo  $disposisi->Alamat_Fakultas; ?></p>

      <p>Telepon/Fax : <?php  echo  $disposisi->Telp ?></p>

      <p>Laman: <?php echo  $disposisi->Laman; ?>, email: <?php echo  $disposisi->Email_Fakultas; ?></p>
      </div>
    </td>
  </tr>
  <tr >
    <td colspan=2><center><b>LEMBAR DISPOSISI</center></b></td>
  </tr>
  <tr>
    <td >Nomor Agenda : <?php echo $disposisi->no_agenda; ?></td>
    <td >Tk.Keamanan : <?php echo $disposisi->TingkatKeamanan; ?></td>
  </tr>
  <tr>
    <td colspan=2 >Diterima Tgl &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $tgl; ?>
  </tr>
  <tr>
    <td colspan=2>Tgl-Nomor &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $tgl_surat;?> . <?php echo $disposisi->nomorsurat;?>
      <br> Asal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $disposisi->asal; ?>
      <br> Isi Ringkasan : <?php echo $disposisi->isi_surat; ?>
      <br><br><br><br><br><br><br><br>
  </tr>
  <tr>
    <td><b><center>Disposisi</center></b></td>
    <td><b><center>Diteruskan Kepada</center></b></td>
  </tr>
  <tr>
    <td>isi disposisi : <?php echo $disposisi->isidisposisi; ?>
      <b><p>Catatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</p></b>
    <p style="text-indent:20px"><?php echo $disposisi->Catatan; ?></td>
    <td><?php echo $disposisi->DidisposisikanKepada; ?></td>
  </tr>
  <tr>

    <td><b>Sesudah digunakan segera Dikembalikan
    <p>Kepada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $disposisi->KembalikanKepada; ?>
    <p>Tangal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $tgl_dikembalikan; ?></b></td>
    <td><b>PARAF : </b></td>

  </tr>

</table>
</tr>

</table>

<?php } ?>

  </div>
</div>
</body>
</html>
