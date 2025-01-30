<?php
$servername = "localhost";
$username = "root";
$password = "muthike3";
$dbname = "khms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$reportType = $_POST['reportType'];
$filename = $reportType . '_report_' . date('Ymd') . '.csv';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

$output = fopen('php://output', 'w');

if ($reportType == "patients") {
    fputcsv($output, ['Patient ID', 'Name', 'Contact', 'Age', 'Department', 'Diagnosis']);
    $query = "SELECT ID, name, contact, age, department, diagnosis FROM patients";
} elseif ($reportType == "appointments") {
    fputcsv($output, ['Appointment ID', 'Patient ID', 'Doctor', 'Date', 'Time']);
    $query = "SELECT ID, patient_id, doctor, appointment_date, appointment_time FROM appointments";
} elseif ($reportType == "billing") {
    fputcsv($output, ['Bill ID', 'Patient ID', 'Amount', 'Status']);
    $query = "SELECT ID, patient_id, amount, payment_status FROM billing";
} elseif ($reportType == "inventory") {
    fputcsv($output, ['Item Name', 'Quantity', 'Supplier']);
    $query = "SELECT item_name, quantity, supplier FROM inventory";
} else {
    die("Invalid report type selected.");
}

$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
$conn->close();
?>
