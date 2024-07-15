<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');

$aksi = $_GET["aksi"];

if ($aksi == "tambah") {

    $kode = $_POST["kode"];
    $tgl = $_POST["tgl"];
    $jenis_inventaris = $_POST["jenis_inventaris"];
    $kode_inventaris = $_POST["kode_inventaris"];

    mysqli_query($conn, "INSERT INTO tbl_jadwal_pemeliharaan VALUES('$kode', '$tgl', '$kode_inventaris', '$jenis_inventaris', 'Belum Dilakukan', '')");

    echo "<script>alert('Data tersimpan'); window.location.href='/index.php?page=datajadwal';</script>";
} else if ($aksi == "update") {

    $kode = $_POST["kode"];
    $tgl = $_POST["tgl"];
    $lokasi = $_POST["lokasi"];
    $jumlah = $_POST["jumlah"];
    $jenis_inventaris = $_POST["jenis_inventaris"];
    $kode_inventaris = $_POST["kode_inventaris"];

    mysqli_query($conn, "UPDATE tbl_jadwal_pemeliharaan SET tgl='$tgl', kode_inventaris='$kode_inventaris', jenis_inventaris='$jenis_inventaris' WHERE kode_jadwal='$kode'");

    echo "<script>alert('Data diupdate'); window.location.href='/index.php?page=datajadwal';</script>";
} else if ($aksi == "hapus") {

    $kode = $_GET["kode"];

    mysqli_query($conn, "DELETE FROM tbl_jadwal_pemeliharaan WHERE kode_jadwal='$kode'");

    echo "<script>alert('Data dihapus'); window.location.href='/index.php?page=datajadwal';</script>";
} else if ($aksi == "selesai") {

    $kode = $_POST["kode"];
    $keterangan = $_POST["keterangan"];

    mysqli_query($conn, "UPDATE tbl_jadwal_pemeliharaan SET keterangan='$keterangan', status='Sudah Dilakukan' WHERE kode_jadwal='$kode'");

    echo "<script>alert('Data diupdate'); window.location.href='/index.php?page=datajadwal';</script>";
}
