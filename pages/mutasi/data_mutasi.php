<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Data Mutasi Inventaris</h1>
            <div class="text-right" style="margin-top: -4%;">
                <a href="pages/mutasi/cetak.php" target="_blank" class="btn btn-default " styles=""><i class="fa fa-print "></i>
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
                <a href="index.php?page=mutasibaru" class="btn btn-default " styles=""><i class="glyphicon glyphicon-plus "></i>
                    Tambah Data </a>
                <div class="text-right" style="margin-top: -4%;">
                    <form action="index.php" method="GET">
                        <label>Cari </label>
                        <input type="hidden" name="page" value="datamutasi">
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
                            <th>Kode Mutasi</th>
                            <th>Tanggal Mutasi</th>
                            <th>Kode Inventaris</th>
                            <th>Jenis Inventaris</th>
                            <th>Lokasi Penyimpanan Lama</th>
                            <th>Lokasi Penyimpanan Baru</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        function formatTanggal($tanggal)
                        {
                            $date = new DateTime($tanggal);
                            $formatter = new IntlDateFormatter(
                                'id_ID', // Locales (bahasa Indonesia)
                                IntlDateFormatter::LONG, // Format panjang
                                IntlDateFormatter::NONE, // Tidak ada format waktu
                                null, // Zona waktu
                                null, // Kalender
                                'd MMMM y' // Format tanggal
                            );
                            return $formatter->format($date);
                        }

                        function getBaseUrl()
                        {
                            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                            $host = $_SERVER['HTTP_HOST'];

                            return $protocol . $host;
                        }

                        $baseUrl = getBaseUrl();

                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $data = mysqli_query($conn, "select * from tbl_mutasi_inventaris where kode_mutasi like '%" . $cari . "%' || kode_inventaris like '%" . $cari . "%'");
                        } else {
                            $data = mysqli_query($conn, "select * from tbl_mutasi_inventaris");
                        }

                        $no = 1;
                        while ($row = mysqli_fetch_array($data)) {

                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['kode_mutasi'] ?></td>
                                <td><?php echo formatTanggal($row['tgl_mutasi']) ?></td>
                                <td><?php echo $row['kode_inventaris'] ?></td>
                                <td><?php echo $row['jenis_inventaris'] ?></td>
                                <td><?php echo $row['lokasi_lama'] ?></td>
                                <td><?php echo $row['lokasi_baru'] ?></td>
                                <td><a href="index.php?page=mutasiedit&id=<?= $row['kode_mutasi'] ?>">Edit</a> - <a href="<?= $baseUrl ?>/pages/mutasi/proses.php?aksi=hapus&kode=<?= $row['kode_mutasi'] ?>" onclick="return confirm('Yakin mau dihapus?');">Hapus</a>
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
<!-- jQuery -->