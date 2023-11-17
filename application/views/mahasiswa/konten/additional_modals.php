<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- START Modal Hapus Surat -->
<div class="modal fade" id="hapussak<?php echo $sak->id_surat_aktif ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Hapus Surat</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin menghapus surat ini?<br>Tindakan ini tidak dapat dibatalkan!</p>
		<a href="<?php echo base_url(); ?>index.php/mahasiswa/hapussak/<?php echo $sak->id_surat_aktif ;?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Hapus Surat -->

<!-- START Modal Kirim Surat -->
<div class="modal fade" id="kirimsak<?php echo $sak->id_surat_aktif ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Kirim Permintaan Surat</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin mengirim permintaan surat kepada TU?<br>Tindakan ini tidak dapat dibatalkan!</p>
		<a href="<?php echo base_url(); ?>index.php/mahasiswa/kirimsak/<?php echo $sak->id_surat_aktif ;?>" class="btn btn-block btn-primary"><i class="fa fa-send"></i> Kirim</a>
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Kirim Surat -->
