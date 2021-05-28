<!DOCTYPE html>
<html>
<head>
	<title>Pesan Tiket</title>
</head>
<body>
<a href="tiket_jadwal.php">Jadwal</a>
<a href="tiket_pesan.php">Pesan</a>
<a href="tiket_bayarcari.php">Bayar</a>
<hr>
<iframe src="tiket_jadwal2.php" width="850px" height="300px"></iframe>
<form action="tiket_pesanaksi.php" method="POST">
	<label>Kode Pemesanan:</label>
	<input type="text" name="kode_psn" value="<?php echo "PS".rand(0,999); ?>"><br>
	<label>Kode Jadwal:</label>
	<select name="kode_j">
		<option value="AB001">AB001</option>
		<option value="AB002">AB002</option>
		<option value="AC001">AC001</option>
		<option value="AC002">AC002</option>
		<option value="AL001">AL001</option>
		<option value="AL002">AL002</option>
		<option value="AP001">AP001</option>
		<option value="AP002">AP002</option>
		<option value="AS001">AS001</option>
		<option value="AS002">AS002</option>
		<option value="AW001">AW001</option>
		<option value="AW002">AW002</option>
		<option value="BR001">BR001</option>
		<option value="CR001">CR001</option>
		<option value="CR002">CR002</option>
		<option value="DW001">DW001</option>
		<option value="JT001">JT001</option>
		<option value="JT002">JT002</option>
		<option value="ML001">ML001</option>
		<option value="MP001">MP001</option>
		<option value="MT001">MT001</option>
		<option value="MT002">MT002</option>
		<option value="RJ001">RJ001</option>
		<option value="SU001">SU001</option>
		<option value="SU002">SU002</option>
	</select><br>
	<label>Tanggal Pemesanan</label>
	<input type="date" name="tgl_psn" value="<?php echo date("Y-m-d"); ?>"><br>
	<label>Nama Pemesan:</label>
	<input type="text" name="nama"><br>
	<label>Tanggal Keberangkatan</label>
	<input type="date" name="tgl_brk"><br>
	<label>Jumlah Tiket</label>
	<input type="number" name="jumlah_t"><br>
	<input type="submit" value="Submit">
</form>
</body>
</html>