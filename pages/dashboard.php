<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?php
// Ubah Status Jadwal //
$query = mysqli_query($conn, "UPDATE tbl_jadwal_pemeliharaan SET status = 'Terlewat' WHERE tgl < CURDATE() AND status = 'Belum Dilakukan';");

// Stok //
$query = mysqli_query($conn, "SELECT kode_barang, nama_barang, total_barang FROM tbl_stok WHERE total_barang <= 3 ORDER BY total_barang ASC");
// Ambil data
$data1 = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data1[] = $row;
}
// Encode data ke format JSON
$data_json = json_encode($data1);

// Jadwal Hari ini //
$query = mysqli_query($conn, "SELECT * FROM tbl_jadwal_pemeliharaan WHERE tgl = CURDATE() AND status != 'Sudah Dilakukan'");
// Ambil data
$data2 = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data2[] = $row;
}
// Encode data ke format JSON
$data_json2 = json_encode($data2);

// Jadwal Besok hari //
$query = mysqli_query($conn, "SELECT * FROM tbl_jadwal_pemeliharaan WHERE tgl = CURDATE() + INTERVAL 1 DAY AND status != 'Sudah Dilakukan';
");
// Ambil data
$data3 = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data3[] = $row;
}
// Encode data ke format JSON
$data_json3 = json_encode($data3);

// Jadwal Terlewat //
$query = mysqli_query($conn, "SELECT * FROM tbl_jadwal_pemeliharaan WHERE tgl < CURDATE() AND status != 'Sudah Dilakukan';");
// Ambil data
$data4 = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data4[] = $row;
}
// Encode data ke format JSON
$data_json4 = json_encode($data4);
?>

<!-- Alert -->
<?php if (count($data1) > 0) : ?>
    <div class="row">
        <div class="col" style="padding-left: 15px; padding-right: 15px;">
            <div class="alert alert-warning">
                <strong>Pemberitahuan!</strong> Ada stok barang sudah mencapai atau lewat batas minimum 3 barang. <a data-toggle="modal" data-target="#modalStok" href="" class="btn-link" style="color: red;">
                    Lihat
                </a>
            </div>
        </div>
    </div>
<?php endif ?>
<?php if (count($data2) > 0) : ?>
    <div class="row">
        <div class="col" style="padding-left: 15px; padding-right: 15px;">
            <div class="alert alert-success">
                <strong>Pemberitahuan!</strong> Ada jadwal pemeliharaan inventaris hari ini. <a data-toggle="modal" data-target="#modalJadwalHariIni" href="" class="btn-link" style="color: red;">
                    Lihat
                </a>
            </div>
        </div>
    </div>
<?php endif ?>
<?php if (count($data3) > 0) : ?>
    <div class="row">
        <div class="col" style="padding-left: 15px; padding-right: 15px;">
            <div class="alert alert-info">
                <strong>Pemberitahuan!</strong> Ada jadwal pemeliharaan inventaris besok hari. <a data-toggle="modal" data-target="#modalJadwalBesok" href="" class="btn-link" style="color: red;">
                    Lihat
                </a>
            </div>
        </div>
    </div>
<?php endif ?>
<?php if (count($data4) > 0) : ?>
    <div class="row">
        <div class="col" style="padding-left: 15px; padding-right: 15px;">
            <div class="alert alert-danger">
                <strong>Pemberitahuan!</strong> Ada jadwal pemeliharaan inventaris yang terlewat. <a data-toggle="modal" data-target="#modalJadwalTerlewat" href="" class="btn-link" style="color: red;">
                    Lihat
                </a>
            </div>
        </div>
    </div>
<?php endif ?>

<!-- Modal Stok -->
<div class="modal fade" id="modalStok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" align='center'>Barang dengan stok sudah mencapai atau lewat batas
                    minimum 3 barang
                </h4>
            </div>
            <div class="modal-body">
                <table width="100%" class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" id="tableStok">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Total Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal Jadwal hari Ini -->
<div class="modal fade" id="modalJadwalHariIni" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" align='center'>Jadwal Pemeliharaan Inventaris Belum Dilakukan Hari Ini
                </h4>
            </div>
            <div class="modal-body">
                <table width="100%" class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" id="tableHariIni">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jadwal</th>
                            <th>Tanggal Pemeliharaan</th>
                            <th>Jenis Inventaris</th>
                            <th>Kode Inventaris</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal Jadwal besok hari -->
<div class="modal fade" id="modalJadwalBesok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" align='center'>Jadwal Pemeliharaan Inventaris Belum Dilakukan Besok
                    Hari
                </h4>
            </div>
            <div class="modal-body">
                <table width="100%" class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" id="tableBesok">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jadwal</th>
                            <th>Tanggal Pemeliharaan</th>
                            <th>Jenis Inventaris</th>
                            <th>Kode Inventaris</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal Jadwal Terlewat -->
<div class="modal fade" id="modalJadwalTerlewat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" align='center'>Jadwal Pemeliharaan Inventaris Belum Dilakukan Yang
                    Sudah Terlewat
                </h4>
            </div>
            <div class="modal-body">
                <table width="100%" class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" id="tableTerlewat">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jadwal</th>
                            <th>Tanggal Pemeliharaan</th>
                            <th>Jenis Inventaris</th>
                            <th>Kode Inventaris</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Widgets -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-qrcode fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>Barang!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=databarang">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-qrcode fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>Peralatan & Mesin!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=dataperalatanmesin">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-qrcode fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>Kendaraan!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=datakendaraan">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-truck fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>Stok!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=datastok">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sign-in fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>Barang Masuk!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=barangmasuk">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sign-out fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>Barang Keluar!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=barangkeluar">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-salmon">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-th-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>Mutasi Inventaris!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=datamutasi">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-salmon">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-th-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>Kerusakan Inventaris!</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=datakerusakan">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

</div> <!-- /.row -->

<!-- Grafik -->
<div class="row">
    <div class="col-md-6" style="padding-left: 15px; padding-right: 15px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                Grafik Penggunaan Barang Terbanyak
            </div>
            <div class="panel-body">
                <div class="chart-container" style="min-height: 375px">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6" style="padding-left: 15px; padding-right: 15px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                Grafik Distribusi Barang Per Kategori
            </div>
            <div class="panel-body">
                <div class="chart-container" style="min-height: 375px">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JQuery -->
<script src="/plugins/jquery.3.2.1.min.js"></script>
<!-- Chart JS -->
<script src="/plugins/chart.js/chart.min.js"></script>
<script>
    <?php
    $query = mysqli_query($conn, "SELECT kode_barang, nama_barang, jml_barangkeluar FROM tbl_stok ORDER BY jml_barangkeluar DESC LIMIT 3");

    // Buat array untuk label dan data
    $labels = [];
    $data = [];

    // Ambil hasil query dan masukkan ke dalam array
    while ($row = mysqli_fetch_assoc($query)) {
        $labels[] = $row['kode_barang'] . ' | ' . $row['nama_barang'];
        $data[] = $row['jml_barangkeluar'];
    }
    ?>

    // Deklarasi variabel dengan nilai dari PHP
    const labels = <?php echo json_encode($labels); ?>;
    const data = <?php echo json_encode($data); ?>;

    var myBarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: "Barang",
                backgroundColor: ['#147D73', '#EFAD4E', '#D8534F'],
                borderColor: '#333333',
                data: data,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
        }
    });


    <?php
    $sql = "SELECT 
        tbl_barang.kategori,
        SUM(tbl_stok.jml_barangkeluar) AS total
        FROM 
            tbl_stok
        JOIN 
            tbl_barang ON tbl_stok.kode_barang = tbl_barang.kode_barang
        GROUP BY 
            tbl_barang.kategori
        ORDER BY 
            total DESC;
        ";
    $query = mysqli_query($conn, $sql);

    // Buat array untuk label dan data
    $labels = [];
    $data = [];

    // Ambil hasil query dan masukkan ke dalam array
    while ($row = mysqli_fetch_assoc($query)) {
        $labels[] = $row['kategori'];
        $data[] = $row['total'];
    }
    ?>

    // Deklarasi variabel dengan nilai dari PHP
    const labelsPie = <?php echo json_encode($labels); ?>;
    const dataPie = <?php echo json_encode($data); ?>;

    var myPieChart = new Chart(pieChart, {
        type: 'pie',
        data: {
            labels: labelsPie,
            datasets: [{
                label: "Barang",
                backgroundColor: ['#4CAF50', '#FFEB3B', '#F44336'],
                // borderColor: '#333333',
                data: dataPie,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
        }
    });
</script>

<script>
    const formatTanggal = (tanggal) => {
        const bulanIndo = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        const date = new Date(tanggal);
        const tanggalFormat = date.getDate();
        const bulanFormat = bulanIndo[date.getMonth()];
        const tahunFormat = date.getFullYear();

        return `${tanggalFormat} ${bulanFormat} ${tahunFormat}`;
    };
</script>

<?php if (count($data1) > 0) : ?>
    <script>
        // Mengubah data PHP ke format JavaScript
        const dataStok = <?php echo $data_json; ?>;

        // Fungsi untuk mengisi tabel di dalam modal
        function populateTable(data) {
            const tableBody = document.querySelector('#tableStok tbody');
            tableBody.innerHTML = ''; // Kosongkan tabel sebelum menambahkan baris baru

            data.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.kode_barang}</td>
                    <td>${item.nama_barang}</td>
                    <td>${item.total_barang}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        populateTable(dataStok);
    </script>
<?php endif ?>

<?php if (count($data2) > 0) : ?>
    <script>
        // Mengubah data PHP ke format JavaScript
        const dataJadwal2 = <?php echo $data_json2; ?>;

        // Fungsi untuk mengisi tabel di dalam modal
        function populateTable2(data) {
            const tableBody = document.querySelector('#tableHariIni tbody');
            tableBody.innerHTML = ''; // Kosongkan tabel sebelum menambahkan baris baru

            data.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.kode_jadwal}</td>
                    <td>${formatTanggal(item.tgl)}</td>
                    <td>${item.jenis_inventaris}</td>
                    <td>${item.kode_inventaris}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        populateTable2(dataJadwal2);
    </script>
<?php endif ?>

<?php if (count($data3) > 0) : ?>
    <script>
        // Mengubah data PHP ke format JavaScript
        const dataJadwal3 = <?php echo $data_json3; ?>;
        console.log(dataJadwal3);

        // Fungsi untuk mengisi tabel di dalam modal

        const tableBody = document.querySelector('#tableBesok tbody');
        tableBody.innerHTML = ''; // Kosongkan tabel sebelum menambahkan baris baru

        dataJadwal3.forEach((item, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.kode_jadwal}</td>
                    <td>${formatTanggal(item.tgl)}</td>
                    <td>${item.jenis_inventaris}</td>
                    <td>${item.kode_inventaris}</td>
                `;
            tableBody.appendChild(row);
        });
    </script>
<?php endif ?>

<?php if (count($data4) > 0) : ?>
    <script>
        // Mengubah data PHP ke format JavaScript
        const dataJadwal4 = <?php echo $data_json4; ?>;

        // Fungsi untuk mengisi tabel di dalam modal
        function populateTable4(data) {
            const tableBody = document.querySelector('#tableTerlewat tbody');
            tableBody.innerHTML = ''; // Kosongkan tabel sebelum menambahkan baris baru

            data.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.kode_jadwal}</td>
                    <td>${formatTanggal(item.tgl)}</td>
                    <td>${item.jenis_inventaris}</td>
                    <td>${item.kode_inventaris}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        populateTable4(dataJadwal4);
    </script>
<?php endif ?>