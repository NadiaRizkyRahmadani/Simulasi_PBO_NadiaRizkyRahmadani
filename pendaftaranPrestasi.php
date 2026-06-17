<?php
// File: PendaftaranPrestasi.php

require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik jalur Prestasi
    protected $jenisPrestasi;
    protected $tingkatPrestasi;

    // Constructor menerima array $data, dioper ke induk, lalu memetakan properti sendiri
    public function __construct($data) {
        parent::__construct($data);
        $this->jenisPrestasi   = $data['jenis_prestasi'] ?? '';
        $this->tingkatPrestasi = $data['tingkat_prestasi'] ?? '';
    }

    // TAHAP 5: Overriding hitungTotalBiaya() - Jalur Prestasi
    // Total Biaya = biayaPendaftaranDasar - 50000 (Potongan insentif Rp50.000)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    // Implementasi abstract method tampilkanInfoJalur sesuai soal Tahap 3
    public function tampilkanInfoJalur() {
        return "Jalur Prestasi - Kategori: " . $this->jenisPrestasi . " Tingkat " . $this->tingkatPrestasi;
    }

    // Metode Query Spesifik menggunakan PDO
    public static function getDaftarPrestasi($db) {
        $daftar = [];
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $stmt = $db->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftar[] = new self($row);
        }
        return $daftar;
    }

    // Getter untuk properti tambahan
    public function getJenisPrestasi() { return $this->jenisPrestasi; }
    public function getTingkatPrestasi() { return $this->tingkatPrestasi; }
}
?>