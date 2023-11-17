<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lihat Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/mahasiswa/suratsaya/all"><i class="fa fa-folder-open"></i> Surat Saya</a></li>
        <li class="active"><i class="fa fa-envelope"></i> Lihat Surat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Aktif Kuliah</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<?php

	foreach ($surat_aktif_kuliah as $sak)
	{
		$sak_status=$sak->id_status_surat;
?>

<?php include"additional_modals.php"; ?> <!-- FILE MODALS -->

              <div class="box-body">
                <div class="form-group">
                  <label>Nama Mahasiswa</label><br>
                  <?php echo $sak->Nama ;?>
                </div>
				<div class="form-group">
                  <label>NIM</label><br>
                  <?php echo $sak->NIM ;?>
                </div>
				<div class="form-group">
                  <label>Tempat, Tanggal Lahir</label><br>
                  <?php echo $sak->TempatLahir.',   '.$sak->TanggalLahir ;?>
                </div>
				<div class="form-group">
                  <label>Prodi</label><br>
                  <?php echo $sak->Prodi ;?>
                </div>
				<div class="form-group">
                  <label>Fakultas</label><br>
                  <?php echo $sak->Fakultas ;?>
                </div>
				<div class="form-group">
                  <label>Semester</label><br>
                  <?php echo $sak->Semester ;?>
                </div>
				<div class="form-group">
                  <label>Alamat</label><br>
                  <?php echo $sak->Alamat ;?>
                </div>
				<div class="form-group">
                  <label>Nama Ayah</label><br>
                  <?php echo $sak->NamaAyah ;?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Keperluan</label><br>
                  <?php echo $sak->Keperluan ;?>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Scan KTM</label><br>
                  <a href="<?php echo base_url(); ?>assets/file/mahasiswa/scan/<?php echo $sak->Scan_KTM ;?>" target="new" title="Lihat Gambar">
					<img src="<?php echo base_url(); ?>assets/file/mahasiswa/scan/<?php echo $sak->Scan_KTM ;?>" width="200px" class="img-responsive">
				  </a>
                </div>
				<div class="form-group">
                  <label for="exampleInputFile">Scan Billing Statement</label><br>
				  <a href="<?php echo base_url(); ?>assets/file/mahasiswa/scan/<?php echo $sak->Scan_BS ;?>" target="new" title="Lihat Gambar">
					<img src="<?php echo base_url(); ?>assets/file/mahasiswa/scan/<?php echo $sak->Scan_BS ;?>" width="200px" class="img-responsive">
				  </a>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">

				<a href="<?php echo base_url(); ?>index.php/mahasiswa/suratsaya/all" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
<?php if($sak_status==1)
{?>
                <a href="<?php echo base_url(); ?>index.php/mahasiswa/editsak/<?php echo $sak->id_surat_aktif ;?>" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				<a data-toggle="modal" data-target="#hapussak<?php echo $sak->id_surat_aktif ;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
				<a data-toggle="modal" data-target="#kirimsak<?php echo $sak->id_surat_aktif ;?>" class="btn btn-primary"><i class="fa fa-send"></i> Kirim Permintaan</a>
<?php }?>

<?php if($sak_status==4)
{?>
				<a data-toggle="modal" data-target="#hapussak<?php echo $sak->id_surat_aktif ;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
<?php }?>

              </div>
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
