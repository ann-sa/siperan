<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Akun
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
    <li><i class="glyphicon glyphicon-user"></i> Akun</a></li>
        <li class="active"><i class="fa fa-envelope-o"></i> Ubah Email</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- left column -->
        <div class="col-md-12">
          <?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->
          <!-- general form elements -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Email</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php echo (isset($_GET['error']))? "<div class='alert alert-danger'>$_GET[error]</div>" : ""; ?>
			<div class="col-md-8 alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
                Mengganti email dengan yang baru akan dilanjutkan dengan mengkonfirmasi email baru tsb.
              </div>
<?php
// var_dump($data_user);
  foreach ($data_user as $pengguna)
  {
    ?>
	
  
            <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/mahasiswa/simpanemail">
              <div class="col-md-8 box-body">

                <input type="hidden" class="form-control" name="nim" value="<?php echo $pengguna->NIM ;?>">

			  
			  <table class="table table-bordered">
                <tr>
                  <td width="30%">Email saat ini</td>
                  <td><?php echo $pengguna->Email;?></td>
				</tr>
				<tr>
                  <td width="30%">Email baru</td>
                  <td><input type="email" name="new_email" placeholder="Email baru" class="form-control"></td>
				</tr>
			</table>
			  
			  
			  
			  
			  <br>
			  <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
                </div>
               

              


              <div class="box-footer">
                
              </div>
            </form>
</div>
              <!-- /.box-body -->
<?php }?>
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
