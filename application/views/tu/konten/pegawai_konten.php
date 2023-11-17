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
        <li class="active"><i class="fa fa-folder-open"></i> Semua Surat</li>
      </ol>
    </section>

    <?php

      foreach ($pegawai as $an)
          {
        ?>

        <!-- START Modal Hapus Draft Plain -->
        <div class="modal fade" id="hapustu<?php echo $an->NIP;?>">
          <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Hapus Surat Masuk</h4>
            </div>
            <div class="modal-body">
            <p>Anda ingin menghapus Surat Masuk ini?<br>

            Tindakan ini tidak dapat dibatalkan!</p>
            <a href="<?php echo base_url(); ?>index.php/TU/hapussuratmasuk/<?php echo $an->NIP;?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
            <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          </div>
        </div>
      <?php } ?>

    <!-- Main content -->
    <section class="content">

<?php include"additional_info.php"; ?> <!-- FILE INFO POP-UP -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Pegawai TU</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Tindakan</th>
			</tr>
		</thead>
		<tbody>

<?php
$no=1;
  foreach ($pegawai as $an)
  {
?>

<!-- FILE MODALS -->
<?php
include"additional_modals_TU.php";
?>

        <tr>
          <td><?php echo $no ;?></td>
		      <td><?php echo $an->NIP ;?></td>
          <td><?php echo $an->Nama ;?></td>
          <td><?php echo $an->Email ;?></td>
        <td>
          <a data-toggle="modal" data-target="#hapustu<?php echo $an->NIP?>;" title="Hapus Pegawai" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
        </td>
        </tr>

<?php $no++; }?>
        </tbody>
      </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->








	  <div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Tambah Pegawai TU</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
			  </div>
		</div>
		<div class="box-body">




			<div class="box-body pad">
				  <form action="<?php echo base_url(); ?>index.php/TU/simpan_pegawaiTU/" method="POST">
				  <input type="hidden" name="fakultas" value="<?php echo $utama_id_fakultas; ?>">
						<label>NIP :</label>
						<input type="text" name="NIP" placeholder="NIP" class="form-control" required><br>

						<label>Nama :</label>
						<input type="text" name="nama" pattern="[a-zA-Z\s\.,]+" autofocus required oninvalid="this.setCustomValidity('Hanya boleh huruf kapital, huruf kecil, titik, dan koma')" oninput="setCustomValidity('')" placeholder="Nama" class="form-control"><br>

            <label>Email :</label>
            <input type="email" name="email" autofocus required oninvalid="this.setCustomValidity('')" oninput="setCustomValidity('')" placeholder="Nama" class="form-control"><br>

            <label>Password :</label>
            <input type="password" name="password" autofocus required oninvalid="this.setCustomValidity('')" oninput="setCustomValidity('')" placeholder="Nama" class="form-control"><br>

            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
				  </form>
				</div>





		</div>
	</div>








    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
