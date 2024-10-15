<?php

$categories = array();

$categoryQuery = $conn->prepare("SELECT *  FROM Domaine");

$categoryQuery->execute();
$categories = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);

