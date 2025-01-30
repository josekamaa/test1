<?php
$servername = "localhost";
$username = "root";
$password = "muthike3";
$dbname = "khms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$type = $_GET['type'];
$table = "";

switch ($type) {
    case 'patients':
        $table = "patients";
        break;
    case 'appointments':
        $table = "appointments";
        break;
    case 'billing':
        $table = "billing";
        break;
    case 'inventory':
        $table = "inventory";
        break;
    default:
        echo json_encode([]);
        exit();
}

$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
$conn->close();
?>
