<?php


    include "Collection.php";
    $bdd = "dnunez_pro";
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    $user = "dnunez_pro";
    $pass = "dnunez_pro";

    $connPDO = new PDO ('mysql:host='.$host.';dbname='.$bdd, $user, $pass);

    function afficherSupprimer(PDO $connPDO) {
        $result = $connPDO->query("SELECT * FROM VentesCD");
        $laCollection = new Collection();
        $laCollection->loadFromQuerryPDO($result);
        $result->closeCursor();

        $lesDisques = $laCollection->getDisques();
        $nbDisques = sizeof($lesDisques);

        for ($i=0; $i < $nbDisques; $i++) { 
            $unDisque =     $lesDisques[$i];
            $laCouverture = $unDisque->getCouvertureMin();
            $leNom =        $unDisque->getTitre();
            $lAuteur =     $unDisque->getAuteur();
            print ("<li>
            <form method=\"POST\">
                <button class=\"titre\" type=\"submit\" name=\"LeDisque\" class=\"styled\" value=\"$leNom\">
                    <img src=$laCouverture height=\"150\" width=\"150\" onclick=\"help\">
                    <p class=\"Titre\">$leNom</p>
                    <p>$lAuteur</p>
                </button>
            </form>
        </li>
        ");
        }
    }

    function supprimer(PDO $connPDO, Disc $discASup){
        
        var_dump($discASup);
        $titre = $discASup->getTitre();
        $auteur = $discASup->getAuteur();

        $connPDO->beginTransaction();
        if ($connPDO->exec("DELETE FROM VentesCD WHERE `VentesCD`.`TITRE`=\"$titre\" AND `VentesCD`.`AUTEUR` = \"$auteur\" ")){
            //$connPDO->commit();
        }

    }

    afficherSupprimer($connPDO);
    if (isset($_POST['LeDisque'])){
        $LeDisque = $_POST['LeDisque'];
        $result = $connPDO->query("SELECT * FROM VentesCD WHERE `VentesCD`.`TITRE`=\"$LeDisque\"");
        $tuple = $result->fetch();
        $LeDisque = new Disc($tuple[0], $tuple[1], $tuple[2], $tuple[3], $tuple[4]);
        $result->closeCursor();

        supprimer($connPDO, $LeDisque);
    }
?>