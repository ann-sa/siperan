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
						Cara kerja
					</span>

					<?php echo $namaweb; ?> terdapat di 15 fakultas di Universitas Sumatera Utara. Tiap-tiap fakultas memiliki 1 akun Staff TU yang berbeda dari fakultas lainnya.
					Surat-surat yang terdapat di <?php echo $namaweb; ?> terpisah berdasarkan fakultasnya. Staff TU suatu fakultas hanya bisa mengatur surat-surat di fakultasnya,
					tidak diberikan akses untuk mengatur surat-surat dari fakultas lain.


					<br><br>
					<center>
					<a href="<?php echo base_url(); ?>index.php/utama/tentang/<?php echo $siapa; ?>">About</a> |
					<a href="<?php echo base_url(); ?>index.php/utama/<?php echo $siapa; ?>">Kembali</a>
					</center>

			</div>

</body>
</html>
