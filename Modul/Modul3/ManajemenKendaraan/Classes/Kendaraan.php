<?php
namespace Manajemen;

abstract class Kendaraan {
    protected $merk;
    protected $kecepatan;

    public function __construct($merk, $kecepatan) {
        $this->merk = $merk;
        $this->kecepatan = $kecepatan;
    }

    abstract public function deskripsi();
}
?>
