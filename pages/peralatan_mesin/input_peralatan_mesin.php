<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Peralatan & Mesin</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Input Peralatan & Mesin Baru
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-6">
            <form action="pages/peralatan_mesin/proses.php?aksi=tambah" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Kode Peralatan & Mesin</label>
                <input type="text" name="kode" value="<?= $hasilkodepm ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label>Nama Peralatan & Mesin</label>
                <input type="text" placeholder="Nama Peralatan & Mesin" name="nama" class="form-control" required>
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
                <option value="Alat Bantu Mobilitas">Alat Bantu Mobilitas</option>
                <option value="Alat Bantu Dengar">Alat Bantu Dengar</option>
                <option value="Alat Bantu Penglihatan">Alat Bantu Penglihatan</option>
                <option value="Peralatan Terapi">Peralatan Terapi</option>
                <option value="Peralatan Pendidikan">Peralatan Pendidikan</option>
                <option value="Alat Komunikasi Alternatif">Alat Komunikasi Alternatif</option>
                <option value="Peralatan Kesehatan">Peralatan Kesehatan</option>
                <option value="Peralatan Sensori">Peralatan Sensori</option>
                <option value="Peralatan Adaptif">Peralatan Adaptif</option>
                <option value="Peralatan untuk Kegiatan Harian">Peralatan untuk Kegiatan Harian</option>
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
              <a href='?page=dataperalatanmesin' class="btn btn-default">Batal</a>
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