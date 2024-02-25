<?php
// Koneksi ke database (gantilah dengan informasi koneksi yang sesuai)
$koneksi = new mysqli("localhost", "root", "", "db_finansas");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $naran_bainaka = $_POST["naran_bainaka"];
    $foto = $_FILES["foto"]["name"];
    $foto_tmp = $_FILES["foto"]["tmp_name"];
    $sexu = $_POST["sexu"];
    $data_registu = $_POST["data_registu"];
    $numeru_telefone = $_POST["numeru_telefone"];
    $id_municipiu = $_POST["id_municipiu"];
    $id_kompania = $_POST["id_kompania"];
    $id_tipo = $_POST["id_tipo"];
    // Buat direktori tempat menyimpan gambar jika belum ada
    $target_directory = "img/"; // Ganti dengan direktori yang sesuai
    if (!file_exists($target_directory)) {
        mkdir($target_directory, 0777, true);
    }
    // Buat nama unik untuk file gambar (untuk menghindari konflik nama file)
    $foto = uniqid() . "_" . $foto;
    // Pindahkan file gambar ke direktori yang telah dibuat
    $target_file = $target_directory . $foto;
    move_uploaded_file($foto_tmp, $target_file);
    // Query SQL untuk menyimpan data ke tabel Bainaka
    $sql = "INSERT INTO bainaka (naran_bainaka, imagen_baikana, sexo, data_rejistu, no_hp, id_municipiu, id_kompania, id_tipo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssssss", $naran_bainaka, $foto, $sexu, $data_registu, $numeru_telefone, $id_municipiu, $id_kompania, $id_tipo);
    if ($stmt->execute()) {
        // Data berhasil ditambahkan
        header("Location: klinte.php"); // Ganti dengan halaman yang sesuai
        exit();
    } else {
        // Jika terjadi kesalahan
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
    // Tutup statement dan koneksi
    $stmt->close();
    $koneksi->close();
}
?>
