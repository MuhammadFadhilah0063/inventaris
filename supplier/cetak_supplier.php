<!DOCTYPE html>
<html>

<head>
    <title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.WRAPUPPRO.COM</title>
</head>

<body>

    <center>

        <h2>LAPORAN DATA BARANG</h2>
        <h4>WWW.WRAPUPPRO.COM</h4>

    </center>

    <?php
    include  '../config/config.php';
    session_start();
    ?>

    <table border="1" style="width: 100%">
        <tr>
            <th width="1%">No</th>
            <th>Kode Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat Supplier</th>
            <th>Telp Supplier</th>
            <th>Kota Supplier</th>
        </tr>
        <?php
        $no = 1;
        $date = date("d-m-Y");
        $sql = mysqli_query($conn, "select * from tbl_supplier");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td align='center'><?= $no++ ?></td>
                <td align='center'><?= $data['kode_supplier'] ?></td>
                <td align='left'><?= $data['nama_supplier'] ?></td>
                <td align='left'><?= $data['alamat_supplier'] ?></td>
                <td align='left'><?= $data['telp_supplier'] ?></td>
                <td align='left'><?= $data['kota_supplier'] ?></td>
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