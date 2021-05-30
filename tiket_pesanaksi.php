<!DOCTYPE html>
<html>
<head>
	<title>Aksi Pesan Tiket</title>
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
$kode_psn = $_POST['kode_psn'];
$kode_j = $_POST['kode_j'];
$tgl_psn = $_POST['tgl_psn'];
$nama = $_POST['nama'];
$tgl_brk = $_POST['tgl_brk'];
$jumlah_t = $_POST['jumlah_t'];
$st_bayar = "Belum Lunas";
$cekkode = "SELECT * FROM 09_jadwal WHERE kode_jadwal='$kode_j'";
$hasilcek = $conn->query($cekkode);
$isikode = $hasilcek->fetch_assoc();
$tarif1 = $isikode['tarif_tiket'];
$total = $tarif1*$jumlah_t;
$sqlpesan = "INSERT INTO 09_pemesanan(kode_pemesanan, kode_jadwal, tgl_pemesanan, nama_customer, tgl_berangkat, tarif_tiket, jumlah_pemesanan, tarif_total, status_pembayaran) VALUES('$kode_psn', '$kode_j', '$tgl_psn', '$nama', '$tgl_brk', '$tarif1', '$jumlah_t', '$total', '$st_bayar')";
if (empty($kode_psn) or empty($kode_j) or empty($tgl_psn) or empty($nama) or empty($jumlah_t) or empty($tarif1) or empty($total)) {
	echo "Pemesanan gagal";
} else {
	$runsql_h = $conn->query($sqlpesan);
	echo "Pemesanan Berhasil<br>";
	echo "Kode Pemesanan: ".$kode_psn;
}
?>
<br>
<a href ="tiket_bayar.php?kode=<?=$kode_psn?>"> <input type="submit" class="submit" value="Bayar Tiket"></a>
</center>
</div>
</body>
</html>