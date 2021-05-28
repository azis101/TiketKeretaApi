<!DOCTYPE html>
<html>
<head>
	<title>Cari</title>
</head>
<body>
<a href="tiket_jadwal.php">Jadwal</a>
<a href="tiket_pesan.php">Pesan</a>
<a href="tiket_bayarcari.php">Bayar</a>
<hr>
<form action="tiket_bayar.php" method="GET">
	<label>Masukkan Kode Pemesanan:</label>
	<input type="text" name="kode">
	<input type="submit" value="Cari">
</form>
<p>Atau</p>
<form action="tiket_carinama.php" method="GET">
	<label>Cari Nama:</label>
	<input type="text" name="nama_c">
	<input type="submit" value="Cari">
</form>
</body>
</html>