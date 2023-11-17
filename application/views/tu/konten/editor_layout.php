<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach($layout_pilih AS $layout)
{
	$show_form_hal = $layout->show_form_hal;
	$show_form_penerima = $layout->show_form_penerima;
	$show_lampiran = $layout->show_lampiran;
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editor Layout
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editor Layout</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

	<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="rowx">
        <!-- left column -->
        <div class="row">
          <!-- general form elements -->


		  <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Editor layout</h3>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->

              <div class="box-body">




				<div class="box-body pad">
				  <form action="<?php echo base_url(); ?>index.php/TU/simpan_layout/<?php echo $layout->id_layout; ?>" method="POST">
				  <input type="hidden" name="fakultas" value="<?php echo $utama_id_fakultas; ?>">

				  <table class="table table-bordered">
						<tr>
							<td>Judul Layout (Bahasa Indonesia) <img src="<?php echo base_url().'assets/file/flag_icon/indonesia.png'; ?>" width="40"> : </td>
							<td colspan="2"><input type="text" name="judul" placeholder="Ketik Judul Layout" class="form-control" value="<?php echo $layout->judul; ?>" class="form-control"></td>
						</tr>
						
						<tr>
							<td>Judul Layout (Bahasa Inggris) <img src="<?php echo base_url().'assets/file/flag_icon/inggris.png'; ?>" width="40"> : </td>
							<td colspan="2"><input type="text" name="judul_inggris" placeholder="Ketik Judul Layout (Bahasa Inggris)" class="form-control" value="<?php echo $layout->judul_inggris; ?>" class="form-control"></td>
						</tr>

						<tr>
							<td>Format Nomor Surat : </td>
							<td><input type="text" name="format_nosur" placeholder="Misal: KMS" class="form-control" value="<?php echo $layout->format_nosur; ?>"></td>
						</tr>

						<tr>
							<td><input type="checkbox" name="show_form_hal" <?php if($show_form_hal=="on")echo"checked"?>> Tampilkan form "Hal"</td>
							<td><input type="checkbox" name="show_form_penerima" <?php if($show_form_penerima=="on")echo"checked"?>> Tampilkan form "Penerima"</td>
							<td><input type="checkbox" name="show_lampiran" <?php if($show_lampiran=="on")echo"checked"?>> Tambahkan fitur upload lampiran</td>
						</tr>

				</table>
				
				
				<table class="table table-bordered">
				<!--///-->
				
						<tr><td>
							<label>Konsep Surat (Bahasa Indonesia) </label> <img src="<?php echo base_url().'assets/file/flag_icon/indonesia.png'; ?>" width="40"> : 
							<div class="pull-right">
								<a target="new" href="<?php echo base_url(); ?>index.php/TU/preview_layout/<?php echo $layout->id_layout; ?>?id_f=<?php echo $utama_id_fakultas; ?>" title="Preview" class="btn btn-warning"><i class="glyphicon glyphicon-expand"></i> Preview</a>
							</div>
						</td></tr>
							
						<tr><td>
						<textarea id="editor1" name="setting" rows="10" cols="80">
						<?php echo $layout->setting; ?>
						</textarea>
						</td></tr>
						
				<!--///-->
				
						<tr><td>
						Gunakan [JudulSurat] untuk menampilkan judul  layout surat.<br>
						Gunakan [NomorSurat] untuk menampilkan nomor surat.<br>
						<br>
						Gunakan [TempatSurat] untuk menampilkan tempat surat.<br>
						Gunakan [TanggalSurat] untuk menampilkan tanggal surat.<br>
						<br>
						Gunakan [Jabatan_AN] untuk menampilkan jabatan atas nama.<br>
						Gunakan [Nama_AN] untuk menampilkan nama atas nama.<br>
						Gunakan [NIP_AN] untuk menampilkan NIP atas nama.<br>
						</td></tr>
						
						<tr><td>
							&nbsp;
						</td></tr>
				
				<!--///-->
						<tr><td>
							<label>Konsep Surat (Bahasa Inggris) </label> <img src="<?php echo base_url().'assets/file/flag_icon/inggris.png'; ?>" width="40"> : 
							<div class="pull-right">
								<a target="new" href="<?php echo base_url(); ?>index.php/TU/preview_layout_inggris/<?php echo $layout->id_layout; ?>?id_f=<?php echo $utama_id_fakultas; ?>" title="Preview" class="btn btn-warning"><i class="glyphicon glyphicon-expand"></i> Preview</a>
							</div>
						</td></tr>
						
						<tr><td>
						<textarea id="editor2" name="setting_inggris" rows="10" cols="80">
						<?php echo $layout->setting_inggris; ?>
						</textarea>
						</td></tr>
						
				<!--///-->
						
				<!--///-->
				</table>	
						
						
						
						<br>
						<a href="<?php echo base_url(); ?>index.php/TU/layout" title="Kembali" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
						<input class="btn btn-primary" type="submit" name="aksi" value="Simpan">
						<input class="btn btn-success" type="submit" name="aksi" value="Simpan dan Selesai">
						
						
						
				  </form>
				</div>





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

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor2')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<?php } ?>
