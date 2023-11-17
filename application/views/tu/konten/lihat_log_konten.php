<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pengaturan</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/TU"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-folder-open"></i> Log</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Log</h3>

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
				<th>Waktu</th>
				<th>Isi Log</th>
			</tr>
		</thead>
		<tbody>

<?php
$no=1;
  foreach ($lihat_log as $log)
  {
	  $datestamp = $log->kapan;
	  
	  $tanggal = date('Y-m-d', strtotime($datestamp));
	  $waktu = date('h:i:s', strtotime($datestamp));
?>

<!-- FILE MODALS -->


        <tr>
          <td><?php echo $no ;?></td>
		  <td><?php echo $tanggal ;?></td>
          <td><?php echo $waktu ;?></td>
		  <td><?php echo $log->isi_log ;?></td>
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
