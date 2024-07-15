<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');

$aksi = $_GET["aksi"];

if ($aksi == "tambah") {

    $kode = $_POST["kode"];
    $tgl_kerusakan = $_POST["tgl_kerusakan"];
    $lokasi = $_POST["lokasi"];
    $jumlah = $_POST["jumlah"];
    $jenis_inventaris = $_POST["jenis_inventaris"];
    $kode_inventaris = $_POST["kode_inventaris"];

    if ($jenis_inventaris == "Barang") {
        $query = mysqli_query($conn, "SELECT * FROM tbl_stok WHERE kode_barang='$kode_inventaris' limit 1");
        $datatmp = mysqli_fetch_assoc($query);
        $jlhKeluarTmp = $datatmp['jml_barangkeluar'];
        $totalBarangTmp = $datatmp['total_barang'];

        $jlhKeluar = $jlhKeluarTmp + $jumlah;
        $totalBarang = $totalBarangTmp - $jlhKeluar;
        $totalBarang = $totalBarang <= 0 ? 0 : $totalBarang;

        // Ubah data 
        $query = mysqli_query($conn, "UPDATE tbl_stok SET jml_barangkeluar='$jlhKeluar', total_barang='$totalBarang' WHERE kode_barang='$kode_inventaris'");
    } else if ($jenis_inventaris == "Peralatan & Mesin") {
        $query = mysqli_query($conn, "SELECT * FROM tbl_peralatan_mesin WHERE kode='$kode_inventaris' limit 1");
        $datatmp = mysqli_fetch_assoc($query);
        $jumlahLama = $datatmp['jumlah'];
        $jumlahBaru = $jumlahLama - $jumlah;

        // Ubah data 
        $query = mysqli_query($conn, "UPDATE tbl_peralatan_mesin SET jumlah='$jumlahBaru' WHERE kode='$kode_inventaris'");
    } else if ($jenis_inventaris == "Kendaraan") {
        $query = mysqli_query($conn, "SELECT * FROM tbl_kendaraan WHERE kode='$kode_inventaris' limit 1");
        $datatmp = mysqli_fetch_assoc($query);
        $jumlahLama = $datatmp['jumlah'];
        $jumlahBaru = $jumlahLama - $jumlah;

        // Ubah data 
        $query = mysqli_query($conn, "UPDATE tbl_kendaraan SET jumlah='$jumlahBaru' WHERE kode='$kode_inventaris'");
    }

    mysqli_query($conn, "INSERT INTO tbl_kerusakan_inventaris VALUES('$kode', '$tgl_kerusakan', '$kode_inventaris', '$jumlah', '$jenis_inventaris', '$lokasi')");

    echo "<script>alert('Data tersimpan'); window.location.href='/index.php?page=datakerusakan';</script>";
} else if ($aksi == "update") {

    $kode = $_POST["kode"];
    $tgl_kerusakan = $_POST["tgl_kerusakan"];
    $lokasi = $_POST["lokasi"];
    $jumlah = $_POST["jumlah"];
    $jenis_inventaris = $_POST["jenis_inventaris"];
    $kode_inventaris = $_POST["kode_inventaris"];

    if ($jenis_inventaris == "Barang") {
        $query = mysqli_query($conn, "SELECT * FROM tbl_stok WHERE kode_barang='$kode_inventaris' limit 1");
        $datatmp = mysqli_fetch_assoc($query);
        $jlhKeluarTmp = $datatmp['jml_barangkeluar'];
        $totalBarangTmp = $datatmp['total_barang'];

        $jlhKeluar = $jlhKeluarTmp + $jumlah;
        $totalBarang = ($totalBarangTmp + $jlhKeluar) + $jumlah;
        $totalBarang = $totalBarang <= 0 ? 0 : $totalBarang;

        // Ubah data 
        $query = mysqli_query($conn, "UPDATE tbl_stok SET jml_barangkeluar='$jlhKeluar', total_barang='$totalBarang' WHERE kode_barang='$kode_inventaris'");
    } else if ($jenis_inventaris == "Peralatan & Mesin") {
        $query = mysqli_query($conn, "SELECT * FROM tbl_kerusakan_inventaris WHERE kode_kerusakan='$kode' limit 1");
        $data1tmp = mysqli_fetch_assoc($query);
        $jumlahLama1 = $data1tmp['jumlah'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_peralatan_mesin WHERE kode='$kode_inventaris' limit 1");
        $datatmp = mysqli_fetch_assoc($query);
        $jumlahLama = $datatmp['jumlah'];
        $jumlahBaru = ($jumlahLama1 + $jumlahLama) - $jumlah;

        // Ubah data 
        $query = mysqli_query($conn, "UPDATE tbl_peralatan_mesin SET jumlah='$jumlahBaru' WHERE kode='$kode_inventaris'");
    } else if ($jenis_inventaris == "Kendaraan") {
        $query = mysqli_query($conn, "SELECT * FROM tbl_kerusakan_inventaris WHERE kode_kerusakan='$kode' limit 1");
        $data1tmp = mysqli_fetch_assoc($query);
        $jumlahLama1 = $data1tmp['jumlah'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_kendaraan WHERE kode='$kode_inventaris' limit 1");
        $datatmp = mysqli_fetch_assoc($query);
        $jumlahLama = $datatmp['jumlah'];
        $jumlahBaru = ($jumlahLama1 + $jumlahLama) - $jumlah;

        // Ubah data 
        $query = mysqli_query($conn, "UPDATE tbl_kendaraan SET jumlah='$jumlahBaru' WHERE kode='$kode_inventaris'");
    }

    mysqli_query($conn, "UPDATE tbl_kerusakan_inventaris SET tgl_kerusakan='$tgl_kerusakan', kode_inventaris='$kode_inventaris', jenis_inventaris='$jenis_inventaris', lokasi='$lokasi', jumlah='$jumlah' WHERE kode_kerusakan='$kode'");

    echo "<script>alert('Data diupdate'); window.location.href='/index.php?page=datakerusakan';</script>";
} else if ($aksi == "hapus") {

    $kode = $_GET["kode"];

    mysqli_query($conn, "DELETE FROM tbl_kerusakan_inventaris WHERE kode_kerusakan='$kode'");

    echo "<script>alert('Data dihapus'); window.location.href='/index.php?page=datakerusakan';</script>";
}
