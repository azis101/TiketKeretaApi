<!DOCTYPE html>
<html>
<head>
	<title>Bayar Tiket</title>
</head>
<body>
<a href="tiket_jadwal.php"><button>Jadwal</button></a>
<a href="tiket_pesan.php"><button>Pesan</button></a>
<a href="tiket_bayarcari.php"><button>Bayar</button></a>
<hr>
<?php 
include "konekdatabase.php"; 
if(isset($_GET['kode'])){
	$carikode = $_GET['kode'];
	$sqlkode = $conn->query("SELECT * FROM header_pemesanan NATURAL JOIN detail_pemesanan WHERE kode_pemesanan='$carikode'");
	$hasilkode = $sqlkode->fetch_assoc();
	$sqlcektg = $conn->query("SELECT * FROM pembayaran WHERE kode_pemesanan='$carikode'");
	$hasilcektg = $sqlcektg->fetch_assoc();
?>
<table>
	<tr>
		<td>Kode Pemesanan</td>
		<td><?php echo $hasilkode["kode_pemesanan"]; ?></td>
	</tr>
	<tr>
		<td>Tanggal Pemesanan</td>
		<td><?php echo $hasilkode["tgl_pemesanan"]; ?></td>
	</tr>
	<tr>
		<td>Nama Pemesan</td>
		<td><?php echo $hasilkode["nama_customer"]; ?></td>
	</tr>
	<tr>
		<td>Tanggal Keberangkatan</td>
		<td><?php echo $hasilkode["tgl_berangkat"]; ?></td>
	</tr>
	<tr>
		<td>Kode Jadwal</td>
		<td><?php echo $hasilkode["kode_jadwal"]; ?></td>
	</tr>
	<tr>
		<td>Tarif Per Tiket</td>
		<td><?php echo $hasilkode["tarif_tiket"]; ?></td>
	</tr>
	<tr>
		<td>Jumlah Tiket</td>
		<td><?php echo $hasilkode["jumlah_pemesanan"]; ?></td>
	</tr>
	<tr>
		<td>Tarif Total</td>
		<td><?php echo $hasilkode["tarif_total"]; ?></td>
	</tr>
	<?php
		if (empty($hasilcektg)) {
			$tagihan = $hasilkode["tarif_total"];
		} else {
			$tagihan = $hasilcektg['tagihan'];
		}
	}?>
	<tr>
		<td>Tagihan</td>
		<td><?php echo $tagihan; ?></td>
	</tr>
</table>
<hr>
<form action="tiket_bayaraksi.php" method="POST">
	<input type="hidden" name="kode_psn" value="<?php echo $hasilkode['kode_pemesanan']; ?>">
	<table>
		<tr>
			<td>Nomor Rekening</td>
			<td><input type="number" name="rekening"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama_b"></td>
		</tr>
		<tr>
			<td>Tanggal Pembayaran</td>
			<td><input type="date" name="tgl_byr" value="<?php echo date("Y-m-d"); ?>"></td>
		</tr>
		<tr>
			<td>Nominal</td>
			<td><input type="number" name="nominal"></td>
		</tr>
	</table>
	<input type="submit" value="Submit">
</form>
</body>
</html>
