<!DOCTYPE html>
<html>
<head>
	<title>Jadwal</title>
</head>
<body>
<?php
include "konekdatabase.php";
$sql = "SELECT * FROM 09_kereta NATURAL JOIN 09_jadwal";
$result = $conn->query($sql);
?>
<table border="1" cellspacing="1" cellpadding="4">
	<tr bgcolor="#3cff00">
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
</body>
</html>