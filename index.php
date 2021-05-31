<!DOCTYPE html>
<html>
<head>
	<title>Tiket Kereta</title>
	<link rel= "stylesheet" type="text/css" href= "style.css">
	<link rel= "stylesheet" type="text/css" href= "tampilan.css">
</head>
<body>
<div class ="content">
	<div>
		<?php
			
			if(isset($_GET['act'])){
				if($_GET['act'] == 'tiket_pesan')
					include 'tiket_pesan.php';
				else if($_GET['act'] == 'tiket_jadwal')
					include 'tiket_jadwal.php';
				else if($_GET['act'] == 'tiket_bayar')
					include 'tiket_bayar.php';
				
			}else if(isset($_GET['tiket_pesan'])){
					include 'tiket_pesan.php';
			}else {
				include 'tiket_jadwal.php';
			}
		?>
	</div>
</div>
</body>
</html>
