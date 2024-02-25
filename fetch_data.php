<?php
// Include your database connection code here

// Perform a database query to fetch the required data
$query = "SELECT m.naran_muncipiu, COUNT(b.id_bainaka) AS total_bainaka
          FROM municipiu m
          LEFT JOIN bainaka b ON m.id_municipiu = b.id_municipiu
          GROUP BY m.id_municipiu";

$result = $conn->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
