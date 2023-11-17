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
        <li class="active"><i class="fa fa-folder-open"></i> Info Fakultas</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Info Fakultas</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="col-md-8 box-body">
		
<?php
foreach ($info_fakultas as $fakultas)
{
?>
		
			<table class="table">
			
                <tr>
                  <td>Logo Fakultas : </td>
                  <td><img src="<?php echo base_url();?>assets/file/logo_fakultas/<?php echo $fakultas->logo_fakultas;?>" width="120px"></td>
                </tr>
				
				<tr>
                  <td>Nama Fakultas : </td>
                  <td><?php echo $fakultas->Fakultas;?></td>
                </tr>
				
				<tr>
                  <td>Alamat Fakultas : </td>
                  <td><?php echo $fakultas->Alamat_Fakultas;?></td>
                </tr>
				
				<tr>
                  <td>Nomor Telepon : </td>
                  <td><?php echo $fakultas->Telp;?></td>
                </tr>
				
				<tr>
                  <td>Laman : </td>
                  <td><?php echo $fakultas->Laman;?></td>
                </tr>
				
				<tr>
                  <td>Email : </td>
                  <td><?php echo $fakultas->Email_Fakultas;?></td>
                </tr>
		
		
			</table>
			
			<br>
			
			<a href="<?php echo base_url(); ?>index.php/TU/editfakultas" title="Edit" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
			
			
			
		
<?php } ?>		

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
