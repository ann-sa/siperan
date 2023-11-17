<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pemberitahuan</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-bell"></i> Pemberitahuan</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Pemberitahuan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
			

<?php
	foreach ($pemberitahuan_pilih as $pmb)
	{
		$datestamp = $pmb->date;
	  
	  $tanggal = date('Y-m-d', strtotime($datestamp));
	  $waktu = date('h:i:s', strtotime($datestamp));
?>


	<table class="table table-bordered">
		<tr>
			<td>Tanggal</td>
			<td><?php echo $tanggal ;?></td>
		</tr>
		<tr>
			<td>Waktu</td>
			<td><?php echo $waktu ;?></td>
		</tr>
		<tr>
			<td>Subjek</td>
			<td><?php echo $pmb->subjek ;?></td>
		</tr>
		<tr>
			<td>Isi</td>
			<td><?php echo $pmb->isi ;?></td>
		</tr>
	</table>



<?php } ?>

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
