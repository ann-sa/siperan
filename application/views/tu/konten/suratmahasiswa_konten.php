<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Surat Mahasiswa</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-folder-open"></i> Surat Mahasiswa</li>
      </ol>
    </section>

    <!-- START Modal Hapus Draft Plain -->
    <div class="modal fade" id="carisurat_mashasiswa">
      <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cari Surat Mahasiswa</h4>
        </div>
        <form action="<?php echo base_url(); ?>index.php/TU/cari_surat_bds_tgl/suratmahasiswa" method="POST">
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
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Surat Mahasiswa</h3>

          <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">

      <table id="example1" class="table table-bordered table-striped">
        <div class="pull-left">
          <a data-toggle="modal" data-target="#carisurat_mashasiswa" title="Cari Surat" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-search"></i>Cari berdasar tanggal</a>
        </div>
        <br><br>
                <thead>
                <tr>
                  <th>No</th>
          <th>Tipe Surat</th>
          <th>NIM Mahasiswa</th>
                  <th>Tanggal Kirim</th>
                  <th>Status</th>
          <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>

<?php
$no=1;
  foreach ($surat_flex_mhs as $surat)
  {   $tgll = $surat->tgl_kirim;

        $tgl_d = date('d', strtotime($tgll));
        $tgl_m = date('m', strtotime($tgll));
        $tgl_Y = date('Y', strtotime($tgll));

        if($tgl_m=='01')$bulan="Januari";
        else if($tgl_m=='02')$bulan="Februari";
        else if($tgl_m=='03')$bulan="Maret";
        else if($tgl_m=='04')$bulan="April";
        else if($tgl_m=='05')$bulan="Mei";
        else if($tgl_m=='06')$bulan="Juni";
        else if($tgl_m=='07')$bulan="Juli";
        else if($tgl_m=='08')$bulan="Agustus";
        else if($tgl_m=='09')$bulan="September";
        else if($tgl_m=='10')$bulan="Oktober";
        else if($tgl_m=='11')$bulan="November";
        else if($tgl_m=='12')$bulan="Desember";

    $tgl = $tgl_d.' '.$bulan.' '.$tgl_Y;
	
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
          <td><?php echo $surat->NIM_mhs ;?></td>
          <td><?php echo $tgl ;?></td>
          <td><i class="fa fa-circle text-<?php echo $tipe_tombol;?>"></i> <?php echo $teks_status ;?></td>

        <td>
          <a href="<?php echo base_url(); ?>index.php/TU/review_surat_mhs/<?php echo $surat->id_surat_mhs ;?>" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Lihat</a>
          <?php if ($surat->status_surat=='approved')?>
          <a href="<?php echo base_url(); ?>index.php/TU/to_arsip/surat_mahasiswa?id=<?php echo $surat->id_surat_mhs ;?>" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-folder-open"></i> Arsipkan</a>

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
