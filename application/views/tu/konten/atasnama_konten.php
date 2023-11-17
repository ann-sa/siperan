<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php foreach ($atasnama as $an0){ ?>

<!-- START Modal Hapus Atas Nama -->
<div class="modal fade" id="hapusatasnama_<?php echo $an0->id ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Hapus Atas Nama</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin menghapus atas nama ini?<br>

		Tindakan ini tidak dapat dibatalkan!</p>
		<a href="<?php echo base_url(); ?>index.php/TU/hapus_atasnama/<?php echo $an0->id ;?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Hapus Atas Nama -->

<?php } ?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pengaturan</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/TU"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-folder-open"></i> Atas Nama</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Atas Nama</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
		
		<a href="<?php echo base_url(); ?>index.php/TU/new_atasnama" title="Tambah atas nama" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah atas nama</a>
		<br><br>
		
      <table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Jabatan</th>
				<th>Tindakan</th>
			</tr>
		</thead>
		<tbody>

<?php
$no=1;
  foreach ($atasnama as $an)
  {
?>

<!-- FILE MODALS -->


        <tr>
          <td><?php echo $no ;?></td>
		      <td><?php echo $an->NIP ;?></td>
          <td><?php echo $an->atas_nama ;?></td>
          <td><?php echo $an->jabatan ;?></td>
          <td>

            <a href="<?php echo base_url(); ?>index.php/TU/atasnama/editor?id=<?php echo $an->id ;?>" title="Edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
			<a data-toggle="modal" data-target="#hapusatasnama_<?php echo $an->id ;?>" title="Hapus" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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
