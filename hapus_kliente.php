<?php
// Koneksi ke database (gantilah dengan informasi koneksi yang sesuai)
include 'includes/db.php';

// Periksa apakah parameter "id" telah diberikan dalam URL
if (isset($_GET["id"])) {
    $id_bainaka = $_GET["id"];

    // Query SQL untuk menghapus data berdasarkan ID dari tabel Bainaka
    $sql = "DELETE FROM bainaka WHERE id_bainaka = $id_bainaka";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
         header("Location: klinte.php");
        exit(); // Pastikan tidak ada kode lain yang dieksekusi setelah pengalihan
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
} else {
    echo "ID tidak valid.";
}

// Tutup koneksi ke database
$conn->close();
?>