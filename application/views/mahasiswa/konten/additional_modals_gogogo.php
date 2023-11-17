<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- START Modal Hapus Surat -->
<div class="modal fade" id="hapusmysurat<?php echo $surat->id_surat_mhs ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Hapus Surat</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin menghapus surat ini?<br>Tindakan ini tidak dapat dibatalkan!</p>
		<a href="<?php echo base_url(); ?>index.php/mahasiswa/hapusmysurat/<?php echo $surat->id_surat_mhs ;?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Hapus Surat -->

<!-- START Modal Kirim Surat -->
<div class="modal fade" id="kirimmysurat<?php echo $surat->id_surat_mhs ;?>">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Kirim Permintaan Surat</h4>
	  </div>
	  <div class="modal-body">
		<p>Anda ingin mengirim permintaan surat kepada TU?<br>Tindakan ini tidak dapat dibatalkan!</p>
		<a href="<?php echo base_url(); ?>index.php/mahasiswa/kirimmysurat/<?php echo $surat->id_surat_mhs ;?>" class="btn btn-block btn-primary"><i class="fa fa-send"></i> Kirim</a>
		<button type="button" class="btn btn-block btn-default" data-dismiss="modal">Tutup</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Kirim Surat -->
