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

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Profil</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="col-md-8 box-body">
		
		<form method="POST" action="<?php echo base_url(); ?>index.php/TU/editakun2/profil">
		
<?php
foreach ($data_user as $biodata)
{
?>
		
			<table class="table table-bordered">
                <tr>
                 <td width="30%">Nama</td>
                  <td><input type="text" name="nama" placeholder="Nama" pattern="[a-zA-Z\s\.,]+" autofocus required oninvalid="this.setCustomValidity('Hanya boleh huruf kapital, huruf kecil, titik, dan koma')" oninput="setCustomValidity('')" value="<?php echo $biodata->Nama;?>" placeholder="Nama" class="form-control"></td>
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
