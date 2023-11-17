<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- START Modal Tolak Surat -->
<div class="modal fade" id="tolaksurat<?php echo $surat->id_surat_mhs ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Tolak Surat</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin menolak permintaan surat ini?<br>Tindakan ini tidak dapat dibatalkan!</p>

		<form action="<?php echo base_url(); ?>index.php/TU/perlakukan_surat_mhs/rejected" method="POST">
			<input type="hidden" name="id_surat_mhs" value="<?php echo $surat->id_surat_mhs ;?>">
			<textarea name="keterangan" placeholder="Tambahkan keterangan" class="form-control"></textarea><br>
			<button type="submit" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-remove"></i> Tolak Surat</button>
		</form>
		<br>
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Tolak Surat -->

<!-- START Modal Terima Surat -->
<div class="modal fade" id="terimasurat<?php echo $surat->id_surat_mhs ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Terima Surat</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin menerima surat ini?<br>Tindakan ini tidak dapat dibatalkan!</p>

		<form action="<?php echo base_url(); ?>index.php/TU/perlakukan_surat_mhs/approved" method="POST">
			<input type="hidden" name="id_surat_mhs" value="<?php echo $surat->id_surat_mhs ;?>">
			<button type="submit" class="btn btn-block btn-success"><i class="glyphicon glyphicon-ok"></i> Terima Surat</button>
		</form>
		<br>
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Terima Surat -->
