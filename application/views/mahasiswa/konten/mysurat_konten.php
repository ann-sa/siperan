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
          <h3 class="box-title">Surat Saya</h3>

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
				  <th>Tipe Surat</th>
                  <th>Tanggal Kirim</th>
                  <th>Status</th>
				  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>

<?php
$no=1;
	foreach ($surat_flex_mhs as $surat)
	{
		$s_status = $surat->status_surat;
		
		if($s_status=="draft")
		{
			$teks_status = "Pengeditan";
			$tipe_tombol = "gray";
		}
		else if($s_status=="pending")
		{
			$teks_status = "Menunggu persetujuan";
			$tipe_tombol = "yellow";
		}
		else if($s_status=="approved")
		{
			$teks_status = "Sudah disetujui";
			$tipe_tombol = "green";
		}
		else if($s_status=="rejected")
		{
			$teks_status = "Ditolak";
			$tipe_tombol = "red";
		}
?>


 <!-- FILE MODALS -->


				<tr>
					<td><?php echo $no ;?></td>
					<td><?php echo $surat->judul ;?></td>
					<td><?php echo $surat->tgl_kirim ;?></td>
					<td><i class="fa fa-circle text-<?php echo $tipe_tombol;?>"></i> <?php echo $teks_status ;?></td>

				<td>
					<a href="<?php echo base_url(); ?>index.php/mahasiswa/review_surat_mhs/<?php echo $surat->id_surat_mhs ;?>" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Lihat</a>
					
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
