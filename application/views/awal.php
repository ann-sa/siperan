<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "assets.php";
?>
<!DOCTYPE html>

<head>
	<title><?php echo $namaweb; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta content="" name="keywords">
	<meta content="" name="description">
</head>

<body>

	<div class="limiter">

		<div class="container-login100 row" style="background-image: url('<?php echo $bg ;?>');"> <!-- #00a65a -->
				<?php  if($ngapain!="login"){?>
			<div class="col-md-8" align="center">
				<img src="<?php echo base_url(); ?>assets/logo.png" width="300">
			</div>
		<?php } ?>

<?php

	if($ngapain=="login")include "login.php";
	if($ngapain=="loginmahasiswa")include "loginmahasiswa.php";
	if($ngapain=="loginTU")include "loginTU.php";
	if($ngapain=="signup")include "signup.php";
	if($ngapain=="tentang")include "tentang.php";
	if($ngapain=="carakerja")include "carakerja.php";

?>

		</div>
	</div>
</body>

</html>
