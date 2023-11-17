<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

	
	
	
			<div class="col-md-4 wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			
				<form class="login100-form validate-form" method="POST" action="<?php echo base_url(); ?>index.php/utama/lupa4/">
					<span class="login100-form-title p-b-49">
						Ganti Password
					</span>
					<?php echo (isset($pesan))? "<div class='alert alert-danger'>$pesan</div>" : ""; ?>
					
					
					<div class="wrap-input100">
						<span class="label-input100">Ketik Password Baru</span>
						<input type="hidden" name="kode_pulih" value="<?php echo $kode_pulih ;?>">
						<input class="input100" type="password" placeholder="Password Baru" name="password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<br>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Ganti Password
						</button>
					</div>
				</form>
			</div>
		

</body>
</html>