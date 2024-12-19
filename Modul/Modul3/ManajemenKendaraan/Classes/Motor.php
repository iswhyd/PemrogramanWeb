<?php
namespace Manajemen;

require_once __DIR__ . '/Kendaraan.php';
require_once __DIR__ . '/../Traits/FiturBerkendara.php';

class Motor extends Kendaraan {
    use FiturBerkendara;

    public function deskripsi() {
        return "Motor merk {$this->merk} dengan kecepatan {$this->kecepatan} km/jam";
    }
}
?>
