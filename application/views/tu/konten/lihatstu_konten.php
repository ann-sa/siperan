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
      <h1>
        Lihat Surat TU
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-edit"></i> Surat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

	<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="rowx">
        <!-- left column -->
        <div class="row">
          <!-- general form elements -->


		  <div class="col-md-9">

					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Nomor Surat:</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
							  </div>
						</div>
						<div class="box-body">
							<?php echo $surat->nomorsurat; ?>
						</div>
					</div>

					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Tanggal:</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
							  </div>
						</div>
						<div class="box-body">
							<?php echo $surat->date; ?>
						</div>
					</div>

					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Hal:</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
							  </div>
						</div>
						<div class="box-body">
							<?php echo $surat->Judul; ?>
						</div>
					</div>

					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Atas Nama:</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
							  </div>
						</div>
						<div class="box-body">
							<?php echo $surat->jabatan; ?>
						</div>
					</div>

					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Isi:</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
							  </div>
						</div>
						<div class="box-body">
							<?php echo $surat->isi; ?>
						</div>
					</div>

					<div class="box box-success">
						<div class="box-body">
							<a href="<?php echo base_url(); ?>index.php/TU/surat/tu" title="Kembali" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
							<div class="pull-right">
								<a target="new" href="<?php echo base_url(); ?>index.php/TU/printstu/<?php echo $surat->id_surattu ;?>" title="Print Surat" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print</a>
								<a href="<?php echo base_url(); ?>index.php/TU/back_to_draft/surat_tu_plain?id=<?php echo $surat->id_surattu ;?>" class="btn btn-warning"><i class="fa fa-file-text-o"></i> Kembalikan menjadi draft</a>
							</div>
						</div>
					</div>










		  </div><!-- /.col -->



		  <div class="col-md-3">

		  <div class="box box-success">
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
				  <?php foreach($lampiran_pilih AS $lampiran)
				  {
					?>

					<div class="box">
						<div class="box-header with-border">
						  <i class="fa fa-file"></i> <?php echo $lampiran->judul ;?>
						  <br><br>
						  <div>
							<a class="btn btn-primary btn-sm" target="new" href="<?php echo base_url(); ?>assets/file/tu/lampiran/<?php echo $lampiran->link ;?>"><i class="fa fa-eye"></i> Lihat</a>
						</div>

						</div>
					</div>



				  <?php } ?>
				</div>





              </div>
              <!-- /.box-body -->
            </form>
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
