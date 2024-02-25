<?php
// Koneksi ke database (gantilah dengan informasi koneksi yang sesuai)
$koneksi = new mysqli("localhost", "root", "", "db_finansas");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Periksa apakah parameter "id" telah diberikan dalam URL
if (isset($_GET["id"])) {
    $id_tipo = $_GET["id"];

    // Query SQL untuk memeriksa apakah ada data di tabel "Bainaka" yang terkait dengan data di tabel "Tipo"
    $sqlValidasi = "SELECT COUNT(*) as count FROM Bainaka WHERE id_tipo = $id_tipo";
    $resultValidasi = $koneksi->query($sqlValidasi);

    if ($resultValidasi !== false) {
        $rowValidasi = $resultValidasi->fetch_assoc();

        if ($rowValidasi["count"] > 0) {
            // Jika terdapat data terkait di tabel "Bainaka", tampilkan pesan kesalahan dengan SweetAlert2
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Data ini tidak dapat dihapus karena masih terkait dengan data di tabel Bainaka.'
                    }).then(function() {
                        window.location.href = 'tipu_registu.php'; // Ganti 'tipu_registu.php' dengan halaman beranda Anda
                    });
                });
            </script>";
        } else {
            // Jika tidak ada data terkait di tabel "Bainaka," lanjutkan dengan menghapus data dari tabel "Tipo"
            $sql = "DELETE FROM Tipo WHERE id_tipo = $id_tipo";
            $resultDelete = $koneksi->query($sql);

            if ($resultDelete !== false) {
                // Jika penghapusan berhasil, tampilkan pesan sukses dengan SweetAlert2 dan alihkan ke halaman beranda
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Data berhasil dihapus'
                        }).then(function() {
                            window.location.href = 'tipu_registu.php'; // Ganti 'tipu_registu.php' dengan halaman beranda Anda
                        });
                    });
                </script>";
            } else {
                // Jika terjadi kesalahan saat menghapus data dari tabel Tipo, tampilkan pesan kesalahan
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Gagal menghapus data dari tabel Tipo: " . $koneksi->error . "'
                        }).then(function() {
                            window.location.href = 'tipu_registu.php'; // Ganti 'tipu_registu.php' dengan halaman beranda Anda
                        });
                    });
                </script>";
            }
        }
    } else {
        // Menangani kesalahan dalam eksekusi query
        echo "Kesalahan dalam eksekusi query: " . $koneksi->error;
    }
} else {
    echo "ID tidak valid.";
}

// Tutup koneksi ke database
$koneksi->close();
?>
