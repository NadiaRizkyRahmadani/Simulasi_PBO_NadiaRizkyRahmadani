<?php
// File: index.php

// 1. Ambil file koneksi class Koneksi dan semua class anak
require_once 'koneksi.php';
require_once 'Pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

try {
    // Instantiate class Koneksi untuk mendapatkan objek PDO
    $database = new Koneksi();
    $db = $database->getConnection();
    
    if (!$db) {
        die("Objek koneksi database tidak tebentuk. Periksa class Koneksi Anda.");
    }

    // Mengambil pilihan jalur dari input user melalui URL (default: Semua)
    $jalurPilihan = $_GET['jalur'] ?? 'Semua';

    // Menyiapkan array penampung data
    $dataReguler = [];
    $dataPrestasi = [];
    $dataKedinasan = [];

    // 2. Memanfaatkan metode query spesifik berdasarkan pilihan user
    if ($jalurPilihan == 'Semua' || $jalurPilihan == 'Reguler') {
        $dataReguler = PendaftaranReguler::getDaftarReguler($db);
    }
    if ($jalurPilihan == 'Semua' || $jalurPilihan == 'Prestasi') {
        $dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);
    }
    if ($jalurPilihan == 'Semua' || $jalurPilihan == 'Kedinasan') {
        $dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
    }

    // Gabungkan semua data objek ke dalam satu list polimorfik
    $semuaPendaftaran = array_merge($dataReguler, $dataPrestasi, $dataKedinasan);

} catch (Exception $e) {
    die("Terjadi kesalahan sistem: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Pendaftaran Mahasiswa Baru</title>
    <style>
        :root {
            --primary: #2563eb;
            --secondary: #64748b;
            --bg: #f8fafc;
            --card: #ffffff;
            --text: #1e293b;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            color: var(--primary);
            margin-bottom: 30px;
        }
        .filter-box {
            background-color: var(--card);
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .filter-label {
            font-weight: 600;
            color: var(--secondary);
        }
        .filter-buttons {
            display: flex;
            gap: 10px;
        }
        .btn {
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
            background-color: #e2e8f0;
            color: var(--text);
        }
        .btn:hover {
            background-color: #cbd5e1;
        }
        .btn.active {
            background-color: var(--primary);
            color: white;
        }
        .table-responsive {
            background-color: var(--card);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        th {
            background-color: var(--primary);
            color: white;
            padding: 14px 18px;
            font-weight: 600;
            font-size: 14px;
        }
        td {
            padding: 14px 18px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }
        tr:hover {
            background-color: #f1f5f9;
        }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-reguler { background-color: #dbeafe; color: #1e40af; }
        .badge-prestasi { background-color: #dcfce7; color: #166534; }
        .badge-kedinasan { background-color: #fef9c3; color: #854d0e; }
        .info-unik {
            font-style: italic;
            color: #64748b;
            font-size: 13px;
        }
        .text-right { text-align: right; font-weight: 600; }
        .empty-row { text-align: center; color: var(--secondary); padding: 30px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Sistem Informasi Pendaftaran Mahasiswa Baru</h2>

    <div class="filter-box">
        <span class="filter-label">Pilih Kategori Jalur Pendaftaran:</span>
        <div class="filter-buttons">
            <a href="index.php?jalur=Semua" class="btn <?= $jalurPilihan == 'Semua' ? 'active' : '' ?>">Semua Jalur</a>
            <a href="index.php?jalur=Reguler" class="btn <?= $jalurPilihan == 'Reguler' ? 'active' : '' ?>">Jalur Reguler</a>
            <a href="index.php?jalur=Prestasi" class="btn <?= $jalurPilihan == 'Prestasi' ? 'active' : '' ?>">Jalur Prestasi</a>
            <a href="index.php?jalur=Kedinasan" class="btn <?= $jalurPilihan == 'Kedinasan' ? 'active' : '' ?>">Jalur Kedinasan</a>
        </div>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Calon</th>
                    <th>Asal Sekolah</th>
                    <th>Nilai Ujian</th>
                    <th>Kategori Jalur</th>
                    <th>Karakteristik / Informasi Unik Jalur</th>
                    <th style="text-align: right;">Total Biaya Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($semuaPendaftaran)): ?>
                    <?php foreach ($semuaPendaftaran as $pendaftar): ?>
                        <tr>
                            <td><?= htmlspecialchars($pendaftar->getIdPendaftaran() ?? '') ?></td>
                            <td><?= htmlspecialchars($pendaftar->getNamaCalon() ?? 'Tanpa Nama') ?></td>
                            <td><?= htmlspecialchars($pendaftar->getAsalSekolah() ?? '') ?></td>
                            <td><?= htmlspecialchars($pendaftar->getNilaiUjian() ?? '0') ?></td>
                            <td>
                                <?php 
                                $jl = $pendaftar->getJalurPendaftaran();
                                $badgeClass = 'badge-' . strtolower($jl ? $jl : 'reguler');
                                echo "<span class='badge {$badgeClass}'>" . htmlspecialchars($jl ? $jl : 'Reguler') . "</span>";
                                ?>
                            </td>
                            <td class="info-unik"><?= htmlspecialchars($pendaftar->tampilkanInfoJalur()) ?></td>
                            <td class="text-right">Rp <?= number_format($pendaftar->hitungTotalBiaya(), 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="empty-row">Tidak ada data pendaftaran atau data di database tidak cocok dengan filter '<?= htmlspecialchars($jalurPilihan) ?>'.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>