<?php
defined('BASEPATH') OR exit('No direct script access allowed');

foreach ($pilih_surat_flex_mhs as $surat)
{
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
		
	$tgll = $surat->TanggalLahir;
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
	  
	$tanggallahir_mhs = $tgl_d.' '.$bulan_lahir.' '.$tgl_Y;
	
include"additional_modals_gogogo.php";
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
        <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
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


            <div class="col-md-12 box-body">



			<div class="col-md-6">
			<table class="table table-bordered">
			<tr>
				<td colspan="2" align="center"><h4><b>DATA MAHASISWA</b></h4></td>
			</tr>

			<tr>
				<td>Nama Mahasiswa : </td>
				<td><?php echo $surat->Nama ; ?></td>
			</tr>

			<tr>
				<td>NIM Mahasiswa : </td>
				<td><?php echo $surat->NIM ; ?></td>
			</tr>
			
			<tr>
				<td>Tempat, Tanggal Lahir : </td>
				<td><?php echo $surat->TempatLahir ; ?>, <?php echo $tanggallahir_mhs ; ?></td>
			</tr>
			
			<tr>
				<td>Email : </td>
				<td><?php echo $surat->Email ; ?></td>
			</tr>

			<tr>
				<td>No HP : </td>
				<td><?php echo $surat->hp ; ?></td>
			</tr>
			
			<tr>
				<td>Tahun Terdaftar : </td>
				<td><?php echo $surat->TahunMasuk ; ?></td>
			</tr>
			
			<tr>
				<td>Jenjang Studi : </td>
				<td><?php echo $surat->JenjangStudi ; ?></td>
			</tr>

			<tr>
				<td>Fakultas : </td>
				<td><?php echo $surat->Fakultas ; ?></td>
			</tr>

			<tr>
				<td>Prodi : </td>
				<td><?php echo $surat->Prodi ; ?></td>
			</tr>
			
				<tr id="datalainnya1" hidden>
					<td>Jenis Kelamin : </td>
					<td><?php echo $surat->JenisKelamin ; ?></td>
				</tr>

				<tr id="datalainnya2" hidden>
					<td>Agama : </td>
					<td><?php echo $surat->Agama ; ?></td>
				</tr>
				
				<tr id="datalainnya3" hidden>
					<td>Alamat : </td>
					<td><?php echo $surat->Alamat ; ?></td>
				</tr>
				
				<tr id="datalainnya4" hidden>
					<td>Kewarganegaraan : </td>
					<td><?php echo $surat->Kewarganegaraan ; ?></td>
				</tr>
				
				<tr id="datalainnya5" hidden>
					<td>Nama Ayah : </td>
					<td><?php echo $surat->NamaAyah ; ?></td>
				</tr>
				
				<tr id="datalainnya6" hidden>
					<td>Nama Ibu : </td>
					<td><?php echo $surat->NamaIbu ; ?></td>
				</tr>
				
				<tr id="datalainnya7" hidden>
					<td>Alamat Orang Tua : </td>
					<td><?php echo $surat->AlamatOrtu ; ?></td>
				</tr>
			
			<tr id="tabeltombolnya">
				<td colspan="2" align="center"><a class="btn bg-orange" id="tombolnya" href="#datalainnya1"><i class="glyphicon glyphicon-chevron-down"></i></a></td>
			</tr>
			
			<tr id="tabeltombolnyatutup" hidden>
				<td colspan="2" align="center"><a class="btn bg-purple" id="tombolnyatutup" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a></td>
			</tr>

			
			
			</table>
			</div>

			<div class="col-md-6">
			<table class="table table-bordered">
			<tr>
				<td colspan="2" align="center"><h4><b>FORM</b></h4></td>
			</tr>
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
			  </div>





				<br>


              </div>
              <!-- /.box-body -->


              <div class="box-footer">
				<a href="<?php echo base_url() ;?>index.php/TU/suratmahasiswa" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>

<?php
$status=$surat->status_surat;
if($status=="pending"){
?>

				<a data-toggle="modal" data-target="#tolaksurat<?php echo $surat->id_surat_mhs ;?>" title="Hapus" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Tolak</a>

				<a data-toggle="modal" data-target="#terimasurat<?php echo $surat->id_surat_mhs ;?>" title="Kirim" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Terima</a>
<?php }?>



<?php if($status=="approved"){ ?>
	<div class="pull-right">
		<button onclick="window.open('<?php echo base_url(); ?>index.php/TU/preview_suratmhs<?php if($surat->bahasa == "inggris")echo"_inggris" ;?>/<?php echo $surat->id_surat_mhs ;?>?print=yes','popUpWindow','height=650,width=800,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print</button>
	</div>
<?php }?>






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

<script>

$(document).ready(function(){
	
  $("#tombolnya").click(function(){
    $('#datalainnya1').show(1000);
	$('#datalainnya2').show(1000);
	$('#datalainnya3').show(1000);
	$('#datalainnya4').show(1000);
	$('#datalainnya5').show(1000);
	$('#datalainnya6').show(1000);
	$('#datalainnya7').show(1000);
	$('#tabeltombolnya').hide(100);
	$('#tabeltombolnyatutup').show(100);
  });
  
  $("#tombolnyatutup").click(function(){
    $('#datalainnya1').hide(500);
	$('#datalainnya2').hide(500);
	$('#datalainnya3').hide(500);
	$('#datalainnya4').hide(500);
	$('#datalainnya5').hide(500);
	$('#datalainnya6').hide(500);
	$('#datalainnya7').hide(500);
	$('#tabeltombolnyatutup').hide(100);
	$('#tabeltombolnya').show(100);
  });
  
});

</script>