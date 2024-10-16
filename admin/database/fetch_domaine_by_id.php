<?php if (isset($_GET["edit"])) {

    // Récupération de l'ID de l'domaine depuis la requête GET
    $domainId = intval($_GET["edit"]); // Convertir l'ID en entier pour éviter les injections SQL

    // Récupération des informations de l'domaine
    $domaineQuery = $conn->prepare("SELECT * FROM domaine WHERE id_domaine = ?");
    $domaineQuery->execute([$domainId]);
    $domaine = $domaineQuery->fetch(PDO::FETCH_ASSOC);  // Récupérer les informations de l'domaine

    if (!$domaine) {  // Vérifier si un domaine a été trouvé
        header('Location: ../domaine.php');
    }

} else {
    // echo json_encode([
    //     'success' => false,
    //     'message' => 'Aucun domaine trouvé avec cet ID.'
    // ]);
    // Si l'ID n'est pas défini dans la requête GET
    header('Location: ../domaine.php');
    // header('Location: /default-page.php');
}