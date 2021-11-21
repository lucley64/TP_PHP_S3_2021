<HTML><BODY>
<?php
$file = fopen("restos.csv", "r");
if (!($file)){
    print("failed to open the file\n");
    exit;
}
while(!feof($file)){
    $line = fgets($file);
    $exp = explode(";","$line");
    $nom[] = $exp[0];
    $prenom[] = $exp[1];
    $resto[] = $exp[2];
}
print ("Nom : ");
print ("$nom[0]");
for ($i = 1; $i < count($nom); $i++){
    print (", $nom[$i]");
}
print("<BR>");
print ("Prénom : ");
print ("$prenom[0]");
for ($i = 1; $i < count($prenom); $i++){
    print (", $prenom[$i]");
}
print("<BR>");
print ("Réstaurant : ");
print ("$resto[0]");
for ($i = 1; $i < count($resto); $i++){
    print (", $resto[$i]");
}
fclose ($file);
?>
</BODY></HTML>