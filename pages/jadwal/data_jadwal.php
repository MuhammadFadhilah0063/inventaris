<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Data Jadwal Pemeliharaan Inventaris</h1>
            <div class="text-right" style="margin-top: -4%;">
                <a href="pages/jadwal/cetak.php" target="_blank" class="btn btn-default " styles=""><i class="fa fa-print "></i>
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
                <a href="index.php?page=jadwalbaru" class="btn btn-default " styles=""><i class="glyphicon glyphicon-plus "></i>
                    Tambah Data </a>
                <div class="text-right" style="margin-top: -4%;">
                    <form action="index.php" method="GET">
                        <label>Cari </label>
                        <input type="hidden" name="page" value="datajadwal">
                        <input type="text" name="cari" placeholder="cari ..." title="Pencarian kode jadwal, kode inventaris dan status...">
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
                            <th>Kode Jadwal</th>
                            <th>Tanggal Pemeliharaan</th>
                            <th>Kode Inventaris</th>
                            <th>Jenis Inventaris</th>
                            <th>Status</th>
                            <th>Keterangan</th>
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
                            $data = mysqli_query($conn, "select * from tbl_jadwal_pemeliharaan where kode_jadwal like '%" . $cari . "%' || kode_inventaris like '%" . $cari . "%' || status like '%" . $cari . "%'");
                        } else {
                            $data = mysqli_query($conn, "select * from tbl_jadwal_pemeliharaan");
                        }

                        $no = 1;
                        while ($row = mysqli_fetch_array($data)) {

                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['kode_jadwal'] ?></td>
                                <td><?php echo formatTanggal($row['tgl']) ?></td>
                                <td><?php echo $row['kode_inventaris'] ?></td>
                                <td><?php echo $row['jenis_inventaris'] ?></td>
                                <td>
                                    <?php
                                    if ($row['status'] == 'Sudah Dilakukan') {
                                        echo "<span class='text-success'>" . $row['status'] . "</span>";
                                    } else if ($row['status'] == 'Belum Dilakukan') {
                                        echo "<span class='text-warning'>" . $row['status'] . "</span>";
                                    } else {
                                        echo "<span class='text-danger'>" . $row['status'] . "</span>";
                                    }
                                    ?>
                                </td>
                                <td><?= $row['keterangan'] ? $row['keterangan'] : '-' ?></td>
                                <td><a href="index.php?page=jadwaledit&id=<?= $row['kode_jadwal'] ?>">Edit</a> - <a href="<?= $baseUrl ?>/pages/jadwal/proses.php?aksi=hapus&kode=<?= $row['kode_jadwal'] ?>" onclick="return confirm('Yakin mau dihapus?');" data-kode="<?= $row['kode_jadwal'] ?>">Hapus</a> - <a data-toggle="modal" data-target="#myModal" href="">
                                        Selesai
                                    </a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Pemeliharaan sudah dilakukan?</h4>
                            </div>
                            <div class="modal-body">
                                <form action="pages/jadwal/proses.php?aksi=selesai" method="post" enctype="multipart/form-data">
                                    <input type="hidden" id="hiddenInput" name="kode">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea rows="4" name="keterangan" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                </div>

                <script>
                    // Ambil semua elemen <a> yang membuka modal
                    var modalTriggers = document.querySelectorAll('a[data-toggle="modal"]');

                    modalTriggers.forEach(function(trigger) {
                        trigger.addEventListener('click', function(event) {
                            // Cari elemen <a> sebelumnya
                            var prevLink = trigger.previousElementSibling;

                            // Ambil nilai data-kode dari elemen sebelumnya
                            var kode = prevLink.getAttribute('data-kode');

                            // Set nilai input hidden di dalam modal
                            var hiddenInput = document.getElementById('hiddenInput');
                            hiddenInput.value = kode;
                        });
                    });
                </script>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- jQuery -->