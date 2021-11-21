<HTML><BODY>
<?php
$file = fopen("resultat.csv","r+");
if (!($file)){
    print("failed to open the file\n");
    exit;
}
$sumDon = 0;
$sumAge = 0;
$nbAge = 0;
while (!feof($file)){
    $line = fgets($file);
    $exp = explode(" | ", $line);
    if (!($exp[0]==null)){
        $tabMail[] = "$exp[2]";
        $tabDons[] = "$exp[3]";
        $sumDon = $sumDon + intval($exp[3]);
        $sumAge = $sumAge + intval($exp[1]);
        $nbAge ++;
    }
}
fclose($file);

$meanAge = $sumAge / $nbAge;
for($i=0;$i<count($tabMail);$i++){
    print("Mail envoyé à $tabMail[$i] : <p>");
    print("Bonjour,<p>   Votre don de $tabDons[$i] € viens d'être pris en compte. <p>Grâce à vous, nous avons pus récolter plus de $sumDon € avec une moyenne d'âge de $meanAge ans. <p>Merci beaucoup!! <p>---------------------------<p>");
    mail($tabMail[$i], "Reçu de don", "Bonjour,\n   \tVotre don de $tabDons[$i]€ viens d'être pris en compte. \nGrâce à vous, nous avons pus récolter plus de $sumDon € avec une moyenne d'âge de $meanAge ans. \nMerci beaucoup!! \n---------------------------\n");
}
print $tabMail[1];


?>
<form action="TP2-1.html" method="POST" class="formDon">
    <input type="submit" value="Back">
</form>
</BODY></HTML>