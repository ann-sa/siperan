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
        <li class="active"><i class="fa fa-folder-open"></i> Atas Nama</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Atas Nama</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
      

<?php
$no=1;
  foreach ($atasnama_pilih as $an)
  {
?>
<form action="<?php echo base_url(); ?>index.php/TU/simpan_atasnama/<?php echo $an->id;?>" method="POST">

			<table class="table table-bordered">
				
				<tr>
                  <td>NIP : </td>
                  <td><input name="NIP" value="<?php echo $an->NIP;?>" type="text" class="form-control" placeholder="NIP" ></td>
                </tr>
				
				<tr>
                  <td>Nama : </td>
                  <td><input name="atas_nama" value="<?php echo $an->atas_nama;?>" type="text" class="form-control" placeholder="Nama" ></td>
                </tr>
				
				<tr>
                  <td>Jabatan : </td>
                  <td><input name="jabatan" value="<?php echo $an->jabatan;?>" type="text" class="form-control" placeholder="Jabatan" ></td>
                </tr>
			</table>
			
			<a href="<?php echo base_url(); ?>index.php/TU/atasnama/lihat" title="Kembali" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Simpan</button>  
</form>
<?php $no++; }?>
        

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
