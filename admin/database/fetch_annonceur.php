<?php

$listDesAnnonceurs = array();

$allAnonceQuery = $conn->prepare("SELECT *  FROM annonce WHERE id_annonceur =?");


$annonceurQuery = $conn->prepare("SELECT * FROM annonceur");
$annonceurQuery->execute();
$listDesAnnonceurs = $annonceurQuery->fetchAll(PDO::FETCH_ASSOC);



foreach ($listDesAnnonceurs as $annonceur) {
    $allAnonceQuery->execute([$_SESSION['user_id']]);
    $annonces = $allAnonceQuery->fetchAll(PDO::FETCH_ASSOC);


    $annonce['nbr_annonces'] = count($annonces);
    # code...
}





