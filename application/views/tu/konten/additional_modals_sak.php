<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- START Modal Tolak Surat -->
<div class="modal fade" id="tolaksak<?php echo $sak->id_surat_aktif ;?>">
  <div class="modal-dialog modal-m">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Tolak Surat</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin menolak permintaan surat ini?<br>Tindakan ini tidak dapat dibatalkan!</p>

		<form action="<?php echo base_url(); ?>index.php/TU/sak/rejected" method="POST">
			<input type="hidden" name="id" value="<?php echo $sak->id_surat_aktif ;?>">
			<textarea name="keterangan" placeholder="Tambahkan keterangan" cols=50 rows=5></textarea><br><br>
			<button type="submit" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-remove"></i> Tolak Surat</button>
		</form>

		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Tolak Surat -->

<!-- START Modal Terima Surat -->
<div class="modal fade" id="terimasak<?php echo $sak->id_surat_aktif ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Terima Surat</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin menerima permintaan surat ini?<br>Tindakan ini tidak dapat dibatalkan!</p>

		<form action="<?php echo base_url(); ?>index.php/TU/sak/approved" method="POST">
			<input type="hidden" name="id" value="<?php echo $sak->id_surat_aktif ;?>">
        <p>Masukkan pihak yang menandatangani surat</p>
        <select class="form-control" name="atasnama">
          <?php foreach ($atasnama as $an) { ?>
           <option value="<?php echo $an->id; ?>"><?php echo $an->jabatan; ?></option>
        <?php } ?>
         </select>
         <br>
			<button type="submit" class="btn btn-block btn-primary"><i class="glyphicon glyphicon-ok"></i> Terima Surat</button>
		</form>


		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Terima Surat -->

<!-- START Modal Print Surat -->
<div class="modal fade" id="atasnamasak<?php echo $sak->id_surat_aktif ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Atas Nama</h4>
	  </div>
	  <div class="modal-body">

		<form action="<?php echo base_url(); ?>index.php/TU/editatasnamasak/<?php echo $sak->id_surat_aktif ;?>" method="POST">
      <p>Masukkan pihak yang menandatangani surat</p>
      <select class="form-control" name="atasnama">
        <?php foreach ($atasnama as $an) { ?>
         <option value="<?php echo $an->id; ?>"><?php echo $an->jabatan; ?></option>
      <?php } ?>
       </select>
       <br>
			<button type="submit" class="btn btn-block btn-danger">Masukkan</button>
		</form>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Print Surat -->
