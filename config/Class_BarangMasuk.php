<?php

/**
 * 
 */
class Class_BarangMasuk
{
    function barang()
    {
        include("config.php");

        $sql = "select * from tbl_barang order by kode_barang";

        $data = mysqli_query($conn, $sql);

        while ($d = mysqli_fetch_assoc($data)) {

            $hasil[] = $d;
        }
        return $hasil;
    }


    function supplier()
    {
        include("config.php");

        $sql = "select * from tbl_supplier order by kode_supplier";

        $data = mysqli_query($conn, $sql);

        while ($d = mysqli_fetch_assoc($data)) {

            $hasil[] = $d;
        }
        return $hasil;
    }


    function tampil_data()
    {
        include("config.php");

        $sql = "select * from tbl_masukbarang";

        $data = mysqli_query($conn, $sql);

        $data1 = mysqli_num_rows($data);
        if ($data1 == 0) {

            echo "<div class='alert alert-danger'>Tidak ada data</div>";
        } else {

            while ($d = mysqli_fetch_assoc($data)) {

                $hasil[] = $d;
            }
            return $hasil;
        }
    }

    function input_barangmasuk($id_barangmasuk, $kode_barang, $nama_barang, $tgl, $jumlah, $kode_supplier, $jml_barangmasuk, $totalbarang, $totjml_barang)
    {
        // $id_barangmasuk = addslashes($id_barangmasuk);
        $kode_barang = addslashes($kode_barang);
        $nama_barang = addslashes($nama_barang);
        $tgl = addslashes($tgl);
        $jumlah = addslashes($jumlah);
        $kode_supplier = addslashes($kode_supplier);
        $jml_barangmasuk = addslashes($jml_barangmasuk);
        $totalbarang = addslashes($totalbarang);
        $totjml_barang = addslashes($totjml_barang);

        include("config.php");

        // Menyimpan barang masuk
        $sql1 = "insert into tbl_masukbarang values('" . $id_barangmasuk . "','" . $kode_barang . "','" . $nama_barang . "','" . $tgl . "','" . $jumlah . "','" . $kode_supplier . "')";
        // echo $sql1;
        $data1 = mysqli_query($conn, $sql1);

        // update tbl_stok
        $sql2 = "update tbl_stok set jml_barangmasuk='" . $jml_barangmasuk . "', total_barang='" . $totalbarang . "' where kode_barang='" . $kode_barang . "' ";
        // echo $sql2;
        $data2 = mysqli_query($conn, $sql2);


        // update tbl_barang
        $sql3 = "update tbl_barang set jumlah_brg='" . $totjml_barang . "' where kode_barang='" . $kode_barang . "'";
        // echo $sql3;
        $data3 = mysqli_query($conn, $sql3);
    }

    function edit_barangmasuk($id_masukbarang)
    {
        include("config.php");

        $sql = "select * from tbl_masukbarang where id_masukbarang='" . $id_masukbarang . "'";
        $data = mysqli_query($conn, $sql);
        include("config.php");

        while ($d = mysqli_fetch_assoc($data)) {

            $hasil[] = $d;
        }
        return $hasil;
    }

    function update_barangmasuk($kode_barang, $nama_barang, $tgl_masuk, $jumlah_masuk, $kode_supplier, $totalbarang, $id_masukbarang, $lama, $stok_lama)
    {
        include("config.php");

        $sql = "update tbl_masukbarang set kode_barang='" . $kode_barang . "', nama_barang='" . $nama_barang . "', tgl_masuk='" . $tgl_masuk . "', jumlah_masuk='" . $jumlah_masuk . "', kode_supplier='" . $kode_supplier . "' where id_masukbarang='" . $id_masukbarang . "'";

        $data = mysqli_query($conn, $sql);

        // update tbl_stok
        $masuk_baru = ($stok_lama - $lama) + $jumlah_masuk;
        $sql2 = "update tbl_stok set jml_barangmasuk='" . $masuk_baru . "', total_barang='" . $totalbarang . "' where kode_barang='" . $kode_barang . "' ";
        $data2 = mysqli_query($conn, $sql2);
    }

    function hapus_barangmasuk($id_masukbarang)
    {
        include("config.php");

        $sql = "delete from tbl_masukbarang where id_masukbarang = '" . $id_masukbarang . "'";

        $data = mysqli_query($conn, $sql);
    }
}
