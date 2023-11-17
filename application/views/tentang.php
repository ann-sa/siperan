<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

			<div class="col-md-4 wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

					<span class="login100-form-title p-b-49">
						Tentang<br><?php echo $namaweb; ?>
					</span>
					
					<p align="justify">

					<?php echo $namaweb; ?> adalah sistem administrasi persuratan terpadu untuk Mahasiswa / Mahasiswi dan Staff Tata Usaha di Universitas Sumatera Utara.
					<?php echo $namaweb; ?> memungkinkan kegiatan administrasi persuratan yang lebih mudah, efektif, dan efisien meliputi pembuatan, pengelolaan, pencarian dan pengarsipan surat.
					
					</p>
					<br>
					<p align="justify">
					
					<?php echo $namaweb; ?> terdapat di 15 fakultas di Universitas Sumatera Utara. Tiap-tiap fakultas memiliki akun Staff TU yang berbeda dari fakultas lainnya.
					Ada 2 tipe akun Staff TU untuk tiap fakultas dan memiliki hak akses yang berbeda sesuai tingkatan akunnya.
					Surat-surat yang terdapat di <?php echo $namaweb; ?> terpisah berdasarkan fakultasnya. Staff TU suatu fakultas hanya bisa mengatur surat-surat di fakultasnya,
					tidak diberikan akses untuk mengatur surat-surat dari fakultas lain.
					
					</p>
					
					<br>
					
					<center>
					<a target="new" href="<?php echo base_url(); ?>index.php/utama/pembuat">Dibalik <?php echo $namaweb; ?></a><br>
					<a href="<?php echo base_url(); ?>index.php/utama/<?php echo $siapa; ?>">Kembali</a>
					</center>

			</div>

</body>
</html>
