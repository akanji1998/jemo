<?php

$listDesAdminitrateur = array();


$infographisteQuery = $conn->prepare("SELECT * FROM administrateur");
$infographisteQuery->execute();
$listDesAdminitrateur = $infographisteQuery->fetchAll(PDO::FETCH_ASSOC);






