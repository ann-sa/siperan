<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Buat Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="glyphicon glyphicon-pencil"></i> Buat Surat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->

		  <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Buat baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
				<a href="<?php echo base_url(); ?>index.php/TU/buat_surat_plain" class="btn btn-block btn-social btn-default"><i class="fa fa-envelope"></i> Surat TU</a>
				<br>
				<a href="<?php echo base_url(); ?>index.php/TU/buat_surat_etr" class="btn btn-block btn-social btn-default"><i class="fa fa-envelope"></i> Surat Eksernal</a>
			  </div>
          </div>
		  </div>

		  <div class="col-md-6">
		  <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Buat dari template</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">

				<?php foreach($template_data AS $tpl)
				{
				?>

				<a href="<?php echo base_url(); ?>index.php/TU/buat_from_template/<?php echo $tpl->id_surattu; ?>" class="btn btn-block btn-social btn-default"><i class="fa fa-envelope"></i> <?php echo $tpl->Judul; ?></a>
				<br>
				<?php } ?>

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
