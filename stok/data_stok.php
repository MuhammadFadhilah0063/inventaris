<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Data Stok</h1>
            <div class="text-right" style="margin-top: -4%;">
                <a href="stok/cetak_stok.php" target="_blank" class="btn btn-default " styles=""><i class="fa fa-print "></i>
                    Print </a>
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
                Stok Barang
                <div class="text-right" style="margin-top: -2%;">
                    <form action="stok.php?page=datastok" method="GET">
                        <label>Cari </label>
                        <input type="text" name="cari" placeholder="Masukkan Kode Barang">
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
                        <?php
                        ?>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang Masuk</th>
                            <th>Jumlah Barang Keluar</th>
                            <th>Total Barang Saat Ini Tersedia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $data = mysqli_query($conn, "SELECT * from tbl_stok where kode_barang like '%" . $cari . "%' ");
                        } else {
                            $data = mysqli_query($conn, "SELECT * from tbl_stok");
                        }

                        $no = 1;
                        while ($row = mysqli_fetch_array($data)) {

                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['kode_barang'] ?></td>
                                <td><?php echo $row['nama_barang'] ?></td>
                                <td><?php echo $row['jml_barangmasuk'] ?></td>
                                <td><?php echo $row['jml_barangkeluar'] ?></td>
                                <td><?php echo $row['total_barang'] ?></td>
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