

<?php
// Inside auth.php after a successful login
session_start();
$_SESSION['login_success'] = true;
$_SESSION['username'] = $username; // Store the username in the session
// Konfigurasi database dan koneksi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah form dikirimkan melalui metode POST
    include 'includes/db.php';
    // Mengambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Melakukan query untuk memeriksa login
    $query = "SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password'";
    $result = $koneksi->query($query);
    if ($result->num_rows == 1) {
        // Login berhasil
        session_start();
        $_SESSION['username'] = $username; // Menyimpan username dalam sesi
        header("Location: index.php?login_failed=true");
        exit();
    } else {
        // Login gagal
        echo '<script>alert("<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>Primary - </strong> A simple primary alert—check it out!
</div>"); window.location.href = "index.php";</script>';
        exit();
    }
}
// Menutup koneksi
$koneksi->close();


