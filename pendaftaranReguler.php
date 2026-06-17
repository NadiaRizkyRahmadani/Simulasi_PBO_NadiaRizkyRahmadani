<?php
// File: PendaftaranReguler.php

require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik jalur Reguler
    protected $pilihanProdi;
    protected $lokasiKampus;

    // Constructor menerima array $data, dioper ke induk, lalu memetakan properti sendiri
    public function __construct($data) {
        parent::__construct($data);
        $this->pilihanProdi = $data['pilihan_prodi'] ?? '';
        $this->lokasiKampus = $data['lokasi_kampus'] ?? '';
    }

    // Implementasi abstract method hitungTotalBiaya
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    // Implementasi abstract method tampilkanInfoJalur sesuai soal Tahap 3
    public function tampilkanInfoJalur() {
        return "Jalur Reguler - Pilihan Prodi: " . $this->pilihanProdi . " di Kampus " . $this->lokasiKampus;
    }

    // Metode Query Spesifik menggunakan PDO
    public static function getDaftarReguler($db) {
        $daftar = [];
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $stmt = $db->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftar[] = new self($row); // Memasukkan array row database ke constructor __construct($data)
        }
        return $daftar;
    }

    // Getter untuk properti tambahan
    public function getPilihanProdi() { return $this->pilihanProdi; }
    public function getLokasiKampus() { return $this->lokasiKampus; }
}
?>