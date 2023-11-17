<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pengaturan</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/TU"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-folder-open"></i> Akun</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Ganti Password</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
		
			
		
        <div class="col-md-8 box-body">
		<?php echo (isset($_GET['error']))? "<div class='alert alert-danger'>$_GET[error]</div>" : ""; ?>
		
		<form method="POST" action="<?php echo base_url(); ?>index.php/TU/editakun2/password">
		
<?php
foreach ($data_user as $biodata)
{
?>
			
            <table class="table table-bordered">
                <tr>
                  <td width="30%">Password Lama</td>
                  <td><input type="password" class="form-control" name="password_lama" placeholder="Password Lama"></td>
				</tr>
				<tr>
                  <td width="30%">Password Baru</td>
                  <td><input type="password" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}" autofocus required oninvalid="this.setCustomValidity('Minimal terdapat 1 huruf kapital, 1 huruf kecil, 1 angka, dan 8 karakter')" oninput="setCustomValidity('')" class="form-control" name="password_baru" placeholder="Password Baru"></td>
				</tr>
				<tr>
                  <td width="30%">Ulangi Password Baru</td>
                  <td><input type="password" class="form-control" name="konfirmasi_password" placeholder="Ulangi Password Baru"></td>
				</tr>
			</table>
			
			<a href="<?php echo base_url(); ?>index.php/TU/akun" title="Kembali" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
		
<?php } ?>		

		</form>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
	  
	  
	  
	  
	  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
