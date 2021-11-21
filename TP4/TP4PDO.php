<?php
    header("Content-type: image/jpeg");

    $bdd = "roose";
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    $user = "roose";
    $pass = "roose";

    $hauteur = 500;
    $largeur = 500;
    $i = 0;

    $image = imageCreate($hauteur, $largeur);
    $rouge = imageColorAllocate($image, 255, 0, 0);
    imagefill($image,0,0,$rouge);


    $connPDO = new PDO ('mysql:host='.$host.';dbname='.$bdd, $user, $pass);
    $result = $connPDO->query("SELECT ville, indice FROM bourse ORDER BY ville");

    $x = 10;
    $y = imagesy($image);
    $coef = 10;
    $police = imageloadfont("arial.gdf");
    $noir=imagecolorAllocate($image,255,255,255);

    while($tuple = $result->fetch()){
        if($tuple[0] == "NY"){
            $color = imageColorAllocate($image, 0, 255, 0);
            $laville = "New York".$tuple[1];
        }elseif($tuple[0] == "Paris"){
            $color = imageColorAllocate($image, 0, 0, 255);
            $laville = "Paris - ".$tuple[1];
        }elseif($tuple[0] == "Tokyo"){
            $color = imageColorAllocate($image, 0, 0, 0);
            $laville = "Tokyo - ".$tuple[1];
        }else{
            $color = imageColorAllocate($image, 255, 255, 255);
        }
        
        $xtmp = $x + 10;
        $ytmp = $y - ($tuple[1] * $coef);

        imagefilledrectangle($image,$x,$ytmp,$xtmp,$y,$color);
        $ytmp2=$ytmp-10;
        imagestringup($image,0,$x,$ytmp2,$laville,$noir);
        $x=$x+12;
    }


    imagejpeg($image);
    imageDestroy($image);
    $result->closeCursor();

?>