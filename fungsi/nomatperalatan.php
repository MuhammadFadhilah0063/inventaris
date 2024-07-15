<?php
// membuat query max untuk kode peralatan_mesin
$carikode = mysqli_query($conn, "select max(kode) from tbl_peralatan_mesin") or die(mysqli_error($conn));
// menjadikannya array
$datakode = mysqli_fetch_array($carikode);
// jika $datakode
if ($datakode) {
  // membuat variabel baru untuk mengambil kode peralatan_mesin mulai dari 1
  $nilaikode = substr($datakode[0], 2);
  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;
  // setiap $kode di tambah 1
  $kode = $kode + 1;
  // hasil untuk menambahkan kode 
  // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
  // atau angka sebelum $kode
  $hasilkodepm = "PM" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
  $hasilkodepm = "PM001";
}
