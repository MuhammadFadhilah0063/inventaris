<?php
include ('C:/xampp/htdocs/inventaris/config/config.php');
?>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Data Barang Masuk</h1>
            <div class="text-right" style="margin-top: -4%;">
                <a href="pages/cetak_barangmasuk.php" target="_blank" class="btn btn-default " styles=""><i class="fa fa-print "></i> Print </a>
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
                <a href="index.php?page=inputbarangmasuk" class="btn btn-default " styles=""><i class="glyphicon glyphicon-plus"></i> Tambah Data </a>
                <div class="text-right" style="margin-top: -4%;">
                    <form action="barangmasuk.php?page=databarangmasuk" method="GET">
                        <label>Cari </label>
                        <input type="text" name="cari"> 
                        <input type="submit" value="Search">
                    </form>
                    
                    <?php               

                    if(isset($_GET['cari'])){
                        $cari = $_GET['cari'];
                        echo "<b>Hasil pencarian : ".$cari."</b>";
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
                                <th>Kode Masuk Barang</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Masuk</th>
                                <th>Tanggal Masuk</th>
                                <th>Kode Supplier</th>
                                <th>Aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        if(isset($_GET['cari'])){
                            $cari = $_GET['cari'];
                            $data = mysqli_query($conn,"select * from tbl_masukbarang where id_masukbarang like '%".$cari."%' || nama_barang like '%".$cari."%'") ;
                            }else{
                            $data = mysqli_query($conn,"select * from tbl_masukbarang");
                            }

                        $no = 1;
                        while($row = mysqli_fetch_array($data)){

                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['id_masukbarang'] ?></td>
                                <td><?php echo $row['kode_barang'] ?></td>
                                <td><?php echo $row['nama_barang'] ?></td>
                                <td><?php echo $row['jumlah_masuk'] ?></td>
                                <td><?php echo $row['tgl_masuk'] ?></td>
                                <td><?php echo $row['kode_supplier'] ?></td>
                                <td><a href="barangmasuk.php?id=<?= $row['id_masukbarang'] ?>&page=updatebarangmasuk">Edit</a> - <a href="barangmasuk.php?hapus&id=<?= $row['id_masukbarang'] ?>" onclick="return confirm('Yakin mau dihapus?');">Hapus</a></td>
                            </tr>
                    <?php }
                         ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->