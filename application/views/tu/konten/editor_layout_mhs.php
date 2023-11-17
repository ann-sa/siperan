<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach($layout_mhs_pilih AS $layout)
{
	
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editor Layout Surat Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editor Layout Surat Mahasiswa</li>
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
              <h3 class="box-title">Editor Layout Surat Mahasiswa</h3>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->

              <div class="box-body">




				<div class="box-body pad">
				  <form action="<?php echo base_url(); ?>index.php/TU/simpan_layout_mhs/<?php echo $layout->id_layout_mhs; ?>" method="POST">
				  <input type="hidden" name="fakultas" value="<?php echo $utama_id_fakultas; ?>">

				  <table class="table table-bordered">
						<tr>
							<td width="305">Judul Layout (Bahasa Indonesia) <img src="<?php echo base_url().'assets/file/flag_icon/indonesia.png'; ?>" width="40"> : </td>
							<td><input type="text" name="judul" placeholder="Ketik Judul Layout" class="form-control" value="<?php echo $layout->judul; ?>" class="form-control" required ></td>
						</tr>
						
						<tr>
							<td>Judul Layout (Bahasa Inggris) <img src="<?php echo base_url().'assets/file/flag_icon/inggris.png'; ?>" width="40"> : </td>
							<td colspan="2"><input type="text" name="judul_inggris" placeholder="Ketik Judul Layout (Bahasa Inggris)" class="form-control" value="<?php echo $layout->judul_inggris; ?>" class="form-control"required></td>
						</tr>

						<tr>
							<td>Format Nomor Surat : </td>
							<td><input type="text" name="format_nosur" placeholder="Misal: KMS" class="form-control" value="<?php echo $layout->format_nosur; ?>" required></td>
						</tr>

				</table>
				
				
				<table class="table table-bordered">
				<!--///-->
				
						<tr><td colspan="2">
							<label>Konsep Surat (Bahasa Indonesia) </label> <img src="<?php echo base_url().'assets/file/flag_icon/indonesia.png'; ?>" width="40"> : 
							<div class="pull-right">
								<a target="new" href="<?php echo base_url(); ?>index.php/TU/preview_layout_mhs/<?php echo $layout->id_layout_mhs; ?>?id_f=<?php echo $utama_id_fakultas; ?>" title="Preview" class="btn btn-warning"><i class="glyphicon glyphicon-expand"></i> Preview</a>
							</div>
						</td></tr>
							
						<tr><td colspan="2">
						<textarea id="editor1" name="setting" rows="10" cols="80">
						<?php echo $layout->setting; ?>
						</textarea>
						</td></tr>
						
				<!--///-->
				
						<tr>
						<td>
						Gunakan [JudulSurat] untuk menampilkan judul  layout surat.<br>
						Gunakan [NomorSurat] untuk menampilkan nomor surat.<br>
						Gunakan [TempatSurat] untuk menampilkan tempat surat.<br>
						Gunakan [TanggalSurat] untuk menampilkan tanggal surat.<br>
						Gunakan [Jabatan_AN] untuk menampilkan jabatan atas nama.<br>
						Gunakan [Nama_AN] untuk menampilkan nama atas nama.<br>
						Gunakan [NIP_AN] untuk menampilkan NIP atas nama.<br>
						</td>
						
						<td rowspan="2">
						Gunakan [NIM_Mahasiswa] untuk menampilkan NIM mahasiswa.<br>
						Gunakan [Nama_Mahasiswa] untuk menampilkan nama mahasiswa.<br>
						Gunakan [Email_Mahasiswa] untuk menampilkan email mahasiswa.<br>
						Gunakan [NoHP_Mahasiswa] untuk menampilkan nomor hp mahasiswa.<br>
						<br>
						Gunakan [TempatLahir_Mahasiswa] untuk menampilkan tempat lahir mahasiswa.<br>
						Gunakan [TanggalLahir_Mahasiswa] untuk menampilkan tanggal lahir mahasiswa.<br>
						Gunakan [JenisKelamin_Mahasiswa] untuk menampilkan jenis kelamin mahasiswa.<br>
						Gunakan [Agama_Mahasiswa] untuk menampilkan agama mahasiswa.<br>
						Gunakan [Kewarganegaraan_Mahasiswa] untuk menampilkan kewarganegaraan mahasiswa.<br>
						<br>
						Gunakan [JenjangStudi_Mahasiswa] untuk menampilkan jenjang studi mahasiswa.<br>
						Gunakan [TahunTerdaftar_Mahasiswa] untuk menampilkan tahun terdaftar mahasiswa.<br>
						Gunakan [Prodi_Mahasiswa] untuk menampilkan nama prodi mahasiswa.<br>
						Gunakan [Fakultas_Mahasiswa] untuk menampilkan nama fakultas mahasiswa.<br>
						<br>
						Gunakan [Alamat_Mahasiswa] untuk menampilkan alamat mahasiswa.<br>
						Gunakan [AlamatOrtu_Mahasiswa] untuk menampilkan alamat orang tua mahasiswa.<br>
						Gunakan [NamaAyah_Mahasiswa] untuk menampilkan nama ayah mahasiswa.<br>
						Gunakan [NamaIbu_Mahasiswa] untuk menampilkan nama ibu mahasiswa.<br>
						
						
						</td>
						
						
						</tr>
						
						<tr>
						<td>
						
						<?php if($layout->borang1status == "text")echo'Gunakan [Form_'.$layout->borang1judul.'] untuk menampilkan '.$layout->borang1judul.' yang diisi oleh mahasiswa.<br>';?>
						<?php if($layout->borang2status == "text")echo'Gunakan [Form_'.$layout->borang2judul.'] untuk menampilkan '.$layout->borang2judul.' yang diisi oleh mahasiswa.<br>';?>
						<?php if($layout->borang3status == "text")echo'Gunakan [Form_'.$layout->borang3judul.'] untuk menampilkan '.$layout->borang3judul.' yang diisi oleh mahasiswa.<br>';?>
						<?php if($layout->borang4status == "text")echo'Gunakan [Form_'.$layout->borang4judul.'] untuk menampilkan '.$layout->borang4judul.' yang diisi oleh mahasiswa.<br>';?>
						<?php if($layout->borang5status == "text")echo'Gunakan [Form_'.$layout->borang5judul.'] untuk menampilkan '.$layout->borang5judul.' yang diisi oleh mahasiswa.<br>';?>
						
						<?php if($layout->borang6status == "text")echo'Gunakan [Form_'.$layout->borang6judul.'] untuk menampilkan '.$layout->borang6judul.' yang diisi oleh mahasiswa.<br>';?>
						<?php if($layout->borang7status == "text")echo'Gunakan [Form_'.$layout->borang7judul.'] untuk menampilkan '.$layout->borang7judul.' yang diisi oleh mahasiswa.<br>';?>
						<?php if($layout->borang8status == "text")echo'Gunakan [Form_'.$layout->borang8judul.'] untuk menampilkan '.$layout->borang8judul.' yang diisi oleh mahasiswa.<br>';?>
						<?php if($layout->borang9status == "text")echo'Gunakan [Form_'.$layout->borang9judul.'] untuk menampilkan '.$layout->borang9judul.' yang diisi oleh mahasiswa.<br>';?>
						<?php if($layout->borang10status == "text")echo'Gunakan [Form_'.$layout->borang10judul.'] untuk menampilkan '.$layout->borang10judul.' yang diisi oleh mahasiswa.<br>';?>
						
						
						
						
						
						
						</td>
						</tr>
						
						<tr><td colspan="2"s>
							&nbsp;
						</td></tr>
				
				<!--///-->
				
				<!--///-->
				
						<tr><td colspan="2">
							<label>Konsep Surat (Bahasa Inggris) </label> <img src="<?php echo base_url().'assets/file/flag_icon/inggris.png'; ?>" width="40"> : 
							<div class="pull-right">
								<a target="new" href="<?php echo base_url(); ?>index.php/TU/preview_layout_mhs_inggris/<?php echo $layout->id_layout_mhs; ?>?id_f=<?php echo $utama_id_fakultas; ?>" title="Preview" class="btn btn-warning"><i class="glyphicon glyphicon-expand"></i> Preview</a>
							</div>
						</td></tr>
							
						<tr><td colspan="2">
						<textarea id="editor2" name="setting_inggris" rows="10" cols="80">
						<?php echo $layout->setting_inggris; ?>
						</textarea>
						</td></tr>
						
				<!--///-->
				
						
						
						<tr><td colspan="2"s>
							&nbsp;
						</td></tr>
				
				<!--///-->
						
				<!--///-->
				</table>	
						
						
						
						<br>
						<a href="<?php echo base_url(); ?>index.php/TU/pre_editor_layout_mhs/<?php echo $layout->id_layout_mhs ;?>" title="Kembali" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
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
