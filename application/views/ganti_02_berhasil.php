<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach($data_user AS $akun){
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>


	
	
			<div class="col-md-4 wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			
				Email berhasil diganti. :D<br>
				Email Anda sekarang adalah:<br>
				<?php echo $akun->Email; ?><br>
				<div class="container-login100-form-btn">
					<a class="login100-form-btn" href="<?php echo base_url(); ?>">
						Lanjutkan
					</a>
				</div>
				
			</div>
		

		
</body>
</html>
<?php } ?>