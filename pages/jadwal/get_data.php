<?php
// get_data.php

header('Content-Type: application/json');
include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');

// Ambil nilai yang dikirim melalui POST
$jenisInventaris = isset($_POST['jenis_inventaris']) ? $conn->real_escape_string($_POST['jenis_inventaris']) : '';


if ($jenisInventaris == "Barang") {

  $sql = "SELECT kode_barang, nama_barang FROM tbl_barang";
  $result = $conn->query($sql);

  $data = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $data[] = array(
        'kode' => $row['kode_barang'],
        'nama' => $row['nama_barang']
      );
    }
  }
} else if ($jenisInventaris == "Peralatan & Mesin") {

  $sql = "SELECT kode, nama FROM tbl_peralatan_mesin";
  $result = $conn->query($sql);

  $data = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $data[] = array(
        'kode' => $row['kode'],
        'nama' => $row['nama']
      );
    }
  }
} else if ($jenisInventaris == "Kendaraan") {

  $sql = "SELECT kode, nama FROM tbl_kendaraan";
  $result = $conn->query($sql);

  $data = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $data[] = array(
        'kode' => $row['kode'],
        'nama' => $row['nama']
      );
    }
  }
} else {
  $data = [];
}

echo json_encode($data);

// Tutup koneksi
$conn->close();
