<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach($surat_pilih AS $surat)
{
?>

<?php foreach($lampiran_pilih AS $lpr)
{
	?>

<!-- START Modal Hapus Lampiran -->
<div class="modal fade" id="hapuslampiran<?php echo $lpr->id_lampiraneksternal ;?>">
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
		<a href="<?php echo base_url(); ?>index.php/TU/hapuslampiranetr/?id_surat=<?php echo $surat->id; ?>&id_lampiran=<?php echo $lpr->id_lampiraneksternal ;?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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
        Editor Surat Masuk
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editor Surat Masuk</li>
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
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Editor Surat Masuk</h3>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->

              <div class="box-body">

								<div class="box-body pad">
									<div class="col-md-6">
										<h2 class="box-title">Upload Lampiran</h2>
									<form role="form" method="POST" action="<?php echo base_url(); ?>index.php/TU/simpan_lampiran/<?php echo $surat->id; ?>" enctype="multipart/form-data">
										<input type="hidden" name="id_f" value="<?php echo $utama_id_fakultas; ?>">
										<input type="hidden" name="tipe" value="surat_eksternal">
										<label>Judul lampiran:</label>
										<div class="form-group">
											<input type="text" name="judul" pattern="[a-zA-Z ]+" autofocus required oninvalid="this.setCustomValidity('Hanya boleh huruf a-z atau A-Z')" oninput="setCustomValidity('')" placeholder="Judul lampiran" class="form-control">
										</div>
									<div class="form-group">
										<input type="file" name="lampiran">
										<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX</p>
									</div>
									<div class="box-footer">
										<button type="submit" class="btn btn-default"><i class="fa fa-upload"></i> Upload</button>
										</div>
									</form>

									</div>


									<div class="col-md-6">
										<h2 class="box-title">Data Lampiran</h2>
										<table class="table">
											<thead>
											<tr>
												<th>No</th>
												<th>Data Lampiran</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php
											$no=1;
											foreach($lampiran_pilih AS $lampiran)	{	?>

											<tr>
												<td><?php echo $no; ?></td>
												<td><i class="fa fa-file"></i> <?php echo $lampiran->judul_lampiran ;?></td>
												<td>							<a class="btn btn-primary btn-sm" target="new" href="<?php echo base_url(); ?>assets/file/tu/lampiran/<?php echo $lampiran->link_lampiran ;?>"><i class="fa fa-eye"></i> Lihat</a>
																			<a data-toggle="modal" data-target="#hapuslampiran<?php echo $lampiran->id_lampiraneksternal ;?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a></td>
											</tr>
											<?php $no++; } ?>
										</tbody>
										</table>
									</div>
									<div class="box-body pad">



						</div>
						              </div>

				<div class="box-body pad">
			<div class="col-md-4">
				  <form action="<?php echo base_url(); ?>index.php/TU/simpan_surat_etr/<?php echo $surat->id; ?>" method="POST">
				  <input type="hidden" name="fakultas" value="<?php echo $utama_id_fakultas; ?>">
						<label>Nomor Surat:</label>
						<input type="text" name="nomorsurat" placeholder="Nomor Surat" class="form-control" value="<?php echo $surat->nomorsurat; ?>" pattern="[A-Z0-9]+/[0-9]+" autofocus required oninvalid="this.setCustomValidity('Hanya boleh angka 0-9')" oninput="setCustomValidity('')"><br>

						<label>Perihal Surat:</label>
						<input type="text" name="perihal" placeholder="Perihak Surat" class="form-control" value="<?php echo $surat->perihal; ?>" pattern="[a-zA-Z ]+" autofocus required oninvalid="this.setCustomValidity('Hanya boleh huruf a-z atau A-Z')" oninput="setCustomValidity('')"><br>

						<label>Tanggal Input:</label>
						<input type="date" name="tglinput" placeholder="Tanggal Input" class="form-control" value="<?php echo $surat->tanggal_input; ?>" readonly><br>

			</div>
			<div class="col-md-4">
						<label>Tanggal Diterima:</label>
						<input type="date" name="tglditerima" placeholder="Tanggal Diterima" class="form-control" value="<?php echo $surat->tanggal_diterima; ?>"><br>

						<label>Tanggal Surat:</label>
						<input type="date" name="tglsurat" placeholder="Tanggal Surat" class="form-control" value="<?php echo $surat->tanggal_surat; ?>" pattern="[a-zA-Z ]+" autofocus required oninvalid="this.setCustomValidity('Hanya boleh huruf a-z atau A-Z')" oninput="setCustomValidity('')"><br>

						<label>Asal Surat:</label>
						<input type="text" name="asal" placeholder="Asal Surat" class="form-control" value="<?php echo $surat->asal; ?>" pattern="[a-zA-Z ]+" autofocus required oninvalid="this.setCustomValidity('Hanya boleh huruf a-z atau A-Z')" oninput="setCustomValidity('')"><br>

			</div>
			<div class="col-md-4">
						<label>Tingkat Keamanan:</label>
						<select class="form-control" name="tingkatkeamanan">
							 <option value="<?php echo $surat->TingkatKeamanan; ?>"><?php echo $surat->TingkatKeamanan; ?></option>
							 <optgroup>
							 <option value="Sangat Rahasia">Sangat Rahasia</option>
							 <option value="Rahasia">Rahasia</option>
							 <option value="Biasa">Biasa</option>
						 </optgroup>
						 </select><br>
						<label>Kategori Surat:</label>
						<select class="form-control" name="kategorisurat">
							 <option value="<?php echo $surat->KategoriSurat; ?>"><?php echo $surat->KategoriSurat; ?></option>
							 <optgroup label="">
							 <option value="Surat Keputusan">Surat Keputusan</option>
							 <option value="Surat Undangan">Surat Undangan</option>
							 <option value="Surat Edaran">Surat Edaran</option>
							 <option value="Memo">Memo</option>
							 <option value="Surat Pengumuman">Surat Pengumuman</option>
							 <option value="Surat Tugas">Surat Tugas</option>
							 <option value="Surat Dinas">Surat Dinas</option>
							 <option value="Surat Pengantar">Surat Pengantar</option>
							 <option value="Surat Proposal">Surat Proposal</option>
							 <option value="Laporan Pertanggungjawaban">Laporan Pertanggungjawaban</option>
							 <optgroup>
						 </select><br>
						<label>Isi Ringkasan:</label><br>
						<textarea name="isisurat" value="<?php echo $surat->isi_surat; ?>" class="form-control" rows="1"><?php echo $surat->isi_surat; ?></textarea><br>
						<input type="submit" name="aksi" value="Upload" class="btn btn-success">
				  </form>
			</div>
		</div>
		<br>




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
