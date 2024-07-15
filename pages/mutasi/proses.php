<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');

$aksi = $_GET["aksi"];

if ($aksi == "tambah") {

    $kode = $_POST["kode"];
    $tgl_mutasi = $_POST["tgl_mutasi"];
    $lokasi_baru = $_POST["lokasi_baru"];
    $jenis_inventaris = $_POST["jenis_inventaris"];
    $kode_inventaris = $_POST["kode_inventaris"];

    if ($jenis_inventaris == "Barang") {
        $query = mysqli_query($conn, "SELECT * FROM tbl_barang WHERE kode_barang='$kode_inventaris' limit 1");
        $datatmp = mysqli_fetch_assoc($query);
        $lokasi_lama = $datatmp['lokasi_barang'];

        // Ubah data 
        $query = mysqli_query($conn, "UPDATE tbl_barang SET lokasi_barang='$lokasi_baru' WHERE kode_barang='$kode_inventaris'");
    } else if ($jenis_inventaris == "Peralatan & Mesin") {
        $query = mysqli_query($conn, "SELECT * FROM tbl_peralatan_mesin WHERE kode='$kode_inventaris' limit 1");
        $datatmp = mysqli_fetch_assoc($query);
        $lokasi_lama = $datatmp['lokasi'];

        // Ubah data 
        $query = mysqli_query($conn, "UPDATE tbl_peralatan_mesin SET lokasi='$lokasi_baru' WHERE kode='$kode_inventaris'");
    } else if ($jenis_inventaris == "Kendaraan") {
        $query = mysqli_query($conn, "SELECT * FROM tbl_kendaraan WHERE kode='$kode_inventaris' limit 1");
        $datatmp = mysqli_fetch_assoc($query);
        $lokasi_lama = $datatmp['lokasi'];

        // Ubah data 
        $query = mysqli_query($conn, "UPDATE tbl_kendaraan SET lokasi='$lokasi_baru' WHERE kode='$kode_inventaris'");
    }

    mysqli_query($conn, "INSERT INTO tbl_mutasi_inventaris VALUES('$kode', '$tgl_mutasi', '$kode_inventaris', '$jenis_inventaris', '$lokasi_lama', '$lokasi_baru')");

    echo "<script>alert('Data tersimpan'); window.location.href='/index.php?page=datamutasi';</script>";
} else if ($aksi == "update") {

    $kode = $_POST["kode"];
    $tgl_mutasi = $_POST["tgl_mutasi"];
    $lokasi_baru = $_POST["lokasi_baru"];
    $jenis_inventaris = $_POST["jenis_inventaris"];
    $kode_inventaris = $_POST["kode_inventaris"];

    if ($jenis_inventaris == "Barang") {
        $query = mysqli_query($conn, "SELECT * FROM tbl_barang WHERE kode_barang='$kode_inventaris' limit 1");
        $datatmp = mysqli_fetch_assoc($query);
        $lokasi_lama = $datatmp['lokasi_barang'];

        // Ubah data 
        $query = mysqli_query($conn, "UPDATE tbl_barang SET lokasi_barang='$lokasi_baru' WHERE kode_barang='$kode_inventaris'");
    } else if ($jenis_inventaris == "Peralatan & Mesin") {
        $query = mysqli_query($conn, "SELECT * FROM tbl_peralatan_mesin WHERE kode='$kode_inventaris' limit 1");
        $datatmp = mysqli_fetch_assoc($query);
        $lokasi_lama = $datatmp['lokasi'];

        // Ubah data 
        $query = mysqli_query($conn, "UPDATE tbl_peralatan_mesin SET lokasi='$lokasi_baru' WHERE kode='$kode_inventaris'");
    } else if ($jenis_inventaris == "Kendaraan") {
        $query = mysqli_query($conn, "SELECT * FROM tbl_kendaraan WHERE kode='$kode_inventaris' limit 1");
        $datatmp = mysqli_fetch_assoc($query);
        $lokasi_lama = $datatmp['lokasi'];

        // Ubah data 
        $query = mysqli_query($conn, "UPDATE tbl_kendaraan SET lokasi='$lokasi_baru' WHERE kode='$kode_inventaris'");
    }

    mysqli_query($conn, "UPDATE tbl_mutasi_inventaris SET tgl_mutasi='$tgl_mutasi', kode_inventaris='$kode_inventaris', jenis_inventaris='$jenis_inventaris', lokasi_lama='$lokasi_lama', lokasi_baru='$lokasi_baru' WHERE kode_mutasi='$kode'");

    echo "<script>alert('Data diupdate'); window.location.href='/index.php?page=datamutasi';</script>";
} else if ($aksi == "hapus") {

    $kode = $_GET["kode"];

    mysqli_query($conn, "DELETE FROM tbl_mutasi_inventaris WHERE kode_mutasi='$kode'");

    echo "<script>alert('Data dihapus'); window.location.href='/index.php?page=datamutasi';</script>";
}
