<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Supplier</h1>
            <div class="text-right" style="margin-top: -4%;">
                <a href="supplier/cetak_supplier.php" target="_blank" class="btn btn-default " styles=""><i class="fa fa-print "></i> Print </a>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <a href="supplier.php?page=supplierbaru" class="btn btn-default " styles=""><i class="glyphicon glyphicon-plus"></i> Tambah Data </a>
                <div class="text-right" style="margin-top: -4%;">
                    <form action="supplier.php?page=supplier" method="GET">
                        <label>Cari </label>
                        <input type="text" name="cari">
                        <input type="submit" value="Search">
                    </form>

                    <?php
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        echo "<b>Hasil pencarian : " . $cari . "</b>";
                    }
                    ?>
                </div>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Alamat Supplier</th>
                            <th>Telp Supplier</th>
                            <th>Kota Supplier</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $data = mysqli_query($conn, "select * from tbl_supplier where kode_supplier like '%" . $cari . "%' || nama_supplier like '%" . $cari . "%'");
                        } else {
                            $data = mysqli_query($conn, "select * from tbl_supplier");
                        }

                        $no = 1;
                        while ($row = mysqli_fetch_array($data)) {

                        ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['kode_supplier']; ?></td>
                                <td><?php echo $row['nama_supplier']; ?></td>
                                <td><?php echo $row['alamat_supplier']; ?></td>
                                <td><?php echo $row['telp_supplier']; ?></td>
                                <td><?php echo $row['kota_supplier']; ?></td>
                                <td><a href="supplier.php?id=<?= $row['kode_supplier'] ?>&page=updatesupplier">Edit</a> - <a href="supplier.php?hapus&id=<?= $row['kode_supplier'] ?>" onclick="return confirm('Yakin mau dihapus?');">Hapus</a></td>
                            </tr>
                        <?php }
                        ?>



                    </tbody>
                </table>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->