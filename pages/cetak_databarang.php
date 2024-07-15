<!DOCTYPE html>
<html>

<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.WRAPUPPRO.COM</title>
</head>

<body>
	<img style="position: absolute;margin-left: 40px; margin-top: 5px; width: 60px;" src="../img/provinsi.png">
	<center>
		<p>
			<ol style="list-style-type: none; margin-left: 40px;">
			<li>PEMERINTAH PROVINSI KALIMANTAN SELATAN</li>
			<li>DINAS PENDIDIKAN DAN KEBUDAYAAN</li>
			<li style="font-size: larger;"><b> PUSAT LAYANAN DISABILITAS DAN PENDIDIKAN INKLUSI</b></li>
			<li style="font-size: smaller;">Jalan Perdagangan Komp. Bumi Indah Lestari II, Kuin Utara, Kayu Tangi, Banjarmasin - Kalimantan Selatan</li>
			<li style="font-size: smaller;">Telp. 0811 5132 424 - email: pldpi.provkalsel@gmail.com</li>
			</ol>
		</p>
			<ol style="list-style-type: none; ">
			<li></li><hr />
			<li></li><hr size="2" style="background-color: black; border-color: black;"/>
			</ol>
	
		<h3>LAPORAN DATA BARANG</h3>
	</center>

	<?php
	include  '../config/config.php';
	session_start();
	?>

	<table border="1" style="width: 100%;">
		<tr>
			<th width="1%">No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Spesifikasi</th>
			<th width="5%">Lokasi Barang</th>
			<th>Kategori</th>
			<th>Stok</th>
			<th>Kondisi</th>
		</tr>
		<?php
		$no = 1;
		$date = date("d-m-Y");
		$sql = mysqli_query($conn, "select * from tbl_barang");
		while ($data = mysqli_fetch_array($sql)) {
		?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['kode_barang']; ?></td>
				<td><?php echo $data['nama_barang']; ?></td>
				<td><?php echo $data['spesifikasi']; ?></td>
				<td><?php echo $data['lokasi_barang']; ?></td>
				<td><?php echo $data['kategori']; ?></td>
				<td><?php echo $data['jumlah_brg']; ?></td>
				<td><?php echo $data['kondisi']; ?></td>
			</tr>
		<?php
		}
		?>
	</table>

	<div class='footer'>
		<div style='margin-top:10px; text-align: right; '>Banjarmasin, <?= $date ?></div>
		<div style='margin-top:90px; margin-right:5px; text-align: right;'><?= $_SESSION['username'] ?></div>
	</div>
	<!-- <div class='page' align='center'>Hal - .$page.</div>; -->
	</div>

	<script>
		window.print();
	</script>

</body>

</html>