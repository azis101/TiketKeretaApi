<!DOCTYPE html>
<html>
<head>
	<title>Aksi Bayar Tiket</title>
</head>
<body>
	<center>
<?php
include "konekdatabase.php";
$kode_psn = $_POST['kode_psn'];
$rekening = $_POST['rekening'];
$nama_b = $_POST['nama_b'];
$tgl_byr = $_POST['tgl_byr'];
$nominal = $_POST['nominal'];
$kode_byr = $kode_psn."-L".rand(0,99);
$sqlheader = "UPDATE 09_pemesanan SET status_pembayaran='Lunas' WHERE kode_pemesanan='$kode_psn'";
$sqlcektrf = $conn->query("SELECT * FROM 09_pemesanan WHERE kode_pemesanan='$kode_psn'");
$hasilcektrf = $sqlcektrf->fetch_assoc();
$inputtarif = $hasilcektrf["tarif_total"];
$sqlcektg = $conn->query("SELECT * FROM 09_pembayaran WHERE kode_pemesanan='$kode_psn'");
$hasilcektg = $sqlcektg->fetch_assoc();
if (empty($kode_psn) or empty($rekening) or empty($nama_b) or empty($tgl_byr) or empty($nominal)) {
	echo "Pembayaran gagal<br>";
	?>
	<a href="tiket_bayarcari.php"><input type="button" value="Kembali"></a>
	<?php
} else {
	if (empty($hasilcektg)) {
		$tagihan = $hasilcektrf["tarif_total"];
	} else {
		$tagihan = $hasilcektg['tagihan'];
	}
	if ($nominal<$tagihan) {
		$nominal2 = $tagihan - $nominal;
		$rundelete = $conn->query("DELETE FROM 09_pembayaran WHERE kode_pemesanan='$kode_psn'");
		$runsqlbyr = $conn->query("INSERT INTO 09_pembayaran(kode_pembayaran, kode_pemesanan, rekening, nama_b, tgl_pembayaran, tarif_total, tagihan) VALUES('$kode_byr', '$kode_psn', '$rekening', '$nama_b', '$tgl_byr', '$inputtarif', '$nominal2')");
		echo "Kode Pembayaran: ".$kode_byr."<br>";
		echo "Tagihan anda belum lunas, kurang Rp. ".$nominal2."<br>";
		?>
		<a href="tiket_bayarcari.php"><button>Kembali</button></a>
		<?php
	} else {
		$nominal2 = $nominal - $tagihan;
		$kembalian = $nominal - $tagihan;
		if ($nominal2!=0) {
			$nominal2 = 0;
		}
		$rundelete = $conn->query("DELETE FROM 09_pembayaran WHERE kode_pemesanan='$kode_psn'");
		$runsqlbyr = $conn->query("INSERT INTO 09_pembayaran(kode_pembayaran, kode_pemesanan, rekening, nama_b, tgl_pembayaran, tarif_total, tagihan) VALUES('$kode_byr', '$kode_psn', '$rekening', '$nama_b', '$tgl_byr', '$inputtarif', '$nominal2')");
		$runsqlheader = $conn->query($sqlheader);
		echo "Kode Pembayaran: ".$kode_byr."<br>";
		echo "Pembayaran Lunas"."<br>";
		echo "Kembalian: ".$kembalian."<br>";
		?>
		<p>SILAHKAN CETAK TIKET DISINI</p>
		<a href="tiket_cetak.php?kode=<?=$kode_psn?>">CETAK</a>
		<?php
	}
}
?>
</center>
</body>
</html>