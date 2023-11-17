<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Arsip</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/TU"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-folder-open"></i> Arsip</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->



<!-- START OF SURAT KELUAR -->
      <div class="box collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Surat Keluar</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-plus"></i></button>
          </div>
        </div>
        <div class="box-body">


      <table id="example1"class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Layout</th>
				<th>Nomor Surat</th>
				<th>Tanggal</th>
				<th>Tindakan</th>
			</tr>
		</thead>
		<tbody>

<?php
	$no=1;
	foreach ($arsip_surat_keluar as $surat)
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
?>

        <tr>
          <td><?php echo $no ;?></td>
		  <td><?php echo $surat->judul ;?></td>
		  <td><?php echo $surat->nomorsurat ;?></td>
		  <td><?php echo $tgl ;?></td>
          <td>

            <a href="<?php echo base_url(); ?>index.php/TU/lihat_suratkeluar/<?php echo $surat->id_surat ;?>" title="Lihat" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Lihat</a>
          </td>
        </tr>

<?php $no++; }?>
        </tbody>
      </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
<!-- END OF SURAT KELUAR -->

<!-- START OF SURAT MAHASISWA -->
      <div class="box collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Surat Mahasiswa</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-plus"></i></button>
          </div>
        </div>
        <div class="box-body">


      <table id="example2" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Layout</th>
        <th>Nomor Surat</th>
        <th>Tanggal</th>
        <th>Tindakan</th>
      </tr>
    </thead>
    <tbody>

<?php
  $no=1;
  foreach ($arsip_surat_mhs as $surat)
  {

    $tgll = $surat->tgl_terima;

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
?>

        <tr>
          <td><?php echo $no ;?></td>
      <td><?php echo $surat->judul ;?></td>
      <td><?php echo $surat->nomorsurat ;?></td>
      <td><?php echo $tgl ;?></td>
          <td>

            <a href="<?php echo base_url(); ?>index.php/TU/review_surat_mhs/<?php echo $surat->id_surat_mhs ;?>" title="Lihat" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Lihat</a>
          </td>
        </tr>

<?php $no++; }?>
        </tbody>
      </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
<!-- END OF SURAT KELUAR -->

<!-- START OF SURAT MASUK -->
      <div class="box collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Surat Masuk</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-plus"></i></button>
          </div>
        </div>
        <div class="box-body">


      <table id="example3" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Jenis Surat</th>
        <th>Nomor Surat</th>
        <th>Tanggal</th>
        <th>Tindakan</th>
      </tr>
    </thead>
    <tbody>

<?php
  $no=1;
  foreach ($arsip_surat_msk as $surat)
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
?>

        <tr>
          <td><?php echo $no ;?></td>
      <td><?php echo $surat->KategoriSurat ;?></td>
      <td><?php echo $surat->nomorsurat ;?></td>
      <td><?php echo $tgl ;?></td>
          <td>

            <a href="<?php echo base_url(); ?>index.php/TU/lihatetr/<?php echo $surat->id;?>" title="Lihat" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Lihat</a>
          </td>
        </tr>

<?php $no++; }?>
        </tbody>
      </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
<!-- END OF SURAT MASUK -->

<!-- START OF SURAT Disposisi -->
      <div class="box collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Surat Disposisi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-plus"></i></button>
          </div>
        </div>
        <div class="box-body">


      <table id="example4" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">No Agenda</th>
        <th class="text-center" >No Surat</th>
        <th class="text-center">Perihal Surat</th>
        <th class="text-center">Asal Surat</th>
        <th class="text-center">Tanggal Surat</th>
        <th class="text-center">Didisposisikan Kepada</th>
        <th class="tex-center">Tindakan</th>
      </tr>
    </thead>
    <tbody>

<?php
  $no=1;
  foreach ($arsip_surat_dis as $disposisi)
  {

    $tgll = $disposisi ->Tanggal_Surat;

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
?>

        <tr>
          <td><?php echo $no ;?></td>
          <td><?php echo $disposisi->no_agenda ;?></td>
          <td><?php echo $disposisi->nomorsurat ;?></td>
          <td><?php echo $disposisi->perihal ;?></td>
          <td><?php echo $disposisi->Pengirim ;?></td>
          <td><?php echo $tgl ;?></td>
          <td><?php echo $disposisi->DidisposisikanKepada; ?></td>
          <td>
            <a href="<?php echo base_url(); ?>index.php/TU/lihatsdisposisi/<?php echo $disposisi->id_suratdisposisi ;?>" title="Lihat Surat" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
          </td>
        </tr>

<?php $no++; }?>
        </tbody>
      </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
<!-- END OF SURAT KELUAR -->








    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
