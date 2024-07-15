<?php
include('C:/xampp/htdocs/inventaris/config/config.php');
?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Data Barang</h1>
            <div class="text-right" style="margin-top: -4%;">
                <a href="pages/cetak_databarang.php" target="_blank" class="btn btn-default " styles=""><i class="fa fa-print "></i> Print </a>
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
                <a href="index.php?page=barangbaru" class="btn btn-default " styles=""><i class="glyphicon glyphicon-plus "></i> Tambah Data </a>
                <div class="text-right" style="margin-top: -4%;">
                    <form action="barang.php?page=databarang" method="GET">
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
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Spesifikasi</th>
                            <th>Lokasi Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Kondisi</th>
                            <th>Jenis Barang</th>
                            <th>Sumber Dana</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $data = mysqli_query($conn, "select * from tbl_barang where kode_barang like '%" . $cari . "%' || nama_barang like '%" . $cari . "%'");
                        } else {
                            $data = mysqli_query($conn, "select * from tbl_barang");
                        }

                        $no = 1;
                        while ($row = mysqli_fetch_array($data)) {

                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['kode_barang'] ?></td>
                                <td><?php echo $row['nama_barang'] ?></td>
                                <td><?php echo $row['spesifikasi'] ?></td>
                                <td><?php echo $row['lokasi_barang'] ?></td>
                                <td><?php echo $row['kategori'] ?></td>
                                <td><?php echo $row['jumlah_brg'] ?></td>
                                <td><?php echo $row['kondisi'] ?></td>
                                <td><?php echo $row['jenis_brg'] ?></td>
                                <td><?php echo $row['sumber_dana'] ?></td>
                                <td><a href="barang.php?id=<?= $row['kode_barang'] ?>&page=updatebarang">Edit</a> - <a href="?hapus&id=<?= $row['kode_barang'] ?>" onclick="return confirm('Yakin mau dihapus?');">Hapus</a></td>
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
<!-- jQuery -->