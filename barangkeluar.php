<?php

include("config/Class_Barang.php");
$cs = new Class_Barang();

include("config/config.php");
include("fungsi/nomatbrg.php");


if (isset($_GET['hapus'])) {

    $cs->hapus($_GET['id']);
    echo "<script>alert('data barang berhasil dihapus'); window.location.href='barangkeluar.php';</script>";
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

            if (isset($_GET['page']) && $_GET['page'] == "barangkeluarbaru") {

                include("pages/form_peminjaman.php");
            } else if (isset($_GET['page']) && $_GET['page'] == "updatebarangkeluar") {

                include("pages/edit_barangkeluar.php");
            } else {
                include("pages/data_barangkeluar.php");
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