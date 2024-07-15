<!DOCTYPE html>
<html>

<head>
    <title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.WRAPUPPRO.COM</title>
</head>

<body>

    <center>

        <h2>LAPORAN DATA PEMINJAMAN</h2>
        <h4>WWW.WRAPUPPRO.COM</h4>

    </center>

    <?php
    include  '../config/config.php';
    session_start();
    ?>

    <table border="1" style="width: 100%">
        <tr>
            <th>No</th>
            <th>Nomor Pinjam</th>
            <th>Tanggal Pinjam</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Pinjam</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Kembali</th>
            <th>Keterangan</th>
        </tr>
        <?php
        $no = 1;
        $date = date("d-m-Y");
        $sql = mysqli_query($conn, "select * from tbl_pinjam");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?= $data['nomor_pinjam'] ?></td>
                <td><?= $data['tgl_pinjam'] ?></td>
                <td><?= $data['kode_barang'] ?></td>
                <td><?= $data['nama_barang'] ?></td>
                <td><?= $data['jumlah_pinjam'] ?></td>
                <td><?= $data['peminjam'] ?></td>
                <td><?= $data['tgl_kembali'] ?></td>
                <td><?= $data['keterangan'] ?></td>
            </tr>
        <?php
        }
        ?>
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