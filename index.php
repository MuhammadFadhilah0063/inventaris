<?php

include($_SERVER['DOCUMENT_ROOT'] . "/config/Class_Barang.php");
$db = new Class_Barang();

include($_SERVER['DOCUMENT_ROOT'] . "/config/Class_User.php");
$cu = new Class_User();

include($_SERVER['DOCUMENT_ROOT'] . "/config/Class_Stok.php");
$st = new Class_Stok();

include($_SERVER['DOCUMENT_ROOT'] . "/config/config.php");
// Mengambil kode barang baru
include($_SERVER['DOCUMENT_ROOT'] . "/fungsi/nomatbrg.php");
// Mengambil kode peralatan baru
include($_SERVER['DOCUMENT_ROOT'] . "/fungsi/nomatperalatan.php");
// Mengambil kode kendaraan baru
include($_SERVER['DOCUMENT_ROOT'] . "/fungsi/nomatkendaraan.php");
// Mengambil kode barang masuk
include($_SERVER['DOCUMENT_ROOT'] . "/fungsi/nomatbrgmasuk.php");
// Mengambil nomor pinjam
include($_SERVER['DOCUMENT_ROOT'] . "/fungsi/nomatpinjam.php");
// Mengambil nomor mutasi
include($_SERVER['DOCUMENT_ROOT'] . "/fungsi/nomatmutasi.php");
// Mengambil nomor kerusakan
include($_SERVER['DOCUMENT_ROOT'] . "/fungsi/nomatkerusakan.php");
// Mengambil nomor jadwal
include($_SERVER['DOCUMENT_ROOT'] . "/fungsi/nomatjadwal.php");


if (isset($_GET['hapus'])) {

    $db->hapus($_GET['id']);
    echo "<script>alert('barang berhasil dihapus'); window.location.href='index.php?page=databarang';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/config/Class_Barang.php");
$db = new Class_Barang();


?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AISP - SMKFU</title>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"); ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/navbar.php"); ?>
        <!-- /.navbar-top-links -->
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/sidebar.php"); ?>

        <!-- /.navbar-static-side -->
        <div id="page-wrapper">

            <?php

            if (isset($_GET['page']) && $_GET['page'] == "databarang") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/data_barang.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "barangbaru") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/input_barang.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "dataperalatanmesin") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/peralatan_mesin/data_peralatan_mesin.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "peralatanmesinbaru") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/peralatan_mesin/input_peralatan_mesin.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "peralatanmesinedit") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/peralatan_mesin/edit_peralatan_mesin.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "datakendaraan") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/kendaraan/data_kendaraan.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "kendaraanbaru") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/kendaraan/input_kendaraan.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "kendaraanedit") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/kendaraan/edit_kendaraan.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "datamutasi") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/mutasi/data_mutasi.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "mutasibaru") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/mutasi/input_mutasi.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "mutasiedit") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/mutasi/edit_mutasi.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "datakerusakan") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/kerusakan/data_kerusakan.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "kerusakanbaru") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/kerusakan/input_kerusakan.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "kerusakanedit") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/kerusakan/edit_kerusakan.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "datajadwal") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/jadwal/data_jadwal.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "jadwalbaru") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/jadwal/input_jadwal.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "jadwaledit") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/jadwal/edit_jadwal.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "update") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/edit_barang.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "barangmasuk") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/data_barangmasuk.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "barangkeluar") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/data_barangkeluar.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "inputbarangmasuk") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/input_barangmasuk.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "peminjaman") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/data_peminjaman.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "formpeminjaman") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/form_peminjaman.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "datastok") {

                include($_SERVER['DOCUMENT_ROOT'] . "/stok/data_stok.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "pengaturan") {

                include($_SERVER['DOCUMENT_ROOT'] . "/pages/pengaturan.php");
            } else {
                include($_SERVER['DOCUMENT_ROOT'] . "/pages/dashboard.php");
            }

            ?>

        </div>
        <!-- /#pag-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"); ?>

    <!-- <script>
$(document).ready(function() {
$('#dataTables-example').DataTable({
responsive: true
});
});
</script>
 -->


</body>

</html>