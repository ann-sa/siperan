<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Semua Surat</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/TU"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-folder-open"></i> Semua Surat</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Surat TU</h3>

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

            <a href="<?php echo base_url(); ?>index.php/TU/lihatstu/<?php echo $stu->id_surattu ;?>" title="Lihat Surat" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
            <a target="new" href="<?php echo base_url(); ?>index.php/TU/printstu/<?php echo $stu->id_surattu ;?>" title="Print Surat" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-print"></i> Print</a>
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
