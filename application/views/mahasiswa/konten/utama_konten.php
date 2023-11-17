<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php foreach($data_user as $biodata) { ?>
<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Awal
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-home"></i> Awal</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Selamat Datang di <?php echo $namaweb; ?></h3>
		  
		  <div class="box-tools pull-right">
		  <button type="button" class="btn btn-box-tool" data-widget="collapse">
			  <i class="fa fa-minus"></i></button>
		  </div>

        </div>
        <div class="box-body">
			
				<div class="col-md-6">
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
      <?php } ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
