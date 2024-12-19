<?php
require 'koneksi.php';

// Tangkap data dari form jika metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $isikomentar = mysqli_real_escape_string($conn, $_POST['isikomentar']);

    // Query untuk menyimpan data
    $sql = "INSERT INTO komentar (nama, isikomentar) VALUES ('$nama', '$isikomentar')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Komentar berhasil disimpan."]);
        header("Location: yaasteak2.php");
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $sql . "<br>" . mysqli_error($conn)]);
    }

    exit();
}

// Ambil semua data komentar dari database jika metode GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && empty($_GET['id_komentar'])) {
    $sql = "SELECT id_komentar, nama, isikomentar, tanggal FROM komentar ORDER BY tanggal DESC";
    $result = mysqli_query($conn, $sql);

    $comments = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $comments[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($comments);
    exit();
}

// Ambil data komentar berdasarkan id jika metode GET dengan parameter id
if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['id_komentar'])) {
    $id = intval($_GET['id_komentar']);
    $sql = "SELECT id_komentar, nama, isikomentar, tanggal FROM komentar WHERE id_komentar = $id";
    $result = mysqli_query($conn, $sql);

    $comment = mysqli_fetch_assoc($result);

    header('Content-Type: application/json');
    echo json_encode($comment);
    exit();
}

// Perbarui data komentar berdasarkan id jika metode PUT
if ($_SERVER["REQUEST_METHOD"] == "PUT" && !empty($_GET['id_komentar'])) {
    $id = intval($_GET['id_komentar']);
    // Mengambil data dari PUT request
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['nama']) && isset($input['isikomentar'])) {
        $nama = mysqli_real_escape_string($conn, $input['nama']);
        $isikomentar = mysqli_real_escape_string($conn, $input['isikomentar']);

        $sql = "UPDATE komentar SET nama = '$nama', isikomentar = '$isikomentar' WHERE id_komentar = $id";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(["status" => "success", "message" => "Komentar berhasil diperbarui."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: " . $sql . "<br>" . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Data tidak lengkap untuk memperbarui komentar."]);
    }

    exit();
}

// Hapus data komentar berdasarkan id jika metode DELETE
if ($_SERVER["REQUEST_METHOD"] == "DELETE" && !empty($_GET['id_komentar'])) {
    $id = intval($_GET['id_komentar']);
    $sql = "DELETE FROM komentar WHERE id_komentar = $id";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Komentar berhasil dihapus."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $sql . "<br>" . mysqli_error($conn)]);
    }

    exit();
}

// Jika metode tidak valid
echo json_encode(["status" => "error", "message" => "Metode tidak valid."]);
