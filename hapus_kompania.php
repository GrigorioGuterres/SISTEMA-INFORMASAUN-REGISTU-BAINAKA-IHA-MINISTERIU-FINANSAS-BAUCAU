<?php
// Koneksi ke database (gantilah dengan informasi koneksi yang sesuai)
include 'includes/db.php';

// Periksa apakah parameter "id" telah diberikan dalam URL
if (isset($_GET["id"])) {
    $id_kompania = $_GET["id"];
    // Query SQL untuk memeriksa apakah ada data di tabel "Bainaka" yang terkait dengan data di tabel "Municipiu"
    $sqlValidasi = "SELECT COUNT(*) as count FROM Bainaka WHERE id_kompania = $id_kompania";
    $resultValidasi = $koneksi->query($sqlValidasi);
    $rowValidasi = $resultValidasi->fetch_assoc();
    
    if ($rowValidasi["count"] > 0) {
        // Jika terdapat data terkait di tabel "Bainaka", tampilkan pesan kesalahan
        echo "<script>
            alert('Data ini tidak dapat dihapus karena masih terkait dengan data di tabel Bainaka.');
            window.location.href = 'kompania.php'; // Ganti 'kompania.php' dengan halaman beranda Anda
        </script>";
    } else {
        // Jika tidak ada data terkait di tabel "Bainaka," lanjutkan dengan menghapus data dari tabel "Municipiu"
        $sql = "DELETE FROM kompania WHERE id_kompania = $id_kompania";

        // Eksekusi query
        if ($koneksi->query($sql) === TRUE) {
            // Jika penghapusan berhasil, alihkan ke halaman beranda dengan pesan sukses
            header("Location: kompania.php?pesan=Data berhasil dihapus");
        } else {
            // Jika terjadi kesalahan, alihkan ke halaman beranda dengan pesan kesalahan
            header("Location: kompania.php?pesan=Gagal menghapus data: " . $koneksi->error);
        }
    }
} else {
    echo "ID tidak valid.";
}
// Tutup koneksi ke database
$koneksi->close();
?>