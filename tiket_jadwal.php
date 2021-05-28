<!DOCTYPE html>
<html>
<head>
	<title>Jadwal</title>
</head>
<body>
<a href="tiket_jadwal.php">Jadwal</a>
<a href="tiket_pesan.php">Pesan</a>
<a href="tiket_bayarcari.php">Bayar</a>
<hr>
<?php
include "konekdatabase.php";
$sql = "SELECT * FROM kereta NATURAL JOIN jadwal";
$result = $conn->query($sql);
?>
<table border="1" cellspacing="1" cellpadding="4">
	<tr>
		<th>Kode Jadwal</th>
		<th>Nama Kereta</th>
		<th>Jalur</th>
		<th>Kelas</th>
		<th>Tujuan</th>
		<th>Waktu Keberangkatan</th>
		<th>Tarif Tiket</th>
	</tr>
	<?php while($row = $result->fetch_assoc()) { ?>
	<tr>
		<td><?php echo $row["kode_jadwal"]; ?></td>
		<td><?php echo $row["nama_kereta"]; ?></td>
		<td><?php echo $row["jalur"]; ?></td>
		<td><?php echo $row["kelas"]; ?></td>
		<td><?php echo $row["tujuan"]; ?></td>
		<td><?php echo $row["waktu_keberangkatan"]; ?></td>
		<td><?php echo $row["tarif_tiket"]; ?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>