<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Surat Baru
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="glyphicon glyphicon-pencil"></i> Surat Baru</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->

		  <div class="col-md-6x">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="glyphicon glyphicon-flag"></i> Pilih Bahasa Dalam Surat</h3>
            </div>
              <div class="box-body">
			  
				<a href="<?php echo base_url(); ?>index.php/TU/buat_go?id_layout=<?php echo $_GET['id_layout'] ;?>&pembuatan=<?php echo $_GET['pembuatan'] ;?>&bahasa=indonesia" class="btn btn-default">
					<img src="<?php echo base_url().'assets/file/flag_icon/indonesia.png'; ?>" width="40"><br>Indonesia
				</a>
				
				<a href="<?php echo base_url(); ?>index.php/TU/buat_go?id_layout=<?php echo $_GET['id_layout'] ;?>&pembuatan=<?php echo $_GET['pembuatan'] ;?>&bahasa=inggris" class="btn btn-default">
					<img src="<?php echo base_url().'assets/file/flag_icon/inggris.png'; ?>" width="40"><br>Inggris
				</a>
			  
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
