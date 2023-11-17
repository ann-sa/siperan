<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/mahasiswa/buat"><i class="glyphicon glyphicon-pencil"></i> Buat Surat</a></li>
        <li class="active"><i class="fa fa-envelope"></i> Edit Surat Aktif Kuliah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Aktif Kuliah</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
            	foreach ($surat_aktif_kuliah as $sak)
            	{

            ?>
                  <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/mahasiswa/sak2/<?php echo $sak->id_surat_aktif ;?>" enctype="multipart/form-data">
                          <div class="box-body">
                            <div class="form-group">
                              <label>Nama Mahasiswa</label><br>
                              <input type="text" class="form-control" name="nama" value="<?php echo $sak->Nama ;?>"readonly>
                            </div>
            				<div class="form-group">
                              <label>NIM</label><br>
                              <input type="number" class="form-control" name="nim" value="<?php echo $sak->NIM ;?>"readonly>
                            </div>
            				<div class="form-group">
                              <label>Tempat, Tanggal Lahir</label><br>
                              <input type="text" class="form-control" name="ttl" value="<?php echo $sak->TempatLahir ;?>, <?php echo $sak->TanggalLahir ;?>"readonly>
                            </div>
            				<div class="form-group">
                              <label>Prodi</label><br>
                              <input type="text" class="form-control" name="prodi" value="<?php echo $sak->Prodi ;?>"readonly>
                            </div>
            				<div class="form-group">
                              <label>Fakultas</label><br>
                              <input type="text" class="form-control" name="fakultas" value="<?php echo $sak->Fakultas ;?>" readonly>
                            </div>
            				<div class="form-group">
                              <label>Semester</label><br>
                              <input type="number" class="form-control" name="semester" value="<?php echo $sak->Semester; ?>"readonly>
                            </div>
            				<div class="form-group">
                              <label><span style="color:red;font-size:12px;">*</span>Alamat</label><br>
                              <textarea class="form-control" name="alamat"><?php echo $sak->Alamat ;?></textarea>
                            </div>
            				<div class="form-group">
                              <label><span style="color:red;font-size:12px;">*</span>Nama Orang Tua</label><br>
                              <input type="text" class="form-control" name="namaayah" value="<?php echo $sak->NamaAyah ;?>">
                            </div>
                    <div class="form-group">
                              <label><span style="color:red;font-size:12px;">*</span>Alamat Orang Tua</label><br>
                              <textarea class="form-control" name="alamatortu"><?php echo $sak->Alamat ;?></textarea>
                            </div>
                    <div class="form-group">
                    <div class="form-group">
                              <label>Tahun Masuk</label><br>
                              <input type="number" class="form-control" name="tahunmasuk" value="<?php echo $sak->TahunMasuk;?>"readonly>
                            </div>
                    <div class="form-group">
                              <label><span style="color:red;font-size:12px;">*</span>Rencana Tamat</label><br>
                              <input type="number" class="form-control" name="rencanatamat" value="<?php echo $sak->RencanaTamat;?>">
                            </div>
                    <div class="form-group">
                              <label><span style="color:red;font-size:12px;">*</span>IPS</label><br>
                              <input type="number" name="ips" class="form-control" value="<?php echo $sak->IPS;?>" step="0.01" min="0" max="4">
                          </div>
                    <div class="form-group">
                              <label><span style="color:red;font-size:12px;">*</span>IPK</label><br>
                                <input type="number" name="ipk" class="form-control" value="<?php echo $sak->IPK;?>" step="0.01" min="0" max="4">
                            </div>
                    <div class="form-group">
                              <label><span style="color:red;font-size:12px;">*</span>Keperluan</label>
                              <textarea class="form-control" name="keperluan"><?php echo $sak->Keperluan; ?></textarea>
                    </div>
                    <div class="form-group">
                      <a href="<?php echo base_url(); ?>assets/file/mahasiswa/scan/<?php echo $sak->Scan_KTM ;?>" target="new" title="Lihat Gambar">
            					<img src="<?php echo base_url(); ?>assets/file/mahasiswa/scan/<?php echo $sak->Scan_KTM ;?>" width="200px" class="img-responsive">
            				  </a>
                              <label>Scan KTM</label>
                              <input type="file" name="ktm">
                              <p class="help-block">Upload file scan KTM anda.</p>
                    </div>
                    <a href="<?php echo base_url(); ?>assets/file/mahasiswa/scan/<?php echo $sak->Scan_KTM ;?>" target="new" title="Lihat Gambar">
                    <img src="<?php echo base_url(); ?>assets/file/mahasiswa/scan/<?php echo $sak->Scan_KTM ;?>" width="200px" class="img-responsive">
                    </a>
            				<div class="form-group">
                              <label>Scan Billing Statement</label>
                              <input type="file" name="bs">
                              <p class="help-block">Upload file scan Billing Statement anda.</p>
                            </div>
                          </div>
                          <br>
                          <p style="font-size:15px"><b>Ket : </b>(<span style="color:red;">*</span>)<b> form tidak boleh kosong </b></p>
                          <!-- /.box-body -->

                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
                          </div>
                        </form>
            <?php }?>
                      </div>
                    </div>
                    <!--/.col (right) -->
                  </div>
                  <!-- /.row -->
                </section>
                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->
