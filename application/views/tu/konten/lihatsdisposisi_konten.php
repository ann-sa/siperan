<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach($surat_disposisi AS $surat)
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
      Lihat Surat Disposisi
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
      <li class="active"><i class="fa fa-edit"></i> Surat Disposisi</li>
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
              <h3 class="box-title">Surat Disposisi</h3>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->

              <div class="box-body">


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
        <input type="text" name="jabatan" class="form-control" disabled value="<?php echo $data->Jabatan; ?>" required ><br>
        <label>Disposisikan Kepada:</label>
        <select class="form-control" name="kepada" disabled>
          <option value="<?php echo $surat->DidisposisikanKepada; ?>"><?php echo $surat->DidisposisikanKepada; ?></option>
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
        <textarea name="isidisposisi" class="form-control" disabled placeholder="Isi disposisi..." rows="5"><?php echo $surat->isidisposisi; ?></textarea><br>
        <label><i>Catatan:</i></label>
        <textarea name="catatan" value="<?php echo $surat->isi_surat; ?>" disabled placeholder="Isi Catatan..."class="form-control" rows="5"><?php echo $surat->Catatan; ?></textarea><br>
        <label>Sesudah digunakan segera dikembalikan kepada:</label>
        <input type="text" value="<?php echo $surat->KembalikanKepada; ?>" disabled name="kembalikanpada" placeholder="Kembalikan Kepada" class="form-control"><br>
        <label>Tanggal Dikembalikan:</label>
        <input type="date" name="tanggalkembalian" placeholder="Tanggal Dikembalikan" disabled value="<?php echo $surat->TanggalDikembalikan; ?>"class="form-control"><br>
            <a target="new" href="<?php echo base_url(); ?>index.php/TU/printsdisposisi/<?php echo $surat->id_suratdisposisi ;?>" title="Print Surat" class="btn btn-primary form-control"><i class="glyphicon glyphicon-print"></i> Print</a>
      </div>

    </div>
    <?php } ?>


          </div>
          <!-- /.box-body -->


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
