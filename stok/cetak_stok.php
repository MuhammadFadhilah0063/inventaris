<!DOCTYPE html>
<html>

<head>
    <title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.WRAPUPPRO.COM</title>
</head>

<body>

    <center>

        <h2>LAPORAN DATA STOK BARANG</h2>
        <h4>WWW.WRAPUPPRO.COM</h4>

    </center>

    <?php
    include  '../config/config.php';
    session_start();
    ?>

    <table border="1" style="width: 100%">
        <tr>
            <th width='5%'>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang Masuk</th>
            <th>Jumlah Barang Keluar</th>
            <th>Total Barang</th>
            <th>Total Barang Saat Ini Tersedia</th>
        </tr>
        <?php
        $no = 1;
        $date = date("d-m-Y");
        $sql = mysqli_query($conn, "SELECT tbl_barang.kode_barang, tbl_barang.nama_barang, tbl_stok.jml_barangmasuk, tbl_stok.jml_barangkeluar, tbl_stok.total_barang, tbl_barang.jumlah_brg
        FROM tbl_barang
        INNER JOIN tbl_stok ON tbl_barang.kode_barang = tbl_stok.kode_barang;");
        while($data = mysqli_fetch_array($sql))
        {
        ?>
            <tr>
                <td align='center'><?= $no++ ?></td>
                <td align='center'><?= $data['kode_barang'] ?></td>
                <td align='center'><?= $data['nama_barang'] ?></td>
                <td align='center'><?= $data['jml_barangmasuk'] ?></td>
                <td align='center'><?= $data['jml_barangkeluar'] ?></td>
                <td align='center'><?= $data['total_barang'] ?></td>
                <td align='center'><?= $data['jumlah_brg'] ?></td>
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