<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- START Modal Hapus Surat -->
<div class="modal fade" id="hapusTU<?php echo $an->NIP ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Hapus Pegawai TU</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin menghapus Pegawai TU ini?<br>Tindakan ini tidak dapat dibatalkan!</p>
		<a href="<?php echo base_url(); ?>index.php/TU/hapusTU/<?php echo $an->NIP ;?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Hapus Surat -->