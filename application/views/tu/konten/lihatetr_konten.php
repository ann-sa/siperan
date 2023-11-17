<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach($surat_pilih AS $surat)
{
?>

<?php foreach($lampiran_pilih AS $lpr)
{
	?>


<?php } ?>


<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lihat Surat Masuk
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
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Masuk</h3>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
				<div class="box-body pad">
					<div class="col-md-12 pull-right">
						<?php $status_disposisi=$surat->status_disposisi ?>
							<?php if($this->session->userdata('Level') == "super") {?>
								<?php if($status_disposisi != "memiliki disposisi") {?>
										<a href="<?php echo base_url(); ?>index.php/TU/buatdisposisietr/<?php echo $surat->id ;?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Buat Disposisi</a>
								<?php } ?>
							<?php } ?>
							</div>
						</div>

				<div class="box-body pad">

			<div class="col-md-4">
				  <form action="<?php echo base_url(); ?>index.php/TU/simpan_surat_etr/<?php echo $surat->id; ?>" method="POST">
				  <input type="hidden" name="fakultas" value="<?php echo $utama_id_fakultas; ?>">
						<label>Nomor Surat:</label>
						<input type="text" name="nomorsurat" placeholder="Nomor Surat" class="form-control" disabled value="<?php echo $surat->nomorsurat; ?>" pattern="[A-Z0-9]+/[0-9]+" autofocus required oninvalid="this.setCustomValidity('Hanya boleh angka 0-9')" oninput="setCustomValidity('')"><br>

						<label>Perihal Surat:</label>
						<input type="text" name="perihal" placeholder="Perihak Surat" class="form-control" value="<?php echo $surat->perihal; ?>" pattern="[a-zA-Z ]+" autofocus required oninvalid="this.setCustomValidity('Hanya boleh huruf a-z atau A-Z')" oninput="setCustomValidity('')"disabled><br>

						<label>Tanggal Input:</label>
						<input type="date" name="tglinput" placeholder="Tanggal Input" class="form-control" value="<?php echo $surat->tanggal_input; ?>" disabled><br>

			</div>
			<div class="col-md-4">
						<label>Tanggal Diterima:</label>
						<input type="date" name="tglditerima" placeholder="Tanggal Diterima" class="form-control" value="<?php echo $surat->tanggal_diterima; ?>"disabled><br>

						<label>Tanggal Surat:</label>
						<input type="date" name="tglsurat" placeholder="Tanggal Surat" class="form-control" value="<?php echo $surat->tanggal_surat; ?>" pattern="[a-zA-Z ]+"disabled autofocus required oninvalid="this.setCustomValidity('Hanya boleh huruf a-z atau A-Z')" oninput="setCustomValidity('')"><br>

						<label>Asal Surat:</label>
						<input type="text" name="asal" placeholder="Asal Surat" class="form-control" value="<?php echo $surat->asal; ?>" pattern="[a-zA-Z ]+" autofocus required disabled oninvalid="this.setCustomValidity('Hanya boleh huruf a-z atau A-Z')" oninput="setCustomValidity('')"><br>

			</div>
			<div class="col-md-4">
						<label>Tingkat Keamanan:</label>
						<select class="form-control" name="tingkatkeamanan"disabled>
							 <option value="<?php echo $surat->TingkatKeamanan; ?>"><?php echo $surat->TingkatKeamanan; ?></option>
							 <optgroup>
							 <option value="Sangat Rahasia">Sangat Rahasia</option>
							 <option value="Rahasia">Rahasia</option>
							 <option value="Biasa">Biasa</option>
						 </optgroup>
						 </select><br>
						<label>Kategori Surat:</label>
						<select class="form-control" name="kategorisurat"disabled>
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
						<textarea name="isisurat" value="<?php echo $surat->isi_surat; ?>" class="form-control" rows="1"disabled><?php echo $surat->isi_surat; ?></textarea><br>
				  </form>
			</div>
		</div>
		<br>



		<div class="box-body pad">
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
            <td><i class="fa fa-file"></i> <?php echo $lampiran->judul ;?></td>
            <td><a class="btn btn-primary btn-sm" target="new" href="<?php echo base_url(); ?>assets/file/tu/lampiran/<?php echo $lampiran->link ;?>"><i class="fa fa-eye"></i> Lihat</a>

          </tr>
          <?php $no++; } ?>
        </tbody>
        </table>
      </div>

			</div>


      </div>
    </div>
  </div>


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
