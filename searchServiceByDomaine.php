<?php
require('../connexion.php');



$services = [];
try {

    if (isset($_GET['dm']) && isset($_GET['search'])) {
        $searchWords = htmlspecialchars(htmlentities($_GET['search'], ENT_QUOTES));
        $domaineName = htmlspecialchars(htmlentities($_GET['dm'], ENT_QUOTES));

        $searchDomaineQuery = $conn->query("SELECT * FROM domaine WHERE nom_domaine = '$domaineName'");
        $searchDomaine = $searchDomaineQuery->fetch();
        if (empty($searchDomaine))
            return;
        // Check if the ID exists in the 'lieux' table
        $searchServicePrepareQuery = $conn->prepare("SELECT * FROM annonce WHERE (description_annonce LIKE :search  OR titre_annonce LIKE :search) AND domaine_id = :dm");
        $searchServicePrepareQuery->execute(['search' => " %$searchWords%",'dm' => $searchDomaine['id_domaine']]);
        $services = $searchServicePrepareQuery->fetchAll();
    }

} catch (Exception $e) {
    echo $e->getMessage()
    ;
} catch (PDOException $e) {
    echo $e->getMessage();

}

