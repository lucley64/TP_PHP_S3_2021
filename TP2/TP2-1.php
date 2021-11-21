<HTML><BODY>
<?php
$file = fopen("resultat.csv", "a");
$Nom=$_POST['Nom'];
$Age=$_POST['Age'];
$Mail=$_POST["Mail"];
$Don=$_POST['Don'];
fputs($file,"$Nom | $Age | $Mail | $Don\n");
fclose($file);

?>

<form action="TP2-1.html" method="POST" class="formDon">
    <p> Don Pris en compte </p>
    <input type="submit" value="Back">
</form>
</BODY></HTML>