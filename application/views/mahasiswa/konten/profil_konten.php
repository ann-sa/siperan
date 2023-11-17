<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Akun</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
        <li><i class="glyphicon glyphicon-user"></i> Akun</li>
        <li class="active"><i class="glyphicon glyphicon-user"></i> Lihat Profil</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Lihat Profil</h3>


        </div>

        <div class="col-md-8 box-body">
    <?php
  foreach ($data_user as $biodata)
  {
	  $tgll = $biodata->TanggalLahir;
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
?>

			<div class="form-group">
				<img src="<?php echo $biodata->LinkFoto ;?>" alt="User Image" height="250px">
            </div>
			<table class="table">

				<tr>
                  <td width="30%">NIM</td>
                  <td>: <?php echo $biodata->NIM;?></td>
                </tr>

                <tr>
                  <td>Nama</td>
                  <td>: <?php echo $biodata->Nama;?></td>
                </tr>

				<tr>
                  <td>Email</td>
                  <td>: <?php echo $biodata->Email;?></td>
                </tr>

				<tr>
                  <td>No HP</td>
                  <td>: <?php echo $biodata->hp;?></td>
                </tr>

				<tr>
                  <td>Tempat, Tanggal lahir</td>
                  <td>: <?php echo $biodata->TempatLahir;?>, <?php echo $tgl_d.' '.$bulan_lahir.' '.$tgl_Y;?></td>
                </tr>

				<tr>
                  <td>Jenis Kelamin</td>
                  <td>: <?php echo $biodata->JenisKelamin;?></td>
                </tr>

				<tr>
                  <td>Agama</td>
                  <td>: <?php echo $biodata->Agama;?></td>
                </tr>

				<tr>
                  <td>Alamat</td>
                  <td>: <?php echo $biodata->Alamat;?></td>
                </tr>

				<tr>
                  <td>Jenjang Studi</td>
                  <td>: <?php echo $biodata->JenjangStudi;?></td>
                </tr>

				<tr>
                  <td>Program Studi</td>
                  <td>: <?php echo $biodata->Prodi;?></td>
                </tr>

				<tr>
                  <td>Fakultas</td>
                  <td>: <?php echo $biodata->Fakultas;?></td>
                </tr>

				<tr>
                  <td>Asal SLTA</td>
                  <td>: <?php echo $biodata->AsalSekolah;?></td>
                </tr>

				<tr>
                  <td>Tahun Terdaftar</td>
                  <td>: <?php echo $biodata->TahunMasuk;?></td>
                </tr>

				<tr>
                  <td>Nama Ayah</td>
                  <td>: <?php echo $biodata->NamaAyah;?></td>
                </tr>

				<tr>
                  <td>Nama Ibu</td>
                  <td>: <?php echo $biodata->NamaIbu;?></td>
                </tr>

				<tr>
                  <td>Alamat Orang Tua</td>
                  <td>: <?php echo $biodata->AlamatOrtu;?></td>
                </tr>

				<tr>
                  <td>Kewarganegaraan</td>
                  <td>: <?php echo $biodata->Kewarganegaraan;?></td>
                </tr>

				<tr>
                  <td>Status</td>
                  <td>: Aktif</td>
                </tr>

              </table>
<?php }?>


        <!-- /.box-footer-->
      </div>
	  <div class="box-footer"></div>
</div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
