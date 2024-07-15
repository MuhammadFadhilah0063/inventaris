<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');

$aksi = $_GET["aksi"];

if ($aksi == "tambah") {

    $kode = $_POST["kode"];
    $nama = $_POST["nama"];
    $spesifikasi = $_POST["spesifikasi"];
    $lokasi = $_POST["lokasi"];
    $kategori = $_POST["kategori"];
    $kondisi = $_POST["kondisi"];
    $jumlah = $_POST["jumlah"];
    $merek = $_POST["merek"];

    mysqli_query($conn, "INSERT INTO tbl_peralatan_mesin VALUES('$kode', '$nama', '$spesifikasi', '$lokasi', '$kategori', '$jumlah', '$kondisi', '$merek')");

    echo "<script>alert('Data tersimpan'); window.location.href='/index.php?page=dataperalatanmesin';</script>";
} else if ($aksi == "update") {

    $kode = $_POST["kode"];
    $nama = $_POST["nama"];
    $spesifikasi = $_POST["spesifikasi"];
    $lokasi = $_POST["lokasi"];
    $kategori = $_POST["kategori"];
    $kondisi = $_POST["kondisi"];
    $jumlah = $_POST["jumlah"];
    $merek = $_POST["merek"];

    mysqli_query($conn, "UPDATE tbl_peralatan_mesin SET nama='$nama', spesifikasi='$spesifikasi', lokasi='$lokasi', kategori='$kategori', kondisi='$kondisi', jumlah='$jumlah', merek='$merek' WHERE kode='$kode'");

    echo "<script>alert('Data diupdate'); window.location.href='/index.php?page=dataperalatanmesin';</script>";
} else if ($aksi == "hapus") {

    $kode = $_GET["kode"];

    mysqli_query($conn, "DELETE FROM tbl_peralatan_mesin WHERE kode='$kode'");

    echo "<script>alert('Data dihapus'); window.location.href='/index.php?page=dataperalatanmesin';</script>";
}
