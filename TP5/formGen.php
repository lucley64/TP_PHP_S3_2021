<?php
    $fileCfg = fopen("config.ini", "r");
    
    if(!($fileCfg)){
        print ("Impossible d'ouvrir le fichier");
        exit();
    }



    while (!feof($fileCfg)){
        $line = fgets($fileCfg);
        $line = chop($line);
        if ($line == "[NOMFIC]"){
            $line = fgets($fileCfg);
            $line = chop($line);
            $nomFic = $line;
        }elseif ($line == "[NB]"){
            $line = fgets($fileCfg);
            $line = chop($line);
            $nbrLines = $line;
        }else {
            if(!($line=="[NOMS]")){
                $noms[] = $line;
            }else{
            }
            
        }

    }


    fclose($fileCfg);


    $fileHTML = fopen("$nomFic.html", "w");

    fputs($fileHTML, "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>TP5</title>
    </head>
    <body>
        <form action=$nomFic.php method=\"POST\">" );

    for ($i = 0; $i<$nbrLines; $i++){
        fputs($fileHTML, "
            <div>
                <label=$noms[$i]>$noms[$i]: </label>
                <input type=\"text\" name=$noms[$i] id=$noms[$i] required>
            </div>");
    }

    fputs($fileHTML, "
            <div>
                <input type=\"submit\" value=\"OK\">
            </div>
        </form>
    </body>
</html>");

    fclose($fileHTML);

    

    $filePHP = fopen("$nomFic.php", "w");
    fputs($filePHP, "<?php");
    for($i=0; $i<$nbrLines; $i++){
        fputs($filePHP, "
    print(\"$noms[$i] : \$_POST[$noms[$i]] <br>\");");
    }
    fputs($filePHP, "
?>");
    fclose($filePHP);

    header("Location: $nomFic.html");
?>
