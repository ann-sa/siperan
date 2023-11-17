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

		  <div class="col-md-7">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Buat Surat</h3>
            </div>
              <div class="box-body">
			  
<?php foreach($layout_pilih AS $layout)
{
?>
			  
			  
			  
			  
			  
			  
			  
			  
				
				<a href="<?php echo base_url(); ?>index.php/TU/baru/pembuatan?id_layout=<?php echo $layout->id_layout ;?>" class="btn btn-default">
					<i class="glyphicon glyphicon-envelope" style="font-size:25pt"></i><br><?php echo $layout->judul ;?><br>(<?php echo $layout->judul_inggris ;?>)
				</a>
				
				
				
				
				
				
				
				
				
<?php } ?>	
			  
			  </div>
          </div>
		  </div>
		  
		  <div class="col-md-5">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Unggah surat masuk (eksternal)</h3>
            </div>
              <div class="box-body">
				
				<a href="<?php echo base_url(); ?>index.php/TU/buat_surat_etr" class="btn btn-default">
					<i class="glyphicon glyphicon-envelope" style="font-size:25pt"></i><br>Surat Eksternal
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
