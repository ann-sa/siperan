<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Surat Disposisi</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/TU"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-folder-open"></i> Surat Disposisi</li>
      </ol>
    </section>

    <!-- START Modal cari tanggal -->
    <div class="modal fade" id="carisurat_disposisi">
      <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cari Surat Disposisi</h4>
        </div>
        <form action="<?php echo base_url(); ?>index.php/TU/cari_surat_bds_tgl/suratdisposisi" method="POST">
        <div class="modal-body">
              <label>Mulai Dari Tanggal :</label>
              <input type="date" name="tanggal_awal" class="form-control">
              <label>Sampai Tanggal :</label>
              <td><input type="date" name="tanggal_akhir" class="form-control"></td>
          </table>
          <br>

        <button type="submit" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-search"></i> Cari</button>
        <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
      </div>
    </div>
    <!-- Main content -->


    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Surat Disposisi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <div class="pull-left">
          <a data-toggle="modal" data-target="#carisurat_disposisi" title="Cari Surat" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-search"></i>Cari berdasar tanggal</a>
        </div>
<br><br>
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
  foreach ($surat_disposisi as $disposisi)
  {
?>




        <tr>
          <td><?php echo $no ;?></td>
          <td><?php echo $disposisi->no_agenda ;?></td>
		      <td><?php echo $disposisi->nomorsurat ;?></td>
          <td><?php echo $disposisi->perihal ;?></td>
          <td><?php echo $disposisi->Pengirim ;?></td>
          <td><?php echo $disposisi->tanggal_surat ;?></td>
          <td><?php echo $disposisi->DidisposisikanKepada; ?></td>
          <td>
            <a href="<?php echo base_url(); ?>index.php/TU/lihatsdisposisi/<?php echo $disposisi->id_suratdisposisi ;?>" title="Lihat Surat" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
            <a target="new" href="<?php echo base_url(); ?>index.php/TU/printsdisposisi/<?php echo $disposisi->id_suratdisposisi ;?>" title="Print Surat" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-print"></i> Print</a>
           <a href="<?php echo base_url(); ?>index.php/TU/to_arsip/surat_disposisi?id=<?php echo $disposisi->id_suratdisposisi ;?>" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-folder-open"></i> Arsipkan</a>
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
