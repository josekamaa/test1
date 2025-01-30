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
    $amount = $_POST['amount'];
    $payment_status = $_POST['payment_status'];

    $sql = "INSERT INTO billing (patient_id, amount, payment_status)
            VALUES ('$patient_id', '$amount', '$payment_status')";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='text-align: center; margin-top: 50px; font-family: Arial, sans-serif;'>";
        echo "<h2 style='color: green;'>Bill Generated!</h2>";
        echo "<a href='dashboard.html' style='display: inline-block; padding: 10px 20px; background-color:rgb(20, 172, 196); color: white; text-decoration: none; border-radius: 5px;'>Dashboard</a>";
        echo "</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
