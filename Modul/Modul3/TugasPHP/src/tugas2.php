<!DOCTYPE html>
<html>
<head>
    <title>Cetak Angka</title>
</head>
<body>
    <form method="post">
        <label for="n">Masukkan bilangan bulat positif:</label>
        <input type="number" id="n" name="n" required>
        <input type="submit" value="Cetak">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = (int)$_POST['n'];
        cetakAngka($n);
    }

    function cetakAngka($n) {
        for ($i = 1; $i <= $n; $i++) {
            if ($i % 4 == 0 && $i % 6 == 0) {
                echo "Pemrograman Website 2024<br>";
            } elseif ($i % 5 == 0) {
                echo "2024<br>";
            } elseif ($i % 4 == 0 && $i % 6 != 0) {
                echo "Pemrograman<br>";
            } elseif ($i % 6 == 0 && $i % 4 != 0) {
                echo "Website<br>";
            } else {
                echo $i . "<br>
                ";
            }
        }
    }
    ?>
</body>
</html>
