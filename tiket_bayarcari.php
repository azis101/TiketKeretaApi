<!DOCTYPE html>
<html>
<head>
	<title>Cari</title>
	<link rel= "stylesheet" type="text/css" href= "style.css">
	<link rel= "stylesheet" type="text/css" href= "tampilan.css">
</head>
<body>
<div class ="content">
<center>
	<a href ="tiket_jadwal.php"><input type="submit" class="submit" value="Jadwal Tiket"></a>
	<a href ="tiket_pesan.php"><input type="submit" class="submit" value="Pesan Tiket"></a>	
	<a href ="tiket_bayarcari.php"><input type="submit" class="submit" value="Bayar Tiket"></a>
<hr>
<table>
<form action="tiket_bayar.php" method="GET">

	<tr>
		<td>Masukkan Kode Pemesanan</td>
		<td>:</td>
		<td><input type="text" name="kode" class="input" required placeholder="Kode Pemesanan"></input></td>
		<td><input type="submit" value="Cari"></td>
	</tr>
</form>
	<tr>
		<td><b>Atau</b></td>
	</tr>
<form action="tiket_carinama.php" method="GET">
	<tr>
		<td>Cari Nama</td>
		<td>:</td>
		<td><input type="text" name="nama_c" class="input" required placeholder="Cari Nama"></input></td>
		<td><input type="submit" value="Cari" class="submit"></td>
	</tr>
</form>
</table>
</center>
</div>
</body>
</html>
