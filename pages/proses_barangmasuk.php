<?php
include_once("../config/Class_BarangMasuk.php");
$db = new Class_BarangMasuk();
include_once("../config/config.php");

$aksi = $_GET["aksi"];

// ===========================================================================================
// BARANG MASUK BARU
// ===========================================================================================

if ($aksi == "tambah") {

    $id_masukbarang = $_POST['id_masukbarang'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $jumlah_masuk = $_POST['jumlah_masuk'];
    $kode_supplier = $_POST['kode_supplier'];

    $db->input_barangmasuk($id_masukbarang, $kode_barang, $nama_barang, $tgl_masuk, $jumlah_masuk, $kode_supplier);

    echo "<script>alert('Data Barang Masuk berhasil ditambahkan'); window.location.href='../barangmasuk.php';</script>";
}
if ($aksi == "updatebarangmasuk") {

    $id_masukbarang = $_POST['id_masukbarang'];
    $nama_barang = $_POST['nama_barang'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $jumlah_masuk = $_POST['jumlah_masuk'];
    $nama_supplier = $_POST['nama_supplier'];

    $kdsup = mysqli_query($conn, "select kode_supplier from tbl_supplier where nama_supplier='" . $nama_supplier . "'");
    $skode = mysqli_fetch_array($kdsup);
    $kode_supplier = $skode["kode_supplier"];

    $kdbarang = mysqli_query($conn, "select kode_barang from tbl_barang where nama_barang='" . $nama_barang . "' ");
    $skodebrg = mysqli_fetch_array($kdbarang);
    $kode_barang = $skodebrg["kode_barang"];

    $masuk = mysqli_query($conn, "select jumlah_masuk from tbl_masukbarang where id_masukbarang='" . $id_masukbarang . "' ");
    $smasuk = mysqli_fetch_array($masuk);
    $jmlh_masuk_lama = $smasuk["jumlah_masuk"];

    $stok = mysqli_query($conn, "select * from tbl_stok where kode_barang ='" . $kode_barang . "' ");
    $tmpstok = mysqli_fetch_array($stok);

    $jml_barang = $tmpstok["jml_barangmasuk"];
    $jml_barangkeluar = $tmpstok["jml_barangkeluar"];
    $total = $tmpstok["total_barang"];

    $jml_barangmasuk = $jumlah_masuk + $jml_barang;
    $totalbarang = $jumlah_masuk + $total - $jmlh_masuk_lama;
    $totjumlah_barang = $totalbarang - $jml_barangkeluar;

    $db->update_barangmasuk($kode_barang, $nama_barang, $tgl_masuk, $jumlah_masuk, $kode_supplier, $totalbarang, $id_masukbarang, $jmlh_masuk_lama, $total);

    echo "<script>alert('Data Barang Masuk berhasil diubah'); window.location.href='../barangmasuk.php';</script>";
}
