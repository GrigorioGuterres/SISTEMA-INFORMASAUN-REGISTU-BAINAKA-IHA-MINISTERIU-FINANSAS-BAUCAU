<?php
// Koneksi ke database (gantilah dengan informasi koneksi yang sesuai)
include 'includes/db.php';

// Periksa apakah parameter "id" telah diberikan dalam URL
if (isset($_GET["id"])) {
    $id_municipiu = $_GET["id"];

    // Query SQL untuk memeriksa apakah ada data di tabel "Bainaka" yang terkait dengan data di tabel "Municipiu"
    $sqlValidasi = "SELECT COUNT(*) as count FROM Bainaka WHERE id_municipiu = $id_municipiu";
    $resultValidasi = $koneksi->query($sqlValidasi);
    $rowValidasi = $resultValidasi->fetch_assoc();
    
    if ($rowValidasi["count"] > 0) {
        // Jika terdapat data terkait di tabel "Bainaka", tampilkan pesan kesalahan dengan SweetAlert2
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Dadus nee lahetan hapus tanba sei halo relasi ho dadus  tabel Bainaka.'
                }).then(function() {
                    window.location.href = 'municipiu.php'; // Ganti 'municipiu.php' dengan halaman beranda Anda
                });
            });
        </script>";
    } else {
        // Jika tidak ada data terkait di tabel "Bainaka," lanjutkan dengan menghapus data dari tabel "Municipiu"
        $sql = "DELETE FROM Municipiu WHERE id_municipiu = $id_municipiu";

        // Eksekusi query
        if ($koneksi->query($sql) === TRUE) {
            // Jika penghapusan berhasil, tampilkan pesan sukses dengan SweetAlert2 dan alihkan ke halaman beranda
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Data berhasil dihapus'
                    }).then(function() {
                        window.location.href = 'municipiu.php'; // Ganti 'municipiu.php' dengan halaman beranda Anda
                    });
                });
            </script>";
        } else {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan dengan SweetAlert2 dan alihkan ke halaman beranda
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Gagal menghapus data: " . $koneksi->error . "'
                    }).then(function() {
                        window.location.href = 'municipiu.php'; // Ganti 'municipiu.php' dengan halaman beranda Anda
                    });
                });
            </script>";
        }
    }
} else {
    echo "ID tidak valid.";
}

// Tutup koneksi ke database
$koneksi->close();
?>
