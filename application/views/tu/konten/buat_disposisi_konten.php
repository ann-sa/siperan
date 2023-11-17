<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach($surat_pilih AS $surat)
{
?>


<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Buat Disposisi</h1>

      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="glyphicon glyphicon-envelope"></i> Lembar Disposisi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

	<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="rowx">
        <!-- left column -->
        <div class="row">
          <!-- general form elements -->

<!-- ========================ADMIN====================== -->

  <?php if($this->session->userdata('Level') == "super") {?>
              <!-- /.box-body -->
              <div class="col-md-12">
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">Lembar Disposisi</h3>
        			  <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->

                      <div class="box-body">
                  <?php foreach ($data_user as $data) { ?>
        				<div class="box-body pad">
              	  <form action="<?php echo base_url(); ?>index.php/TU/simpandisposisi/<?php echo $surat->id; ?>" method="POST">
                  	<div class="col-md-12">
                    <label>Jabatan Anda:</label>
                    <input type="text" name="jabatan" class="form-control" readonly value="<?php echo $data->Jabatan; ?>" required ><br>
                    <label>Disposisikan Kepada:</label>
                    <select class="form-control" name="kepada">
                      <option value="Kasub. Bag. Penelitian, PKM, dan Kerjasama">Kasub. Bag. Penelitian, PKM, dan Kerjasama</option>
                      <option value="Kasub. Bag. SDM dan Keuangan">Kasub. Bag. SDM dan Keuangan</option>
                      <option value="Kasub. Bag. Kemahasiswaan">Kasub. Bag. Kemahasiswaan</option>
                      <option value="Kasub. Bag. Umum dan Perlengkapan">Kasub. Bag. Umum dan Perlengkapan</option>
                      <option value="Kasub. Bag. Akademik">Kasub. Bag. Akademik</option>
                      <option value="Tenaga Adm. Kepegawaian">Tenaga Adm. Kepegawaian</option>
                      <option value="Tenaga Adm. Penelitian, PKM, dan Kerjasama">Tenaga Adm. Penelitian, PKM, dan Kerjasama</option>
                      <option value="Tenaga Adm. Keuangan">Tenaga Adm. Keuangan</option>
                      <option value="Tenaga Adm. Umum dan Perlengkapan">Tenaga Adm. Umum dan Perlengkapan</option>
                      <option value="Tenaga Adm. Penelitian, PKM, dan Kerjasama">Tenaga Adm. Penelitian, PKM, dan Kerjasama</option>
                      <option value="Tenaga Adm. Akademik">Tenaga Adm. Akademik</option>
                      <option value="Tenaga Penunjang Adm. Keuangan">Tenaga Penunjang Adm. Keuangan</option>
                      <option value="Tenaga Penunjang Adm. Kepegawaian">Tenaga Penunjang Adm. Kepegawaian</option>
                      <option value="Tenaga Penunjang Adm. Kemahasiswaan">Tenaga Penunjang Adm. Kemahasiswaan</option>
                      <option value="Tenaga Penunjang Adm. Akademik ">Tenaga Penunjang Adm. Akademik </option>
                      <option value="Tenaga Penunjang Adm. Umum">Tenaga Penunjang Adm. Umum</option>
                    </select><br>
                    <label>Isi Disposisi:</label>
                    <textarea name="isidisposisi" value="<?php echo $surat->isi_surat; ?>" class="form-control" placeholder="Isi disposisi..." rows="5"></textarea><br>
                    <label><i>Catatan:</i></label>
                    <textarea name="catatan" value="<?php echo $surat->isi_surat; ?>" placeholder="Isi Catatan..."class="form-control" rows="5"></textarea><br>
                    <label>Sesudah digunakan segera dikembalikan kepada:</label>
                    <input type="text" name="kembalikanpada" placeholder="Kembalikan Kepada" class="form-control" pattern="^[a-zA-Z\s\.,-]*$" autofocus required oninvalid="this.setCustomValidity('Hanya boleh diisi memakai huruf kapital, huruf kecil, spasi, titik, dan koma')" oninput="setCustomValidity('')"><br>
                    <label>Tanggal Dikembalikan:</label>
                    <input type="date" name="tanggalkembalian" placeholder="Tanggal Dikembalikan" class="form-control"><br>
                  <button type="submit" class="btn btn-primary pull-right"> Simpan Disposisi</button>
                  </div>

                </div>
                <?php } ?>
    <?php } ?>

                      </div>
                      <!-- /.box-body -->


          </div>
		  </div>

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- CK Editor -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-master/bower_components/ckeditor/ckeditor.js"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<?php } ?>
