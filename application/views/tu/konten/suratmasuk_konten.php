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
    <?php

  foreach ($surat_eksternal as $etr)
      {
    ?>

    <!-- START Modal Hapus Draft Plain -->
    <div class="modal fade" id="hapussurat_masuk<?php echo $etr->id;?>">
      <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Surat Masuk</h4>
        </div>
        <div class="modal-body">
        <p>Anda ingin menghapus Surat Masuk ini?<br>

        Tindakan ini tidak dapat dibatalkan!</p>
        <a href="<?php echo base_url(); ?>index.php/TU/hapussuratmasuk/<?php echo $etr->id;?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
        <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
      </div>
    </div>
  <?php } ?>

    <!-- START Modal Hapus Draft Plain -->
    <div class="modal fade" id="carisurat_masuk">
      <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cari Surat Masuk</h4>
        </div>
        <form action="<?php echo base_url(); ?>index.php/TU/cari_surat_bds_tgl/suratmasuk" method="POST">
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
          <h3 class="box-title">Surat Masuk</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <div class="pull-left">
          <a data-toggle="modal" data-target="#carisurat_masuk" title="Cari Surat" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-search"></i>Cari berdasar tanggal</a>
        </div>
<br><br>
    <thead>
      <tr>
        <th>No</th>
        <th>Nomor Surat</th>
        <th>Perihal</th>
        <th>Asal Surat</th>
        <th>Tanggal Surat</th>
        <th>Tanggal Diterima</th>
        <th>Kategori Surat</th>
        <?php if($this->session->userdata('Level') == "super") {?>
        <th>Status Disposisi</th>
        <?php } ?>
        <th>Tindakan</th>
      </tr>
    </thead>
    <tbody>

<?php
$no=1;
  foreach ($surat_eksternal as $etr)
  {
    $status_disposisi = $etr->status_disposisi;

?>

        <tr>
          <td><?php echo $no ;?></td>
      <td><?php echo $etr->nomorsurat ;?></td>
          <td><?php echo $etr->perihal ;?></td>
          <td><?php echo $etr->asal ;?></td>
          <td><?php echo $etr->tanggal_surat ;?></td>
          <td><?php echo $etr->tanggal_diterima; ?></td>
          <td><?php echo $etr->KategoriSurat; ?></td>
        <?php if($this->session->userdata('Level') == "super") {?>
          <td><?php echo $etr->status_disposisi; ?></td>
          <?php } ?>
          <td>
            <a href="<?php echo base_url(); ?>index.php/TU/lihatetr/<?php echo $etr->id ;?>" title="Lihat Surat" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
        <?php if($this->session->userdata('Level') != "super") {?>
            <a data-toggle="modal" data-target="#hapussurat_masuk<?php echo $etr->id;?>" title="Hapus Surat" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
          <?php } ?>
        <?php if($this->session->userdata('Level') == "super") {?>
          <?php if ($status_disposisi!='memiliki disposisi') { ?>
            <a href="<?php echo base_url(); ?>index.php/TU/buatdisposisietr/<?php echo $etr->id ;?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Buat Disposisi</a>
        <?php } ?>
      <?php } ?>
      <a href="<?php echo base_url(); ?>index.php/TU/to_arsip/surat_masuk?id=<?php echo $etr->id ;?>" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-folder-open"></i> Arsipkan</a>

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
