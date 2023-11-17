<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach($surat_flex AS $surat)
{
	$show_form_hal = $surat->show_form_hal;
	$show_form_penerima = $surat->show_form_penerima;
	$show_lampiran = $surat->show_lampiran;
	
	$bahasa = $surat->bahasa;
	
	if($bahasa=="indonesia")
	{
		$judul_layout = $surat->judul;
		$bahasa_in_teks = "Bahasa Indonesia";
	}
	else if($bahasa=="inggris")
	{
		$judul_layout = $surat->judul_inggris;
		$bahasa_in_teks = "Bahasa Inggris";
	}
	
	$pembuatan = $surat->pembuatan;
	$isi_surat = $surat->isi_surat;
	
	if($pembuatan=="siperan")$pembuatan_in_teks="Dibuat di Editor Surat Siperan USU";
	else if($pembuatan=="unggahan")$pembuatan_in_teks="Dibuat diluar Siperan USU";
?>


<?php foreach($lampiran_pilih AS $lpr)
{
?>
	
<!-- START Modal Hapus Lampiran -->
<div class="modal fade" id="hapuslampiran<?php echo $lpr->id_lampiran ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Hapus Lampiran</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin menghapus lampiran ini?<br>
		
		<div class="alert" align="center">"<b><?php echo $lpr->judul_lampiran;?></b>"</div>
		
		
		Tindakan ini tidak dapat dibatalkan!</p>
		<a href="<?php echo base_url(); ?>index.php/TU/hapuslampiran/?id_surat=<?php echo $surat->id_surat; ?>&id_lampiran=<?php echo $lpr->id_lampiran ;?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Hapus Lampiran -->
	
<?php } ?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editor Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editor Surat</li>
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
              <h3 class="box-title">Editor Surat</h3>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->

              <div class="box-body">




				<div class="box-body pad">
				  <form enctype="multipart/form-data" role="form" action="<?php echo base_url(); ?>index.php/TU/simpan_surat/<?php echo $surat->pembuatan; ?>" method="POST">
				  <input type="hidden" name="fakultas" value="<?php echo $utama_id_fakultas; ?>">
				  <input type="hidden" name="id_surat" value="<?php echo $surat->id_surat; ?>">

				  <table class="table table-bordered">
				  
						<tr>
							<td>Layout Surat : </td>
							<td><?php echo $judul_layout; ?></td>
						</tr>
						
						<tr>
							<td>Pembuatan Surat : </td>
							<td><?php echo $pembuatan_in_teks; ?></td>
						</tr>
				  
						<tr>
							<td>Bahasa Surat : </td>
							<td><img src="<?php echo base_url().'assets/file/flag_icon/'.$bahasa.'.png'; ?>" width="40"> <?php echo $bahasa_in_teks; ?></td>
						</tr>
				  
						

						<tr>
							<td>Nomor Surat : </td>
							<td><?php echo $surat->nomorsurat; ?></td>
						</tr>
						
					<?php if($show_form_hal=="on"){?>
					
						<tr>
							<td>Hal : </td>
							<td><input type="text" name="hal_surat" placeholder="Hal" class="form-control" value="<?php echo $surat->hal_surat; ?>"></td>
						</tr>
					
					<?php }?>
					<?php if($show_form_penerima=="on"){?>
					
						<tr>
							<td>Penerima Surat : </td>
							<td><textarea name="penerima_surat" placeholder="Penerima Surat" class="form-control"><?php echo $surat->penerima_surat; ?></textarea></td>
						</tr>
						
					<?php }?>
						
						<tr>
							<td>Tempat Surat : </td>
							<td><input type="text" name="tempat_surat" placeholder="Tempat Surat" class="form-control" value="<?php echo $surat->tempat_surat; ?>"></td>
						</tr>
						
						<tr>
							<td>Tanggal Surat : </td>
							<td><input type="date" name="tanggal_surat" placeholder="Tanggal Surat" class="form-control" value="<?php echo $surat->tanggal_surat; ?>"></td>
						</tr>
						
						<tr>
							<td>Yang Menandatangani : </td>
							<td>
								<select name="atasnama_surat" class="form-control">
								<?php foreach($atasnama_f AS $an) { $id_an = $an->id; $surat_atasnama = $surat->atasnama_surat; ?>
								
									<option value="<?php echo $id_an ;?>" <?php if($id_an==$surat_atasnama) echo"selected";?>> <?php echo $an->jabatan ;?>: <?php echo $an->atas_nama ;?> (NIP: <?php echo $an->NIP ;?>)</option>
									
								<?php } ?>
								</select>
							</td>
						</tr>

				</table>
<!-- START SKEMA "PEMBUATAN" UNTUK "SIPERAN"-->
<?php if($pembuatan=="siperan"){?>
				<table class="table table-bordered">
				
						<tr><td>
							<div class="pull-right">
								<a target="new" href="<?php echo base_url(); ?>index.php/TU/preview_surat<?php if($bahasa=="inggris")echo"_inggris";?>/<?php echo $surat->id_surat; ?>" title="Preview" class="btn btn-warning"><i class="glyphicon glyphicon-expand"></i> Preview</a>
							</div>
						</td></tr>
						
						<tr><td>
						<textarea id="editor1" name="isi_surat" rows="10" cols="80">
												<?php echo $surat->isi_surat; ?>
						</textarea>
						</td></tr>
						
						
						
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
				</table>
<?php } ?>
<!-- END SKEMA "PEMBUATAN" UNTUK "SIPERAN"-->

<!-- START SKEMA "PEMBUATAN" UNTUK "UNGGAHAN"-->
<?php if($pembuatan=="unggahan"){?>
				<table class="table table-bordered">
				
						<tr><td>
							<label>File Surat : </label>
						</td></tr>
				
						<tr><td>
						
						<?php if($isi_surat==""){ ?>
							<div class="form-group">
								<input type="file" name="isi_surat">
								<p class="help-block">Ukuran file max 8 MB.</p>
								<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX, TXT, CDR, AI, PSD.</p>
							</div>
							
						<?php }else{ ?>
						
							
							<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/tu/surat/<?php echo $isi_surat ;?>">
								<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $isi_surat ;?>
							</a>
							
						<?php } ?>
						
						</td></tr>
				</table>
<?php } ?>
<!-- END SKEMA "PEMBUATAN" UNTUK "UNGGAHAN"-->
						
						<br>
						<a href="<?php echo base_url(); ?>index.php/TU/surat_keluar" title="Kembali" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
						<input class="btn btn-primary" type="submit" name="aksi" value="Simpan">
						<input class="btn btn-success" type="submit" name="aksi" value="Simpan dan Selesai">
						
						
						
				  </form>
				</div>





              </div>
              <!-- /.box-body -->

          </div>
		  
		  
		  
		  
<?php if($show_lampiran=="on"){?>
		  <div class="row"><!-- START ROW UNTUK FITUR LAMPIRAN-->
		  
		  <div class="col-md-6">
		  <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Upload Lampiran</h3>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->

              <div class="box-body">




				<div class="box-body pad">
				  <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/TU/simpan_lampiran/" enctype="multipart/form-data">
				  
					<input type="hidden" name="id_fakultas" value="<?php echo $utama_id_fakultas; ?>">
					<input type="hidden" name="id_layout" value="<?php echo $surat->id_layout; ?>">
					<input type="hidden" name="id_surat" value="<?php echo $surat->id_surat; ?>">
					
					<label>Judul lampiran:</label>
					<div class="form-group">
                        <input type="text" name="judul_lampiran" placeholder="Judul lampiran" class="form-control">
					</div>
				  
					<div class="form-group">
                        <input type="file" name="lampiran">
						<p class="help-block">Ukuran file max 8 MB.</p>
                        <p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX, TXT, CDR, AI, PSD.</p>
					</div>
					
					<div class="box-footer">
						<button type="submit" class="btn btn-default"><i class="fa fa-upload"></i> Upload</button>
					  </div>
						
				  </form>
				</div>





              </div>
              <!-- /.box-body -->

          </div>
		  </div>
		  
		  <div class="col-md-6">
		  <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lampiran</h3>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->

              <div class="box-body">




				<div class="box-body pad">
				<table class="table table-bordered">
				  <?php foreach($lampiran_pilih AS $lampiran)
				  {
					?>
					
					<tr>
						<td>
							<i class="fa fa-file"></i>
						</td>
						<td width="50%">
							<?php echo $lampiran->judul_lampiran ;?>
						</td>
						<td>
							<div class="pull-right">
							<a class="btn btn-primary btn-sm" target="new" href="<?php echo base_url(); ?>assets/file/tu/lampiran/<?php echo $lampiran->link_lampiran ;?>"><i class="fa fa-eye"></i> Lihat</a>
							<a data-toggle="modal" data-target="#hapuslampiran<?php echo $lampiran->id_lampiran ;?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
							</div>
						</td>
					</tr>
					
					
					
				  <?php } ?>
				</table>
				</div>





              </div>
              <!-- /.box-body -->

          </div>
		  </div>
		  
		  
		  
		  
		  
		  </div><!-- END ROW UNTUK FITUR LAMPIRAN-->
<?php } ?>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
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
