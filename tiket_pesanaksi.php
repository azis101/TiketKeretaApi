<!DOCTYPE html>
<html>
<head>
	<title>Aksi Pesan Tiket</title>
</head>
<body>
<a href="tiket_jadwal.php"><button>Jadwal</button></a>
<a href="tiket_pesan.php"><button>Pesan</button></a>
<a href="tiket_bayarcari.php"><button>Bayar</button></a>
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
$cekkode = "SELECT * FROM jadwal WHERE kode_jadwal='$kode_j'";
$hasilcek = $conn->query($cekkode);
$isikode = $hasilcek->fetch_assoc();
$tarif1 = $isikode['tarif_tiket'];
$total = $tarif1*$jumlah_t;
$sqlheader = "INSERT INTO header_pemesanan(kode_pemesanan, tgl_pemesanan, nama_customer, tgl_berangkat, status_pembayaran) VALUES('$kode_psn', '$tgl_psn', '$nama', '$tgl_brk', '$st_bayar')";
$sqldetail = "INSERT INTO detail_pemesanan(kode_pemesanan, kode_jadwal, tarif_tiket, jumlah_pemesanan, tarif_total) VALUES('$kode_psn', '$kode_j', '$tarif1', '$jumlah_t', '$total')";
if (empty($kode_psn) or empty($kode_j) or empty($tgl_psn) or empty($nama) or empty($jumlah_t) or empty($tarif1) or empty($total)) {
	echo "gagal";
} else {
	$runsql_h = $conn->query($sqlheader);
	$runsql_d = $conn->query($sqldetail);
	echo "Kode Pemesanan: ".$kode_psn;
}
?>
<br>
<a href="tiket_bayar.php?kode=<?=$kode_psn?>">Bayar</a>
</body>
</html>
