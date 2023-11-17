<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Surat Saya</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="glyphicon glyphicon-envelope"></i> Surat Saya</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Surat Aktif Kuliah</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
			<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
				  <th>Tanggal</th>
                  <th>Tipe surat</th>
                  <th>Status</th>
				  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>

<?php
$no=1;
	foreach ($surat_aktif_kuliah_saya as $sak)
	{
?>

<?php
include"additional_modals.php";
?>
 <!-- FILE MODALS -->


				<tr>
					<td><?php echo $no ;?></td>
					<td><?php echo $sak->TanggalKirim ;?></td>
					<td>Surat Aktif Kuliah</td>
					<td><a data-toggle="tooltip" title="Status Surat" class="btn

					<?php $sak_status = $sak->Status_Surat;
					if($sak_status=="draft")echo"btn-primary";
					else if($sak_status=="pending")echo"btn-warning";
					else if($sak_status=="approved")echo"btn-success";
					else if($sak_status=="rejected")echo"btn-danger";
					?>

						btn-xs" href="<?php echo base_url(); ?>index.php/mahasiswa/suratsaya/<?php echo $sak_status ;?>"><i class="fa fa-envelope"></i> <?php echo $sak->Status_Surat ;?></a></td>

				<td>
					<a href="<?php echo base_url(); ?>index.php/mahasiswa/lihatsak/<?php echo $sak->id_surat_aktif ;?>" title="Lihat Surat" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
					<?php if($sak_status=="draft"){?>
						<a href="<?php echo base_url(); ?>index.php/mahasiswa/editsak/<?php echo $sak->id_surat_aktif ;?>" title="Edit Surat" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
						<a data-toggle="modal" data-target="#hapussak<?php echo $sak->id_surat_aktif ;?>" title="Hapus Surat" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
						<a data-toggle="modal" data-target="#kirimsak<?php echo $sak->id_surat_aktif ;?>" title="Kirim Permintaan Surat" class="btn btn-primary btn-sm"><i class="fa fa-send"></i></a>
					</td>
					<?php }?>

					<?php if($sak_status="pending"){?>
					<?php }?>

					<?php if($sak_status=="approved"){?>
					<?php }?>

					<?php if($sak_status=="rejected"){?>
						<a data-toggle="modal" data-target="#hapussak<?php echo $sak->id_surat_aktif ;?>" title="Hapus Surat" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
					<?php }?>
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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
