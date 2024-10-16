<?php

// Initialiser un tableau pour les annonces
$listDesAnnonces = array();

try {
    // Préparer la requête pour récupérer les annonces
    $allAnonceQuery = $conn->prepare("SELECT * FROM annonce WHERE id_annonceur = ?");
    
    // Préparer la requête pour récupérer l'annonceur
    $annonceurQuery = $conn->prepare("SELECT * FROM annonceur WHERE id_annonceur = ?");
    
    // Exécuter la requête pour l'annonceur
    $annonceurQuery->execute([$_SESSION['user_id']]);
    
    // Exécuter la requête pour les annonces
    $allAnonceQuery->execute([$_SESSION['user_id']]);
    
    // Afficher les données de session (facultatif, pour debug)
    echo "User ID: " . $_SESSION['user_id'] . "<br>";
    echo "Username: " . $_SESSION['username'] . "<br>";
    echo "type: " . $_SESSION['user_type'] . "<br>";
    
    // Récupérer les annonces
    $listDesAnnonces = $allAnonceQuery->fetchAll(PDO::FETCH_ASSOC);
    
    // Récupérer les informations de l'annonceur
    $annonceur = $annonceurQuery->fetch(PDO::FETCH_ASSOC); // Utiliser fetch() si on s'attend à une seule ligne
    
  

} catch (PDOException $e) {
    echo "Erreur lors de la récupération des annonces ou annonceur : " . $e->getMessage();
}


