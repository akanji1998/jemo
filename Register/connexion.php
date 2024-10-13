<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourist_journey";

try {
    $conn = new PDO("mysql:host=127.0.0.1:3306;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";

    // session_start();
    // unset($_SESSION['emails_produc']);
    // unset($_SESSION['connected']);
    // session_destroy();
    // header('Location:index.php?action=producteur');

} catch (PDOException $e) {
    echo "Connection failed: " . $e;
}
