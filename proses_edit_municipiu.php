<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan ID MUNICIPIU sudah diterima
    if (isset($_POST["editIdMunicipiu"])) {
        $idMunicipiu = $_POST["editIdMunicipiu"];
        $naranMunicipiu = $_POST["editNaranMunicipiu"];
        $obs = $_POST["editObs"];
        // Koneksi ke database (sesuaikan dengan informasi koneksi yang sesuai)
        $koneksi = new mysqli("localhost", "root", "", "db_finansas");
        // Periksa koneksi
        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }
        // Query SQL untuk memperbarui data berdasarkan ID MUNICIPIU
        $sql = "UPDATE municipiu SET naran_muncipiu = '$naranMunicipiu', obs = '$obs' WHERE id_municipiu = $idMunicipiu";
        // Eksekusi query
        if ($koneksi->query($sql) === TRUE) {
            // Redirect kembali ke halaman sebelumnya dengan pesan sukses
            header("Location: municipiu.php?pesan=Data berhasil diperbarui");
        } else {
            // Redirect kembali ke halaman sebelumnya dengan pesan kesalahan
            header("Location: municipiu.php?pesan=Gagal memperbarui data: " . $koneksi->error);
        }

        // Tutup koneksi ke database
        $koneksi->close();
    } else {
        echo "ID MUNICIPIU tidak valid.";
    }
} else {
    echo "Akses tidak valid.";
}
?>
