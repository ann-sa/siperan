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
			<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
				  <th>Tanggal</th>
				  <th>Waktu</th>
                  <th>Pemberitahuan</th>
				  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>

<?php
$no=1;
	foreach ($pemberitahuan_si_mhs as $pmb)
	{
		$datestamp = $pmb->date;
	  
	  $tanggal = date('Y-m-d', strtotime($datestamp));
	  $waktu = date('h:i:s', strtotime($datestamp));
	  
	  $seen = $pmb->seen;
?>


 <!-- FILE MODALS -->


				<tr>
					<td><?php echo $no ;?></td>
					<td><?php echo $tanggal ;?></td>
					<td><?php echo $waktu ;?></td>
					<td><?php if($seen=="new")echo"<span class='label bg-blue'>Baru</span> "; ?><?php echo $pmb->subjek ;?></td>
					

					<td>
						<a href="<?php echo base_url(); ?>index.php/mahasiswa/lihat_pmb/<?php echo $pmb->id ;?>" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Lihat</a>
					
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
