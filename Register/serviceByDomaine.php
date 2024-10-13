<?php
require('../connexion.php');



$services = [];
try {

    if (isset($_GET['dm'])) {

        $domaineName = htmlspecialchars(htmlentities($_GET['dm'], ENT_QUOTES));

        $searchDomaineQuery = $conn->query("SELECT * FROM domaine WHERE nom_domaine = '$domaineName'");
        $searchDomaine = $searchDomaineQuery->fetch();

        if (empty($searchDomaine))
            return;

        $searchServicePrepareQuery = $conn->prepare("SELECT * FROM annonce WHERE domaine_id = ?");
        $searchServicePrepareQuery->execute([$searchDomaine['id_domaine']]);
        $services = $searchServicePrepareQuery->fetchAll();
    }

} catch (Exception $e) {
    echo $e->getMessage()
    ;
} catch (PDOException $e) {
    echo $e->getMessage();

}

