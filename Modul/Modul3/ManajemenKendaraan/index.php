<?php
require_once __DIR__ . '/Namespaces/Manajemen.php';
require_once __DIR__ . '/Classes/Mobil.php';
require_once __DIR__ . '/Classes/Motor.php';

use Manajemen\Mobil;
use Manajemen\Motor;
use function Manajemen\tampilkanNamaAplikasi;

$mobil = new Mobil("Toyota", 180);
$motor = new Motor("Yamaha", 120);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo tampilkanNamaAplikasi(); ?></title>
</head>
<body>
    <h1><?php echo tampilkanNamaAplikasi(); ?></h1>
    <h2>Detail Kendaraan</h2>

    <div>
        <h3><?php echo $mobil->deskripsi(); ?></h3>
        <p><?php echo $mobil->nyalakanMesin(); ?></p>
    </div>

    <div>
        <h3><?php echo $motor->deskripsi(); ?></h3>
        <p><?php echo $motor->matikanMesin(); ?></p>
    </div>
</body>
</html>
