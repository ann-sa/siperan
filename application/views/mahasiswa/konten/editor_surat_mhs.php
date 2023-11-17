<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
  foreach ($surat_flex_mhs as $surat)
  {
    ?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editor Surat Mahasiwa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editor Surat Mahasiwa</li>
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

  
            <form enctype="multipart/form-data" role="form"  method="POST" action="<?php echo base_url(); ?>index.php/mahasiswa/simpan_surat_mhs/<?php echo $surat->id_surat_mhs ;?>">
              <div class="col-md-8 box-body">
                
				
                
				
				
				
			<table class="table table-bordered">
			
			<tr>
				<td>Bahasa pada surat : </td>
				<td>
					<input type="radio" name="bahasa" value="indonesia" <?php if($surat->bahasa == "indonesia") echo"checked"; ?>>
					<img src="<?php echo base_url().'assets/file/flag_icon/indonesia.png'; ?>" width="40"> Bahasa Indonesia
					<br><br>
					<input type="radio" name="bahasa" value="inggris" <?php if($surat->bahasa == "inggris") echo"checked"; ?>>
					<img src="<?php echo base_url().'assets/file/flag_icon/inggris.png'; ?>" width="40"> Bahasa Inggris
				</td>
			</tr>
			
			
<!-- START MENGIDENTIFIKASI SELURUH ISI FORM -->		
			
			
			
			
			
			
			
			<!-- borang1 -->
			<?php if($surat->borang1status=="text"){?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang1judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang1desc ;?></p></td>
				<tr>
					<td>
						<input type="text" class="form-control" name="borang1" value="<?php echo $surat->borang1 ;?>" placeholder="<?php echo $surat->borang1judul ;?>">
					</td>
				</tr>
                </tr>
			<?php } else if($surat->borang1status=="file"){ ?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang1judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang1desc ;?></p></td>
				<tr>
					<td>
					<?php if($surat->borang1==""){ ?>
						<input type="file" name="borang1" class="form-control">
						<p class="help-block">Ukuran file max 8 MB.</p>
						<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX, TXT, CDR, AI, PSD.</p>
					<?php } else{ ?>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang1 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang1 ;?>
						</a>
					<?php }?>
					</td>
				</tr>
                </tr>
			<?php } ?>
			
			
			<!-- borang2 -->
			<?php if($surat->borang2status=="text"){?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang2judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang2desc ;?></p></td>
				<tr>
					<td>
						<input type="text" class="form-control" name="borang2" value="<?php echo $surat->borang2 ;?>" placeholder="<?php echo $surat->borang2judul ;?>">
					</td>
				</tr>
                </tr>
			<?php } else if($surat->borang2status=="file"){ ?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang2judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang2desc ;?></p></td>
				<tr>
					<td>
					<?php if($surat->borang2==""){ ?>
						<input type="file" name="borang2" class="form-control">
						<p class="help-block">Ukuran file max 8 MB.</p>
						<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX, TXT, CDR, AI, PSD.</p>
					<?php } else{ ?>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang2 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang2 ;?>
						</a>
					<?php }?>
					</td>
				</tr>
                </tr>
			<?php } ?>
			
			
			<!-- borang3 -->
			<?php if($surat->borang3status=="text"){?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang3judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang3desc ;?></p></td>
				<tr>
					<td>
						<input type="text" class="form-control" name="borang3" value="<?php echo $surat->borang3 ;?>" placeholder="<?php echo $surat->borang3judul ;?>">
					</td>
				</tr>
                </tr>
			<?php } else if($surat->borang3status=="file"){ ?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang3judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang3desc ;?></p></td>
				<tr>
					<td>
					<?php if($surat->borang3==""){ ?>
						<input type="file" name="borang3" class="form-control">
						<p class="help-block">Ukuran file max 8 MB.</p>
						<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX, TXT, CDR, AI, PSD.</p>
					<?php } else{ ?>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang3 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang3 ;?>
						</a>
					<?php }?>
					</td>
				</tr>
                </tr>
			<?php } ?>
			
			
			<!-- borang4 -->
			<?php if($surat->borang4status=="text"){?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang4judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang4desc ;?></p></td>
				<tr>
					<td>
						<input type="text" class="form-control" name="borang4" value="<?php echo $surat->borang4 ;?>" placeholder="<?php echo $surat->borang4judul ;?>">
					</td>
				</tr>
                </tr>
			<?php } else if($surat->borang4status=="file"){ ?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang4judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang4desc ;?></p></td>
				<tr>
					<td>
					<?php if($surat->borang4==""){ ?>
						<input type="file" name="borang4" class="form-control">
						<p class="help-block">Ukuran file max 8 MB.</p>
						<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX, TXT, CDR, AI, PSD.</p>
					<?php } else{ ?>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang4 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang4 ;?>
						</a>
					<?php }?>
					</td>
				</tr>
                </tr>
			<?php } ?>
			
			
			<!-- borang5 -->
			<?php if($surat->borang5status=="text"){?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang5judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang5desc ;?></p></td>
				<tr>
					<td>
						<input type="text" class="form-control" name="borang5" value="<?php echo $surat->borang5 ;?>" placeholder="<?php echo $surat->borang5judul ;?>">
					</td>
				</tr>
                </tr>
			<?php } else if($surat->borang5status=="file"){ ?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang5judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang5desc ;?></p></td>
				<tr>
					<td>
					<?php if($surat->borang5==""){ ?>
						<input type="file" name="borang5" class="form-control">
						<p class="help-block">Ukuran file max 8 MB.</p>
						<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX, TXT, CDR, AI, PSD.</p>
					<?php } else{ ?>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang5 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang5 ;?>
						</a>
					<?php }?>
					</td>
				</tr>
                </tr>
			<?php } ?>
			
			
			<!-- borang6 -->
			<?php if($surat->borang6status=="text"){?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang6judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang6desc ;?></p></td>
				<tr>
					<td>
						<input type="text" class="form-control" name="borang6" value="<?php echo $surat->borang6 ;?>" placeholder="<?php echo $surat->borang6judul ;?>">
					</td>
				</tr>
                </tr>
			<?php } else if($surat->borang6status=="file"){ ?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang6judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang6desc ;?></p></td>
				<tr>
					<td>
					<?php if($surat->borang6==""){ ?>
						<input type="file" name="borang6" class="form-control">
						<p class="help-block">Ukuran file max 8 MB.</p>
						<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX, TXT, CDR, AI, PSD.</p>
					<?php } else{ ?>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang6 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang6 ;?>
						</a>
					<?php }?>
					</td>
				</tr>
                </tr>
			<?php } ?>
			
			
			<!-- borang7 -->
			<?php if($surat->borang7status=="text"){?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang7judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang7desc ;?></p></td>
				<tr>
					<td>
						<input type="text" class="form-control" name="borang7" value="<?php echo $surat->borang7 ;?>" placeholder="<?php echo $surat->borang7judul ;?>">
					</td>
				</tr>
                </tr>
			<?php } else if($surat->borang7status=="file"){ ?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang7judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang7desc ;?></p></td>
				<tr>
					<td>
					<?php if($surat->borang7==""){ ?>
						<input type="file" name="borang7" class="form-control">
						<p class="help-block">Ukuran file max 8 MB.</p>
						<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX, TXT, CDR, AI, PSD.</p>
					<?php } else{ ?>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang7 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang7 ;?>
						</a>
					<?php }?>
					</td>
				</tr>
                </tr>
			<?php } ?>
			
			
			<!-- borang8 -->
			<?php if($surat->borang8status=="text"){?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang8judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang8desc ;?></p></td>
				<tr>
					<td>
						<input type="text" class="form-control" name="borang8" value="<?php echo $surat->borang8 ;?>" placeholder="<?php echo $surat->borang8judul ;?>">
					</td>
				</tr>
                </tr>
			<?php } else if($surat->borang8status=="file"){ ?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang8judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang8desc ;?></p></td>
				<tr>
					<td>
					<?php if($surat->borang8==""){ ?>
						<input type="file" name="borang8" class="form-control">
						<p class="help-block">Ukuran file max 8 MB.</p>
						<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX, TXT, CDR, AI, PSD.</p>
					<?php } else{ ?>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang8 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang8 ;?>
						</a>
					<?php }?>
					</td>
				</tr>
                </tr>
			<?php } ?>
			
			
			<!-- borang9 -->
			<?php if($surat->borang9status=="text"){?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang9judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang9desc ;?></p></td>
				<tr>
					<td>
						<input type="text" class="form-control" name="borang9" value="<?php echo $surat->borang9 ;?>" placeholder="<?php echo $surat->borang9judul ;?>">
					</td>
				</tr>
                </tr>
			<?php } else if($surat->borang9status=="file"){ ?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang9judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang9desc ;?></p></td>
				<tr>
					<td>
					<?php if($surat->borang9==""){ ?>
						<input type="file" name="borang9" class="form-control">
						<p class="help-block">Ukuran file max 8 MB.</p>
						<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX, TXT, CDR, AI, PSD.</p>
					<?php } else{ ?>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang9 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang9 ;?>
						</a>
					<?php }?>
					</td>
				</tr>
                </tr>
			<?php } ?>
			
			
			<!-- borang10 -->
			<?php if($surat->borang10status=="text"){?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang10judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang10desc ;?></p></td>
				<tr>
					<td>
						<input type="text" class="form-control" name="borang10" value="<?php echo $surat->borang10 ;?>" placeholder="<?php echo $surat->borang10judul ;?>">
					</td>
				</tr>
                </tr>
			<?php } else if($surat->borang10status=="file"){ ?>
				<tr>
					<td rowspan="2"><?php echo $surat->borang10judul ;?> : </td>
					<td><p class="help-block"><?php echo $surat->borang10desc ;?></p></td>
				<tr>
					<td>
					<?php if($surat->borang10==""){ ?>
						<input type="file" name="borang10" class="form-control">
						<p class="help-block">Ukuran file max 8 MB.</p>
						<p class="help-block">Format file yang diperbolehkan: JPG, JPEG, GIF, PNG, PDF, DOC, DOCX, PPT, PPTX, TXT, CDR, AI, PSD.</p>
					<?php } else{ ?>
						<a class="btn btn-default" target="new" href="<?php echo base_url(); ?>assets/file/mahasiswa/flex/<?php echo $surat->borang10 ;?>">
							<i class="fa fa-file-text-o" style="font-size:25pt"></i><br><?php echo $surat->borang10 ;?>
						</a>
					<?php }?>
					</td>
				</tr>
                </tr>
			<?php } ?>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
<!-- END MENGIDENTIFIKASI SELURUH ISI FORM -->
              </table>
				
				
				
				
				
				<br>
				<input class="btn btn-primary" type="submit" name="aksi" value="Simpan">
				<input class="btn btn-success" type="submit" name="aksi" value="Simpan dan Lanjutkan">
              </div>
              <!-- /.box-body -->


              <div class="box-footer">
                
              </div>
            </form>


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