<?php

$listDesInfographiste = array();


$infographisteQuery = $conn->prepare("SELECT * FROM infographe");
$infographisteQuery->execute();
$listDesInfographiste = $infographisteQuery->fetchAll(PDO::FETCH_ASSOC);






