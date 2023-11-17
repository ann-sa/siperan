<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Buat Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa"><i class="fa fa-home"></i> Awal</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/mahasiswa/buat"><i class="glyphicon glyphicon-pencil"></i> Buat Surat</a></li>
        <li class="active"><i class="fa fa-envelope"></i> Buat Surat Aktif Kuliah</li>
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
// var_dump($data_user);
	foreach ($data_user as $pengguna)
	{
    // var_dump($pengguna);
    $nim = $pengguna->NIM;
    $arr_nim = str_split($nim);
    $tahun_now = date('Y');
    $arr_thn = str_split($tahun_now);
    $tahun_msk = $arr_thn[0].$arr_thn[1].$arr_nim[0].$arr_nim[1];
    $tahun = $tahun_now - $tahun_msk;
    $month = date('m');
    $semester = 1;
    for ($i=$tahun; $i >= 1; $i--) {
      if ($i > 1) {
        $semester +=2;
      }
      else if ($i == 1 && $month > 6) {
        $semester +=2;
      }
      else {
        $semester ++;
      }
    }

?>
            <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/mahasiswa/sak2/simpan" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Mahasiswa</label><br>
                  <input type="text" class="form-control" name="nama" value="<?php echo $pengguna->Nama ;?>"readonly>
                </div>
				<div class="form-group">
                  <label>NIM</label><br>
                  <input type="number" class="form-control" name="nim" value="<?php echo $pengguna->NIM ;?>"readonly>
                </div>
				<div class="form-group">
                  <label>Tempat, Tanggal Lahir</label><br>
                  <input type="text" class="form-control" name="ttl" value="<?php echo $pengguna->TempatLahir ;?>, <?php echo $pengguna->TanggalLahir ;?>"readonly>
                </div>
				<div class="form-group">
                  <label>Prodi</label><br>
                  <input type="text" class="form-control" name="prodi" value="<?php echo $pengguna->Prodi ;?>"readonly>
                </div>
				<div class="form-group">
                  <label>Fakultas</label><br>
                  <input type="text" class="form-control" name="fakultas" value="<?php echo $pengguna->Fakultas ;?>" readonly>
                </div>
				<div class="form-group">
                  <label>Semester</label><br>
                  <input type="numbet" class="form-control" name="semester" value="<?php echo $semester; ?>"readonly>
                </div>
                <div class="form-group">
                          <label><span style="color:red;font-size:12px;">*</span>Alamat</label><br>
                          <input type="text" placeholder="Alamat" autofocus required oninvalid="this.setCustomValidity('masukkan Alamat anda')" oninput="setCustomValidity('')" class="form-control" name="alamat">
                        </div>
        				<div class="form-group">
                          <label><span style="color:red;font-size:12px;">*</span>Nama Orang Tua</label><br>
                          <input type="text" placeholder="Nama Orang Tua" pattern="[a-zA-Z]*$+" autofocus required oninvalid="this.setCustomValidity('Hanya bisa a-z A-Z')" oninput="setCustomValidity('')" class="form-control" name="namaayah">
                        </div>
                <div class="form-group">
                          <label><span style="color:red;font-size:12px;">*</span>Alamat Orang Tua</label><br>
                          <input type="text" placeholder="Alamat Orang Tua"  autofocus required oninvalid="this.setCustomValidity('masukkan Alamat Orang Tua anda')" oninput="setCustomValidity('')" class="form-control" name="alamatortu">
                        </div>
                <div class="form-group">
                          <label>Tahun Masuk</label><br>
                          <input type="number" class="form-control" name="tahunmasuk" value="<?php echo $pengguna->TahunMasuk ?>" readonly>
                        </div>
                <div class="form-group">
                          <label><span style="color:red;font-size:12px;">*</span>Rencana Tamat</label><br>
                          <input type="number" placeholder="Ketik Rencana Tamat Anda disini" min="2018" autofocus required oninvalid="this.setCustomValidity('masukkan tahun minimal tahun 2018')" oninput="setCustomValidity('')" class="form-control" name="rencanatamat">
                        </div>
                <div class="form-group">
                          <label><span style="color:red;font-size:12px;">*</span>IPS</label><br>
                          <input type="number" placeholder="Ketik IPS Anda disini" step="0.01" min="0" max="4" required oninvalid="this.setCustomValidity('penulisan ips hanya bisa diisi dengan rentang 0-4')" oninput="setCustomValidity('')" class="form-control" name="ips">
                          <p style="color:red;font-size:12px;">format IPS 0.01-4.00</p>
                      </div>
                <div class="form-group">
                          <label><span style="color:red;font-size:12px;">*</span>IPK</label><br>
                          <input type="number" placeholder="Ketik IPK Anda disini" step="0.01" min="0" max="4" required oninvalid="this.setCustomValidity('penulisan ipk hanya bisa diisi dengan rentang 0-4')" oninput="setCustomValidity('')"  class="form-control" name="ipk">
                          <p style="color:red;font-size:12px;">format IPK 0.01-4.00</p>
                        </div>
                <div class="form-group">
                          <label><span style="color:red;font-size:12px;">*</span>Keperluan</label>
                          <input type="text" placeholder="Keperluan" min="2018" autofocus required oninvalid="this.setCustomValidity('masukkan Keperluan anda')" oninput="setCustomValidity('')" class="form-control" name="keperluan">
                </div>
                <div class="form-group">
                          <label><span style="color:red;font-size:12px;">*</span>Scan KTM</label>
                          <input type="file" name="ktm">
                          <p class="help-block">Upload file scan KTM anda.</p>
                </div>
        				<div class="form-group">
                          <label><span style="color:red;font-size:12px;">*</span>Scan Billing Statement</label>
                          <input type="file" name="bs">
                          <p class="help-block">Upload file scan Billing Statement anda.</p>
                        </div>
                        <br>
                        <p style="font-size:15px"><b>Ket : </b>(<span style="color:red;">*</span>)<b> form tidak boleh kosong </b></p>
                      </div>
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
