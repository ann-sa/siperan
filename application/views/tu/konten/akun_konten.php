<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
foreach ($data_user as $biodata)
{
	$levelakun = $biodata->level;
	if($levelakun=="super")$levelakun_in_teks="Akun TU Superior";
	else if($levelakun=="biasa")$levelakun_in_teks="Akun TU biasa";
?>

<!-- START Modal Ganti Foto Profil -->
<div class="modal fade" id="2019gantifotoprofil">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Ganti Foto Profil</h4>
	  </div>
	  <div class="modal-body">
		
		
<form role="form" method="POST" action="<?php echo base_url(); ?>index.php/TU/new_foto_profil/" enctype="multipart/form-data">

		<div class="form-group">
			<input type="file" name="fotoprofil">
			<p class="help-block">Ukuran file max 8 MB.</p>
			<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG.</p>
		</div>
		<div class="form-group">
		<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-upload"></i> Upload dan Ganti Foto</button>
		</div>
		<div class="form-group">
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Batal</button>
		</div>

</form>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Ganti Foto Profil -->

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
          <h3 class="box-title">Akun</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="col-md-8 box-body">
		

			
		
			<table class="table">
                <tr>
                  <td width="30%">NIP</td>
                  <td>: <?php echo $biodata->NIP;?></td>
                </tr>
				
				<tr>
                  <td>Level akun</td>
                  <td>: <?php echo $levelakun_in_teks;?></td>
                </tr>
				
				<tr>
                  <td>Nama</td>
                  <td>: <?php echo $biodata->Nama;?></td>
                </tr>
				
				<tr>
                  <td>Email</td>
                  <td>: <?php echo $biodata->Email;?></td>
                </tr>
				
				<tr>
                  <td>Fakultas</td>
                  <td>: <?php echo $nama_fakultas;?></td>
                </tr>
		
		
			</table>
			
			<br>
			
			<a href="<?php echo base_url(); ?>index.php/TU/editakun/profil" title="Edit nama" class="btn btn-default"><i class="fa fa-edit"></i> Edit nama</a>
			<a href="<?php echo base_url(); ?>index.php/TU/editakun/email" title="Ubah email" class="btn btn-default"><i class="fa fa-envelope-o"></i> Ubah email</a>
			<a href="<?php echo base_url(); ?>index.php/TU/editakun/password" title="Ganti password" class="btn btn-default"><i class="fa fa-key"></i> Ganti password</a>
		
		
	

        </div>
		<div class="col-md-4">
		<br>
			<table class="table table-bordered">
				<tr>
					<td align="center">
						Foto Profil
						<div class="pull-right">
							<a data-toggle="modal" data-target="#2019gantifotoprofil" title="Ganti Foto" class="btn btn-default"><i class="fa fa-image"></i></a>
						</div>
					</td>
				</tr>
				<tr>
					<td align="center">
						<img src="<?php echo base_url(); ?>assets/file/tu/foto_profil/<?php echo $biodata->foto_profil ;?>" width="200px">
					</td>
				</tr>
			</table>
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
<?php } ?>	