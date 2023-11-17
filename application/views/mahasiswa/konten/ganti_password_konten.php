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
        <li class="active"><i class="fa fa-key"></i> Ganti Password</li>
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
              <h3 class="box-title">Ganti Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php echo (isset($_GET['error']))? "<div class='alert alert-danger'>$_GET[error]</div>" : ""; ?>
			<div class="col-md-8 alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
                Setelah mengganti password, sesi Anda akan berakhir dan akan keluar dari halaman ini untuk login kembali.
              </div>

<?php
// var_dump($data_user);
  foreach ($data_user as $pengguna)
  {
    ?>
	
  
            <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/mahasiswa/simpanpassword">
              <div class="col-md-8 box-body">

                <input type="hidden" class="form-control" name="nim" value="<?php echo $pengguna->NIM ;?>">
				
                
			  
			  
			  <table class="table table-bordered">
                <tr>
                  <td width="30%">Password Lama</td>
                  <td><input type="password" class="form-control" name="password_lama" placeholder="Password Lama"></td>
				</tr>
				<tr>
                  <td width="30%">Password Baru</td>
                  <td><input type="password" class="form-control" name="password_baru" placeholder="Password Baru" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}" autofocus required oninvalid="this.setCustomValidity('Minimal terdapat 1 huruf kapital, 1 huruf kecil, 1 huruf angka, dan 8 karakter')" oninput="setCustomValidity('')"></td>
				</tr>
				<tr>
                  <td width="30%">Ulangi Password Baru</td>
                  <td><input type="password" class="form-control" name="konfirmasi_password" placeholder="Ulangi Password Baru"></td>
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
