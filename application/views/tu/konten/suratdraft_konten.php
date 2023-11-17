<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
  foreach ($surat_tu_plain as $stu0)
  {
?>

<!-- START Modal Hapus Draft Plain -->
<div class="modal fade" id="hapusdraft_plain<?php echo $stu0->id_surattu ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Hapus Draft</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin menghapus draft ini?<br>

		Tindakan ini tidak dapat dibatalkan!</p>
		<a href="<?php echo base_url(); ?>index.php/TU/hapusdraft/surat_tu_plain?id=<?php echo $stu0->id_surattu ;?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Hapus Draft Plain -->

<?php
  }
  foreach ($surat_eksternal as $etr0)
  {
?>

<!-- START Modal Hapus Draft Eksternal -->
<div class="modal fade" id="hapusdraft_etr<?php echo $etr0->id;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Hapus Draft</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin menghapus draft ini?<br>

		Tindakan ini tidak dapat dibatalkan!</p>
		<a href="<?php echo base_url(); ?>index.php/TU/hapusdraft/surat_eksternal?id=<?php echo $etr0->id ;?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Hapus Draft Eksternal -->

<?php
  }
  ?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Draft</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/TU"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-folder-open"></i> Draft</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->



      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Draft Surat TU</h3>

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
				<th>Nomor Surat</th>
				<th>Hal</th>
				<!-- <th>Tipe</th> -->
				<th>Tanggal</th>
				<th>Tindakan</th>
			</tr>
		</thead>
		<tbody>

<?php
$no=1;
  foreach ($surat_tu_plain as $stu)
  {
?>

<!-- FILE MODALS -->


        <tr>
          <td><?php echo $no ;?></td>
		  <td><?php echo $stu->nomorsurat ;?></td>
          <td><?php echo $stu->Judul ;?></td>
          <!-- <td><?php echo $stu->tipe_surat ;?></td> -->
          <td><?php echo $stu->date ;?></td>
          <td>
            <a href="<?php echo base_url(); ?>index.php/TU/edit_surat_plain/<?php echo $stu->id_surattu ;?>" title="Edit Surat" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
            <a data-toggle="modal" data-target="#hapusdraft_plain<?php echo $stu->id_surattu ;?>" title="Print Surat" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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









	  <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Draft Surat Eksternal</h3>

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
				<th>Nomor Surat</th>
				<th>Judul</th>
				<th>Asal Surat</th>
				<th>Tanggal</th>
				<th>Tindakan</th>
			</tr>
		</thead>
		<tbody>

<?php
$no=1;
  foreach ($surat_eksternal as $etr)
  {
?>




        <tr>
          <td><?php echo $no ;?></td>
		  <td><?php echo $etr->nomorsurat ;?></td>
          <td><?php echo $etr->judul ;?></td>
          <td><?php echo $etr->asal ;?></td>
          <td><?php echo $etr->date ;?></td>
          <td>
            <a href="<?php echo base_url(); ?>index.php/TU/edit_surat_etr/<?php echo $etr->id ;?>" title="Edit Surat" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
            <a data-toggle="modal" data-target="#hapusdraft_etr<?php echo $etr->id ;?>" title="Print Surat" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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
