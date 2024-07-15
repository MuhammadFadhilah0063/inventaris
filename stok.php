<?php 

include_once("config/Class_Stok.php");
$cs = new Class_Stok();

include_once("config/config.php");



 ?>
<!DOCTYPE html>
<html lang="en">
<?php 
include_once("config/Class_Stok.php");
$db = new Class_Stok();
 

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

            if (isset($_GET['page']) && $_GET['page'] == "cetakstok") {
                include_once("stok/cetak_stokk.php");   
            }
            else{
                include_once("stok/data_stok.php");
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
