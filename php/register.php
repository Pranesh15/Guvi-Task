<?php
$servername = "localhost";
$username = "id20462164_guvikongu";
$password = "Pran0pran@pran";
$dbname = "id20462164_guvi";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("INSERT INTO Guvi12 (name, email ) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);
$name = $_POST['name'];
$email = $_POST['email'];
$stmt->execute();
echo "User registered successfully.";
$stmt->close();
$conn->close();
?>