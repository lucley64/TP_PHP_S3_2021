<?php

$file = fopen("logins.csv","r");
$isValid = FALSE;

while(!feof($file)){
    $line = fgets($file);
    $line = chop($line);
    $expLine = explode(" ; ",$line);
    if ($_POST['login'] == $expLine[0]){
        if ($_POST['password'] == $expLine[1]){
            $isValid = TRUE;
        }
    }
}

fclose($file);

if ($isValid){
    session_start();
    echo '<meta http-equiv="refresh" content="0;URL=pageMembre.php">';
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}else{
    echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    echo '<meta http-equiv="refresh" content="0;URL=login.html">';
}
?>