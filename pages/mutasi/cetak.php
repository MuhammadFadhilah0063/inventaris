<!DOCTYPE html>
<html>

<head>
  <title>LAPORAN MUTASI INVENTARIS</title>

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

    <h3>LAPORAN MUTASI INVENTARIS</h3>
  </center>

  <?php
  include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
  session_start();

  // total barang
  $query = mysqli_query($conn, "select count(kode_mutasi) as total from tbl_mutasi_inventaris where jenis_inventaris='Barang'");
  $totalBarang = mysqli_fetch_assoc($query);
  // total alat
  $query = mysqli_query($conn, "select count(kode_mutasi) as total from tbl_mutasi_inventaris where jenis_inventaris='Peralatan & Mesin'");
  $totalAlat = mysqli_fetch_assoc($query);
  // total kendaraan
  $query = mysqli_query($conn, "select count(kode_mutasi) as total from tbl_mutasi_inventaris where jenis_inventaris='Kendaraan'");
  $totalKendaraan = mysqli_fetch_assoc($query);
  // total keseluruhan
  $totalSemua = $totalBarang['total'] + $totalAlat['total'] + $totalKendaraan['total'];
  ?>

  <table border="1" style="width: 100%;">
    <tr>
      <th colspan="7" align="left">Barang</th>
    </tr>
    <tr>
      <th width="1%">No</th>
      <th>Kode Mutasi</th>
      <th>Tanggal Mutasi</th>
      <th>Kode Inventaris</th>
      <th>Jenis Inventaris</th>
      <th>Lokasi Penyimpanan Lama</th>
      <th>Lokasi Penyimpanan Baru</th>
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
    $sql = mysqli_query($conn, "select * from tbl_mutasi_inventaris where jenis_inventaris='Barang'");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $data['kode_mutasi']; ?></td>
      <td><?php echo formatTanggal($data['tgl_mutasi']); ?></td>
      <td><?php echo $data['kode_inventaris']; ?></td>
      <td><?php echo $data['jenis_inventaris']; ?></td>
      <td><?php echo $data['lokasi_lama']; ?></td>
      <td><?php echo $data['lokasi_baru']; ?></td>
    </tr>
    <?php
    }
    ?>
    <tr>
      <td align='center' colspan="6">Jumlah Mutasi Barang</td>
      <td align='center' colspan="1"><?= $totalBarang['total'] ?> mutasi</td>
    </tr>

    <tr>
      <th colspan="7" align="left">Peralatan & Mesin</th>
    </tr>
    <tr>
      <th width="1%">No</th>
      <th>Kode Mutasi</th>
      <th>Tanggal Mutasi</th>
      <th>Kode Inventaris</th>
      <th>Jenis Inventaris</th>
      <th>Lokasi Penyimpanan Lama</th>
      <th>Lokasi Penyimpanan Baru</th>
    </tr>
    <?php
    $no = 1;
    $date = date("d-m-Y");
    $sql = mysqli_query($conn, "select * from tbl_mutasi_inventaris where jenis_inventaris='Peralatan & Mesin'");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $data['kode_mutasi']; ?></td>
      <td><?php echo formatTanggal($data['tgl_mutasi']); ?></td>
      <td><?php echo $data['kode_inventaris']; ?></td>
      <td><?php echo $data['jenis_inventaris']; ?></td>
      <td><?php echo $data['lokasi_lama']; ?></td>
      <td><?php echo $data['lokasi_baru']; ?></td>
    </tr>
    <?php
    }
    ?>
    <tr>
      <td align='center' colspan="6">Jumlah Mutasi Peralatan & Mesin</td>
      <td align='center' colspan="1"><?= $totalAlat['total'] ?> mutasi</td>
    </tr>

    <tr>
      <th colspan="7" align="left">Kendaraan</th>
    </tr>
    <tr>
      <th width="1%">No</th>
      <th>Kode Mutasi</th>
      <th>Tanggal Mutasi</th>
      <th>Kode Inventaris</th>
      <th>Jenis Inventaris</th>
      <th>Lokasi Penyimpanan Lama</th>
      <th>Lokasi Penyimpanan Baru</th>
    </tr>
    <?php
    $no = 1;
    $date = date("d-m-Y");
    $sql = mysqli_query($conn, "select * from tbl_mutasi_inventaris where jenis_inventaris='Kendaraan'");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $data['kode_mutasi']; ?></td>
      <td><?php echo formatTanggal($data['tgl_mutasi']); ?></td>
      <td><?php echo $data['kode_inventaris']; ?></td>
      <td><?php echo $data['jenis_inventaris']; ?></td>
      <td><?php echo $data['lokasi_lama']; ?></td>
      <td><?php echo $data['lokasi_baru']; ?></td>
    </tr>
    <?php
    }
    ?>
    <tr>
      <td align='center' colspan="6">Jumlah Mutasi Kendaraan</td>
      <td align='center' colspan="1"><?= $totalKendaraan['total'] ?> mutasi</td>
    </tr>
    <tr>
      <td align='center' colspan="6">Jumlah Semua Mutasi</td>
      <td align='center' colspan="1"><?= $totalSemua ?> mutasi</td>
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