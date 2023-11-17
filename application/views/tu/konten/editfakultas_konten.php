<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- START Modal Ganti Logo Fakultas -->
<div class="modal fade" id="2019gantilogofakultas">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Ganti Logo Fakultas</h4>
	  </div>
	  <div class="modal-body">
		
		
<form role="form" method="POST" action="<?php echo base_url(); ?>index.php/TU/logo_fakultas/baru?id_fakultas=<?php echo $utama_id_fakultas ;?>" enctype="multipart/form-data">
		
		
		
		
		
		
		<div class="form-group">
			<input type="file" name="logofakultas">
			<p class="help-block">Ukuran file max 8 MB.</p>
			<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG.</p>
		</div>
		<div class="form-group">
		<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-upload"></i> Upload dan Ganti Logo</button>
		</div>
		<div class="form-group">
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Batal</button>
		</div>
		
		
		
</form>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Ganti Logo Fakultas -->

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pengaturan</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/TU"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-folder-open"></i> Edit Info Fakultas</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Info Fakultas</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="col-md-8 box-body">

<?php if(isset($_GET['warning_logo'])){ $warning_logo=$_GET['warning_logo'];?>

	<?php if($warning_logo=="menjadi_baru"){?>
		<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-warning"></i> Info!</h4>
		Logo fakultas berganti menjadi baru! <a href="<?php echo base_url(); ?>index.php/TU/logo_fakultas/lama?id_fakultas=<?php echo $utama_id_fakultas ;?>">Batalkan</a>
		</div>
		
	<?php }else if($warning_logo=="kembali_lama"){ ?>
	
		<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-info"></i> Info!</h4>
		Logo fakultas kembali ke yang lama.
		</div>
	<?php } ?>

<?php } ?>
		
		<form method="POST" action="<?php echo base_url(); ?>index.php/TU/simpan_fakultas">
		
<?php
foreach ($info_fakultas as $fakultas)
{
?>
<input name="id_fakultas" value="<?php echo $fakultas->id_fakultas;?>" type="hidden">		
			<table class="table table-bordered">
				
				<tr>
                  <td>Logo Fakultas : </td>
                  <td>
						<img src="<?php echo base_url();?>assets/file/logo_fakultas/<?php echo $fakultas->logo_fakultas;?>" width="120px">
						<br><br>
						<a data-toggle="modal" data-target="#2019gantilogofakultas" title="Ganti Logo" class="btn btn-info"><i class="fa fa-image"></i> Ganti Logo</a>
				  </td>
                </tr>
				
				<tr>
                  <td>Nama Fakultas : </td>
                  <td><input name="namafakultas" value="<?php echo $fakultas->Fakultas;?>" type="text" class="form-control" placeholder="Nama Fakultas"readonly></td>
                </tr>
				
				<tr>
                  <td>Alamat Fakultas : </td>
                  <td><input name="alamatfakultas" value="<?php echo $fakultas->Alamat_Fakultas;?>" type="text" class="form-control" placeholder="Alamat Fakultas" pattern="^[a-zA-Z0-9\s\.,-]*$" autofocus required oninvalid="this.setCustomValidity('Hanya bisa huruf kapital, huruf kecil, angka, titik, koma, garis penghubung, dan petik satu atas')" oninput="setCustomValidity('')"></td>
                </tr>
				
				<tr>
                  <td>Nomor Telepon : </td>
                  <td><input name="telp" value="<?php echo $fakultas->Telp;?>" type="text" class="form-control" placeholder="Nomor Telepon"  autofocus required oninvalid="this.setCustomValidity('Hanya boleh angka 0-9 dan maksimal 12 digit')" oninput="setCustomValidity('')"></td>
                </tr>
				
				<tr>
                  <td>Laman : </td>
                  <td><input name="laman" value="<?php echo $fakultas->Laman;?>" type="text" class="form-control" placeholder="Laman" pattern="^[a-zA-Z0-9\s\.,-]*$" autofocus required oninvalid="this.setCustomValidity('Hanya bisa huruf kapital, huruf kecil, angka, titik, koma, garis penghubung, dan petik satu atas')" oninput="setCustomValidity('')"></td>
                </tr>
				
				<tr>
                  <td>Email : </td>
                  <td><input name="email" value="<?php echo $fakultas->Email_Fakultas;?>" type="text" class="form-control" placeholder="Email" Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autofocus required oninvalid="this.setCustomValidity('Bisa memakai huruf, angka, dan simbol-simbol lain seperti format penulisan email biasanya')" oninput="setCustomValidity('')"></td>
                </tr>
			</table>
			
			
			
			<a href="<?php echo base_url(); ?>index.php/TU/infofakultas" title="Kembali" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
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
