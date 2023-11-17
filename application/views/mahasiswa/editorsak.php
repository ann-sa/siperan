<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "important/assets.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $namaweb ;?> >> Mahasiswa >> Editor Surat Aktif Kuliah</title>
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
	
	if($page=="page1")include "konten/editorsak_page1.php";
	else if($page=="page2")include "konten/editorsak_page2.php";
	else if($page=="page3")include "konten/editorsak_page3.php";
	else if($page=="page_final")include "konten/editorsak_page_final.php";
	
	include "important/footer.php";
?>

</div>

</body>
</html>
