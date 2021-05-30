<!DOCTYPE html>
<html>
<head>
	<title>Cari Nama</title>
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
if(isset($_GET['nama_c'])){
	$carinama = $_GET['nama_c'];
	$sqlkode = $conn->query("SELECT * FROM 09_pemesanan WHERE nama_customer LIKE '%".$carinama."%' AND status_pembayaran='Belum Lunas'");
}
?>
<table border="1" cellspacing="1" cellpadding="4">
	<tr bgcolor="#3cff00">
		<th>Kode Pemesanan</th>
		<th>Tanggal Pemesanan</th>
		<th>Nama Pemesan</th>
		<th>Tanggal Keberangkatan</th>
		<th>Kode Jadwal</th>
		<th>Jumlah Tiket</th>
		<th>Bayar</th>
	</tr>
	<tr>
		<?php while ($hasilkode = $sqlkode->fetch_assoc()) { ?>
		<td><?php echo $hasilkode['kode_pemesanan']; ?></td>
		<td><?php echo $hasilkode['tgl_pemesanan']; ?></td>
		<td><?php echo $hasilkode['nama_customer']; ?></td>
		<td><?php echo $hasilkode['tgl_berangkat']; ?></td>
		<td><?php echo $hasilkode['kode_jadwal']; ?></td>
		<td><?php echo $hasilkode['jumlah_pemesanan']; ?></td>
		<td><a href="tiket_bayar.php?kode=<?=$hasilkode['kode_pemesanan']?>">Bayar</a></td>
		<?php } ?>
	</tr>
</table>
</center>
</div>
</body>
</html>