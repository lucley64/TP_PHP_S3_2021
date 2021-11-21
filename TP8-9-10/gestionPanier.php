<?php
    include "Panier.php";
    include "Disc.php";
    session_start();

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
            <h1>Votre panier</h1>
            <?php
            $panier = unserialize($_SESSION['Panier']);
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
            </form>
            <form action="gestionPanier.php">
                <button class="menu"> Voir panier</button>
            </form>
            <form action="Acceuil.php">
                <button class="menu"> Acceuil </button>
            </form>
        </header>
        <?php
        ?>
        <il>
            <form method="post">
        <?php
            $panier = unserialize($_SESSION['Panier']);
            $nbItem = $panier->getNbItems();
            if (isset($_POST['suprSelect'])){
                for ($i=$nbItem - 1; $i >= 0; $i--){
                    if (isset($_POST[$i])){
                        $panier->delItem($i);
                        $_POST[$i] = false;
                    }
                }
            }
            elseif(isset($_POST['suprTout'])){
                $panier->vider();
            }
            $_SESSION['Panier'] = serialize($panier);
            if (! ($panier->getNbItems() == 0)){
                for ($i=0; $i < $panier->getNbItems(); $i++) { 
                    $leDisc = $panier->getItem($i);
                    $laCouverture = $leDisc->getCouvertureMin();
                    $leNom =        $leDisc->getTitre();
                    $lAuteur =     $leDisc->getAuteur();
                    print ("<li class=\"titre\">
                            <input type=\"checkbox\" name=\"$i\">
                            <img src=$laCouverture height=\"150\" width=\"150\">
                            <p class=\"Titre\">$leNom</p>
                            <p>$lAuteur</p>
                            </li>");                
                }
                print(" <input type=\"submit\" name=\"suprSelect\" value=\"Supprimer la selection\" class=\"button\">
                        <input type=\"submit\" name=\"suprTout\" value=\"Vider le panier\" class=\"button\">");
            }
            else{
                print ("<p>Le Panier est vide<p>");
            }

        ?>
            </form>
        </il>
    </body>
</html>