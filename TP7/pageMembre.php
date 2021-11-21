<?php

session_start();
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

    // On teste pour voir si nos variables ont bien été enregistrées
    echo '<html>';
    echo '<head>';
    echo '<title>Page de notre section membre</title>';
    echo '</head>';
    echo '<body>';
    echo 'Votre login est '.$_SESSION['login'].' et votre mot de passe est '.$_SESSION['password'].'.';
    echo '<br />';
    echo '<img src="TP4PDO.php"></img>';
    echo '<br />';
    // On affiche un lien pour fermer notre session
    echo '<a href="./logout.php">Déconnection</a>';
}else {
    echo 'Les variables ne sont pas déclarées.';
}

?>