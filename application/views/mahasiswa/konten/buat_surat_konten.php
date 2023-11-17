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
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="glyphicon glyphicon-pencil"></i> Buat Surat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pilih Jenis Surat</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
				
				
				
<?php foreach($layout_mhs_data AS $layout)
{
?>
			  
			  
			  
			  
			  
			  
			  
			  
				
				<a href="<?php echo base_url(); ?>index.php/Mahasiswa/buat_go/<?php echo $layout->id_layout_mhs ;?>" class="btn btn-default">
					<i class="glyphicon glyphicon-envelope" style="font-size:25pt"></i><br><?php echo $layout->judul ;?><br>(<?php echo $layout->judul_inggris ;?>)
				</a>
				
				
				
				
				
				
				
				
				
<?php } ?>	
				
				
				
				
				
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
