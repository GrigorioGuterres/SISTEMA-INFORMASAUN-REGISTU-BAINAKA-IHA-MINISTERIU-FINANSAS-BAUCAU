<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $idtipu = $_POST["idtipu"];
    $narantipu = $_POST["narantipu"];
    $asuntu = $_POST["asuntu"];
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
    $sql = "INSERT INTO `tipo` (`id_tipo`, `naran_tipu`, `asuntu`, `obs`) VALUES ('$idtipu', '$narantipu', '$asuntu',' $observasaun')";

    if ($conn->query($sql) === TRUE) {
        header("Location: tipu_registu.php");
        exit(); // Pastikan tidak ada kode lain yang dieksekusi setelah pengalihan
 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Close the database connection
    $conn->close();
}
?>