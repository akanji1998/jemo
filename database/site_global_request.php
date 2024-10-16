<?php


$categories = array();
$topInfographes = array();

$categoryQuery = $conn->prepare("SELECT *  FROM Domaine");
$topInfographeQuery = $conn->prepare("SELECT *  FROM infographe LIMIT 0,4");



$categoryQuery->execute();
$topInfographeQuery->execute();
$categories = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);
$topInfographes = $topInfographeQuery->fetchAll(PDO::FETCH_ASSOC);

// echo "User ID: " . $_SESSION['user_id'] . "<br>";
// echo "Username: " . $_SESSION['username'] . "<br>";
// echo "type: " . $_SESSION['user_type'] . "<br>";


