<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editor Surat Aktif Kuliah
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editor Surat Aktif Kuliah</li>
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
              <h3 class="box-title">Surat Aktif Kuliah</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div class="col-md-8 box-body">
            <?php
            	foreach ($surat_aktif_kuliah as $sak)
            	{
					
					$tgll = $sak->TanggalLahir;
					  $tgl_d = date('d', strtotime($tgll));
					  $tgl_m = date('m', strtotime($tgll));
					  $tgl_Y = date('Y', strtotime($tgll));
					  
					  if($tgl_m=='01')$bulan_lahir="Januari";
					  else if($tgl_m=='02')$bulan_lahir="Februari";
					  else if($tgl_m=='03')$bulan_lahir="Maret";
					  else if($tgl_m=='04')$bulan_lahir="April";
					  else if($tgl_m=='05')$bulan_lahir="Mei";
					  else if($tgl_m=='06')$bulan_lahir="Juni";
					  else if($tgl_m=='07')$bulan_lahir="Juli";
					  else if($tgl_m=='08')$bulan_lahir="Agustus";
					  else if($tgl_m=='09')$bulan_lahir="September";
					  else if($tgl_m=='10')$bulan_lahir="Oktober";
					  else if($tgl_m=='11')$bulan_lahir="November";
					  else if($tgl_m=='12')$bulan_lahir="Desember";

            ?>
                <form action="<?php echo base_url(); ?>index.php/mahasiswa/editorsak/page_final?id_surat=<?php echo $sak->id_surat_aktif ;?>" method="POST"  enctype="multipart/form-data">
                <table class="table table-bordered">
				
				<tr>
                  <td width="30%">File Scan KTM</td>
                  <td><input type="file" name="ktm"></td>
                </tr>
			
				<tr>
                  <td>File Scan Billing Statement</td>
                  <td><input type="file" name="bs"></td>
                </tr>
			
                
				
				
              </table>
			  
			  <table class="table"><tr>
			  <td width="30%" align="left"><input type="submit" name="aksi" class="btn btn-default" value="Sebelumnya"></td>
			  <td width="40%" align="center">Halaman 3 dari 4</td>
			  <td width="30%"><div class="pull-right"><input type="submit" name="aksi" class="btn btn-primary" value="Selanjutnya"></div></td>
			  </tr></table>
			  </form>
<?php }?>
					</div>	  
						  
                          <div class="box-footer">
                            
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
