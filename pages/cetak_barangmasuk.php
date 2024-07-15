<!DOCTYPE html>
<html>

<head>
    <title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.WRAPUPPRO.COM</title>
</head>

<body>

    <center>

        <h2>LAPORAN DATA BARANG MASUK</h2>
        <h4>WWW.WRAPUPPRO.COM</h4>

    </center>

    <?php
    include  '../config/config.php';
    session_start();
    ?>

    <table border="1" style="width: 100%">
        <tr>
            <th>No</th>
            <th>Kode Masuk Barang</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Masuk</th>
            <th>Tanggal Masuk</th>
            <th>Kode Supplier</th>
        </tr>
        <?php
        $no = 1;
        $date = date("d-m-Y");
        $sql = mysqli_query($conn, "select * from tbl_masukbarang");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?= $data['id_masukbarang'] ?></td>
                <td><?= $data['kode_barang'] ?></td>
                <td><?= $data['nama_barang'] ?></td>
                <td><?= $data['jumlah_masuk'] ?></td>
                <td><?= $data['tgl_masuk'] ?></td>
                <td><?= $data['kode_supplier'] ?></td>
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