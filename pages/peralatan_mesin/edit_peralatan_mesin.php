<?php

// Ambil data
$kode  = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM tbl_peralatan_mesin WHERE kode='$kode' LIMIT 1");
$data  = mysqli_fetch_assoc($query);
?>

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
        Edit Peralatan & Mesin
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-6">
            <form action="pages/peralatan_mesin/proses.php?aksi=update" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Kode Peralatan & Mesin</label>
                <input type="text" name="kode" value="<?= $data['kode'] ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label>Nama Peralatan & Mesin</label>
                <input type="text" placeholder="Masukan Nama Barang" value="<?= $data['nama'] ?>" name="nama" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Merek</label>
                <input type="text" placeholder="Merek" value="<?= $data['merek'] ?>" name="merek" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Spesifikasi</label>
                <input type="text" placeholder="Spesifikasi" value="<?= $data['spesifikasi'] ?>" name="spesifikasi" class="form-control" class="form-control">
              </div>
              <div class="form-group">
                <label>Lokasi</label>
                <input type="text" placeholder="Lokasi" value="<?= $data['lokasi'] ?>" name="lokasi" class="form-control" required>
              </div>
          </div>
          <!-- /.col-lg-6 (nested) -->
          <div class="col-lg-6">
            <div class="form-group">
              <label>Kategori</label>
              <select name="kategori" class="form-control" required>
              </select>
              <script>
                const options = [
                  "Alat Bantu Mobilitas",
                  "Alat Bantu Dengar",
                  "Alat Bantu Penglihatan",
                  "Peralatan Terapi",
                  "Peralatan Pendidikan",
                  "Alat Komunikasi Alternatif",
                  "Peralatan Kesehatan",
                  "Peralatan Sensori",
                  "Peralatan Adaptif",
                  "Peralatan untuk Kegiatan Harian"
                ];

                const kategori = <?= json_encode($data['kategori']) ?>;
                const select = document.querySelector(`select[name='kategori']`);

                options.forEach(optionText => {
                  const option = document.createElement('option');
                  option.value = optionText;
                  option.textContent = optionText;
                  if (optionText === kategori) {
                    option.selected = true;
                  }
                  select.appendChild(option);
                });
              </script>
            </div>
            <div class="form-group">
              <label>Kondisi</label>
              <select name="kondisi" class="form-control" required>
                <option value="">Pilih Kondisi</option>
                <option value="Baru" <?= ($data['kondisi'] == "Baru") ? "selected" : '' ?>>Baru</option>
                <option value="Bekas" <?= ($data['kondisi'] == "Bekas") ? "selected" : '' ?>>Bekas</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jumlah</label>
              <input type="number" placeholder="Jumlah" name="jumlah" value="<?= $data['jumlah'] ?>" class="form-control" required>
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