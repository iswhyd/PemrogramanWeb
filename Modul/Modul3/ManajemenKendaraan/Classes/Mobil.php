<?php
namespace Manajemen;

require_once __DIR__ . '/Kendaraan.php';
require_once __DIR__ . '/../Traits/FiturBerkendara.php';

class Mobil extends Kendaraan {
    use FiturBerkendara;

    public function deskripsi() {
        return "Mobil merk {$this->merk} dengan kecepatan {$this->kecepatan} km/jam";
    }
}
?>
