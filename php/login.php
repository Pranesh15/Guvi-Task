<?php

$username = $_POST['name'];
$password = $_POST['mail'];

if (!empty($username) && !empty($password)) {

  $servername = "localhost";
  $username = "id20462164_guvikongu";
  $password = "Pran0pran@pran";
  $dbname = "id20462164_guvi";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    } else {
        $SELECT = "SELECT name,email FROM Guvi12 WHERE name = ?  LIMIT 1";

        // Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($username, $storedPassword);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 1) {
            $stmt->fetch();
            if ($password == $storedPassword) {
                echo "register";
                $redis = new Predis\Client();
  echo "Connected to Redis Successfully!";
  $sessionId = uniqid();
  $redis->set($sessionId, $name);
  setcookie('sessionId', $sessionId, time()+3600, '/', '', false, true);
  header('Location: profile.html');
  exit;
            } 
        } else 
        {
            echo "password wrong";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Both email and password are required";
}
?>