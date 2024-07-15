<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Kendaraan</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Input Kendaraan Baru
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-6">
            <form action="pages/kendaraan/proses.php?aksi=tambah" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Kode Kendaraan</label>
                <input type="text" name="kode" value="<?= $hasilkodek ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label>Nama Kendaraan</label>
                <input type="text" placeholder="Nama Kendaraan" name="nama" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Merek</label>
                <input type="text" placeholder="Merek" name="merek" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Spesifikasi</label>
                <input type="text" placeholder="Spesifikasi" name="spesifikasi" class="form-control" class="form-control">
              </div>
              <div class="form-group">
                <label>Lokasi</label>
                <input type="text" placeholder="Lokasi" name="lokasi" class="form-control" required>
              </div>
          </div>
          <!-- /.col-lg-6 (nested) -->
          <div class="col-lg-6">
            <div class="form-group">
              <label>Kategori</label>
              <select name="kategori" class="form-control" required>
                <option value="">Pilih Kategori</option>
                <option value="Sepeda Motor">Sepeda Motor</option>
                <option value="Mobil">Mobil</option>
              </select>
            </div>
            <div class="form-group">
              <label>Kondisi</label>
              <select name="kondisi" class="form-control" required>
                <option value="">Pilih Kondisi</option>
                <option value="Baru">Baru</option>
                <option value="Bekas">Bekas</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jumlah</label>
              <input type="number" placeholder="Jumlah" name="jumlah" class="form-control" required>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" value="Simpan" class="btn btn-default" style="background-color: #333; color: #fff;">Submit</button>
              <a href='?page=datakendaraan' class="btn btn-default">Batal</a>
            </div>
            </form>
          </div>
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