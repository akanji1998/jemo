<?php


if (isset($_GET["edit"])) {

    // Récupération de l'ID de l'administrateur depuis la requête GET
    $adminId = intval($_GET["edit"]); // Convertir l'ID en entier

    // Récupération des informations de l'administrateur
    $adminQuery = $conn->prepare("SELECT * FROM administrateur WHERE id_administrateur = ?");
    $adminQuery->execute([$adminId]);
    $administrateur = $adminQuery->fetch(PDO::FETCH_ASSOC);  // Récupérer les informations de l'administrateur

    if (!$administrateur) {  // Vérifier si un administrateur a été trouvé
        // Redirection si aucun administrateur trouvé
        header('Location: ../administrateur.php');
        exit;  // Toujours ajouter exit après une redirection pour stopper l'exécution du script
    }

} else {
    // Si l'ID n'est pas défini dans la requête GET
    header('Location: ../administrateur.php');
    exit;  // Ajout d'un exit après la redirection
}
