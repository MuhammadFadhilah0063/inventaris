<!DOCTYPE html>
<html>

<head>
  <title>LAPORAN DATA PERALATAN & MESIN</title>
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

    <h3>LAPORAN DATA PERALATAN & MESIN</h3>
  </center>

  <?php
  include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
  session_start();

  // total barang keseluruhan
  $query = mysqli_query($conn, "select sum(jumlah) as total from tbl_peralatan_mesin");
  $totalSemua = mysqli_fetch_assoc($query);
  // total barang baru
  $query = mysqli_query($conn, "select sum(jumlah) as total from tbl_peralatan_mesin where kondisi='baru'");
  $totalBaru = mysqli_fetch_assoc($query);
  // total barang bekas
  $query = mysqli_query($conn, "select sum(jumlah) as total from tbl_peralatan_mesin where kondisi='bekas'");
  $totalBekas = mysqli_fetch_assoc($query);
  ?>

  <table border="1" style="width: 100%;">
    <tr>
      <th width="1%">No</th>
      <th>Kode Peralatan & Mesin</th>
      <th>Nama Peralatan & Mesin</th>
      <th>Merek</th>
      <th>Spesifikasi</th>
      <th>Lokasi Penyimpanan</th>
      <th>Jumlah</th>
      <th>Kategori</th>
      <th>Kondisi</th>
    </tr>
    <?php
    $no = 1;
    $date = date("d-m-Y");
    $sql = mysqli_query($conn, "select * from tbl_peralatan_mesin");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['kode']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['merek']; ?></td>
        <td><?php echo $data['spesifikasi']; ?></td>
        <td><?php echo $data['lokasi']; ?></td>
        <td><?php echo $data['jumlah']; ?></td>
        <td><?php echo $data['kategori']; ?></td>
        <td><?php echo $data['kondisi']; ?></td>
      </tr>
    <?php
    }
    ?>
    <tr>
      <td align='center' colspan="7">Jumlah Peralatan & Mesin Baru</td>
      <td align='center' colspan="2"><?= $totalBaru['total'] ?> unit</td>
    </tr>
    <tr>
      <td align='center' colspan="7">Jumlah Peralatan & Mesin Bekas</td>
      <td align='center' colspan="2"><?= $totalBekas['total'] ?> unit</td>
    </tr>
    <tr>
      <td align='center' colspan="7">Total Peralatan & Mesin</td>
      <td align='center' colspan="2"><?= $totalSemua['total'] ?> unit</td>
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