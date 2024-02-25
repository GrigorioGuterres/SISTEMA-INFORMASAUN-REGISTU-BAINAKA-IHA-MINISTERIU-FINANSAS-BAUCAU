<?php
session_start();

// Database connection (adjust with your database information)
$host = "localhost";
$username = "root";
$password = "";
$database = "db_finansas";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to change the password
function changePassword($conn, $username, $newPassword)
{
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = "UPDATE tb_admin SET password = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashedPassword, $username);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST["changePassword"])) {
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    $renewPassword = $_POST["renewPassword"];
    $username = $_SESSION["username"];

    // Check if the current password is correct
    $sql = "SELECT password FROM tb_admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $currentHashedPassword = $row["password"];
        if (password_verify($currentPassword, $currentHashedPassword)) {
            if ($newPassword === $renewPassword) {
                if (changePassword($conn, $username, $newPassword)) {
                    echo "Password changed successfully.";
                } else {
                    echo "Failed to change password.";
                }
            } else {
                echo "New password and password confirmation do not match.";
            }
        } else {
            echo "Current password is incorrect.";
        }
    } else {
        echo "User not found.";
    }
}

$conn->close();
?>