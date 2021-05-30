<!DOCTYPE html>
<html>
<head>
	<title>Cari</title>
</head>
<body>
<a href="tiket_jadwal.php"><button>Jadwal</button></a>
<a href="tiket_pesan.php"><button>Pesan</button></a>
<a href="tiket_bayarcari.php"><button>Bayar</button></a>
<hr>
<table>
<form action="tiket_bayar.php" method="GET">
	<tr>
		<td>Masukkan Kode Pemesanan</td>
		<td><input type="text" name="kode"></td>
		<td><input type="submit" value="Cari"></td>
	</tr>
</form>
	<tr>
		<td><b>Atau</b></td>
	</tr>
<form action="tiket_carinama.php" method="GET">
	<tr>
		<td>Cari Nama</td>
		<td><input type="text" name="nama_c"></td>
		<td><input type="submit" value="Cari"></td>
	</tr>
</form>
</table>
</body>
</html>