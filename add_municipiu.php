<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $idmunicpiu = $_POST["idmunicpiu"];
    $naranmunicipiu = $_POST["naranmunicipiu"];
    $observasaun = $_POST["observasaun"];

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_finansas"; // Change to your database name

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the 'categories' table
    $sql = "INSERT INTO `municipiu` (`id_municipiu`, `naran_muncipiu`, `obs`) VALUES ('$idmunicpiu', '$naranmunicipiu', '$observasaun')";

    if ($conn->query($sql) === TRUE) {
        header("Location: municipiu.php");
        exit(); // Pastikan tidak ada kode lain yang dieksekusi setelah pengalihan
   
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>