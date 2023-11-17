<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

			<div class="col-md-4 wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

				<form class="login100-form validate-form" method="POST" action="<?php echo base_url(); ?>index.php/utama/daftar2">
					<span class="login100-form-title p-b-49">
						Daftar Akun
					</span>
					<?php echo (isset($pesan))? "<div class='alert alert-danger'>$pesan</div>" : ""; ?>
					<label>Daftar akun baru menggunakan<br>NIM dan Password Portal USU Anda<br>(khusus Mahasiswa)</label>

					<div class="wrap-input100">
						<span class="label-input100">NIM</span>
						<input class="input100" type="text" placeholder="NIM" name="nim">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" placeholder="Password" name="password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<br>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							DAFTAR
						</button>
					</div>

					<br>
					<center>
					Sudah punya akun?<br>
					<a href="<?php echo base_url(); ?>index.php/utama">
						Masuk
					</a>
					</center>
				</form>
			</div>

</body>
</html>
