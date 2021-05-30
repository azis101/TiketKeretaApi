<!DOCTYPE html>
<html>
<head>
	<title>Pesan Tiket</title>
	<link rel= "stylesheet" type="text/css" href= "style.css">
	<link rel= "stylesheet" type="text/css" href= "tampilan.css">
</head>
<body> <!--Warna apa yang bagus?-->
<div class ="content">
<center>
	<a href ="tiket_jadwal.php"><input type="submit" class="submit" value="Jadwal Tiket"></a>
	<a href ="tiket_pesan.php"><input type="submit" class="submit" value="Pesan Tiket"></a>	
	<a href ="tiket_bayarcari.php"><input type="submit" class="submit" value="Bayar Tiket"></a>
<hr>
<iframe src="tiket_jadwal2.php" width="840px" height="300px"></iframe>
<form action="tiket_pesanaksi.php" method="POST">
	<table>
		<tr>
			<td>Kode Pemesanan</td>
			<td>:</td>
			<td><input type="text" name="kode_psn" class="input" value="<?php echo "PS".rand(0, 999)?>"></input></td>
		</tr>
		<tr>
			<td>Kode Jadwal</td>
			<td>:</td>
			<td>
				<select name="kode_j"class="input">>
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
				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal Pemesanan</td>
			<td>:</td>
			<td><input type="date" placeholder="Tanggal Pemesanan" name="tgl_psn" class="input" value="<?php echo date("Y-m-d"); ?>"></input></td>
		</tr>
		<tr>
			<td>Nama Pembeli</td>
			<td>:</td>
			<td><input type="text" name="nama" class="input" required placeholder="Nama Pemesan"></input></td>
		</tr>
		<tr>
			<td>Tanggal Berangkat</td>
			<td>:</td>
			<td><input type="date" placeholder="Tanggal Pemberangkatan" name="tgl_brk" class="input"></input></td>
		</tr>

		<tr>
			<td>Jumlah Tiket</td>
			<td>:</td>
			<td><input type="number" name="jumlah_t" class="input" required placeholder="Jumlah Tiket"></input></td>
		
		</tr>
	</table>
	<input type="submit" value="Submit">
</form>
</center>
</div>
</body>
</html>