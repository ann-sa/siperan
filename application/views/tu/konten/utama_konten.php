<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php foreach($data_user as $biodata) { $levelakun = $biodata->level;
	if($levelakun=="super")$levelakun_in_teks="Akun TU Superior";
	else if($levelakun=="biasa")$levelakun_in_teks="Akun TU biasa";?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Awal
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-home"></i> Awal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	
	
	
	

	<div class="col-md-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Selamat Datang di <?php echo $namaweb; ?></h3>
				<div class="box-tools pull-right">

					<button type="button" class="btn btn-box-tool" data-widget="collapse">
					  <i class="fa fa-minus"></i></button>
				  </div>

			</div>
			<div class="box-body">
					<div align="center"><img src="<?php echo base_url(); ?>assets/logo.png" width="200px"></div>
					<br><br>
					<p align="justify">

					<?php echo $namaweb; ?> adalah sistem administrasi persuratan terpadu untuk Mahasiswa / Mahasiswi dan Staff Tata Usaha di Universitas Sumatera Utara.
					<?php echo $namaweb; ?> memungkinkan kegiatan administrasi persuratan yang lebih mudah, efektif, dan efisien meliputi pembuatan, pengelolaan, pencarian dan pengarsipan surat.
					
					</p>
					<br>
					<p align="justify">
					
					<?php echo $namaweb; ?> terdapat di 15 fakultas di Universitas Sumatera Utara. Tiap-tiap fakultas memiliki akun Staff TU yang berbeda dari fakultas lainnya.
					Ada 2 tipe akun Staff TU untuk tiap fakultas dan memiliki hak akses yang berbeda sesuai tingkatan akunnya.
					Surat-surat yang terdapat di <?php echo $namaweb; ?> terpisah berdasarkan fakultasnya. Staff TU suatu fakultas hanya bisa mengatur surat-surat di fakultasnya,
					tidak diberikan akses untuk mengatur surat-surat dari fakultas lain.
					
					</p>
			</div>
		</div>
	</div>
	
	
	
	
	
	<div class="col-md-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Info Fakultas</h3>
				<div class="box-tools pull-right">

					<button type="button" class="btn btn-box-tool" data-widget="collapse">
					  <i class="fa fa-minus"></i></button>
				  </div>

			</div>
			<div class="box-body">
					<?php
foreach ($info_fakultas as $fakultas)
{
?>
		
			<table class="table">
			
                <tr>
                  <td width="40%">Logo Fakultas : </td>
                  <td><img src="<?php echo base_url();?>assets/file/logo_fakultas/<?php echo $fakultas->logo_fakultas;?>" width="120px"></td>
                </tr>
				
				<tr>
                  <td>Nama Fakultas : </td>
                  <td><?php echo $fakultas->Fakultas;?></td>
                </tr>
				
				<tr>
                  <td>Alamat Fakultas : </td>
                  <td><?php echo $fakultas->Alamat_Fakultas;?></td>
                </tr>
				
				<tr>
                  <td>Nomor Telepon : </td>
                  <td><?php echo $fakultas->Telp;?></td>
                </tr>
				
				<tr>
                  <td>Laman : </td>
                  <td><?php echo $fakultas->Laman;?></td>
                </tr>
				
				<tr>
                  <td>Email : </td>
                  <td><?php echo $fakultas->Email_Fakultas;?></td>
                </tr>
		
		
			</table>
<?php } ?>	
			</div>
		</div>
		
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Akun</h3>
				<div class="box-tools pull-right">

					<button type="button" class="btn btn-box-tool" data-widget="collapse">
					  <i class="fa fa-minus"></i></button>
				  </div>

			</div>
			<div class="box-body">
					<div align="center"><img src="<?php echo base_url(); ?>assets/file/tu/foto_profil/<?php echo $biodata->foto_profil ;?>" width="200px"></div>
					<br>
					<table class="table">
					<tr>
					  <td width="30%">NIP</td>
					  <td>: <?php echo $biodata->NIP;?></td>
					</tr>
					
					<tr>
					  <td>Level akun</td>
					  <td>: <?php echo $levelakun_in_teks;?></td>
					</tr>
					
					<tr>
					  <td>Nama</td>
					  <td>: <?php echo $biodata->Nama;?></td>
					</tr>
					
					<tr>
					  <td>Email</td>
					  <td>: <?php echo $biodata->Email;?></td>
					</tr>
			
			
				</table>
			</div>
		</div>
	</div>
	
	
	



</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php } ?>