<?php
// File: PendaftaranKedinasan.php

require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik jalur Kedinasan
    protected $skIkatanDinas;
    protected $instansiSponsor;

    // Constructor menerima array $data, dioper ke induk, lalu memetakan properti sendiri
    public function __construct($data) {
        parent::__construct($data);
        $this->skIkatanDinas   = $data['sk_ikatan_dinas'] ?? '';
        $this->instansiSponsor = $data['instansi_sponsor'] ?? '';
    }

    // TAHAP 5: Overriding hitungTotalBiaya() - Jalur Kedinasan
    // Total Biaya = (biayaPendaftaranDasar) * 1.25 (Surcharge administrasi khusus 25%)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    // Implementasi abstract method tampilkanInfoJalur sesuai soal Tahap 3
    public function tampilkanInfoJalur() {
        return "Jalur Kedinasan - No SK: " . $this->skIkatanDinas . " di bawah " . $this->instansiSponsor;
    }

    // Metode Query Spesifik menggunakan PDO
    public static function getDaftarKedinasan($db) {
        $daftar = [];
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftar[] = new self($row);
        }
        return $daftar;
    }

    // Getter untuk properti tambahan
    public function getSkIkatanDinas() { return $this->skIkatanDinas; }
    public function getInstansiSponsor() { return $this->instansiSponsor; }
}
?>