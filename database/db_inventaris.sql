-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Jul 2024 pada 04.53
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `spesifikasi` varchar(35) NOT NULL,
  `lokasi_barang` varchar(40) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `jumlah_brg` int NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `jenis_brg` varchar(20) NOT NULL,
  `sumber_dana` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kode_barang`, `nama_barang`, `spesifikasi`, `lokasi_barang`, `kategori`, `jumlah_brg`, `kondisi`, `jenis_brg`, `sumber_dana`) VALUES
('B001', 'Negeri 5 Menara', '100 halaman', 'Gudang 1', 'Buku', 17, 'Baru', 'Barang Jadi', 'Kas'),
('B002', 'Lenovo Fold', 'Warna Biru', 'pp', 'Elektronics', 15, 'Baru', 'Barang Ekonomi', 'Direksi'),
('B003', 'Lemari Drawer', '5 Rak ', 'Gudang Baru', 'Furniture', 9, 'Bekas', 'Barang Jadi', 'Kas'),
('B004', 'Meja Lipat', 'Mantap', 'Gudang B', 'Furniture', 0, 'Baru', 'Barang Jadi', 'kas'),
('B005', 'Buku Tua', 'Buku', 'Gudang', 'Buku', 0, 'Baru', 'Buku', 'Kas'),
('B006', 'TV Jadul', 'Jadul', 'Gudang', 'Elektronics', 0, 'Bekas', 'Barang', 'Kas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal_pemeliharaan`
--

CREATE TABLE `tbl_jadwal_pemeliharaan` (
  `kode_jadwal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `kode_inventaris` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_inventaris` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_jadwal_pemeliharaan`
--

INSERT INTO `tbl_jadwal_pemeliharaan` (`kode_jadwal`, `tgl`, `kode_inventaris`, `jenis_inventaris`, `status`, `keterangan`) VALUES
('JWL001', '2024-07-14', 'B001', 'Barang', 'Sudah Dilakukan', 'Aman terkendali'),
('JWL002', '2024-07-15', 'B002', 'Barang', 'Sudah Dilakukan', 'Diubah'),
('JWL003', '2024-07-14', 'B003', 'Barang', 'Terlewat', ''),
('JWL004', '2024-07-15', 'PM001', 'Peralatan & Mesin', 'Belum Dilakukan', ''),
('JWL005', '2024-07-16', 'B002', 'Barang', 'Belum Dilakukan', ''),
('JWL006', '2024-07-10', 'K001', 'Kendaraan', 'Terlewat', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keluarbarang`
--

CREATE TABLE `tbl_keluarbarang` (
  `no_pinjam` varchar(8) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `penerima` varchar(35) NOT NULL,
  `jumlah_keluar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_keluarbarang`
--

INSERT INTO `tbl_keluarbarang` (`no_pinjam`, `kode_barang`, `nama_barang`, `tgl_keluar`, `penerima`, `jumlah_keluar`) VALUES
('PMJN001', 'B001', 'Negeri 5 Menara', '2023-02-01', 'Lana', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kendaraan`
--

CREATE TABLE `tbl_kendaraan` (
  `kode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `spesifikasi` varchar(35) NOT NULL,
  `lokasi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `jumlah` int NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `merek` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kendaraan`
--

INSERT INTO `tbl_kendaraan` (`kode`, `nama`, `spesifikasi`, `lokasi`, `kategori`, `jumlah`, `kondisi`, `merek`) VALUES
('K001', 'Supra X', 'Kecepatan diatas langit', 'lol2', 'Motor', 8, 'Baru', 'Honda'),
('K002', 'Vario 125', 'Kecepatan diatas langit', 'Gudang A', 'Motor', 10, 'Baru', 'Honda'),
('K003', 'NMAX', 'Kecepatan diatas langit', 'Gudang 2', 'Motor', 15, 'Bekas', 'Honda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kerusakan_inventaris`
--

CREATE TABLE `tbl_kerusakan_inventaris` (
  `kode_kerusakan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_kerusakan` date NOT NULL,
  `kode_inventaris` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `jenis_inventaris` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kerusakan_inventaris`
--

INSERT INTO `tbl_kerusakan_inventaris` (`kode_kerusakan`, `tgl_kerusakan`, `kode_inventaris`, `jumlah`, `jenis_inventaris`, `lokasi`) VALUES
('KRS001', '2024-07-07', 'B002', 10, 'Barang', 'Gudang Bawah'),
('KRS002', '2024-07-14', 'B001', 7, 'Barang', 'Bt'),
('KRS003', '2024-07-14', 'PM001', 5, 'Peralatan & Mesin', 'f'),
('KRS004', '2024-07-15', 'B004', 6, 'Barang', 'Gudang Sementara'),
('KRS005', '2024-07-15', 'B005', 12, 'Barang', 'Gudang Aja'),
('KRS006', '2024-07-15', 'B006', 3, 'Barang', 'Gudang Aja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masukbarang`
--

CREATE TABLE `tbl_masukbarang` (
  `id_masukbarang` varchar(11) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jumlah_masuk` int NOT NULL,
  `kode_supplier` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_masukbarang`
--

INSERT INTO `tbl_masukbarang` (`id_masukbarang`, `kode_barang`, `nama_barang`, `tgl_masuk`, `jumlah_masuk`, `kode_supplier`) VALUES
('BMSK002', 'B002', 'Lenovo Fold', '2023-02-07', 65, 'SP004'),
('BMSK003', 'B003', 'Lemari Drawer', '2023-02-07', 9, 'SP003'),
('BMSK005', 'B003', 'Lemari Drawer', '2024-07-14', 100, 'SP001'),
('BMSK008', 'B002', 'Lenovo Fold', '2023-02-07', 15, 'SP004'),
('BMSK009', 'B004', 'Meja Lipat', '2024-07-15', 15, 'SP003'),
('BMSK010', 'B006', 'TV Jadul', '2024-07-15', 12, 'SP002'),
('BMSK011', 'B005', 'Buku Tua', '2024-07-15', 10, 'SP001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mutasi_inventaris`
--

CREATE TABLE `tbl_mutasi_inventaris` (
  `kode_mutasi` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_mutasi` date NOT NULL,
  `kode_inventaris` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_inventaris` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi_lama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi_baru` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_mutasi_inventaris`
--

INSERT INTO `tbl_mutasi_inventaris` (`kode_mutasi`, `tgl_mutasi`, `kode_inventaris`, `jenis_inventaris`, `lokasi_lama`, `lokasi_baru`) VALUES
('MTS003', '2024-07-14', 'B003', 'Barang', 'Gudang Lama', 'Gudang Baru'),
('MTS006', '2024-07-14', 'PM001', 'Peralatan & Mesin', 'Gudang 3', 'Gudang 4'),
('MTS007', '2024-07-14', 'K002', 'Kendaraan', 'Gudang 2', 'Gudang A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peralatan_mesin`
--

CREATE TABLE `tbl_peralatan_mesin` (
  `kode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `spesifikasi` varchar(35) NOT NULL,
  `lokasi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `merek` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_peralatan_mesin`
--

INSERT INTO `tbl_peralatan_mesin` (`kode`, `nama`, `spesifikasi`, `lokasi`, `kategori`, `jumlah`, `kondisi`, `merek`) VALUES
('PM001', 'Braille Printer', 'Kecepatan cetak tinggi', 'Gudang 4', 'Alat Bantu Visual', 4, 'Baru', 'BraillePro 5'),
('PM002', 'Braille Printer 2', 'Kecepatan cetak tinggi', 'Gudang 3', 'Alat Bantu Visual', 9, 'Baru', 'BraillePro 5'),
('PM003', 'Braille Printer 3', 'Kecepatan cetak tinggi', 'Gudang 3', 'Alat Bantu Visual', 9, 'Bekas', 'BraillePro 5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `nomor_pinjam` varchar(8) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_pinjam` int NOT NULL,
  `peminjam` varchar(35) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`nomor_pinjam`, `tgl_pinjam`, `kode_barang`, `nama_barang`, `jumlah_pinjam`, `peminjam`, `tgl_kembali`, `keterangan`) VALUES
('PMJN001', '2023-02-01', 'B001', 'Negeri 5 Menara', 3, 'Lana', '2023-02-07', 'Sedang dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_stok`
--

CREATE TABLE `tbl_stok` (
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jml_barangmasuk` int NOT NULL,
  `jml_barangkeluar` int NOT NULL,
  `total_barang` int UNSIGNED NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_stok`
--

INSERT INTO `tbl_stok` (`kode_barang`, `nama_barang`, `jml_barangmasuk`, `jml_barangkeluar`, `total_barang`, `keterangan`) VALUES
('B001', 'Negeri 5 Menara', 20, 13, 7, '-'),
('B002', 'Lenovo Fold', 80, 5, 75, '-'),
('B003', 'Lemari Drawer', 109, 3, 106, '-'),
('B004', 'Meja Lipat', 15, 6, 9, 'okeh'),
('B005', 'Buku Tua', 16, 13, 3, 'oke'),
('B006', 'TV Jadul', 2, 8, 2, 'oke');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `kode_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(35) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `telp_supplier` varchar(25) NOT NULL,
  `kota_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`, `kota_supplier`) VALUES
('SP001', 'Gramedia', 'Jl. raya pajajaran No 38', '02518356341', 'Bogor'),
('SP002', 'Electronics Best', 'Jl. Gajah Mada No 55', '02518356341', 'Jakarta'),
('SP003', 'Furniture Indonesia', 'Jl. raya tamrin no.41', '02513534764', 'Jakarta'),
('SP004', 'Syihab', 'Jl. A Yani', '08999999999', 'Banjarbaru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(8) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
('001', 'admin', '4QrcOUm6Wau+VuBX8g+IPg==');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `tbl_jadwal_pemeliharaan`
--
ALTER TABLE `tbl_jadwal_pemeliharaan`
  ADD PRIMARY KEY (`kode_jadwal`);

--
-- Indeks untuk tabel `tbl_kendaraan`
--
ALTER TABLE `tbl_kendaraan`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `tbl_kerusakan_inventaris`
--
ALTER TABLE `tbl_kerusakan_inventaris`
  ADD PRIMARY KEY (`kode_kerusakan`);

--
-- Indeks untuk tabel `tbl_masukbarang`
--
ALTER TABLE `tbl_masukbarang`
  ADD PRIMARY KEY (`id_masukbarang`);

--
-- Indeks untuk tabel `tbl_mutasi_inventaris`
--
ALTER TABLE `tbl_mutasi_inventaris`
  ADD PRIMARY KEY (`kode_mutasi`);

--
-- Indeks untuk tabel `tbl_peralatan_mesin`
--
ALTER TABLE `tbl_peralatan_mesin`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`nomor_pinjam`);

--
-- Indeks untuk tabel `tbl_stok`
--
ALTER TABLE `tbl_stok`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
