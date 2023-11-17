<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach($surat_keluar_pilih AS $surat)
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
	
	
	$tgll = $surat->tanggal_surat;
	
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
	
	$an_jabatan = $surat->jabatan;
	$an_nama = $surat->atas_nama;
	$an_nip = $surat->NIP;
	
	$judul = $surat->judul;
	$nomorsurat = $surat->nomorsurat;
	$tempatsurat = $surat->tempat_surat;
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lihat Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-eye"></i> Lihat Surat</li>
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
              <h3 class="box-title">Surat Keluar <?php if($surat->status_surat == "arsip")echo"(Arsip)";?></h3>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->

              <div class="box-body">




				<div class="box-body pad">
	

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
							<td><?php echo $surat->hal_surat; ?></td>
						</tr>
					
					<?php }?>
					<?php if($show_form_penerima=="on"){?>
					
						<tr>
							<td>Penerima Surat : </td>
							<td><?php echo $surat->penerima_surat; ?></td>
						</tr>
						
					<?php }?>
						
						<tr>
							<td>Tempat Surat : </td>
							<td><?php echo $surat->tempat_surat; ?></td>
						</tr>
						
						<tr>
							<td>Tanggal Surat : </td>
							<td><?php echo $tgl; ?></td>
						</tr>
						
						<tr>
							<td>Yang Menandatangani : </td>
							<td><?php echo $surat->jabatan ;?>: <?php echo $surat->atas_nama ;?> (NIP: <?php echo $surat->NIP ;?>)</td>
						</tr>

				</table><br>
<!-- START SKEMA "PEMBUATAN" UNTUK "SIPERAN"-->
<?php if($pembuatan=="siperan"){?>
				<table class="table table-bordered">
				
						
						<tr><td>
						<textarea id="editor1" name="isi_surat" rows="10" cols="80"readonly>
						
						
							<?php
								$isinya = $surat->isi_surat;
								
								$isinya = str_replace('[JudulSurat]', $judul, $isinya);
								$isinya = str_replace('[NomorSurat]', $nomorsurat, $isinya);
								
								$isinya = str_replace('[TempatSurat]', $tempatsurat, $isinya);
								$isinya = str_replace('[TanggalSurat]', $tgl, $isinya);
								
								$isinya = str_replace('[Jabatan_AN]', $an_jabatan, $isinya);
								$isinya = str_replace('[Nama_AN]', $an_nama, $isinya);
								$isinya = str_replace('[NIP_AN]', $an_nip, $isinya);
								
								echo $isinya;
								
							?>
						
						
						</textarea>
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
						
							
							<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/tu/surat/<?php echo $isi_surat ;?>">
								<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $isi_surat ;?>
							</a>
						
						</td></tr>
				</table>
<?php } ?>
<!-- END SKEMA "PEMBUATAN" UNTUK "UNGGAHAN"-->
						
						<br>
						<a href="<?php echo base_url(); ?>index.php/TU/<?php if($surat->status_surat == "arsip") echo"lihat_arsip"; else echo"surat_keluar";?>" title="Kembali" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
						
						<?php if($pembuatan=="siperan"){?>
						<div class="pull-right">
						<button onclick="window.open('<?php echo base_url(); ?>index.php/TU/preview_surat<?php if($bahasa=="inggris")echo"_inggris";?>/<?php echo $surat->id_surat; ?>?print=yes','popUpWindow','height=650,width=800,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print</button>
						</div>
						<?php } ?>
						
						
				  
				</div>





              </div>
              <!-- /.box-body -->

          </div>
		  
		  
		  
		  
<?php if($show_lampiran=="on"){?>
		  <div class="row"><!-- START ROW UNTUK FITUR LAMPIRAN-->
		  
		  
		  
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
