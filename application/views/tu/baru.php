<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "important/assets.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $namaweb; ?> >> TU >> Surat Baru</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta content="" name="keywords">
	<meta content="" name="description">
</head>

<body class="hold-transition skin-green-light sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">


<?php
	include "important/header.php";
	
	if($page=="baru")include "konten/baru_konten.php";
	else if($page=="pembuatan")include "konten/baru_konten_pembuatan.php";
	else if($page=="pilih_bahasa")include "konten/baru_konten_pilih_bahasa.php";
	
	include "important/footer.php";
?>

</div>

</body>
</html>
