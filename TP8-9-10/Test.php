<?php
    include "Panier.php";
    include "Collection.php";

    $bdd = "dnunez_pro";
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    $user = "dnunez_pro";
    $pass = "dnunez_pro";

    $connPDO = new PDO ('mysql:host='.$host.';dbname='.$bdd, $user, $pass);
    $result = $connPDO->query("SELECT * FROM VentesCD");

    $coll = new Collection();
    $coll->loadFromQuerryPDO($result);

    $disques = $coll->getDisques();
    var_dump($disques);

    $panier = new Panier();
    $panier->addItem($coll->getDisc(5));
    $discInPanier = $panier->getItems();
    var_dump($discInPanier);
?>