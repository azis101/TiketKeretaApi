<!DOCTYPE html>
<html>
<head>
	<title>Jadwal</title>
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
<?php
include "konekdatabase.php";
$sql = "SELECT * FROM 09_kereta NATURAL JOIN 09_jadwal";
$result = $conn->query($sql);
?>
<table  border="1" cellspacing="1" cellpadding="4">
	<tr bgcolor="#3cff00" >
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
</center>
</div>
</body>
</html>
