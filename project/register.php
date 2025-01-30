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
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $age = $_POST['age'];
    $date = $_POST['date'];
    $department = $_POST['department'];
    $diagnosis = $_POST['diagnosis'];

    $sql = "INSERT INTO patients (ID, name, contact, age, date, department, diagnosis) VALUES ('$ID', '$name', '$contact', '$age', '$date', '$department', '$diagnosis')";

    if ($conn->query($sql) === TRUE) {
        echo "Patient registered successfully!";
        echo "<div style='text-align: center; margin-top: 50px; font-family: Arial, sans-serif;'>";
        echo "<h2 style='color: green;'>Patient registered successfully!</h2>";
        echo "<a href='pat_reg.html' style='display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Back to Home</a>";
        echo "</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

