<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>


	
	
			<div class="col-md-4 wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			
				<form class="login100-form validate-form" method="POST" action="<?php echo base_url(); ?>index.php/email/input2">
					<span class="login100-form-title p-b-49">
						Masukkan Email
					</span>
					<?php echo (isset($pesan))? "<div class='alert alert-danger'>$pesan</div>" : ""; ?>
					

					<div class="wrap-input100">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" placeholder="Email" name="email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<br>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Lanjutkan
						</button>
					</div>
				</form>
			</div>
		

</body>
</html>