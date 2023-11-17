<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/tu/surat/draft"><i class="fa fa-envelope"></i> Draft</a></li>
        <li class="active"><i class="glyphicon glyphicon-pencil"></i> Edit Surat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Eksternal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<?php
	foreach ($surat_eksternal as $se)
	{
?>
            <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/TU/se/<?php echo $se->id_surat_eksternal ;?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Nomor Surat</label><br>
                  <input class="form-control" type="text" name="nomorsurat" value="<?php echo $se->NoSurat ?>" pattern="[A-Za-z0-9]+/[0-9]+" autofocus required oninvalid="this.setCustomValidity('Hanya boleh angka 0-9')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>Departemen Pengirim</label><br>
                  <input type="text" class="form-control" name="pengirim" value="<?php echo $se->Departemen_Pengirim; ?>" pattern="[a-zA-Z ]+" autofocus required oninvalid="this.setCustomValidity('Hanya boleh huruf a-z atau A-Z')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>Tanggal Surat</label><br>
                  <input class="form-control" type="date" name="tanggalsurat" value="<?php echo $se->TanggalSurat; ?>" >
                </div>

              <div class="form-group">
                        <a href="<?php echo base_url(); ?>assets/file/tu/surat_eksternal/<?php echo $se->FileSurat ;?>" target="new" title="Lihat Surat">Lihat Surat
                        </a><br>
                        <label>File Surat External</label>
                        <input type="file" name="se">
                        <p class="help-block">Upload file surat anda dalam bentuk pdf.</p>
              </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                        <a href="<?php echo base_url(); ?>index.php/TU/surat/draft" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
              </div>
            </form>
<?php }?>
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
