<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Akun
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
		<li><i class="glyphicon glyphicon-user"></i> Akun</a></li>
        <li class="active"><i class="fa fa-edit"></i> Edit Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Profil</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php echo (isset($_GET['error']))? "<div class='alert alert-danger'>$_GET[error]</div>" : ""; ?>
<?php
// var_dump($data_user);
  foreach ($data_user as $pengguna)
  {
	  $jstudi = $pengguna->JenjangStudi;

	  $tgll = $pengguna->TanggalLahir;
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

            <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/mahasiswa/simpanedit">
              <div class="col-md-8 box-body">






			<table class="table table-bordered">

				<tr>
                  <td width="30%">NIM</td>
                  <td><input type="text" class="form-control" name="nim" value="<?php echo $pengguna->NIM ;?>"readonly></td>
                </tr>

                <tr>
                  <td>Nama</td>
                  <td><input type="text" class="form-control" name="nama" value="<?php echo $pengguna->Nama ;?>"readonly></td>
                </tr>

				<tr>
                  <td>Email</td>
                  <td><input type="text" class="form-control" name="email" value="<?php echo $pengguna->Email ;?>"></td>
                </tr>

				<tr>
                  <td>No HP</td>
                  <td><input type="text" class="form-control" name="hp" value="<?php echo $pengguna->hp ;?>"></td>
                </tr>

				<tr>
                  <td>Tempat, Tanggal lahir</td>
                  <td><input type="text" class="form-control" name="ttl" value="<?php echo $pengguna->TempatLahir ;?>, <?php echo $tgl_d.' '.$bulan_lahir.' '.$tgl_Y;?>"readonly></td>
                </tr>

				<tr>
                  <td>Jenis Kelamin</td>
                  <td><input type="text" class="form-control" name="jk" value="<?php echo $pengguna->JenisKelamin ;?>"readonly></td>
                </tr>

				<tr>
                  <td>Agama</td>
                  <td><input type="text" class="form-control" name="agama" value="<?php echo $pengguna->Agama ;?>"readonly></td>
                </tr>

				<tr>
                  <td>Alamat</td>
                  <td><textarea class="form-control" name="alamat" pattern="^[a-zA-Z0-9\s\.,-]*$" autofocus required oninvalid="this.setCustomValidity('Hanya bisa huruf kapital, huruf kecil, angka, titik, koma, garis penghubung, dan petik satu atas')" oninput="setCustomValidity('')"><?php echo $pengguna->Alamat ;?></textarea></td>
                </tr>

				<tr>
                  <td>Jenjang Studi</td>
                  <td>

					<div class="col-md-3" style="padding-left:0px">
					<select name="JenjangStudi" class="form-control">
						<option value="D-3" <?php if($jstudi=="D-3") echo"selected" ;?>>D-3</option>
						<option value="D-4" <?php if($jstudi=="D-4") echo"selected" ;?>>D-4</option>
						<option value="S-1" <?php if($jstudi=="S-1") echo"selected" ;?>>S-1</option>
						<option value="S-2" <?php if($jstudi=="S-2") echo"selected" ;?>>S-2</option>
						<option value="S-3" <?php if($jstudi=="S-3") echo"selected" ;?>>S-3</option>
					</select>
					</div>

				  </td>
                </tr>

				<tr>
                  <td>Program Studi</td>
                  <td><input type="text" class="form-control" name="prodi" value="<?php echo $pengguna->Prodi ;?>"readonly></td>
                </tr>

				<tr>
                  <td>Fakultas</td>
                  <td><input type="text" class="form-control" name="fakultas" value="<?php echo $pengguna->Fakultas ;?>"readonly></td>
                </tr>

				<tr>
                  <td>Asal SLTA</td>
                  <td><input type="text" class="form-control" name="asal" value="<?php echo $pengguna->AsalSekolah ;?>"readonly></td>
                </tr>

				<tr>
                  <td>Tahun Terdaftar</td>
                  <td><input type="text" class="form-control" name="dftar" value="<?php echo $pengguna->TahunMasuk ;?>"readonly></td>
                </tr>

				<tr>
                  <td>Nama Ayah</td>
                  <td><input type="text" class="form-control" name="namaayah" value="<?php echo $pengguna->NamaAyah ;?>"readonly></td>
                </tr>

				<tr>
                  <td>Nama Ibu</td>
                  <td><input type="text" class="form-control" name="namaibu" value="<?php echo $pengguna->NamaIbu ;?>"readonly></td>
                </tr>

				<tr>
                  <td>Alamat Orang Tua</td>
          <td><textarea class="form-control" name="alamatortu" pattern="^[a-zA-Z0-9\s\.,-]*$" autofocus required oninvalid="this.setCustomValidity('Hanya bisa huruf kapital, huruf kecil, angka, titik, koma, garis penghubung, dan petik satu atas')" oninput="setCustomValidity('')"><?php echo $pengguna->AlamatOrtu ;?></textarea></td>
                </tr>

				<tr>
                  <td>Kewarganegaraan</td>
                  <td><input type="text" class="form-control" name="warga" value="<?php echo $pengguna->Kewarganegaraan ;?>"readonly></td>
                </tr>

				<tr>
                  <td>Status</td>
                  <td><input type="text" class="form-control" name="nama" value="Aktif"readonly></td>
                </tr>

              </table>





				<br>
				<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
              </div>
              <!-- /.box-body -->


              <div class="box-footer">

              </div>
            </form>

<?php }?>
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
