<!DOCTYPE html>
<html>

<head>
  <title>LAPORAN JADWAL PEMELIHARAAN INVENTARIS</title>

  <style>
  table,
  tr,
  td,
  th {
    border-collapse: collapse;
    border: 1px solid black;
    padding: 3px;
  }
  </style>
</head>

<body>
  <img style="position: absolute;margin-left: 40px; margin-top: 5px; width: 60px;" src="/img/provinsi.png">
  <center>
    <p>
    <ol style="list-style-type: none; margin-left: 40px;">
      <li>PEMERINTAH PROVINSI KALIMANTAN SELATAN</li>
      <li>DINAS PENDIDIKAN DAN KEBUDAYAAN</li>
      <li style="font-size: larger;"><b> PUSAT LAYANAN DISABILITAS DAN PENDIDIKAN INKLUSI</b></li>
      <li style="font-size: smaller;">Jalan Perdagangan Komp. Bumi Indah Lestari II, Kuin Utara, Kayu Tangi, Banjarmasin
        - Kalimantan Selatan</li>
      <li style="font-size: smaller;">Telp. 0811 5132 424 - email: pldpi.provkalsel@gmail.com</li>
    </ol>
    </p>
    <ol style="list-style-type: none; ">
      <li></li>
      <hr />
      <li></li>
      <hr size="2" style="background-color: black; border-color: black;" />
    </ol>

    <h3>LAPORAN JADWAL PEMELIHARAAN INVENTARIS</h3>
  </center>

  <?php
  include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
  session_start();

  // total Sudah Dilakukan
  $query = mysqli_query($conn, "select count(kode_jadwal) as total from tbl_jadwal_pemeliharaan where status='Sudah Dilakukan'");
  $totalSudah = mysqli_fetch_assoc($query);
  // total Belum Dilakukan
  $query = mysqli_query($conn, "select count(kode_jadwal) as total from tbl_jadwal_pemeliharaan where status='Belum Dilakukan'");
  $totalBelum = mysqli_fetch_assoc($query);
  // total Terlewat
  $query = mysqli_query($conn, "select count(kode_jadwal) as total from tbl_jadwal_pemeliharaan where status='Terlewat'");
  $totalTerlewat = mysqli_fetch_assoc($query);
  // total keseluruhan
  $totalSemua = $totalSudah['total'] + $totalBelum['total'] + $totalTerlewat['total'];
  ?>

  <table border="1" style="width: 100%;">
    <tr>
      <th colspan="7" align="left">Sudah Dilakukan</th>
    </tr>
    <tr>
      <th width="1%">No</th>
      <th>Kode Jadwal</th>
      <th>Tanggal Pemeliharaan</th>
      <th>Kode Inventaris</th>
      <th>Jenis Inventaris</th>
      <th>Status</th>
      <th>Keterangan</th>
    </tr>
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

    $no = 1;
    $date = date("d-m-Y");
    $sql = mysqli_query($conn, "select * from tbl_jadwal_pemeliharaan where status='Sudah Dilakukan'");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $data['kode_jadwal']; ?></td>
      <td><?php echo formatTanggal($data['tgl']); ?></td>
      <td><?php echo $data['kode_inventaris']; ?></td>
      <td><?php echo $data['jenis_inventaris']; ?></td>
      <td><?php echo $data['status']; ?></td>
      <td><?php echo $data['keterangan']; ?></td>
    </tr>
    <?php
    }
    ?>
    <tr>
      <td align='center' colspan="6">Jumlah Sudah Dilakukan</td>
      <td align='center' colspan="1"><?= $totalSudah['total'] ?> jadwal</td>
    </tr>

    <tr>
      <th colspan="7" align="left">Belum Dilakukan</th>
    </tr>
    <tr>
      <th width="1%">No</th>
      <th>Kode Jadwal</th>
      <th>Tanggal Pemeliharaan</th>
      <th>Kode Inventaris</th>
      <th>Jenis Inventaris</th>
      <th>Status</th>
      <th>Keterangan</th>
    </tr>
    <?php
    $no = 1;
    $date = date("d-m-Y");
    $sql = mysqli_query($conn, "select * from tbl_jadwal_pemeliharaan where status='Belum Dilakukan'");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $data['kode_jadwal']; ?></td>
      <td><?php echo formatTanggal($data['tgl']); ?></td>
      <td><?php echo $data['kode_inventaris']; ?></td>
      <td><?php echo $data['jenis_inventaris']; ?></td>
      <td><?php echo $data['status']; ?></td>
      <td><?php echo $data['keterangan']; ?></td>
    </tr>
    <?php
    }
    ?>
    <tr>
      <td align='center' colspan="6">Jumlah Belum Dilakukan</td>
      <td align='center' colspan="1"><?= $totalBelum['total'] ?> jadwal</td>
    </tr>

    <tr>
      <th colspan="7" align="left">Terlewat</th>
    </tr>
    <tr>
      <th width="1%">No</th>
      <th>Kode Jadwal</th>
      <th>Tanggal Pemeliharaan</th>
      <th>Kode Inventaris</th>
      <th>Jenis Inventaris</th>
      <th>Status</th>
      <th>Keterangan</th>
    </tr>
    <?php
    $no = 1;
    $date = date("d-m-Y");
    $sql = mysqli_query($conn, "select * from tbl_jadwal_pemeliharaan where status='Terlewat'");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $data['kode_jadwal']; ?></td>
      <td><?php echo formatTanggal($data['tgl']); ?></td>
      <td><?php echo $data['kode_inventaris']; ?></td>
      <td><?php echo $data['jenis_inventaris']; ?></td>
      <td><?php echo $data['status']; ?></td>
      <td><?php echo $data['keterangan']; ?></td>
    </tr>
    <?php
    }
    ?>
    <tr>
      <td align='center' colspan="6">Jumlah Terlewat</td>
      <td align='center' colspan="1"><?= $totalTerlewat['total'] ?> jadwal</td>
    </tr>
    <tr>
      <td align='center' colspan="6">Jumlah Semua</td>
      <td align='center' colspan="1"><?= $totalSemua ?> jadwal</td>
    </tr>
  </table>

  <div class='footer'>
    <div style='margin-top:10px; text-align: right; '>Banjarmasin, <?= $date ?></div>
    <div style='margin-top:90px; margin-right:5px; text-align: right;'><?= $_SESSION['username'] ?></div>
  </div>
  <!-- <div class='page' align='center'>Hal - .$page.</div>; -->
  </div>

  <script>
  window.print();
  </script>

</body>

</html>