<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $idkompania = $_POST["idkompania"];
    $narankompania = $_POST["narankompania"];
    $address = $_POST["address"];
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
    $sql = "INSERT INTO `kompania` (`id_kompania`, `naran_kompania`, `adress`, `obs`) VALUES ('$idkompania', '$narankompania', '$address', '$observasaun')";

    if ($conn->query($sql) === TRUE) {
        header("Location: kompania.php");
        exit(); // Pastikan tidak ada kode lain yang dieksekusi setelah pengalihan
   
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>