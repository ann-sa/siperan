<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach($data_user AS $akun)
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

	
	
			
			<div class="col-md-4 wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			
				<form class="login100-form validate-form" method="POST" action="<?php echo base_url(); ?>index.php/email/verif2">
					<span class="login100-form-title p-b-49">
						Masukkan Kode Verifikasi
					</span>
					<?php echo (isset($pesan))? "<div class='alert alert-danger'>$pesan</div>" : ""; ?>
					
					

					<div class="wrap-input100">
						<input class="input100" type="text" placeholder="Kode verifikasi" name="verif">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<br>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Verifikasi
						</button>
					</div>
				</form>
				<br>
				
				<label>Kami telah mengirim kode verifikasi ke email Anda:<br>
				<?php echo $akun->Email;?><br><br>
				Belum mendapat kode? <a href="<?php echo base_url(); ?>index.php/email/verif?aksi=generate">Kirim ulang kode</a><br>
				Atau <a href="<?php echo base_url(); ?>index.php/email/ganti_email">ganti email</a><br>
				Atau <a href="<?php echo base_url(); ?>index.php/keluar">masuk dengan akun lain</a>.
				
				</label>
			</div>
		

</body>
</html>
<?php }?>