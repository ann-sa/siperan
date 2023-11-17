<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach($layout_mhs_pilih AS $layout)
{
	
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pre-Editor Layout Surat Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/tu"><i class="fa fa-home"></i> Awal</a></li>
        <li class="active"><i class="fa fa-edit"></i> Pre-Editor Layout Surat Mahasiswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

	<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="rowx">
        <!-- left column -->
        <div class="row">
          <!-- general form elements -->


		  <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Silahkan pilih sub-form yang harus diisi oleh Mahasiswa</h3>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
				<div class="box-body pad">
				  
				  
				  
				  
				<form action="<?php echo base_url(); ?>index.php/TU/simpan_pre_layout_mhs/<?php echo $layout->id_layout_mhs; ?>" method="POST">
					<table class="table table-bordered">
					
						<tr>
							<th>No</th>
							<th>Tipe Sub-form</th>
							<th>Judul</th>
							<th>Penjelasan</th>
						</tr>
						
						
						<tr><th>1</th>
							<td>
								<select name="borang1status" class="form-control">
									<option value="off" <?php if($layout->borang1status == "off")echo"selected" ;?>>Tidak aktif</option>
									<option value="text" <?php if($layout->borang1status == "text")echo"selected" ;?>>Isi teks</option>
									<option value="file" <?php if($layout->borang1status == "file")echo"selected" ;?>>Upload file</option>
								</select>
							</td>
							<td>
								<input type="text" name="borang1judul" class="form-control" placeholder="Ketik Judul" value="<?php echo $layout->borang1judul ;?>">
							</td>
							<td>
								<textarea name="borang1desc" class="form-control" placeholder="Ketik Penjelasan Disini"><?php echo $layout->borang1desc ;?></textarea>
							</td>
						</tr>
						
						<tr><th>2</th>
							<td>
								<select name="borang2status" class="form-control">
									<option value="off" <?php if($layout->borang2status == "off")echo"selected" ;?>>Tidak aktif</option>
									<option value="text" <?php if($layout->borang2status == "text")echo"selected" ;?>>Isi teks</option>
									<option value="file" <?php if($layout->borang2status == "file")echo"selected" ;?>>Upload file</option>
								</select>
							</td>
							<td>
								<input type="text" name="borang2judul" class="form-control" placeholder="Ketik Judul" value="<?php echo $layout->borang2judul ;?>">
							</td>
							<td>
								<textarea name="borang2desc" class="form-control" placeholder="Ketik Penjelasan Disini"><?php echo $layout->borang2desc ;?></textarea>
							</td>
						</tr>
						
						<tr><th>3</th>
							<td>
								<select name="borang3status" class="form-control">
									<option value="off" <?php if($layout->borang3status == "off")echo"selected" ;?>>Tidak aktif</option>
									<option value="text" <?php if($layout->borang3status == "text")echo"selected" ;?>>Isi teks</option>
									<option value="file" <?php if($layout->borang3status == "file")echo"selected" ;?>>Upload file</option>
								</select>
							</td>
							<td>
								<input type="text" name="borang3judul" class="form-control" placeholder="Ketik Judul" value="<?php echo $layout->borang3judul ;?>">
							</td>
							<td>
								<textarea name="borang3desc" class="form-control" placeholder="Ketik Penjelasan Disini"><?php echo $layout->borang3desc ;?></textarea>
							</td>
						</tr>
						
						<tr><th>4</th>
							<td>
								<select name="borang4status" class="form-control">
									<option value="off" <?php if($layout->borang4status == "off")echo"selected" ;?>>Tidak aktif</option>
									<option value="text" <?php if($layout->borang4status == "text")echo"selected" ;?>>Isi teks</option>
									<option value="file" <?php if($layout->borang4status == "file")echo"selected" ;?>>Upload file</option>
								</select>
							</td>
							<td>
								<input type="text" name="borang4judul" class="form-control" placeholder="Ketik Judul" value="<?php echo $layout->borang4judul ;?>">
							</td>
							<td>
								<textarea name="borang4desc" class="form-control" placeholder="Ketik Penjelasan Disini"><?php echo $layout->borang4desc ;?></textarea>
							</td>
						</tr>
						
						<tr><th>5</th>
							<td>
								<select name="borang5status" class="form-control">
									<option value="off" <?php if($layout->borang5status == "off")echo"selected" ;?>>Tidak aktif</option>
									<option value="text" <?php if($layout->borang5status == "text")echo"selected" ;?>>Isi teks</option>
									<option value="file" <?php if($layout->borang5status == "file")echo"selected" ;?>>Upload file</option>
								</select>
							</td>
							<td>
								<input type="text" name="borang5judul" class="form-control" placeholder="Ketik Judul" value="<?php echo $layout->borang5judul ;?>">
							</td>
							<td>
								<textarea name="borang5desc" class="form-control" placeholder="Ketik Penjelasan Disini"><?php echo $layout->borang5desc ;?></textarea>
							</td>
						</tr>
						
						<tr><th>6</th>
							<td>
								<select name="borang6status" class="form-control">
									<option value="off" <?php if($layout->borang6status == "off")echo"selected" ;?>>Tidak aktif</option>
									<option value="text" <?php if($layout->borang6status == "text")echo"selected" ;?>>Isi teks</option>
									<option value="file" <?php if($layout->borang6status == "file")echo"selected" ;?>>Upload file</option>
								</select>
							</td>
							<td>
								<input type="text" name="borang6judul" class="form-control" placeholder="Ketik Judul" value="<?php echo $layout->borang6judul ;?>">
							</td>
							<td>
								<textarea name="borang6desc" class="form-control" placeholder="Ketik Penjelasan Disini"><?php echo $layout->borang6desc ;?></textarea>
							</td>
						</tr>
						
						<tr><th>7</th>
							<td>
								<select name="borang7status" class="form-control">
									<option value="off" <?php if($layout->borang7status == "off")echo"selected" ;?>>Tidak aktif</option>
									<option value="text" <?php if($layout->borang7status == "text")echo"selected" ;?>>Isi teks</option>
									<option value="file" <?php if($layout->borang7status == "file")echo"selected" ;?>>Upload file</option>
								</select>
							</td>
							<td>
								<input type="text" name="borang7judul" class="form-control" placeholder="Ketik Judul" value="<?php echo $layout->borang7judul ;?>">
							</td>
							<td>
								<textarea name="borang7desc" class="form-control" placeholder="Ketik Penjelasan Disini"><?php echo $layout->borang7desc ;?></textarea>
							</td>
						</tr>
						
						<tr><th>8</th>
							<td>
								<select name="borang8status" class="form-control">
									<option value="off" <?php if($layout->borang8status == "off")echo"selected" ;?>>Tidak aktif</option>
									<option value="text" <?php if($layout->borang8status == "text")echo"selected" ;?>>Isi teks</option>
									<option value="file" <?php if($layout->borang8status == "file")echo"selected" ;?>>Upload file</option>
								</select>
							</td>
							<td>
								<input type="text" name="borang8judul" class="form-control" placeholder="Ketik Judul" value="<?php echo $layout->borang8judul ;?>">
							</td>
							<td>
								<textarea name="borang8desc" class="form-control" placeholder="Ketik Penjelasan Disini"><?php echo $layout->borang8desc ;?></textarea>
							</td>
						</tr>
						
						<tr><th>9</th>
							<td>
								<select name="borang9status" class="form-control">
									<option value="off" <?php if($layout->borang9status == "off")echo"selected" ;?>>Tidak aktif</option>
									<option value="text" <?php if($layout->borang9status == "text")echo"selected" ;?>>Isi teks</option>
									<option value="file" <?php if($layout->borang9status == "file")echo"selected" ;?>>Upload file</option>
								</select>
							</td>
							<td>
								<input type="text" name="borang9judul" class="form-control" placeholder="Ketik Judul" value="<?php echo $layout->borang9judul ;?>">
							</td>
							<td>
								<textarea name="borang9desc" class="form-control" placeholder="Ketik Penjelasan Disini"><?php echo $layout->borang9desc ;?></textarea>
							</td>
						</tr>
						
						<tr><th>10</th>
							<td>
								<select name="borang10status" class="form-control">
									<option value="off" <?php if($layout->borang10status == "off")echo"selected" ;?>>Tidak aktif</option>
									<option value="text" <?php if($layout->borang10status == "text")echo"selected" ;?>>Isi teks</option>
									<option value="file" <?php if($layout->borang10status == "file")echo"selected" ;?>>Upload file</option>
								</select>
							</td>
							<td>
								<input type="text" name="borang10judul" class="form-control" placeholder="Ketik Judul" value="<?php echo $layout->borang10judul ;?>">
							</td>
							<td>
								<textarea name="borang10desc" class="form-control" placeholder="Ketik Penjelasan Disini"><?php echo $layout->borang10desc ;?></textarea>
							</td>
						</tr>
						
						
				  
				  
					</table>
					<br>
					<div class="pull-right">
					<button type="submit" class="btn btn-success">Lanjutkan <i class="glyphicon glyphicon-chevron-right"></i></button>
					</div>
				</form>
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				</div>
              </div>
              <!-- /.box-body -->

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


<?php } ?>
