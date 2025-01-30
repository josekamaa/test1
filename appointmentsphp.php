<?php
$servername = "localhost";
$username = "root";
$password = "muthike3";
$dbname = "khms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO appointments (patient_id, doctor, appointment_date, appointment_time)
            VALUES ('$patient_id', '$doctor', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {

        echo "<div style='text-align: center; margin-top: 50px; font-family: Arial, sans-serif;'>";
        echo "<h2 style='color: green;'>appointment scheduled successfully</h2>";
        echo "<a href='dashboard.html' style='display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Dashboard</a>";
        echo "</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
