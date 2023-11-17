<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Permintaan Surat</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/TU"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="glyphicon glyphicon-send"></i> Permintaan Surat</li>
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
				  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Tanggal</th>
				  <th>Status</th>
				  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>

<?php
$no=1;
	foreach ($surat_aktif_kuliah as $sak)
	{
?>

<?php include"additional_modals_sak.php"; ?> <!-- FILE MODALS -->


				<tr>
					<td><?php echo $no ;?></td>
					<td><?php echo $sak->NIM ;?></td>
					<td><?php echo $sak->Nama ;?></td>
					<td><?php echo $sak->TanggalKirim ;?></td>
					<td><?php echo $sak->Status_Surat ;?></td>
					<td>
						<a href="<?php echo base_url(); ?>index.php/TU/lihatsak/<?php echo $sak->id_surat_aktif ;?>" title="Lihat Surat" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
						<a data-toggle="modal" data-target="#tolaksak<?php echo $sak->id_surat_aktif ;?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a>
						<a data-toggle="modal" data-target="#terimasak<?php echo $sak->id_surat_aktif ;?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-ok"></i></a>
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
