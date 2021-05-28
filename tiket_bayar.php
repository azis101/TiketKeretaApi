<!DOCTYPE html>
<html>
<head>
	<title>Bayar Tiket</title>
</head>
<body>
<?php 
include "konekdatabase.php"; 
if(isset($_GET['kode'])){
	$carikode = $_GET['kode'];
	$sqlkode = $conn->query("SELECT * FROM header_pemesanan NATURAL JOIN detail_pemesanan WHERE kode_pemesanan='$carikode'");
	$hasilkode = $sqlkode->fetch_assoc();
	$sqlcektg = $conn->query("SELECT * FROM pembayaran WHERE kode_pemesanan='$carikode'");
	$hasilcektg = $sqlcektg->fetch_assoc();
	echo "Kode Pemesanan: ".$hasilkode["kode_pemesanan"]."<br>";
	echo "Tanggal Pemesanan: ".$hasilkode["tgl_pemesanan"]."<br>";
	echo "Nama Pemesan: ".$hasilkode["nama_customer"]."<br>";
	echo "Tanggal Keberangkatan: ".$hasilkode["tgl_berangkat"]."<br>";
	echo "Kode Jadwal: ".$hasilkode["kode_jadwal"]."<br>";
	echo "Tarif Per Tiket: ".$hasilkode["tarif_tiket"]."<br>";
	echo "Jumlah Tiket: ".$hasilkode["jumlah_pemesanan"]."<br>";
	echo "Tarif Total: ".$hasilkode["tarif_total"]."<br>";
	if (empty($hasilcektg)) {
		$tagihan = $hasilkode["tarif_total"];
		echo "Tagihan: ".$tagihan;
	} else {
		$tagihan = $hasilcektg['tagihan'];
		echo "Tagihan: ".$tagihan;
	}
}
?>
<hr>
<form action="tiket_bayaraksi.php" method="POST">
	<input type="hidden" name="kode_psn" value="<?php echo $hasilkode['kode_pemesanan']; ?>">
	<label>Nomor Rekening: </label>
	<input type="number" name="rekening"><br>
	<label>Nama: </label>
	<input type="text" name="nama_b"><br>
	<label>Tanggal Pembayaran: </label>
	<input type="date" name="tgl_byr" value="<?php echo date("Y-m-d"); ?>"><br>
	<label>Nominal: </label>
	<input type="number" name="nominal"><br>
	<input type="submit" value="Submit">
</form>
</body>
</html>