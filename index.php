<?php

include_once("config/Class_Barang.php");
$db = new Class_Barang();


include_once("config/config.php");
// Mengambil kode barang baru
include_once("fungsi/nomatbrg.php");
// Mengambil kode peralatan baru
include_once("fungsi/nomatperalatan.php");
// Mengambil kode kendaraan baru
include_once("fungsi/nomatkendaraan.php");
// Mengambil kode barang masuk
include_once("fungsi/nomatbrgmasuk.php");
// Mengambil nomor pinjam
include_once("fungsi/nomatpinjam.php");
// Mengambil nomor mutasi
include_once("fungsi/nomatmutasi.php");
// Mengambil nomor kerusakan
include_once("fungsi/nomatkerusakan.php");
// Mengambil nomor jadwal
include_once("fungsi/nomatjadwal.php");


if (isset($_GET['hapus'])) {

    $db->hapus($_GET['id']);
    echo "<script>alert('barang berhasil dihapus'); window.location.href='index.php?page=databarang';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once("config/Class_Barang.php");
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
    include_once("includes/header.php"); ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once("includes/navbar.php"); ?>
        <!-- /.navbar-top-links -->
        <?php include_once("includes/sidebar.php"); ?>

        <!-- /.navbar-static-side -->
        <div id="page-wrapper">

            <?php

            if (isset($_GET['page']) && $_GET['page'] == "databarang") {

                include_once("pages/data_barang.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "barangbaru") {

                include_once("pages/input_barang.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "dataperalatanmesin") {

                include_once("pages/peralatan_mesin/data_peralatan_mesin.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "peralatanmesinbaru") {

                include_once("pages/peralatan_mesin/input_peralatan_mesin.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "peralatanmesinedit") {

                include_once("pages/peralatan_mesin/edit_peralatan_mesin.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "datakendaraan") {

                include_once("pages/kendaraan/data_kendaraan.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "kendaraanbaru") {

                include_once("pages/kendaraan/input_kendaraan.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "kendaraanedit") {

                include_once("pages/kendaraan/edit_kendaraan.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "datamutasi") {

                include_once("pages/mutasi/data_mutasi.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "mutasibaru") {

                include_once("pages/mutasi/input_mutasi.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "mutasiedit") {

                include_once("pages/mutasi/edit_mutasi.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "datakerusakan") {

                include_once("pages/kerusakan/data_kerusakan.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "kerusakanbaru") {

                include_once("pages/kerusakan/input_kerusakan.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "kerusakanedit") {

                include_once("pages/kerusakan/edit_kerusakan.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "datajadwal") {

                include_once("pages/jadwal/data_jadwal.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "jadwalbaru") {

                include_once("pages/jadwal/input_jadwal.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "jadwaledit") {

                include_once("pages/jadwal/edit_jadwal.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "update") {

                include_once("pages/edit_barang.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "barangmasuk") {

                include_once("pages/data_barangmasuk.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "barangkeluar") {

                include_once("pages/data_barangkeluar.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "inputbarangmasuk") {

                include_once("pages/input_barangmasuk.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "peminjaman") {

                include_once("pages/data_peminjaman.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "formpeminjaman") {

                include_once("pages/form_peminjaman.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "datastok") {

                include_once("stok/data_stok.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "pengaturan") {

                include_once("pages/pengaturan.php");
            } else {
                include_once("pages/dashboard.php");
            }

            ?>

        </div>
        <!-- /#pag-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include_once("includes/footer.php"); ?>

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