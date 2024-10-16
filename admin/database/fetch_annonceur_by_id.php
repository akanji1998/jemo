<?php 


if (isset($_GET["edit"])) {

    // Récupération de l'ID de l'annonceur depuis la requête GET
    $annonceurId = intval($_GET["edit"]); // Convertir l'ID en entier

    // Récupération des informations de l'annonceur
    $annonceurQuery = $conn->prepare("SELECT * FROM annonceur WHERE id_annonceur = ?");
    $annonceurQuery->execute([$annonceurId]);
    $annonceur = $annonceurQuery->fetch(PDO::FETCH_ASSOC);  // Récupérer les informations de l'annonceur

    if (!$annonceur) {  // Vérifier si un annonceur a été trouvé
        // Redirection si aucun annonceur trouvé
        header('Location: ../annonceur.php');
        exit;  // Toujours ajouter exit après une redirection pour stopper l'exécution du script
    }

    // Préparation et exécution de la requête pour récupérer les annonces de l'annonceur
    $annonceQuery = $conn->prepare("SELECT * FROM annonce WHERE id_annonceur = ?");
    $annonceQuery->execute([$annonceur['id_annonceur']]);
    $annonces = $annonceQuery->fetchAll(PDO::FETCH_ASSOC); // Récupérer toutes les annonces associées à cet annonceur

} else {
    // Si l'ID n'est pas défini dans la requête GET
    header('Location: ../annonceur.php');
    exit;  // Ajout d'un exit après la redirection
}
