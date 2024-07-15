<?php

include("config/Class_Barang.php");
$db = new Class_Barang();

include("config/Class_Stok.php");
$st = new Class_Stok();

include("config/config.php");
// Mengambil kode barang baru
include("fungsi/nomatbrg.php");
// Mengambil kode barang masuk
include("fungsi/nomatbrgmasuk.php");
// Mengambil nomor pinjam
include("fungsi/nomatpinjam.php");


if (isset($_GET['hapus'])) {

    $db->hapus($_GET['id']);
    echo "<script>alert('barang berhasil dihapus'); window.location.href='index.php?page=databarang';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("config/Class_Barang.php");
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
    include("includes/header.php"); ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/navbar.php"); ?>
        <!-- /.navbar-top-links -->
        <?php include("includes/sidebar.php"); ?>

        <!-- /.navbar-static-side -->
        <div id="page-wrapper">

            <?php


            if (isset($_GET['page']) && $_GET['page'] == "supplierbaru") {

                include("supplier/input_supplier.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "updatesupplier") {

                include("supplier/edit_supplier.php");
            } else {
                include("supplier/data_supplier.php");
            }

            ?>

        </div>
        <!-- /#pag-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include("includes/footer.php"); ?>

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