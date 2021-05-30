<!DOCTYPE html>
<html>
<head>
	<title>Cetak Tiket</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php 
include "konekdatabase.php"; 
if(isset($_GET['kode'])){
	$carikode = $_GET['kode'];
	$sqlkode = $conn->query("SELECT * FROM 09_kereta NATURAL JOIN 09_jadwal NATURAL JOIN 09_pemesanan NATURAL JOIN 09_pembayaran WHERE kode_pemesanan='$carikode'");
	$hasilkode = $sqlkode->fetch_assoc();
?>
<div class="container text-center p-2 my-3 border">
	<h1 style="text-align:center;">Bukti Pembelian E-Ticket Kereta Api</h1>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12" style="background-color:orange; color: white;">
			<br>
			<table cellpadding="8">
				<tr>
					<td>Kode Pemesanan</td>
					<td><?php echo $hasilkode['kode_pemesanan']; ?></td>
				</tr>
				<tr>
					<td>Kode Pembayaran</td>
					<td><?php echo $hasilkode['kode_pembayaran']; ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><?php echo $hasilkode['nama_customer']; ?></td>
				</tr>
				<tr>
					<td>Nama Kereta Api</td>
					<td><?php echo $hasilkode['nama_kereta']; ?></td>
				</tr>
				<tr>
					<td>Tanggal Keberangkatan</td>
					<td><?php echo $hasilkode['tgl_berangkat']; ?></td>
				</tr>
				<tr>
					<td>Waktu Keberangkatan</td>
					<td><?php echo $hasilkode['waktu_keberangkatan']; ?></td>
				</tr>
				<tr>
					<td>Tujuan</td>
					<td><?php echo $hasilkode['tujuan']; ?></td>
				</tr>
				<tr>
					<td>Jumlah Tiket</td>
					<td><?php echo $hasilkode['jumlah_pemesanan']; ?></td>
				</tr>
			</table>
			<br>
			<p><?php echo "<p>Bukti ini untuk ditukar ".$hasilkode['jumlah_pemesanan']." tiket asli</p>"; ?></p>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="row">
		<a onclick="window.print()"><input type="submit" value="Cetak"></a>
		<a href="tiket_jadwal.php"><input type="button" value="Kembali"></a>
	</div>
</div>
<?php } ?>
</body>
</html>