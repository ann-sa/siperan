<?php
defined('BASEPATH') OR exit('No direct script access allowed');

foreach ($surat_flex_mhs as $surat)
{
include"additional_modals_gogogo.php";

		$s_status = $surat->status_surat;
		
		if($s_status=="draft")
		{
			$teks_status = "Pengeditan";
			$tipe_tombol = "gray";
		}
		else if($s_status=="pending")
		{
			$teks_status = "Menunggu persetujuan";
			$tipe_tombol = "yellow";
		}
		else if($s_status=="approved")
		{
			$teks_status = "Sudah disetujui";
			$tipe_tombol = "green";
		}
		else if($s_status=="rejected")
		{
			$teks_status = "Ditolak";
			$tipe_tombol = "red";
		}
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lihat Surat Mahasiwa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-eye"></i> Lihat Surat Mahasiwa</li>
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
              <h3 class="box-title"><?php echo $surat->judul ;?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

  
            <div class="col-md-8 box-body">
                <h4>Periksa form Anda</h4>
				Periksa kembali form yang Anda isi sebelum mengirim permintaan surat kepada TU.
				<br><br>
                
				
				
				
			<table class="table table-bordered">
			
			<tr>
				<td>Status : </td>
				<td>
					<i class="fa fa-circle text-<?php echo $tipe_tombol;?>"></i> <?php echo $teks_status ;?>
				</td>
			</tr>
			
			<tr>
				<td>Bahasa pada surat : </td>
				<td>
					<?php if($surat->bahasa == "indonesia"){?>
					<img src="<?php echo base_url().'assets/file/flag_icon/indonesia.png'; ?>" width="40"> Bahasa Indonesia
					<?php }else if($surat->bahasa == "inggris"){?>
					<img src="<?php echo base_url().'assets/file/flag_icon/inggris.png'; ?>" width="40"> Bahasa Inggris
					<?php } ?>
				</td>
			</tr>
			
<!-- START MENGIDENTIFIKASI SELURUH ISI FORM -->		
			
			
			
			
			
			
			
			<!-- borang1 -->
			<?php if($surat->borang1status=="text"){?>
				<tr>
					<td><?php echo $surat->borang1judul ;?> : </td>
					<td><?php echo $surat->borang1 ;?></td>
				</tr>
			<?php } else if($surat->borang1status=="file"){ ?>
				<tr>
					<td><?php echo $surat->borang1judul ;?> : </td>
					<td>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang1 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang1 ;?>
						</a>
					</td>
                </tr>
			<?php } ?>

			
			<!-- borang2 -->
			<?php if($surat->borang2status=="text"){?>
				<tr>
					<td><?php echo $surat->borang2judul ;?> : </td>
					<td><?php echo $surat->borang2 ;?></td>
				</tr>
			<?php } else if($surat->borang2status=="file"){ ?>
				<tr>
					<td><?php echo $surat->borang2judul ;?> : </td>
					<td>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang2 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang2 ;?>
						</a>
					</td>
                </tr>
			<?php } ?>
			
			
			<!-- borang3 -->
			<?php if($surat->borang3status=="text"){?>
				<tr>
					<td><?php echo $surat->borang3judul ;?> : </td>
					<td><?php echo $surat->borang3 ;?></td>
				</tr>
			<?php } else if($surat->borang3status=="file"){ ?>
				<tr>
					<td><?php echo $surat->borang3judul ;?> : </td>
					<td>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang3 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang3 ;?>
						</a>
					</td>
                </tr>
			<?php } ?>

			
			<!-- borang4 -->
			<?php if($surat->borang4status=="text"){?>
				<tr>
					<td><?php echo $surat->borang4judul ;?> : </td>
					<td><?php echo $surat->borang4 ;?></td>
				</tr>
			<?php } else if($surat->borang4status=="file"){ ?>
				<tr>
					<td><?php echo $surat->borang4judul ;?> : </td>
					<td>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang4 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang4 ;?>
						</a>
					</td>
                </tr>
			<?php } ?>
			
			
			<!-- borang5 -->
			<?php if($surat->borang5status=="text"){?>
				<tr>
					<td><?php echo $surat->borang5judul ;?> : </td>
					<td><?php echo $surat->borang5 ;?></td>
				</tr>
			<?php } else if($surat->borang5status=="file"){ ?>
				<tr>
					<td><?php echo $surat->borang5judul ;?> : </td>
					<td>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang5 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang5 ;?>
						</a>
					</td>
                </tr>
			<?php } ?>
			
			
			<!-- borang6 -->
			<?php if($surat->borang6status=="text"){?>
				<tr>
					<td><?php echo $surat->borang6judul ;?> : </td>
					<td><?php echo $surat->borang6 ;?></td>
				</tr>
			<?php } else if($surat->borang6status=="file"){ ?>
				<tr>
					<td><?php echo $surat->borang6judul ;?> : </td>
					<td>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang6 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang6 ;?>
						</a>
					</td>
                </tr>
			<?php } ?>
			
			
			<!-- borang7 -->
			<?php if($surat->borang7status=="text"){?>
				<tr>
					<td><?php echo $surat->borang7judul ;?> : </td>
					<td><?php echo $surat->borang7 ;?></td>
				</tr>
			<?php } else if($surat->borang7status=="file"){ ?>
				<tr>
					<td><?php echo $surat->borang7judul ;?> : </td>
					<td>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang7 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang7 ;?>
						</a>
					</td>
                </tr>
			<?php } ?>
			
			
			<!-- borang8 -->
			<?php if($surat->borang8status=="text"){?>
				<tr>
					<td><?php echo $surat->borang8judul ;?> : </td>
					<td><?php echo $surat->borang8 ;?></td>
				</tr>
			<?php } else if($surat->borang8status=="file"){ ?>
				<tr>
					<td><?php echo $surat->borang8judul ;?> : </td>
					<td>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang8 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang8 ;?>
						</a>
					</td>
                </tr>
			<?php } ?>
			
			
			<!-- borang9 -->
			<?php if($surat->borang9status=="text"){?>
				<tr>
					<td><?php echo $surat->borang9judul ;?> : </td>
					<td><?php echo $surat->borang9 ;?></td>
				</tr>
			<?php } else if($surat->borang9status=="file"){ ?>
				<tr>
					<td><?php echo $surat->borang9judul ;?> : </td>
					<td>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang9 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang9 ;?>
						</a>
					</td>
                </tr>
			<?php } ?>
			
			
			<!-- borang10 -->
			<?php if($surat->borang10status=="text"){?>
				<tr>
					<td><?php echo $surat->borang10judul ;?> : </td>
					<td><?php echo $surat->borang10 ;?></td>
				</tr>
			<?php } else if($surat->borang10status=="file"){ ?>
				<tr>
					<td><?php echo $surat->borang10judul ;?> : </td>
					<td>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang10 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang10 ;?>
						</a>
					</td>
                </tr>
			<?php } ?>
			
			
			
			
			
				
				
<!-- END MENGIDENTIFIKASI SELURUH ISI FORM -->
              </table>
				
				
				
				
				
				<br>
				<a href="<?php echo base_url(); ?>index.php/mahasiswa/mysurat" title="Kembali" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
				
				<?php if($surat->status_surat=="draft" OR $surat->status_surat=="rejected"){?>
				<a href="<?php echo base_url(); ?>index.php/mahasiswa/editor_surat_mhs/<?php echo $surat->id_surat_mhs ;?>" title="Edit" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
				
				<a data-toggle="modal" data-target="#hapusmysurat<?php echo $surat->id_surat_mhs ;?>" title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
				
				<a data-toggle="modal" data-target="#kirimmysurat<?php echo $surat->id_surat_mhs ;?>" title="Kirim" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> Kirim Permintaan</a>
				<?php } ?>
				
              </div>
              <!-- /.box-body -->


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
<?php }?>