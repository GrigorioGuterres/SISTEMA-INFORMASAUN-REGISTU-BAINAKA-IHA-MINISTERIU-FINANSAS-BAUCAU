<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_finansas";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel-tabel yang Anda inginkan
$query = "SELECT * FROM municipiu;"; // Ganti dengan query yang sesuai

$result = $conn->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Tutup koneksi ke database
$conn->close();

// Keluarkan data sebagai JSON
header('Content-Type: application/json');
echo json_encode(array("datasets" => $data));
?>
