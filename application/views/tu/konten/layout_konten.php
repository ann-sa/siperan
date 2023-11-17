<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
  foreach ($layout_data as $layout0)
  {
?>

<!-- START Modal Hapus layout-->
<div class="modal fade" id="hapus_layout<?php echo $layout0->id_layout ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Hapus layout</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin menghapus layout ini?<br>

		Tindakan ini tidak dapat dibatalkan!</p>
		<a href="<?php echo base_url(); ?>index.php/TU/hapus_tpl/<?php echo $layout0->id_layout ;?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Hapus layout -->

<?php
  }
  ?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pengaturan</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/TU"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-folder-open"></i> Layout</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Layout Surat Keluar</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">


		<a href="<?php echo base_url(); ?>index.php/TU/new_layout" title="Buat layout" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Buat layout baru</a>
		<br><br>

	  <table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Layout Surat</th>
				<th>Format Nomor Surat</th>
				<th>Tindakan</th>
			</tr>
		</thead>
		<tbody>

<?php
$no=1;
  foreach ($layout_data as $layout)
  {
?>

<!-- FILE MODALS -->


        <tr>
          <td><?php echo $no ;?></td>
		  <td><?php echo $layout->judul ;?> (<?php echo $layout->judul_inggris ;?>)</td>
          <td><?php echo $layout->format_nosur ;?></td>
          <td>
		  
			<div class="btn-group">
			<a href="<?php echo base_url(); ?>index.php/TU/editor_layout/<?php echo $layout->id_layout ;?>" title="Edit layout" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
			</div>
			
			<div class="btn-group">
				<button data-toggle="dropdown" type="button" class="btn btn-warning dropdown-toggle">
					<i class="glyphicon glyphicon-expand"></i> 
					Preview
					<span class="caret"></span>
					<span class="sr-only">Toggle Dropdown</span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a target="new" href="<?php echo base_url(); ?>index.php/TU/preview_layout/<?php echo $layout->id_layout; ?>?id_f=<?php echo $utama_id_fakultas; ?>"><img src="<?php echo base_url().'assets/file/flag_icon/indonesia.png'; ?>" width="40"> Bahasa Indonesia</a></li>
					<li><a target="new" href="<?php echo base_url(); ?>index.php/TU/preview_layout_inggris/<?php echo $layout->id_layout; ?>?id_f=<?php echo $utama_id_fakultas; ?>"><img src="<?php echo base_url().'assets/file/flag_icon/inggris.png'; ?>" width="40"> Bahasa Inggris</a></li>
				</ul>
			</div>
			
			
			
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
