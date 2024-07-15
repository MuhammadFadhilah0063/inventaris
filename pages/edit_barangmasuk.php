<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Barang Masuk</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update Barang Masuk
            </div>
            <div class="panel-body">
                <?php
                foreach ($db->edit_barangmasuk($_GET['id']) as $row) {
                ?>

                    <div class="row">
                        <div class="col-lg-6">
                            <form action="pages/proses_barangmasuk.php?aksi=updatebarangmasuk" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Kode Barang Masuk</label>
                                    <input type="text" name="id_masukbarang" value="<?= $row['id_masukbarang'] ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Supplier</label>
                                    <select name="nama_supplier" class="form-control" required>
                                    <option value="">Pilih Supplier</option>
                                    <?php 
                                            foreach($db->supplier() as $sup)
                                            {
                                                ?>
                                                <option value="<?=$sup['nama_supplier']?>"><?=$sup['nama_supplier']?></option>
                                                <?php
                                            }
                                    ?>  
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select name="nama_barang" class="form-control" required>
                                        <option value="<?= $row['jumlah_masuk'] ?>">Pilih Barang</option>
                                        <?php
                                        foreach ($db->barang() as $brg) {
                                        ?>
                                            <option value="<?= $brg['nama_barang'] ?>"><?= $brg['nama_barang'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Jumlah Masuk</label>
                                <input type="text" placeholder="Jumlah Masuk" name="jumlah_masuk" class="form-control" class="form-control" value="<?= $row['jumlah_masuk'] ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="date" placeholder="Tanggal Masuk" name="tgl_masuk" class="form-control" required value="<?= $row['tgl_masuk'] ?>">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" required placeholder="keterangan"></textarea>
                        </div> -->
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" name="submit" value="Simpan" class="btn btn-default" style="background-color: #333; color: #fff;">Submit</button>
                        <a href='?page=databarang' class="btn btn-default">Batal</a>
                    </div>
                    </form>
                <?php } ?>
                <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->