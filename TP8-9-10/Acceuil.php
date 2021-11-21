<?php
    include "Collection.php";
    include "Panier.php";
    session_start();
    if(!(isset($_SESSION['Panier']))){
        $panier = new Panier();
        $_SESSION['Panier'] = serialize($panier);
    }
?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Acceuil</title>
            <link rel="stylesheet" href="Acceuil.css" />
        </head>
        <body>
            <header>
                <h1>Achat de titre</h1>
                <?php
                if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
                    print "<p>Vous êtes connecté</p>";
                }
                else
                {
                    print(" <form action=\"login.php\">
                            <button class=\"menu\"> Se connecter </button>
                            </form>");
                }
                ?>
                <form action="gestionPanier.php">
                    <button class="menu"> Voir panier</button>
                </form>
                <form action="gestionCollection.php">
                    <button class="menu"> Ajouter / Supprimer des titres </button>
                </form>
            </header>

    <?php
    $bdd = "dnunez_pro";
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    $user = "dnunez_pro";
    $pass = "dnunez_pro";

    $connPDO = new PDO ('mysql:host='.$host.';dbname='.$bdd, $user, $pass);
    $result = $connPDO->query("SELECT * FROM VentesCD");
    $laCollection = new Collection();
    $laCollection->loadFromQuerryPDO($result);
    $result->closeCursor();

    $lesDisques = $laCollection->getDisques();
    $nbDisques = sizeof($lesDisques);
    ?>
    <ul>
    <?php
    for ($i=0; $i < $nbDisques; $i++) { 
        $unDisque =     $lesDisques[$i];
        $laCouverture = $unDisque->getCouvertureMin();
        $leNom =        $unDisque->getTitre();
        $lAuteur =     $unDisque->getAuteur();
        $sDisc = $unDisque->toString();
        print ("<li>
        <form action=\"DetailDisc.php\" method=\"POST\">
            <button class=\"titre\" type=\"submit\" name=\"LeDisque\" class=\"styled\" value=\"$sDisc\">
                <img src=$laCouverture height=\"150\" width=\"150\" onclick=\"help\">
                <p class=\"Titre\">$leNom</p>
                <p>$lAuteur</p>
            </button>
        </form>
    </li>
    ");
    }
    ?>
    </ul>
<?php
    print("
    </body>
</html>");
?>