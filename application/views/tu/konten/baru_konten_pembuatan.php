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
              <h3 class="box-title">Pilih tipe pembuatan surat</h3>
            </div>
              <div class="box-body">
				
				<a href="<?php echo base_url(); ?>index.php/TU/baru/pilih_bahasa?id_layout=<?php echo $_GET['id_layout'] ;?>&pembuatan=siperan" class="btn btn-default">
					<i class="fa fa-edit" style="font-size:25pt"></i><br>Buat di Editor Surat
				</a>
				
				<a href="<?php echo base_url(); ?>index.php/TU/baru/pilih_bahasa?id_layout=<?php echo $_GET['id_layout'] ;?>&pembuatan=unggahan" class="btn btn-default">
					<i class="fa fa-upload" style="font-size:25pt"></i><br>Upload Surat
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
