<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>


			<div class="col-md-4 wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

				<form class="login100-form validate-form" method="POST" action="<?php echo base_url(); ?>index.php/utama/loginTU">
					<span class="login100-form-title p-b-49" style="font-size: 35px">
						Masuk <br>[Admin/Staff TU]
					</span>
					<?php echo (isset($pesan))? "<div class='alert alert-danger'>$pesan</div>" : ""; ?>


					<div class="wrap-input100">
						<span class="label-input100">NIP</span>
						<input class="input100" type="text" placeholder="NIP" name="email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" placeholder="Password" name="password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="text-right p-t-8 p-b-31">
		
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<br>
					<center>
						<a href="<?php echo base_url(); ?>index.php/utama/tentang/indexTU">Tentang</a>
						<br>
						<a href="<?php echo base_url(); ?>index.php/utama/">Kembali ke halaman awal</a>

					</center>

				</form>
			</div>
</body>
</html>
