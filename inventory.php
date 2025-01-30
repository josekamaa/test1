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
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $supplier = $_POST['supplier'];

    $sql = "INSERT INTO inventory (item_name, quantity, supplier)
            VALUES ('$item_name', '$quantity', '$supplier')";

    if ($conn->query($sql) === TRUE) {

        echo "<div style='text-align: center; margin-top: 50px; font-family: Arial, sans-serif;'>";
        echo "<h2 style='color: green;'>Item added to inventory!</h2>";
        echo "<a href='inventory.html' style='display: inline-block; padding: 10px 20px; background-color:rgb(20, 172, 196); color: white; text-decoration: none; border-radius: 5px;'>Back to Home</a>";
        echo "</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
