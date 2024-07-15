<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Mutasi Inventaris</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Input Mutasi Inventaris Baru
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-6">
            <form action="pages/mutasi/proses.php?aksi=tambah" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Kode Mutasi</label>
                <input type="text" name="kode" value="<?= $hasilkodemt ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label>Tanggal Mutasi</label>
                <input type="date" value="<?= date('Y-m-d') ?>" name="tgl_mutasi" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Lokasi Penyimpanan Baru</label>
                <input type="text" placeholder="Lokasi Penyimpanan Baru" name="lokasi_baru" class="form-control" required>
              </div>
          </div>
          <!-- /.col-lg-6 (nested) -->
          <div class="col-lg-6">
            <div class="form-group">
              <label>Jenis Inventaris</label>
              <select name="jenis_inventaris" class="form-control" required>
                <option value="">Pilih Jenis</option>
                <option value="Barang">Barang</option>
                <option value="Peralatan & Mesin">Peralatan & Mesin</option>
                <option value="Kendaraan">Kendaraan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Kode dan Nama Inventaris</label>
              <select name="kode_inventaris" class="form-control" required>
                <option value="">Pilih</option>
              </select>
              <script>
                document.addEventListener('DOMContentLoaded', function() {
                  const jenisInventarisSelect = document.querySelector('select[name="jenis_inventaris"]');
                  const kodeInventarisSelect = document.querySelector('select[name="kode_inventaris"]');

                  jenisInventarisSelect.addEventListener('change', function() {
                    const selectedValue = this.value;

                    if (selectedValue) {
                      fetch(document.location.origin + '/pages/mutasi/get_data.php', {
                          method: 'POST',
                          headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                          },
                          body: new URLSearchParams({
                            jenis_inventaris: selectedValue
                          })
                        })
                        .then(response => response.json())
                        .then(data => {
                          // Kosongkan select sebelum menambahkan opsi baru
                          kodeInventarisSelect.innerHTML = '<option value="">Pilih</option>';

                          // Tambahkan opsi dari data yang diterima
                          data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.kode;
                            option.textContent = item.kode + "|" + item.nama;
                            kodeInventarisSelect.appendChild(option);
                          });
                        })
                        .catch(error => {
                          console.error('Error:', error);
                        });
                    } else {
                      kodeInventarisSelect.innerHTML = '<option value="">Pilih</option>';
                    }
                  });
                });
              </script>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" value="Simpan" class="btn btn-default" style="background-color: #333; color: #fff;">Submit</button>
              <a href='?page=datamutasi' class="btn btn-default">Batal</a>
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