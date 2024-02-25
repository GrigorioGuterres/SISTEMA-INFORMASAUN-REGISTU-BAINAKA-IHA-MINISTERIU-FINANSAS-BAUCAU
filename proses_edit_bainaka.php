<?php
// Koneksaun ba banco de dados (muda ida ne'e ho informasaun koneksaun ida ne'ebe di'ak liu)
$koneksi = new mysqli("localhost", "root", "", "db_finansas");

// Chek koneksaun
if ($koneksi->connect_error) {
    die("Koneksaun labele hetan: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Halo dadus husi formuláriu
    $id_bainaka = $_POST['id_bainaka'];
    $naran_bainaka = $_POST['nama'];
    $sexo = $_POST['jenis_kelamin'];
    $data_rejistu = $_POST['tanggal_registrasi'];
    $no_hp = $_POST['nomor_telepon'];
    $id_municipiu = $_POST['editIdMunicipiu'];
    $id_kompania = $_POST['editIdKompania'];
    $id_tipo = $_POST['editIdTipo'];

    // Kódigu SQL atu atualiza dadus bazeia ba ID
    $sql = "UPDATE Bainaka SET naran_bainaka='$naran_bainaka', sexo='$sexo', data_rejistu='$data_rejistu', no_hp='$no_hp', id_municipiu='$id_municipiu', id_kompania='$id_kompania', id_tipo='$id_tipo' WHERE id_bainaka='$id_bainaka'";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: klinte.php");
        exit(); // Pastikan tidak ada kode lain yang dieksekusi setelah pengalihan
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Taka koneksaun ba banco de dados
$koneksi->close();
?>
