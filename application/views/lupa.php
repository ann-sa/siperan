<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "assets.php";
?>
<!DOCTYPE html>

<head>
	<title><?php echo $namaweb; ?> >> Lupa Password</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta content="" name="keywords">
	<meta content="" name="description">
</head>

<body>

<div class="limiter">
<div class="container-login100 row" style="background: url('<?php echo $bg ;?>');"> <!-- #00a65a -->

<?php

	if($ngapain=="input")include "lupa_01_input.php";
	if($ngapain=="keterangan")include "lupa_02_keterangan.php";
	if($ngapain=="ganti")include "lupa_03_ganti.php";
	if($ngapain=="berhasil")include "lupa_04_berhasil.php";
	
?>

</div>
</div>

</body>

</html>