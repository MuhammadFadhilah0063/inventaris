<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Data Peminjaman</h1>
            <div class="text-right" style="margin-top: -4%;">
                <a href="pages/cetak_peminjaman.php" target="_blank" class="btn btn-default " styles=""><i class="fa fa-print "></i> Print </a>
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
                <a href="index.php?page=formpeminjaman" class="btn btn-default " styles=""><i class="glyphicon glyphicon-plus "></i> Tambah Data </a>
                <div class="text-right" style="margin-top: -4%;">
                    <form action="peminjaman.php?page=datapeminjaman" method="GET">
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
                            <th>No Pinjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Pinjam</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Keterangan</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $data = mysqli_query($conn, "select * from tbl_pinjam where kode_barang like '%" . $cari . "%' || nama_barang like '%" . $cari . "%' || nomor_pinjam like '%" . $cari . "%'");
                        } else {
                            $data = mysqli_query($conn, "select * from tbl_pinjam");
                        }

                        $no = 1;
                        while ($row = mysqli_fetch_array($data)) {

                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['nomor_pinjam'] ?></td>
                                <td><?php echo $row['tgl_pinjam'] ?></td>
                                <td><?php echo $row['kode_barang'] ?></td>
                                <td><?php echo $row['nama_barang'] ?></td>
                                <td><?php echo $row['jumlah_pinjam'] ?></td>
                                <td><?php echo $row['peminjam'] ?></td>
                                <td><?php echo $row['tgl_kembali'] ?></td>
                                <td style="color:red; font-weight: bold;"><?= $row['keterangan'] ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($row['keterangan'] == 'Sudah dikembalikan') {
                                    ?>

                                        <span class="">-</span>

                                    <?php
                                    } else {
                                    ?>
                                        <form action="pages/proses_barang.php?aksi=kembalibarang" method="post">
                                            <select name="status" class="form-control" style="width: 180px; height: 30px;" required>
                                                <option selected="selected"></option>
                                                <option value="Sudah dikembalikan">Sudah dikembalikan</option>
                                            </select>
                                            <br>
                                            <input type="text" name="no_pinjam" value="<?= $row['nomor_pinjam'] ?>" hidden>
                                            <input type="submit" value="proses" class="btn btn-default" style="padding:5px;">
                                        </form>
                                    <?php } ?>
                                </td>
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